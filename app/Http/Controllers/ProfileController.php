<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Mostra la pagina del profilo utente.
     */
    public function show()
    {
        $user = Auth::user();

        // Recupera i film caricati da questo utente
        $movies = $user->movies()->latest()->get();

        return view('profile', compact('user', 'movies'));
        return view('profile');
    }

    /**
     * Aggiorna i dati del profilo utente.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Validazione dei campi
        $request->validate([
            'name' => 'required|string|max:255',
            'avatar' => 'nullable|image|max:2048',
        ]);

        // Aggiornamento nome
        $user->name = $request->input('name');

        // Gestione caricamento avatar
        if ($request->hasFile('avatar')) {
            // Elimina l'avatar precedente se esiste
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            // Salva il nuovo avatar
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('profile.show')
            ->with('success', 'Profilo aggiornato con successo!');
    }
}
