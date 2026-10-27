<?php

use App\Http\Controllers\MembersController;
use App\Http\Controllers\MemberTypesController;
use App\Http\Controllers\BreedingNumberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Home & Dashboard
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

// Public Registration (for Members)
Route::get('members/create', [MembersController::class, 'create'])->name('members.create');
Route::post('members/store', [MembersController::class, 'store'])->name('members.store');

// Public Cancellation
Route::get('members/cancel', [MembersController::class, 'cancelForm'])->name('members.cancel_form');
Route::post('members/cancel', [MembersController::class, 'cancel'])->name('members.cancel');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Members Management (except registration)
    Route::resource('members', MembersController::class)->except(['create', 'store']);
    Route::patch('members/{member}/approve', [MembersController::class, 'approve'])->name('members.approve');
    
    // Member Types Management
    Route::resource('member_types', MemberTypesController::class);
    
    // Breeding Numbers Management
    Route::resource('breeding_numbers', BreedingNumberController::class);
    
    // Invoices Management
    Route::resource('invoices', InvoiceController::class);
    
    // Profile Management (Breeze default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (provided by Breeze)
require __DIR__.'/auth.php';
