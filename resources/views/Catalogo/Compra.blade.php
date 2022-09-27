@extends('welcome')
@section('contenido-principal')
    <div class="container-flex">
        <div class="column text-center compra" style="padding: 5px">
            <div class="col">
                <h3>Datos de transferencia</h3>
            </div>
            <div class="col">
                Nombre 
            </div>
            <div class="col">
                Rut
            </div>
            <div class="col">
                banco
            </div>
            <div class="col">
                Tipo de cuenta
            </div>
            <div class="col">
                Numero de cuenta
            </div>
            <div class="col">
                Email de cuenta
            </div>
            <form action="{{Route('compra.store', ['foto' => $idfoto, 'valor' => $cantvalor, 'usuario' => $idusuario])}}" class="col-12" method="POST">
                @csrf
                <div class="form-group" id="">
                    <input type="text" placeholder="Numero de transaccion" name="transaccion" class="">
                </div>
                <div class="col-12 forgot">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="col-12 alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-check-circle"></i> Confirmar Transaccion</button>
            </form>
        </div>
    </div>
@endsection