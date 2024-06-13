<x-app>
    
    <h1 class="my-3">Modifica il tag</h1>

    <div class="row">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session('success')}}
        </div>
        @endif
        <div class="col-12">
            <form method="POST" action="{{route('tags.update')}}">
                @csrf
                {{ method_field('PUT') }}
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                    name="name"
                    value="{{old('name', $tag->name)}}"
                    placeholder="Inserisci il titolo">
                @error('name')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('description') is-invalid @enderror" style="height: 100px" name="description">{{old('description', $tag->description)}}</textarea>
                    <label for="floatingTextarea2">Contenuto</label>
                @error('description')
                    <span class="small text-danger">{{$message}}</span>
                @enderror
                </div>
                <button type="submit" class="btn btn-primary">Modifica</button>
            </form>
        </div>
    </div>

</x-app>