<x-layout>
    <header>
        <div class="container-fluid movies">
            <div class="row h-100 d-flex flex-culomn justify-content-center align-items-center">
                <div class="row">
                    <h2 class="titolo text-center">Dettagli del film:{{$movie['title']}}</h2>
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h3 class="titolo text-center">Titolo:{{$movie['title']}}</h3>
                <h4>Regista:{{$movie['director']}}</h4>
                <p>Plot:{{$movie['plot']}}</p>
            </div>
            <div class="col-12 col-md-6">
                <img src="{{ Storage::url($movie->img) }}" alt="Poster di {{ $movie->title }}">

            </div>
            </div>
            
        </div>
    </header>
    
</x-layout>