@extends('welcome')
@section('contenido-principal')
<div class="container">
    <div class="column" style="padding: 5px">
      <div class="row" align = "center">
        @if(Auth::user()->rol_id == 1)
        <a href="{{route('crearVideo')}}" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-circle-plus"></i> Crear video</a>
        @endif
      </div>
    </div>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">N°</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  @foreach ($videos as $num=>$videos)
      <tbody>
          <tr>
          <td>{{$num + 1}}</td>
          <td>{{$videos->nombre}}</td>
          <td>{{$videos->descripcion}}</td>
          <td>
            <a href="{{$videos->link}}" class="btn btn-primary" role="button" aria-pressed="true"><i class="fas fa-link"></i></a>
            @if(Auth::user()->rol_id == 1)
              <a class="btn btn-ms btn-warning" href="{{route('editVideo', $videos ->id)}}" type="button"><i class="far fa-edit"></i></a>
              <button type="submit" class="btn btn-danger" form="delete_{{$videos -> id}}" onclick="return" confirm('¿Seguro quiere eliminar?')>
                <i class="fa fa-trash" aria-hidden="true"></i>
              </button>
              <form action="{{route('borrarVideo', $videos -> id)}}" id="delete_{{$videos -> id}}" method="POST" enctype="multipart/form-data" hidden>
                @csrf
                @method('DELETE')
              </form>
            @endif
          </td>
          </tr>
      </tbody>
  @endforeach
</table>
@endsection