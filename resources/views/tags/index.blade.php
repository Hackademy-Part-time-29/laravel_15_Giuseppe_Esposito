<x-app>

<h1>Lista dei tag</h1>

@if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

<table class="table">
  <thead class="table-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrizione</th>
      <th scope="col">N. di articoli</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($tags as $tag)
        <tr>
            <th scope="row">{{$tag->id}}</th>
            <td>{{$tag->name}}</td>
            <td>{{Str::limit($tag->description, 25)}}</td>
            <td>{{$tag->articles->count()}}</td>
            <td>
                <a href="{{route('tags.show', $tag)}}" class="btn btn-outline-success">Mostra</a>
                <a href="{{route('tags.edit', $tag)}}" class="btn btn-outline-primary">Modifica</a>
                <form method="POST" action="{{route('tags.destroy', $tag)}}">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-outline-danger" onclick="alert('Sei sicuro di voler eliminare il tag?')">Elimina</button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>

</x-app>