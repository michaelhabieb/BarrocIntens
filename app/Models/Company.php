<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'street', 'house_number', 'city'];

    // Relationships
    public function leases()
    {
        return $this->belongsToMany(Lease::class, 'lease_company');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function maintenanceAppointments()
    {
        return $this->hasMany(MaintenanceAppointment::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
