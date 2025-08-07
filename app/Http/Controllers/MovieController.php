<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    public $movies = [
        ['id' => 1, 'title' => 'The Conjuring', 'director' => 'James Wan', 'img' => '/media/The_Conjuring_poster.jpg', 'geners' => 'Horror'],
        ['id' => 2, 'title' => "L'amore non va in vacanza", 'director' => 'Nancy Meyers', 'img' => "/media/L'amore_non_va_in_vacanza.jpg", 'geners' => 'Romantico'],
        ['id' => 3, 'title' => "Raya e l'ultimo drago", 'director' => 'D.Hall,C.L.Estrada', 'img' => 'media/RayaMovie.png', 'geners' => 'Animazione'],
        ['id' => 4, 'title' => 'Inception', 'director' => 'Christopher Nolan', 'img' => '/media/Inception.jpg', 'geners' => 'Thriller'],
        ['id' => 5, 'title' => 'In vacanza su Marte', 'director' => 'Neri Parenti', 'img' => 'media/In_vacanza_su_Marte.png', 'geners' => 'Comico'],
    ];

    public function movieList()
    {

        return view('movie.movies', ['movies' => $this->movies]);
    }

    public function movieDetail($id)
    {

        foreach ($this->movies as $movie) {
            if ($id == $movie['id']) {
                return view('movie.movie-detail', ['movie' => $movie]);
            }
        }
    }
}
