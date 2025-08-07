<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Indirizzo email:</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Conferma Password:</label>
                        <input name="password_confirmation" type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>