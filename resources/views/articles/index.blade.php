<x-app>

    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
    @endif

    <h1 class="my-5">{{$title}}</h1>

    <div class="row">
        @foreach ($articles as $article)
        <div class="col-3  mb-4">
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
                                @foreach($article->tags as $tag)
                                    <span><a class="link-underline link-underline-opacity-0" href="{{route('articles.byTag', $tag)}}">{{$tag->name}}</a></span>
                                @endforeach
                                <p class="card-text">{{$article->description ?? 'Corpo non presente'}}</p>
                                <a href="{{route('articles.show', $article)}}" class="btn btn-outline-success mb-2">Mostra</a>
                                <form method="POST" action="{{route('articles.destroy', $article)}}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-outline-danger" onclick="alert('Sei sicuro di voler eliminare l`articolo?')">Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app>