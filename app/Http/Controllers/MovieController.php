<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{

    public function __construct()
    {
        // Protegge tutte le rotte tranne la lista pubblica dei film
        $this->middleware('auth')->except('movieList');
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
        $movie->load('tags'); // forza il caricamento della relazione tags
        return view('movie.movie-detail', ['movie' => $movie]);
    }

    // Mostra il form per creare un nuovo film
    public function create()
    {
        $allTags = Tag::all();
        return view('movie.create', compact('allTags'));
    }

    // Salva un nuovo film nel database
    public function store(MovieRequest $request)
    {
        // Creo il film (salvo immagine subito)
        $movie = Movie::create([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
            'img' => $request->file('img')->store('images', 'public'),
            'user_id' => Auth::id(),
        ]);

        // Gestisco i tag dal form
        $tagIds = $this->processTags($request->input('tags', []));

        $movie->tags()->sync($tagIds);

        return redirect()->route('movies.index')->with('successMessage', "Il tuo film è stato caricato correttamente");
    }

    // Aggiorna un film esistente
    public function update(MovieRequest $request, Movie $movie)
    {
        if ($movie->user_id !== Auth::id()) {
            return redirect()->route('homepage')->with('errorMessage', 'Non hai i permessi di modificare questo film');
        }

        // Aggiorno i dati base
        $movie->update([
            'title' => $request->title,
            'director' => $request->director,
            'year' => $request->year,
            'plot' => $request->plot,
        ]);

        // Se c'è una nuova immagine, la salvo e cancello la vecchia
        if ($request->hasFile('img')) {
            if ($movie->img) {
                Storage::disk('public')->delete($movie->img);
            }
            $movie->img = $request->file('img')->store('images', 'public');
            $movie->save();
        }

        // Gestisco i tag dal form
        $tagIds = $this->processTags($request->input('tags', []));

        $movie->tags()->sync($tagIds);

        return redirect()->route('movies.show', $movie)->with('successMessage', 'Film aggiornato con successo');
    }

    // Elimina un film
    public function destroy(Movie $movie)
    {
        // Controllo autorizzazione
        if ($movie->user_id !== Auth::id()) {
            return redirect()->route('movies.index')->with('errorMessage', 'Non hai i permessi per eliminare questo film');
        }

        // Cancello immagine
        if ($movie->img) {
            Storage::disk('public')->delete($movie->img);
        }

        // Elimino il film
        $movie->delete();

        return redirect()->route('movies.index')->with('successMessage', 'Film eliminato con successo');
    }

    // Mostra form di modifica
    public function edit(Movie $movie)
    {
        $allTags = Tag::all();  // Prendi tutti i tag dal DB
        return view('movie.edit', compact('movie', 'allTags'));
    }

    /**
     * Funzione privata per processare i tag ricevuti dal form,
     * gestendo il caso in cui i tag siano inviati come array di oggetti
     * (es. da Tagify) o come array di stringhe.
     *
     * @param mixed $tagsInput
     * @return array di ID tag
     */
    private function processTags($tagsInput): array
    {
        // Se è stringa JSON (es. quando arriva da update), decodifico
        if (is_string($tagsInput)) {
            $tagsInput = json_decode($tagsInput, true) ?: [];
        }

        $tagNames = [];

        foreach ($tagsInput as $tag) {
            if (is_array($tag) && isset($tag['value'])) {
                // Caso Tagify: oggetto con chiave value
                $tagName = ltrim($tag['value'], '#');
                $tagNames[] = $tagName;
            } elseif (is_string($tag)) {
                // Caso semplice stringa
                $tagNames[] = ltrim($tag, '#');
            }
        }

        // Creo o recupero i tag e raccolgo gli ID
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            if ($tagName === '') continue; // ignora tag vuoti
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        return $tagIds;
    }
}
