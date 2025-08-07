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


// invio email

Route::post('/contact-us', [PublicController::class, 'contactUs'])->name('contactUs');


// Insermento Film

Route::get('/movie/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/movie/submit', [MovieController::class, 'store'])->name('movie.submit');

// Add this route for movie-detail
Route::get('/movies/{movie}', [MovieController::class, 'movieDetail'])->name('movie-detail');
