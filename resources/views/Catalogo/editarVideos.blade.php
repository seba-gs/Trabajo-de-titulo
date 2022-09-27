@extends('welcome')
@section('contenido-principal')
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-image">
                <img src="{{ asset('images\Imagen.png') }}">
            </div>
            <form action="" class="col-12" method="POST">
                @csrf
                <div class="form-group" id="nombre-group">
                    <input type="text" class="form-control" value="{{$videos -> nombre}}" name="Nombre" maxlength="20">
                </div>
                <div class="form-group" id="descripcion-group">
                    <input type="text" class="form-control" value="{{$videos -> descripcion}}" name="Descripcion" maxlength="200">
                </div>
                <div class="form-group" id="link-group">
                    <input type="text" class="form-control" value="{{$videos -> link}}" name="Link">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i> Editar video</button>
            </form>
            <div class="col-12 forgot">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
            </div>
        </div>
    </div>
</div>
@endsection