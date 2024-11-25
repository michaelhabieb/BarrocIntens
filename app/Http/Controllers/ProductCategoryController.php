<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('product_categories.index', compact('productCategories'));
    }

    public function create()
    {
        return view('product_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        ProductCategory::create($data);
        return redirect()->route('product_categories.index');
    }

    public function show(ProductCategory $productCategory)
    {
        return view('product_categories.show', compact('productCategory'));
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('product_categories.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'category_id' => 'required|exists:categories,id',
        ]);

        $productCategory->update($data);
        return redirect()->route('product_categories.index');
    }

    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return redirect()->route('product_categories.index');
    }
}

