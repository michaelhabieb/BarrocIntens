@extends('layouts.app')

@section('title', 'Bewerk Product')

@section('content')
<div class="bg-yellow-50 min-h-screen py-8 px-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Bewerk Product</h2>

        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Product Naam -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Naam</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Product Beschrijving -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Beschrijving</label>
                <textarea id="description" name="description" class="block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Product Prijs -->
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-semibold">Prijs</label>
                <input type="text" id="price" name="price" value="{{ old('price', $product->price) }}" class="block w-full border-gray-300 rounded-md shadow-sm" required>
            </div>

            <!-- Product Categorie -->
            <div class="mb-4">
                <label for="category_id" class="block text-gray-700 font-semibold">Categorie</label>
                <select id="category_id" name="category_id" class="block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Product Afbeelding (optioneel) -->
            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-semibold">Afbeelding</label>
                <input type="file" id="image" name="image" class="block w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-500 text-white font-semibold py-2 px-6 rounded-lg hover:bg-yellow-600">
                    Product bijwerken
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
