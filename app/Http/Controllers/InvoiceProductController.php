<?php

namespace App\Http\Controllers;

use App\Models\InvoiceProduct;
use Illuminate\Http\Request;

class InvoiceProductController extends Controller
{
    public function index()
    {
        $invoiceProducts = InvoiceProduct::all();
        return view('invoice_products.index', compact('invoiceProducts'));
    }

    public function create()
    {
        return view('invoice_products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        InvoiceProduct::create($data);
        return redirect()->route('invoice_products.index');
    }

    public function show(InvoiceProduct $invoiceProduct)
    {
        return view('invoice_products.show', compact('invoiceProduct'));
    }

    public function edit(InvoiceProduct $invoiceProduct)
    {
        return view('invoice_products.edit', compact('invoiceProduct'));
    }

    public function update(Request $request, InvoiceProduct $invoiceProduct)
    {
        $data = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $invoiceProduct->update($data);
        return redirect()->route('invoice_products.index');
    }

    public function destroy(InvoiceProduct $invoiceProduct)
    {
        $invoiceProduct->delete();
        return redirect()->route('invoice_products.index');
    }
}

