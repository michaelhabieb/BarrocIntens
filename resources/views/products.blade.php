@extends('layouts.app')

@section('title', 'Producten')

@section('content')
    <div class="bg-yellow-50 min-h-screen">
        <div class="text-center py-12">
            <h1 class="text-4xl font-bold text-yellow-700">Onze Producten</h1>
            <p class="mt-4 text-gray-700 text-lg">
                Hier is een lijst van al onze producten. Klik op een product om meer details te zien.
            </p>
        </div>

        <!-- Producten Lijst -->
        <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <!-- Product afbeelding (indien aanwezig) -->
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500">
                            <span>Geen afbeelding</span>
                        </div>
                    @endif

                    <!-- Product Informatie -->
                    <div class="p-6">
                        <!-- Product Naam -->
                        <h2 class="text-lg font-bold text-gray-800 truncate">{{ $product->name }}</h2>

                        <!-- Product Prijs -->
                        <p class="text-yellow-600 font-semibold text-xl mt-4">€{{ number_format($product->price, 2, ',', '.') }}</p>

                        <!-- Product Beschrijving -->
                        <p class="mt-2 text-sm text-gray-600">
                            {{ Str::limit($product->description, 100) }}
                        </p>

                        <!-- Product Detail link -->
                        <div class="mt-6 text-center">
                            <a href="{{ route('products.show', $product->id) }}" class="text-yellow-600 hover:text-yellow-700 font-semibold">
                                Bekijk details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
