<x-layout>
    <x-navbar />
    <div class="container-fluid">
        <div class="row text-center">
            <h2>Inserisci il tuo fil Preferito:</h2>
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
                <form method="POST" action="{{ route('movie.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" value="{{ old('title') }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="director" class="form-label">Regista:</label>
                        <input name="director" type="text" class="form-control" id="director" aria-describedby="directorHelp" value="{{ old('director') }}">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Anno di uscita:</label>
                        <input name="year" type="date" class="form-control" id="year" aria-describedby="yearlHelp"value="{{ old('year') }}">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Inserisci la locandina:</label>
                        <input name="img" type="file" class="form-control" id="img" aria-describedby="imgHelp">
                    </div>
                    <div class="mb-3">
                        <label for="plot" class="form-label">Trama</label>
                        <textarea name="plot" id="" cols="30" rows="10" class="form-control">{{ old('plot') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Inserisci il tuo Film</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>