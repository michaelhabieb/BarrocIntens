<?php

namespace App\Http\Controllers;
use App\Models\Company;
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
        $companies = Company::all(); // Fetch all companies from the database
        return view('leases.create', compact('companies')); // Pass them to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
            'start_date' => 'required|date', // Validatie voor startdatum
            'end_date' => 'required|date|after_or_equal:start_date', // Validatie voor einddatum
        ]);

        Lease::create([
            'title' => $request->title,
            'description' => $request->description,
            'company_id' => $request->company_id,
            'start_date' => $request->start_date, // Validatie voor startdatum
            'end_date' => $request->end_date, // Validatie voor einddatum
            'bkr_check' => $request->bkr_check ? true : false,
        ]); // Slaat alle gevalideerde data op

        return redirect()->route('leases.index');
    }
    
    public function show(Lease $lease)
    {
        return view('leases.show', compact('lease'));
    }

    public function edit($id)
{
    // Fetch the lease to be edited
    $lease = Lease::findOrFail($id);
    // Fetch all companies for the dropdown
    $companies = Company::all();

    // Pass data to the view
    return view('leases.edit', compact('lease', 'companies'));
}


    public function update(Request $request, Lease $lease)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'company_id' => 'required|exists:companies,id',
            'start_date' => 'required|date', // Validatie voor startdatum
            'end_date' => 'required|date|after_or_equal:start_date', // Validatie voor einddatum
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

