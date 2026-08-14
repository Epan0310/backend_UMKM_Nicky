<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\KatalogController;

// 1. Tambahkan ->name('home') di paling bawah route ini
Route::get('/', function () {
    $featuredProducts = Product::with('category')
        ->where('is_active', true)
        ->latest()
        ->take(6)
        ->get();

    return view('welcome', compact('featuredProducts'));
})->name('home');

// Route Halaman Katalog Lengkap
Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog');

// Route Halaman Tentang Kami
Route::get('/tentang-kami', function () {
    return view('tentang');
})->name('tentang');