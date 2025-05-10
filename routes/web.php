<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminCardController;

Route::get('/admin/cards/create', [AdminCardController::class, 'create'])->name('admin.cards.create');
Route::post('/admin/cards', [AdminCardController::class, 'store'])->name('admin.cards.store');
Route::get('/admin/cards/{id}', [AdminCardController::class, 'show'])->name('admin.cards.show');
Route::get('/admin/cards', [AdminCardController::class, 'index'])->name('admin.cards.index');
Route::delete('/items/{id}', [AdminCardController::class, 'destroy'])->name('items.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/Shop', function () {
    return view('admin.cards.show');
});


Route::middleware(['auth'])->group(function () {
    // Admin dashboard route
    Route::get('/admin', function () {
        if (Auth::user()->email !== 'nourallam303@gmail.com') {
            abort(403, 'Unauthorized');
        }

        return view('admin.dashboard');
    })->name('admin.dashboard');

    // POST route to handle the form submission for creating cards
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::post('/admin/cards', [AdminCardController::class, 'store'])->name('admin.cards.store');
