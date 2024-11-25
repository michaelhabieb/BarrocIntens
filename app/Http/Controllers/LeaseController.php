<?php

namespace App\Http\Controllers;

use App\Models\Lease;
use Illuminate\Http\Request;

class LeaseController extends Controller
{
    public function index()
    {
        $leases = Lease::all();
        return view('leases.index', compact('leases'));
    }

    public function create()
    {
        return view('leases.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'invoice_period' => 'required|string',
            'bkr_check' => 'required|boolean',
        ]);

        Lease::create($data);

        return redirect()->route('leases.index');
    }

    public function show(Lease $lease)
    {
        return view('leases.show', compact('lease'));
    }

    public function edit(Lease $lease)
    {
        return view('leases.edit', compact('lease'));
    }

    public function update(Request $request, Lease $lease)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'invoice_period' => 'required|string',
            'bkr_check' => 'required|boolean',
        ]);

        $lease->update($data);

        return redirect()->route('leases.index');
    }

    public function destroy(Lease $lease)
    {
        $lease->delete();

        return redirect()->route('leases.index');
    }
}

