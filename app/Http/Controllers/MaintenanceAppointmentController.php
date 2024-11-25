<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceAppointment;
use Illuminate\Http\Request;

class MaintenanceAppointmentController extends Controller
{
    public function index()
    {
        $appointments = MaintenanceAppointment::all();
        return view('maintenance_appointments.index', compact('appointments'));
    }

    public function create()
    {
        return view('maintenance_appointments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'appointment_date' => 'required|date',
            'description' => 'nullable|string',
            'lease_id' => 'required|exists:leases,id',
        ]);

        MaintenanceAppointment::create($data);
        return redirect()->route('maintenance_appointments.index');
    }

    public function show(MaintenanceAppointment $appointment)
    {
        return view('maintenance_appointments.show', compact('appointment'));
    }

    public function edit(MaintenanceAppointment $appointment)
    {
        return view('maintenance_appointments.edit', compact('appointment'));
    }

    public function update(Request $request, MaintenanceAppointment $appointment)
    {
        $data = $request->validate([
            'appointment_date' => 'required|date',
            'description' => 'nullable|string',
            'lease_id' => 'required|exists:leases,id',
        ]);

        $appointment->update($data);
        return redirect()->route('maintenance_appointments.index');
    }

    public function destroy(MaintenanceAppointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('maintenance_appointments.index');
    }
}

