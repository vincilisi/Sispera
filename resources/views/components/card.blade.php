@props(['movie'])

<div class="card mb-3" style="width: 18rem;">
    @if (!$movie->img)
        <img src="https://picsum.photos/200/300" class="card-img-top cardImg" alt="poster di {{ $movie->title }}">
    @else
        <img src="{{ Storage::url($movie->img) }}" class="card-img-top cardImg" alt="poster di {{ $movie->title }}">
    @endif

    <div class="card-body">
        <h5 class="card-title">{{ $movie->title }}</h5>
        <h5 class="card-title muted">{{ $movie->director }}</h5>
        <p class="card-text">{{ $movie->geners }}</p>
        <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary">Leggi di più</a>
        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-primary">Modifica</a>
    </div>
</div>
