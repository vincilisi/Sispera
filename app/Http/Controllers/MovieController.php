<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function movieList()
    {
        $movies = Movie::all();
        return view('movie.movies', ['movies' => $movies]);
    }

    // public function movieDetail($id)
    // {

    //     foreach ($this->movies as $movie) {
    //         if ($id == $movie['id']) {
    //             return view('movie.movie-detail', ['movie' => $movie]);
    //         }
    //     }
    // }

    public function create()
    {
        return view('movie.create');
    }

    public function store(Request $request)
    {
        $movie = Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
        ]);

        return redirect()->route('homepage')->with('successMessage', "Il tuo film è stato caricato correttamente");
    }
}
