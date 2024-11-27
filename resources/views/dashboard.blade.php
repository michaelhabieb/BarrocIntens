@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-yellow-50 min-h-screen">
        <!-- Dashboard Header -->
        <div class="text-center py-12">
            <h1 class="text-5xl font-bold text-yellow-700">Dashboard</h1>
            <p class="mt-4 text-gray-700 text-lg">
                Beheer je producten en categorieën hier.
            </p>
        </div>

        <!-- Inkoop Sectie -->
        <div class="max-w-4xl mx-auto text-center mt-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Inkoop</h2>
            <p class="text-gray-600 text-md">
                Beheer hier je producten en categorieën.
            </p>
        </div>

        <!-- Producten Tabel en Knop voor Aanmaken -->
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6 mt-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Producten</h2>

            <!-- Knop voor Product Aanmaken -->
            <div class="text-right mb-4">
                <a href="{{ route('products.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md">
                    Nieuw Product Aanmaken
                </a>
            </div>

            <!-- Producten Tabel -->
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 border-b">Productnaam</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 border-b">Prijs</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-800 border-b">Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800 border-b">{{ $product->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800 border-b">€{{ number_format($product->price, 2, ',', '.') }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800 border-b">
                                <!-- Edit and Delete Actions -->
                                <a href="{{ route('products.edit', $product->id) }}" class="text-yellow-600 hover:text-yellow-700">Bewerken</a> |
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
