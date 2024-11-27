@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="bg-yellow-50 min-h-screen py-12 px-4">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Product Afbeelding -->
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover"> <!-- Verander h-96 naar h-64 -->
            @else
                <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500"> <!-- Verander h-96 naar h-64 -->
                    <span>Geen afbeelding beschikbaar</span>
                </div>
            @endif

            <!-- Product Informatie -->
            <div class="p-6">
                <h1 class="text-3xl font-bold text-gray-800">{{ $product->name }}</h1>
                <p class="text-yellow-600 font-semibold text-xl mt-4">€{{ number_format($product->price, 2, ',', '.') }}</p>

                <p class="mt-6 text-gray-700">
                    {{ $product->description }}
                </p>

                @if ($product->category)
                    <p class="mt-4 text-sm text-gray-600">
                        Categorie: <span class="font-semibold">{{ $product->category->name }}</span>
                    </p>
                @endif

                <div class="mt-8">
                    <a href="{{ route('products.index') }}" class="text-yellow-600 hover:text-yellow-700 font-semibold">
                        ← Terug naar Productenlijst
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
