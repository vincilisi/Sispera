<x-layout>
        <div class="container-fluid header">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-6">
                    <h1 class="text-center titolo">Chi Siamo</h1>
                    <p class="text-center">CineBlog è un blog dedicato agli amanti del cinema, dove puoi trovare recensioni, notizie e discussioni sui film più recenti.</p>
                    <p class="text-center">Il nostro obiettivo è creare una comunità di appassionati di cinema, dove tutti possono condividere le proprie opinioni e scoprire nuovi film da vedere.</p>
                </div>
                <div class="col-6">
                    <img src="{{ asset('media/team.jpg') }}" alt="About Us" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container userHeight py-5">
            <h2 class="text-center titolo mb-4">Il Nostro Team</h2>
            <div class="row justify-content-center align-items-stretch g-4">
                @foreach ($users as $user)
                <div class="col-12 col-md-4 d-flex justify-content-center text-center">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user['name'] }} {{ $user['surname'] }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $user['role'] }}</h6>
                            <a href="{{ route('aboutUsDetail',['name' => $user['name']]) }}" class="card-link">Leggi di più</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
