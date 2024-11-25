<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'category_id'];

    // Relationships
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_products')
                    ->withPivot('quantity', 'price_per_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

