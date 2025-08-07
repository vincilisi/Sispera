<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function __construct()
    {
        // Protegge tutte le rotte tranne la lista pubblica dei film
        $this->middleware('auth')->except('movieList', 'movieDetail');
    }

    // Lista tutti i film
    public function movieList()
    {
        $movies = Movie::all();
        return view('movie.movies', ['movies' => $movies]);
    }

    // Mostra i dettagli di un film
    public function movieDetail(Movie $movie)
    {
        return view('movie.movie-detail', ['movie' => $movie]);
    }

    // Mostra il form per creare un nuovo film
    public function create()
    {
        return view('movie.create');
    }

    // Salva un nuovo film nel database
    public function store(MovieRequest $request)
    {
        $movie = Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
            'img' => $request->file('img')->store('images', 'public'),
        ]);

        return redirect()->route('movies.index')->with('successMessage', "Il tuo film è stato caricato correttamente");
    }

    // Mostra il form per modificare un film esistente
    public function edit(Movie $movie)
    {
        return view('movie.edit', compact('movie'));
    }

    // Aggiorna il film nel database
    public function update(Request $request, Movie $movie)
    {
        $movie->update([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
        ]);

        // Se viene caricata una nuova immagine, aggiorna anche quella
        if ($request->hasFile('img')) {
            if ($movie->img) {
                Storage::disk('public')->delete($movie->img);
            }
            $movie->img = $request->file('img')->store('images', 'public');
            $movie->save();
        }

        return redirect()->route('movies.show', $movie)->with('successMessage', 'Film aggiornato con successo');
    }

    // Elimina un film dal database e cancella l'immagine associata
    public function destroy(Movie $movie)
    {
        if ($movie->img) {
            Storage::disk('public')->delete($movie->img);
        }

        $movie->delete();

        return redirect()->route('movies.index')->with('successMessage', 'Film eliminato correttamente');
    }
}
