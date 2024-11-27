<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'image', 'category_id'];

    // Relatie met de facturen (veel-op-veel)
    public function invoices()
    {
        return $this->belongsToMany(Invoice::class, 'invoice_products')
                    ->withPivot('quantity', 'price_per_product');
    }

    // Relatie met de categorie (één-op-veel)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Scope voor het filteren van producten op basis van prijs of naam
    public function scopeFilter($query, array $filters)
    {
        // Filter op naam
        if ($filters['name'] ?? false) {
            $query->where('name', 'like', '%' . $filters['name'] . '%');
        }

        // Filter op categorie
        if ($filters['category_id'] ?? false) {
            $query->where('category_id', $filters['category_id']);
        }

        // Filter op prijs (kleiner dan, groter dan)
        if ($filters['price_min'] ?? false) {
            $query->where('price', '>=', $filters['price_min']);
        }
        if ($filters['price_max'] ?? false) {
            $query->where('price', '<=', $filters['price_max']);
        }
    }
}
