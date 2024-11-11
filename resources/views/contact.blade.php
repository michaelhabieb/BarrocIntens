@extends('layouts.app')

@section('title', 'Contact Pagina')

@section('content')
    <!-- Contact formulier -->
    <div class="bg-white flex items-center justify-center py-14 px-4 sm:px-6 lg:px-8"> <!-- Padding verwijderd van min-h-screen -->
        <div class="max-w-md w-full space-y-8">
            <!-- Titel -->
            <div>
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Neem contact met ons op
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Vul hieronder je gegevens in om contact met ons op te nemen.
                </p>
            </div>

            <!-- Formulier -->
            <form method="POST" action="#" class="bg-white shadow-lg rounded-lg p-8 border border-yellow-500">
                @csrf

                <!-- Naam -->
                <div>
                    <x-input-label for="name" :value="__('Naam')" />
                    <x-text-input id="name" class="block mt-1 w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500"
                                  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- E-mail -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('E-mail')" />
                    <x-text-input id="email" class="block mt-1 w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500"
                                  type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Bericht -->
                <div class="mt-4">
                    <x-input-label for="message" :value="__('Bericht')" />
                    <textarea id="message" class="block mt-1 w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500" name="message" required></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>

                <!-- Verzendknop -->
                <div class="flex items-center justify-between mt-6">
                    <x-primary-button class="ml-3 bg-yellow-500 hover:bg-yellow-600 focus:ring-yellow-400">
                        {{ __('Verzenden') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
