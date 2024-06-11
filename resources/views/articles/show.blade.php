<x-app>

    <h1 class="my-5">{{$title}}</h1>

    <div class="container">
        <div class="row">
                <div class="col-3">
                    <div class="card" style="width: 18rem;">
                        @if($article->cover)
                            <img src="{{Storage::url($article->cover)}}" class="card-img-top" alt="...">
                        @else
                            <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                        @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$article->name}}</h5>
                        <p class="card-text">{{$article->description ?? 'Corpo non presente'}}</p>
                        <a href="{{route('articles.edit', $article)}}" class="btn btn-outline-primary mb-2">Modifica</a>
                    </div>
                    </div>
                </div>
        </div>
      </div>
</x-app>