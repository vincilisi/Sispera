<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('homepage') }}"><i class="bi bi-camera-reels-fill"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('aboutUs') }}">Chi Siamo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contacts') }}">Contatti</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            I nostri servizi
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('movies.index') }}">Tutti i nostri film</a></li>
            <li><a class="dropdown-item" href="{{ route('movies.create') }}">Carica i tuoi Film</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            @auth
              Ciao, {{ Auth::user()->name }}
            @else
              Ciao, Ospite
            @endauth
          </a>
          <ul class="dropdown-menu">
            @guest
              <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
              <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
            @endguest
            @auth
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form-logout').submit();" class="dropdown-item">Logout</a>
                <form id="form-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            @endauth
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>