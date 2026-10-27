<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberType;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::with(['memberType', 'address', 'breedingNumbers']);

        if ($request->filled('name')) {
            $name = $request->input('name');
            $query->where(function ($q) use ($name) {
                $q->where('first_name', 'like', "%{$name}%")->orWhere('last_name', 'like', "%{$name}%");
            });
        }

        if ($request->filled('member_type_id')) {
            $query->where('member_type_id', $request->input('member_type_id'));
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->input('is_active'));
        }

        if ($request->filled('breeding_number')) {
            $bn = $request->input('breeding_number');
            $query->whereHas('breedingNumbers', function ($q) use ($bn) {
                $q->where('breeding_number', 'like', "%{$bn}%");
            });
        }

        $members = $query->orderBy('last_name')->orderBy('first_name')->paginate(20)->withQueryString();
        $memberTypes = MemberType::orderBy('name')->get();

        return view('members.index', compact('members', 'memberTypes'));
    }

    public function create()
    {
        $memberTypes = MemberType::orderBy('name')->get();
        return view('members.create', compact('memberTypes'));
    }

    public function store(Request $request)
    {
                $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email',
            'birth_date' => 'required|date',
            'nbvv_number' => 'nullable|string|max:255',
            'member_type_id' => 'required|exists:member_types,id',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:20',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($validated) {
            $memberType = MemberType::findOrFail($validated['member_type_id']);
            
            $address = Address::create([
                'street' => $validated['street'],
                'house_number' => $validated['house_number'],
                'postal_code' => $validated['postal_code'],
                'city' => $validated['city'],
            ]);

            Member::create([
                'member_type_id' => $validated['member_type_id'],
                'address_id' => $address->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'birth_date' => $validated['birth_date'],
                'nbvv_number' => $validated['nbvv_number'] ?? null,
                'is_active' => false, // Force inactive for public registration
                'price' => $memberType->price,
            ]);
        });

        return redirect()->route('home')->with('success', 'Lid is succesvol toegevoegd.');
    }

    public function show(Member $member)
    {
        $member->load(['memberType', 'address', 'breedingNumbers']);
        return view('members.show', compact('member'));
    }

    public function approve(Member $member)
    {
        $member->update(['is_active' => true]);

        return redirect()->route('members.index')->with('success', 'Lid is goedgekeurd.');
    }


    public function edit(Member $member)
    {
        $memberTypes = MemberType::orderBy('name')->get();
        $member->load(['memberType', 'address', 'breedingNumbers']);
        return view('members.edit', compact('member', 'memberTypes'));
    }

    public function update(Request $request, Member $member)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:members,email,' . $member->id,
            'birth_date' => 'required|date',
            'nbvv_number' => 'nullable|string|max:255',
            'member_type_id' => 'required|exists:member_types,id',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:20',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        DB::transaction(function () use ($validated, $member) {
            $memberType = MemberType::findOrFail($validated['member_type_id']);

            $member->update([
                'member_type_id' => $validated['member_type_id'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'birth_date' => $validated['birth_date'],
                'nbvv_number' => $validated['nbvv_number'] ?? null,
                'is_active' => $validated['is_active'],
                'price' => $memberType->price,
            ]);

            $member->address->update([
                'street' => $validated['street'],
                'house_number' => $validated['house_number'],
                'postal_code' => $validated['postal_code'],
                'city' => $validated['city'],
            ]);
        });

        return redirect()->route('members.show', $member)->with('success', 'Lid is succesvol bijgewerkt.');
    }

    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Lid is succesvol verwijderd.');
    }

    public function cancelForm()
    {
        return view('members.cancel');
    }

    public function cancel(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
        ]);

        $member = Member::where('email', $validated['email'])->first();

        if (!$member) {
            return redirect()->route('members.cancel_form')->with('error', 'Geen lid gevonden met dit e-mailadres.');
        }

        $member->update(['cancellation_requested' => true]);

        return redirect()->route('home')->with('success', 'Uw verzoek tot annulering is ontvangen. De secretaris zal dit verwerken.');
    }
}
