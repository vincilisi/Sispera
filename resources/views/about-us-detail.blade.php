<x-layout>
    <x-navbar />
    <header>
        <div class="container-fluid header">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-md-6 col-12">
                    <h3 class="titolo">{{ $user['name'] }} {{ $user['surname'] }}</h3>
                    <h6 class="text-center titolo">{{ $user['role'] }}</h6>
                </div>
            </div>
        </div>
    </header>
    
</x-layout>