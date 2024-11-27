<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
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
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

// Route voor de nieuwe indexpagina (landingspagina na login)
Route::get('/index', function () {
    return view('index');
})->middleware(['auth'])->name('index');

// Route voor de contactpagina
Route::get('/contact', function () {
    return view('contact');
})->middleware(['auth'])->name('contact');

// Routes voor het beheren van producten (auth vereist)
Route::middleware('auth')->group(function () {
    // Route voor het weergeven van de productlijst
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // Route om een nieuw product aan te maken
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    
    // Route voor het opslaan van een nieuw product
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    
    // Route voor het bewerken van een product
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    
    // Route voor het bijwerken van een product
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    
    // Route voor het verwijderen van een product
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Route voor het bekijken van productdetails
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
});

// Groep voor profielbeheer (alleen toegankelijk na inloggen)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (zoals geleverd door Breeze)
require __DIR__.'/auth.php';
