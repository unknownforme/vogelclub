<?php

namespace App\Http\Controllers;

use App\Models\MemberType;
use Illuminate\Http\Request;

class MemberTypesController extends Controller
{
    public function index()
    {
        $memberTypes = MemberType::orderBy('name')->get();
        return view('member_types.index', compact('memberTypes'));
    }

    public function create()
    {
        return view('member_types.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'announced_price' => 'nullable|numeric',
        ]);

        MemberType::create($validated);

        return redirect()->route('member_types.index')->with('success', 'Lidsoort toegevoegd.');
    }

    public function show(MemberType $memberType)
    {
        return view('member_types.show', compact('memberType'));
    }

    public function edit(MemberType $memberType)
    {
        return view('member_types.edit', compact('memberType'));
    }

    public function update(Request $request, MemberType $memberType)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'announced_price' => 'nullable|numeric',
        ]);

        $memberType->update($validated);

        return redirect()->route('member_types.index')->with('success', 'Lidsoort bijgewerkt.');
    }

    public function destroy(MemberType $memberType)
    {
        $memberType->delete();
        return redirect()->route('member_types.index')->with('success', 'Lidsoort verwijderd.');
    }
}
