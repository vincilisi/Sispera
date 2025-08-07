<x-layout>
    <div class="container py-5">
        @auth
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center">
                        <h2>Profilo Utente</h2>
                    </div>
                    <div class="card-body">
                        <div class="text-center mb-4">
                            @if (Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-circle" width="120" height="120" alt="Avatar">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}" class="rounded-circle" width="120" height="120" alt="Avatar">
                            @endif
                        </div>
                        
                        <ul class="list-group mb-4">
                            <li class="list-group-item"><strong>Nome:</strong> {{ Auth::user()->name }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>
                            {{-- Aggiungi altri campi se servono --}}
                        </ul>
                        
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}">
                            </div>
                            
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar (immagine)</label>
                                <input type="file" id="avatar" name="avatar" class="form-control">
                            </div>
                            
                            <button type="submit" class="btn btn-success">Aggiorna Profilo</button>
                        </form>
                        
                        <hr class="my-5">
                        
                        <h3>I tuoi film caricati</h3>
                        
                        @if ($movies->isEmpty())
                        <p>Non hai ancora caricato nessun film.</p>
                        @else
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            @foreach ($movies as $movie)
                            <div class="col">
                                <div class="card h-100 shadow-sm">
                                    <img src="{{ Storage::url($movie->img) }}" class="card-img-top" alt="Locandina di {{ $movie->title }}" style="max-height: 300px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $movie->title }}</h5>
                                        <p class="card-text"><strong>Regista:</strong> {{ $movie->director }}</p>
                                        <p class="card-text"><strong>Anno:</strong> {{ $movie->year }}</p>
                                        <p class="card-text">{{ Str::limit($movie->plot, 100) }}</p>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <a href="{{ route('movies.show', $movie) }}" class="btn btn-outline-primary btn-sm">Vedi</a>
                                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-outline-secondary btn-sm">Modifica</a>
                                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" onsubmit="return confirm('Confermi eliminazione?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-warning text-center">
            Devi effettuare il login per visualizzare il profilo.
        </div>
        @endauth
    </div>
</x-layout>
