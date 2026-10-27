<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Member;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('member')->latest()->paginate(20);
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $members = Member::where('is_active', true)->orderBy('last_name')->get();
        return view('invoices.create', compact('members'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        Invoice::create($validated);

        return redirect()->route('invoices.index')->with('success', 'Factuur succesvol aangemaakt.');
    }

    public function show(Invoice $invoice)
    {
        $invoice->load('member');
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        $members = Member::where('is_active', true)->orderBy('last_name')->get();
        return view('invoices.edit', compact('invoice', 'members'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $validated = $request->validate([
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric',
            'description' => 'required|string|max:255',
        ]);

        $invoice->update($validated);

        return redirect()->route('invoices.show', $invoice)->with('success', 'Factuur bijgewerkt.');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Factuur verwijderd.');
    }
}
