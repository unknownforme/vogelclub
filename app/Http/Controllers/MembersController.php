<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Member_types;
use App\Models\Addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    /**
     * Display an overview of all members.
     */
    public function index(Request $request)
    {
        $query = Members::with([
            'memberTypes',
            'Addresses',
            'breedingNumbers',
        ]);

        // Search by first name or last name
        if ($request->filled('name')) {
            $name = $request->input('name');

            $query->where(function ($query) use ($name) {
                $query->where('first_name', 'like', "%{$name}%")
                    ->orWhere('last_name', 'like', "%{$name}%");
            });
        }

        // Filter by member type
        if ($request->filled('member_type_id')) {
            $query->where(
                'member_type_id',
                $request->input('member_type_id')
            );
        }

        // Filter by active status
        if ($request->filled('is_active')) {
            $query->where(
                'is_active',
                $request->input('is_active')
            );
        }

        // Search by breeding number
        if ($request->filled('breeding_number')) {
            $breedingNumber = $request->input('breeding_number');

            $query->whereHas('breedingNumbers', function ($query) use ($breedingNumber) {
                $query->where(
                    'breeding_number',
                    'like',
                    "%{$breedingNumber}%"
                );
            });
        }

        $members = $query
            ->orderBy('last_name')
            ->orderBy('first_name')
            ->paginate(20)
            ->withQueryString();

        $memberTypes = member_types::orderBy('name')->get();

        return view('members.index', compact(
            'members',
            'memberTypes'
        ));
    }

    /**
     * Show the form for creating a new member.
     */
    public function create()
    {
        $memberTypes = member_types::orderBy('name')->get();

        return view('members.create', compact('memberTypes'));
    }

    /**
     * Store a newly created member.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],

            'last_name' => [
                'required',
                'string',
                'max:255',
            ],

            'birth_date' => [
                'required',
                'date',
            ],

            'NBvV_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'member_type_id' => [
                'required',
                'exists:member_types,id',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],

            // Address
            'street' => [
                'required',
                'string',
                'max:255',
            ],

            'house_number' => [
                'required',
                'string',
                'max:20',
            ],

            'postal_code' => [
                'required',
                'string',
                'max:20',
            ],

            'city' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        DB::transaction(function () use ($validated) {

            $Addresses = Addresses::create([
                'street' => $validated['street'],
                'house_number' => $validated['house_number'],
                'postal_code' => $validated['postal_code'],
                'city' => $validated['city'],
            ]);

            Members::create([
                'member_type_id' => $validated['member_type_id'],
                'address_id' => $Addresses->id,
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'birth_date' => $validated['birth_date'],
                'NBvV_number' => $validated['NBvV_number'] ?? null,
                'is_active' => $validated['is_active'],
            ]);
        });

        return redirect()
            ->route('members.index')
            ->with('success', 'Lid is succesvol toegevoegd.');
    }

    /**
     * Display a specific member.
     */
    public function show(Members $member)
    {
        $member->load([
            'memberTypes',
            'Addresses',
            'breedingNumbers',
        ]);

        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing a member.
     */
    public function edit(Members $member)
    {
        $memberTypes = member_types::orderBy('name')->get();

        $member->load([
            'memberTypes',
            'Addresses',
            'breedingNumbers',
        ]);

        return view('members.edit', compact(
            'member',
            'memberTypes'
        ));
    }

    /**
     * Update a member.
     */
    public function update(Request $request, Members $member)
    {
        $validated = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],

            'last_name' => [
                'required',
                'string',
                'max:255',
            ],

            'birth_date' => [
                'required',
                'date',
            ],

            'NBvV_number' => [
                'nullable',
                'string',
                'max:255',
            ],

            'member_type_id' => [
                'required',
                'exists:member_types,id',
            ],

            'is_active' => [
                'required',
                'boolean',
            ],

            // Address
            'street' => [
                'required',
                'string',
                'max:255',
            ],

            'house_number' => [
                'required',
                'string',
                'max:20',
            ],

            'postal_code' => [
                'required',
                'string',
                'max:20',
            ],

            'city' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        DB::transaction(function () use ($validated, $member) {

            $member->update([
                'member_type_id' => $validated['member_type_id'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'birth_date' => $validated['birth_date'],
                'NBvV_number' => $validated['NBvV_number'] ?? null,
                'is_active' => $validated['is_active'],
            ]);

            $member->Addresses->update([
                'street' => $validated['street'],
                'house_number' => $validated['house_number'],
                'postal_code' => $validated['postal_code'],
                'city' => $validated['city'],
            ]);
        });

        return redirect()
            ->route('members.show', $member)
            ->with('success', 'Lid is succesvol bijgewerkt.');
    }

    /**
     * Soft-delete a member.
     */
    public function destroy(Members $member)
    {
        $member->delete();

        return redirect()
            ->route('members.index')
            ->with('success', 'Lid is succesvol verwijderd.');
    }
}
