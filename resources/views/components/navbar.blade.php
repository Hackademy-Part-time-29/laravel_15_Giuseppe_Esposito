<nav class="navbar navbar-expand-lg primary-bg text-white">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="{{route('home')}}">{{env('APP_NAME')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('articles.create')}}">Crea articolo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('articles.index')}}">Articoli</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('tags.create')}}">Crea un tag</a>
        </li>
      </ul>
    </div>
  </div>
</nav>