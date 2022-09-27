@extends('welcome')
@section('contenido-principal')
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-image">
                <img src="{{ asset('images\Imagen.png') }}">
            </div>
            <form action="{{route('fotografia.up', $id)}}" class="col-12" method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group" id="nombre-group">
                    <input type="text" class="form-control" value="{{$fotografias -> nombre}}" name="Nombre" maxlength="15">
                </div>
                <div class="form-group" id="descripcion-group">
                    <input type="text" class="form-control" value="{{$fotografias -> descripcion}}" name="Descripcion" maxlength="200">
                </div>
                <div class="form-group" id="valor-group">
                    <input type="text" class="form-control" value="{{$fotografias -> valor}}" name="Valor" maxlength="10">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Editar fotografia</button>
            </form>
            <div class="col-12 forgot">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                
            </div>
        </div>
    </div>
</div>
@endsection