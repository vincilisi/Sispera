<x-layout>
    <div class="container py-5">
        <h2>Crea un nuovo Tag</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('tags.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome del Tag</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
</x-layout>
