<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;

// Homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// About us
Route::get('/about', [PublicController::class, 'aboutUs'])->name('aboutUs');
Route::get('/about/detail/{name}', [PublicController::class, 'aboutUsDetail'])->name('aboutUsDetail');

// Contatti
Route::get('/contact', [PublicController::class, 'contacts'])->name('contacts');
Route::post('/contact-us', [PublicController::class, 'contactUs'])->name('contactUs');

// Rotte pubbliche per i film (lista e dettaglio)
Route::get('/movies', [MovieController::class, 'movieList'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'movieDetail'])->name('movies.show');

// Rotte protette (solo utenti autenticati) per creare, modificare e cancellare film
Route::middleware('auth')->group(function () {
    Route::get('/movie/create', [MovieController::class, 'create'])->name('movies.create');
    Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');

    Route::get('/movies/edit/{movie}', [MovieController::class, 'edit'])->name('movies.edit');
    Route::put('/movies/{movie}', [MovieController::class, 'update'])->name('movies.update');
    Route::delete('/movies/{movie}', [MovieController::class, 'destroy'])->name('movies.destroy');
});

// PROFILO
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});



Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
