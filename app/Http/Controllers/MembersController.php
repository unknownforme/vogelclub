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
            'birth_date' => 'required|date',
            'nbvv_number' => 'nullable|string|max:255',
            'member_type_id' => 'required|exists:member_types,id',
            'is_active' => 'required|boolean',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:20',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($validated) {
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
                'birth_date' => $validated['birth_date'],
                'nbvv_number' => $validated['nbvv_number'] ?? null,
                'is_active' => $validated['is_active'],
            ]);
        });

        return redirect()->route('members.index')->with('success', 'Lid is succesvol toegevoegd.');
    }

    public function show(Member $member)
    {
        $member->load(['memberType', 'address', 'breedingNumbers']);
        return view('members.show', compact('member'));
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
            'birth_date' => 'required|date',
            'nbvv_number' => 'nullable|string|max:255',
            'member_type_id' => 'required|exists:member_types,id',
            'is_active' => 'required|boolean',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:20',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($validated, $member) {
            $member->update([
                'member_type_id' => $validated['member_type_id'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'birth_date' => $validated['birth_date'],
                'nbvv_number' => $validated['nbvv_number'] ?? null,
                'is_active' => $validated['is_active'],
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
}
