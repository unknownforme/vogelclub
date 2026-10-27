<?php

namespace App\Http\Controllers;

use App\Models\BreedingNumber;
use App\Models\Member;
use Illuminate\Http\Request;

class BreedingNumberController extends Controller
{
    public function index()
    {
        $breedingNumbers = BreedingNumber::with('member')->paginate(20);
        return view('breeding_numbers.index', compact('breedingNumbers'));
    }

    public function create()
    {
        $members = Member::where('is_active', true)->orderBy('last_name')->get();
        return view('breeding_numbers.create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'breeding_number' => 'required|string|max:255',
            'member_id' => 'required|exists:members,id',
        ]);

        BreedingNumber::create($validated);

        return redirect()->route('breeding_numbers.index')->with('success', 'Kweeknummer geregistreerd.');
    }

    public function show(BreedingNumber $breedingNumber)
    {
        $breedingNumber->load('member');
        return view('breeding_numbers.show', compact('breedingNumber'));
    }

    public function edit(BreedingNumber $breedingNumber)
    {
        $members = Member::where('is_active', true)->orderBy('last_name')->get();
        return view('breeding_numbers.edit', compact('breedingNumber', 'members'));
    }

    public function update(Request $request, BreedingNumber $breedingNumber)
    {
        $validated = $request->validate([
            'breeding_number' => 'required|string|max:255',
            'member_id' => 'required|exists:members,id',
        ]);

        $breedingNumber->update($validated);

        return redirect()->route('breeding_numbers.index')->with('success', 'Kweeknummer bijgewerkt.');
    }

    public function destroy(BreedingNumber $breedingNumber)
    {
        $breedingNumber->delete();
        return redirect()->route('breeding_numbers.index')->with('success', 'Kweeknummer verwijderd.');
    }
}
