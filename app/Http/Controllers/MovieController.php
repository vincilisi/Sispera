<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('movieList');
    }

    public function movieList()
    {
        $movies = Movie::all();
        return view('movie.movies', ['movies' => $movies]);
    }

    public function movieDetail($id)
    {

        $movie = Movie::find($id);
        if ($movie) {
            return view('movie.movie-detail', ['movie' => $movie]);
        }
        abort(404);
    }

    public function create()
    {
        return view('movie.create');
    }

    public function store(MovieRequest $request)
    {
        $movie = Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
            'img' => $request->file('img')->store('images', 'public')
        ]);

        return redirect()->route('homepage')->with('successMessage', "Il tuo film è stato caricato correttamente");
    }
}
