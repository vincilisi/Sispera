<x-layout>
    <div class="container-fluid">
        <div class="row text-center">
            <h2>Modifica il tuo Film:</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('movies.update', $movie) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{ old('title', $movie->title) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="director" class="form-label">Regista:</label>
                        <input name="director" type="text" class="form-control" id="director" value="{{ old('director', $movie->director) }}">
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Anno di uscita:</label>
                        <input name="year" type="date" class="form-control" id="year" value="{{ old('year', $movie->year) }}">
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Aggiorna locandina:</label>
                        <input name="img" type="file" class="form-control" id="img">
                    </div>

                    <div class="mb-3">
                        <label for="plot" class="form-label">Trama</label>
                        <textarea name="plot" id="plot" cols="30" rows="10" class="form-control">{{ old('plot', $movie->plot) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Aggiorna Film</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
