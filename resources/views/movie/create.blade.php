<x-layout>
    <x-navbar />
    <div class="container-fluid">
        <div class="row text-center">
            <h2>Inserisci il tuo fil Preferito:</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{ route('movie.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="titleHelp">
                    </div>
                    <div class="mb-3">
                        <label for="director" class="form-label">Regista:</label>
                        <input name="director" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="directorHelp">
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Anno di uscita:</label>
                        <input name="year" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="yearlHelp">
                    </div>
                    <div class="mb-3">
                        <label for="plot" class="form-label">Trama</label>
                        <textarea name="plot" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Inserisci il tuo Film</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>