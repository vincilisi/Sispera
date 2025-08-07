 <div class="card mb-3" style="width: 18rem;">
    <img src="https://picsum.photos/200/300" class="card-img-top cardImg" alt="poster di '{{ $movie['title'] }}'">
    <div class="card-body">
        <h5 class="card-title">{{$movie['title']}}</h5>
        <h5 class="card-title muted">{{$movie['director']}}</h5>
        <p class="card-text">{{$movie['geners']}}</p>
        <a href="#" class="btn btn-primary">Leggi di più</a>
    </div>