<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Haal alle producten op
        $products = Product::all();
        
        // Geef de producten door aan de dashboard view
        return view('dashboard', compact('products'));
    }
}
