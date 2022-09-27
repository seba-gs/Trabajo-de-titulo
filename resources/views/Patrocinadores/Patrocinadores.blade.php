@extends('welcome')
@section('contenido-principal')
<div class="container">
    <div class="row" align = "center">
        @if(Auth::user()->rol_id == 1)
        <a href="{{route('crearPatrocinador')}}" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-circle-plus"></i> Crear Patrcinador</a>
        @endif
    </div>
</div>
<br>
<div class="container-fluid"></div>
  <div class="row">
    <div class="card-body d-flex flex-column">
      @foreach ($patrocinadores as $num=>$patrocinadores)
      <div  class="container">
        <div class="column div-noticia">
          <div class="row div-contenido">
            <h3>{{$patrocinadores -> nombre}}</h3>
          </div>
          <div class="row div-contenido">
            <h6>{{$patrocinadores -> descripcion}}</h6>
          </div>
          <div class="row div-contenido">
            <h6><a href="{{$patrocinadores -> facebook}}">Facebook</a></h6>
          </div>
          <div class="row div-contenido">
            <h6><a href="{{$patrocinadores -> instagram}}">Instagram</a></h6>
          </div>
          <div class="row div-contenido">
            <h6>{{$patrocinadores -> email}}</h6>
          </div>
          @if(Auth::user()->rol_id == 1)
            <div class="row div-botones" id="div-botones">
              <div class="col" id="div-botones" style="padding: 5px">
                <button title="Eliminar" type="submit" class="btn btn-danger" form="delete_{{$patrocinadores -> id}}" onclick="return" confirm('¿Seguro quiere eliminar?')>
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
                <form action="{{route('borrarPatrocinador', $patrocinadores -> id)}}" id="delete_{{$patrocinadores -> id}}" method="POST" enctype="multipart/form-data" hidden>
                  @csrf
                  @method('DELETE')
                </form>
                <a class="btn btn-ms btn-warning" title="Editar" href="{{route('editarPatrocinador', $patrocinadores -> id)}}" type="button"><i class="far fa-edit"></i></a>
              </div>
            </div>
          @endif
        </div>
      </div>
      <br>
      @endforeach
    </div>
  </div>
</div>
@endsection