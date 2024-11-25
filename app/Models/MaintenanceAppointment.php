<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceAppointment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'date', 'company_id'];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

