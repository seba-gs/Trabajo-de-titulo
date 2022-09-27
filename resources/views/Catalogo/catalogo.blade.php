@extends('welcome')
@section('contenido-principal')
    @if(Auth::user()->rol_id == 1)
        <div class="container">
            <div class="row">
              <div class="col">
                <div class="row" align = "center" style="padding: 3px">
                  <a href="{{route('crearEspecie')}}" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-circle-plus"></i> Crear especie</a>
                </div>
                <div class="row" style="padding: 3px">
                  <a href="{{route('crearFotografia')}}" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-circle-plus"></i> Crear fotografia</a>
                </div>
              </div>
              <div class="col">
                <div class="row" align = "center" style="padding: 3px">
                  <a href="{{route('index.graficos')}}" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-circle-plus"></i> Estadisticas</a>
                </div>
              </div>
            </div>
        </div>
    @endif
    <br>
    <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Especie</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        @foreach ($especies as $num=>$especies)
            <tbody>
                <tr>
                <td>{{$num + 1}}</td>
                <td>{{$especies->nom_especie}}</td>
                <td>
                  <a href="{{route('fotografia', $especies ->id)}}" class="btn btn-secondary" role="button" aria-pressed="true" title="Ir"><i class="fas fa-sign-in-alt"></i></a>
                  @if(Auth::user()->rol_id == 1)
                    <a class="btn btn-ms btn-warning" href="{{route('editEspecie', $especies ->id)}}" type="button"><i class="far fa-edit" title="Editar"></i></a>
                    <button type="submit" class="btn btn-danger" form="delete_{{$especies -> id}}" title="Eliminar">
                      <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <form action="{{route('borrarEspecie', $especies -> id)}}" id="delete_{{$especies -> id}}" method="POST" enctype="multipart/form-data" hidden>
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

