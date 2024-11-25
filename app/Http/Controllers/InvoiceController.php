<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'paid_status' => 'required|boolean',
            'total_amount' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'lease_id' => 'required|exists:leases,id',
        ]);

        Invoice::create($data);
        return redirect()->route('invoices.index');
    }

    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        return view('invoices.edit', compact('invoice'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $data = $request->validate([
            'date' => 'required|date',
            'paid_status' => 'required|boolean',
            'total_amount' => 'required|numeric',
            'company_id' => 'required|exists:companies,id',
            'lease_id' => 'required|exists:leases,id',
        ]);

        $invoice->update($data);
        return redirect()->route('invoices.index');
    }

    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoices.index');
    }
}

