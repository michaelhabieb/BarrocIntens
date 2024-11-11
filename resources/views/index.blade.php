<!-- resources/views/index.blade.php -->
@extends('layouts.app')

@section('title', 'Index Pagina')

@section('content')
    <div class="text-center mt-10">
        <h1 class="text-4xl font-bold text-black">Welkom bij Barroc Intens!</h1>
        <p class="mt-4 text-gray-700"> Koffie zetten zoals het bedoeld is – met de beste bonen en de beste koffiezetapparaten.</p>
        
        @auth
            <p class="mt-6 text-green-500">Welkom <strong>{{ Auth::user()->name }}</strong>.</p>
        @else
            <p class="mt-6 text-red-500">Je bent niet ingelogd. <a href="{{ route('login') }}" class="text-blue-500 underline">Log in</a> om toegang te krijgen tot je dashboard.</p>
        @endauth
    </div>
@endsection
