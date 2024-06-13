<x-app>
    <br>
    <h1>Crea un nuovo articolo</h1>
    <div class="row">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="col-12">
            <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                    name="name"
                    value="{{old('name')}}"
                    placeholder="Inserisci il titolo">
                @error('name')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 100px" name="description">{{old('description')}}</textarea>
                    <label for="floatingTextarea2">Contenuto</label>
                @error('description')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="mb-3">
                    <label for="tag_id" class="form-label">Tags</label>
                    <div class="btn-group" role="group" name='tag_id' required>
                        @foreach ($tags as $tag)
                            <input type="checkbox" class="btn-check" id="tag{{$tag->id}}" autocomplete="off"  name="tags[]" value="{{$tag->id}}">
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
                    <label for="formFile mb-3" class="form-label">Carica un'immagine di copertina</label>
                    <input class="form-control" type="file" id="formFile" name="cover">
                @error('cover')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Crea</button>
            </form>
        </div>
    </div>
</x-app>