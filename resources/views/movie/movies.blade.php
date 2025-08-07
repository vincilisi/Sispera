<x-layout>
    <header>
        <div class="container-fluid movies">
            <div class="row h-100 justify-content-center align-items-center text-center">
                <div class="row">
                    <h2 class="titolo">Tutti i nostri Film</h2>
                </div>
                @foreach ($movies as $movie)
                <div class="col-12 col-md-3">
                   <x-card
                   :movie="$movie"
                   />
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </x-layout>