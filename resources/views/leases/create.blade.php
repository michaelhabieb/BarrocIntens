@extends('layouts.app')

@section('title', 'Nieuw Leasecontract')

@section('content')
<div class="min-h-screen py-12 px-6 lg:px-8" style="background-color: #FFFBEA;">
    <div class="text-center mb-6">
        <h1 class="text-4xl font-extrabold text-gray-900">Nieuw Leasecontract</h1>
        <p class="mt-2 text-gray-700">Vul onderstaande gegevens in om een nieuw leasecontract aan te maken.</p>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <form action="{{ route('leases.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Titel</label>
                <input type="text" id="title" name="title" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Beschrijving</label>
                <textarea id="description" name="description" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500"></textarea>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-semibold mb-2">Startdatum</label>
                <input 
                    type="date" 
                    id="start_date" 
                    name="start_date" 
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" 
                    required>
            </div>
            
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 font-semibold mb-2">Einddatum</label>
                <input 
                    type="date" 
                    id="end_date" 
                    name="end_date" 
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" 
                    required>
            </div>
            

            <select id="company_id" name="company_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" required>
                <option value="" disabled selected>Kies een bedrijf</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
            
            
            <div class="mb-6">
                <label for="bkr_check" class="block text-gray-700 font-semibold mb-2">BKR Check</label>
                <input type="checkbox" id="bkr_check" name="bkr_check" class="focus:ring-yellow-500 focus:border-yellow-500">
            </div>
            
            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1">
                    Aanmaken
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
