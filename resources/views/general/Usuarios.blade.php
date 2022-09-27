@extends('welcome')
@section('contenido-principal')
<div class="row">
    <div class="col">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de usuario</th>
                    <th>Rol</th>
                    <th>Activo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            @foreach ($usuarios as $num=>$usuarios)
                <tr>
                    <td>{{$num+1}}</td>
                    <td>{{$usuarios->Nombre}}</td>
                    <td>{{$usuarios->Apellido}}</td>
                    <td>{{$usuarios->nombre_usuario}}</td>
                    <td>{{$usuarios->rol_id}}</td>
                    <td>{{$usuarios -> activo?'Si':'No'}}</td>
                    {{--  boton para modificar usuario  --}}
                    <td class="text-center" style="width:1rem">
                        <a type="submit" class="btn btn-ms btn-warning" data-toggle="tooltip"
                            data-placement="top" title="Modificar usuario" href="{{route('editar.usuarios', $usuarios->id)}}">
                            <i class="fas fa-user-edit"></i>
                        </a>
                    </td>
                    {{--  boton para activar/descactivar usuario  --}}
                    <td class="text-center" style="width:1rem">
                        @if (Auth::user()->id != $usuarios -> id)
                            <form action="{{route('activar', $usuarios->id)}}" method="POST">
                                @csrf
                                
                                <button type="submit" class="btn btn-ms btn-{{$usuarios -> activo?'danger':'success'}}" data-toggle="tooltip"
                                data-placement="top" title="{{$usuarios -> activo?'Desactivar':'Activar'}} usuario">
                                <i class="fas fa-user-{{$usuarios -> activo?'alt-slash':'check'}}"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="col" style="text-align: right">
            <a href="{{route('nuevo.usuarios')}}" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fas fa-user-plus"></i>  Crear Usuario</a>
        </div>
    </div>
</div>

@endsection