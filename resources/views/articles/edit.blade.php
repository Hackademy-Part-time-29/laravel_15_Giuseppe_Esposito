<x-app>
    
    <h3 class="my-5">Modifica l'articolo</h3>
    <div class="row">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif

        <div class="col-12">
            <form method="POST" action="{{route('articles.update', $article)}}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                    name="name"
                    value="{{old('name', $article->name)}}"
                    placeholder="Inserisci il titolo">
                @error('name')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-floating">
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 100px" name="description">{{old('description', $article->description)}}</textarea>
                    <label for="floatingTextarea2">Contenuto</label>
                @error('description')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="my-3">
                    <label for="tag_id" class="form-label">Tags</label>
                    <div class="btn-group" role="group" name='tag_id' required>
                    @foreach ($tags as $tag)
                        <input type="checkbox" class="btn-check" id="tag{{$tag->id}}" autocomplete="off"  name="tags[]" value="{{old('tag_id', $tag->id)}}">
                        <label class="btn btn-outline-primary" for="tag{{$tag->id}}">{{$tag->name}}</label>
                    @endforeach
                </div>
                @error('tags')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                @error('tags.*')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                <div class="my-3">
                    <p>Immagine attuale</p>
                    <img src="{{Storage::url($article->cover)}}" alt="">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Carica un'immagine di copertina</label>
                    <input class="form-control" type="file" id="formFile" name="cover">
                @error('cover')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Modifica</button>
            </form>
        </div>
    </div>
</x-app>