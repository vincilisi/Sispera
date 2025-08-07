<x-layout>
    <x-navbar />
    <header>
        <div class="container-fluid movies">
            {{-- Sezione Contatti Social --}}
            <div class="row justify-content-center align-items-center my-5">
                <div class="col-12">
                    <h2 class="text-center titolo">Contatti</h2>
                </div>

                <div class="col-3 text-center box d-flex flex-column justify-content-center align-items-center">
                    <i class="icon bi bi-whatsapp"></i>
                    <p>Scrivici su WhatsApp</p>
                </div>

                <div class="col-3 text-center box d-flex flex-column justify-content-center align-items-center">
                    <i class="icon bi bi-instagram"></i>
                    <p>Seguici su Instagram</p>
                </div>

                <div class="col-3 text-center box d-flex flex-column justify-content-center align-items-center">
                    <i class="icon bi bi-facebook"></i>
                    <p>Seguici su Facebook</p>
                </div>
            </div>

            {{-- Sezione Email --}}
            <div class="row justify-content-center align-items-center my-5">
                <div class="col-12">
                    <h2 class="text-center titolo">...Scrivici una mail</h2>
                </div>

                <div class="col-12 col-md-8">
                    <form method="POST" action="{{ route('contactUs') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="user" class="form-label">Inserisci il tuo nome:</label>
                            <input name="user" type="text" class="form-control" id="user">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Inserisci la tua mail:</label>
                            <input name="email" type="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Scrivi il tuo messaggio</label>
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
</x-layout>
