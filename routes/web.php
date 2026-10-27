<?php

use App\Http\Controllers\MembersController;
use App\Http\Controllers\MemberTypesController;
use App\Http\Controllers\BreedingNumberController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Home & Dashboard
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Members Management
    Route::resource('members', MembersController::class);
    
    // Member Types Management
    Route::resource('member_types', MemberTypesController::class);
    
    // Breeding Numbers Management
    Route::resource('breeding_numbers', BreedingNumberController::class);

    // Profile Management (Breeze default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (provided by Breeze)
    Route::resource('invoices', App\Http\Controllers\InvoiceController::class);

require __DIR__.'/auth.php';
