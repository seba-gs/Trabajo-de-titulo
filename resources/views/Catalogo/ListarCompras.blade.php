@extends('welcome')
@section('contenido-principal')
<div class="row">
    <div class="col">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre usuario</th>
                    <th>Nombre/Apellido</th>
                    <th>Nombre fotografia</th>
                    <th>Id compra</th>
                    <th>N° de transaccion</th>
                    <th>Cancelar</th>
                </tr>
            </thead>
            @foreach ($compras as $num=>$compra)
                <tr>
                    <td>{{$num+1}}</td>
                    @foreach ($usuarios as $usuario)
                        @if ($compra -> id_usuario == $usuario -> id)
                            <td>{{$usuario -> nombre_usuario}}</td>
                            <td>{{$usuario -> Nombre}} {{$usuario -> Apellido}}</td>
                        @endif
                    @endforeach
                    <td>{{$fotografia -> nombre}}</td>
                    <td>{{$compra -> id}}</td>
                    <td>{{$compra -> transaccion}}</td>
                    {{--  cancelar la transaccion  --}}
                    <td class="text-center" style="width:1rem">
                        <button type="submit" class="btn btn-ms btn-danger" title="Cancelar compra" form="delete_{{$fotografia -> id, $compra ->id}}">
                            <i class="fa-solid fa-ban" aria-hidden="true"></i>
                        </button>
                        <form action="{{route('cancelar.compra', ['foto' => $fotografia -> id, 'compra' => $compra -> id])}}" id="delete_{{$fotografia -> id, $compra ->id}}" method="POST" enctype="multipart/form-data" hidden>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection