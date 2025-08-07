<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// About us
Route::get('/about', [PublicController::class, 'aboutUs'])->name('aboutUs');

Route::get('/about/detail/{name}', [PublicController::class, 'aboutUsDetail'])->name('aboutUsDetail');

// Contatti
Route::get('/contact', [PublicController::class, 'contacts'])->name('contacts');

// Movies list
Route::get('/movies', [MovieController::class, 'movieList'])->name('movie-list');

// Movie detail
Route::get('/movies/detail/{id}', [MovieController::class, 'movieDetail'])->name('movie.detail');
