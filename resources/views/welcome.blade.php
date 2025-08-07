<x-layout>
    <x-navbar />
    <header>
        <div class="container-fluid header">
            @if (session()->has('emailSent'))
                <div class="alert alert-success">
                    {{ session ('emailSent') }}
                </div>
            @endif
               @if (session()->has('emailError'))
                <div class="alert alert-danger">
                    {{ session ('emailError') }}
                </div>
            @endif
            <div class="row h-100">
                <div class="col-12">
                    <h1 class="text-center my-5 titolo">Benvenuto su CineBlog</h1>
                    <p class="text-center">Il tuo blog di cinema preferito per recensioni, notizie e discussioni sui film più recenti.</p>
                    <p class="text-center">Scopri le ultime novità, leggi recensioni approfondite e partecipa alle discussioni con altri appassionati di cinema.</p>
                    <div class="text-center">
                </div>
            </div>
        </div>
    </header>
</x-layout>
