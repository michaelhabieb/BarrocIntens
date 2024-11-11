<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route voor de standaard welkomstpagina
Route::get('/', function () {
    return view('welcome');
});

// Route voor de dashboardpagina
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route voor de nieuwe indexpagina (landingspagina na login)
Route::get('/index', function () {
    return view('index'); // Zorg ervoor dat je resources/views/index.blade.php hebt gemaakt
})->middleware(['auth'])->name('index');

Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth'])->name('contact');


// Groep voor profielbeheer (alleen toegankelijk na inloggen)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (zoals geleverd door Breeze)
require __DIR__.'/auth.php';
