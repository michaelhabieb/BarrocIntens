<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Haal alle producten op
        $products = Product::all();
        
        // Haal alle categorieën op
        $categories = Category::all();

        // Geef de producten en categorieën door aan de dashboard view
        return view('dashboard', compact('products', 'categories'));
    }
}
