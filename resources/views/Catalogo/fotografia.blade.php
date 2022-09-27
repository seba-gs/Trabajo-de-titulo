@extends('welcome')
@section('contenido-principal')
    <div class="row">
        <div class="col d-flex">
            @foreach ($fotografias as $fotografias)
                <div class="card m-2 p-3 " style="width: 15rem ">
                    <img class="card-img-top" src="{{Storage::url($fotografias->imagen)}}" alt="">
                    <div class="card-body">
                        <div class="card-title">
                            <h3>{{$fotografias->nombre}}</h3>
                            <br>
                            <p class="card-text">
                                {{$fotografias->descripcion}}
                            </p>
                            <div class="row">
                                <div class="col">
                                    ${{$fotografias->valor}}
                                </div>
                                <div class="card-title">
                                    @if (Auth::user()->rol_id == 1)
                                    <a href="{{route('listar.compras', $fotografias -> id)}}" class="btn btn-primary" role="button" aria-pressed="true"><i class="fas fa-shopping-cart" title="Comprar"></i> </a>
                                    @else   
                                        <a href="{{route('compra', ['foto' => $fotografias ->id, 'valor' => $fotografias -> valor, 'usuario' => Auth::user()->rol_id])}}" class="btn btn-primary" role="button" aria-pressed="true"><i class="fas fa-shopping-cart" title="Comprar"></i> </a>
                                    @endif
                                    <a href="{{route('comentarios', $fotografias -> id)}}" class="btn btn-success" role="button" aria-pressed="true" title="Comentar"><i class="fas fa-comment"></i> </a>
                                </div>
                                <div class="card-title">
                                    @if(Auth::user()->rol_id == 1)
                                        <a class="btn btn-ms btn-warning" href="{{route('editFotografia', $fotografias ->id)}}" type="button" title="Editar"><i class="far fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger" form="delete_{{$fotografias -> id}}" title="Eliminar">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <form action="{{route('borrarFoto', ['foto' => $fotografias -> id, 'epecie' => $id])}}" id="delete_{{$fotografias -> id}}" method="POST" enctype="multipart/form-data" hidden>
                                        @csrf
                                        @method('DELETE')
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection