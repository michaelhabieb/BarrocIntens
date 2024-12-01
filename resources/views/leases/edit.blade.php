@extends('layouts.app')

@section('title', 'Leasecontract Bewerken')

@section('content')
<div class="min-h-screen py-12 px-6 lg:px-8" style="background-color: #FFFBEA;">
    <div class="text-center mb-6">
        <h1 class="text-4xl font-extrabold text-gray-900">Leasecontract Bewerken</h1>
        <p class="mt-2 text-gray-700">Wijzig de gegevens van het leasecontract.</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 max-w-3xl mx-auto">
        <form action="{{ route('leases.update', $lease->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Titel</label>
                <input type="text" id="title" name="title" value="{{ $lease->title }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Beschrijving</label>
                <textarea id="description" name="description" rows="4" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500">{{ $lease->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="start_date" class="block text-gray-700 font-semibold mb-2">Startdatum</label>
                <input 
                    type="date" 
                    id="start_date" 
                    name="start_date" 
                    value="{{ $lease->start_date }}" 
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" 
                    required>
            </div>
            
            <div class="mb-4">
                <label for="end_date" class="block text-gray-700 font-semibold mb-2">Einddatum</label>
                <input 
                    type="date" 
                    id="end_date" 
                    name="end_date" 
                    value="{{ $lease->end_date }}" 
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" 
                    required>
            </div>
            
            <div class="mb-4">
                <label for="company_id" class="block text-gray-700 font-semibold mb-2">Bedrijf</label>
                <select id="company_id" name="company_id" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-yellow-500 focus:border-yellow-500" required>
                    <option value="" disabled {{ is_null($lease->company_id) ? 'selected' : '' }}>Kies een bedrijf</option>
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $lease->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label for="bkr_check" class="block text-gray-700 font-semibold mb-2">BKR Check</label>
                <!-- Verborgen input om '0' door te geven als de checkbox niet is aangevinkt -->
                <input type="hidden" name="bkr_check" value="0">
            
                <!-- Checkbox -->
                <input 
                    type="checkbox" 
                    id="bkr_check" 
                    name="bkr_check" 
                    value="1" 
                    {{ $lease->bkr_check ? 'checked' : '' }} 
                    class="focus:ring-yellow-500 focus:border-yellow-500">
            </div>
            

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-yellow-600 focus:ring-2 focus:ring-yellow-400 focus:ring-offset-1">
                    Bijwerken
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
