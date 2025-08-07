<x-layout>
    <x-navbar />
    <header>
        <div class="container-fluid movies">
            <div class="row h-100 justify-content-center align-items-center text-center">
                <div class="row">
                    <h2 class="titolo">Tutti i nostri Film</h2>
                </div>
                @foreach ($movies as $movie)
                <div class="col-12 col-md-3">
                    <div class="card mb-3" style="width: 18rem;">
                        <img src="{{ $movie['img'] }}" class="card-img-top cardImg" alt="poster di '{{ $movie['title'] }}'">
                        <div class="card-body">
                            <h5 class="card-title">{{$movie['title']}}</h5>
                            <h5 class="card-title muted">{{$movie['director']}}</h5>
                            <p class="card-text">{{$movie['geners']}}</p>
                            <a href="{{ route('movie.detail', ['id'=>$movie['id']])}}" class="btn btn-primary">Leggi di più</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-layout>