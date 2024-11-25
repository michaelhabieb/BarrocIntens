<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'paid_status', 'total_amount', 'company_id', 'lease_id'];

    // Relationships
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'invoice_products')
                    ->withPivot('quantity', 'price_per_product');
    }
}
