<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'invoice_period', 'bkr_check'];

    // Relationships
    public function companies()
    {
        return $this->belongsToMany(Company::class, 'lease_company');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
