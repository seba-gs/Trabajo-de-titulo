@extends('welcome')
@section('contenido-principal')
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-image">
                <img src="{{ asset('images\Patrocinador.png') }}">
            </div>
            <form action="" class="col-12" method="POST" action="">
                @csrf
                <h3>Editar Patrocinador</h3>
                <div class="form-group" id="nombre-group">
                    <input type="text" class="form-control" placeholder="Nombre del patrocinador" name="Nombre" value="{{$patro -> nombre}}" maxlength="20">
                </div>
                <div class="form-group" id="descripcion-group">
                    <input type="text" class="form-control" placeholder="Descripcion" name="Descripcion" value="{{$patro -> descripcion}}" maxlength="200">
                </div>
                <div class="form-group" id="rrss-group">
                    <input type="text" class="form-control" placeholder="Facebook" name="Facebook" value="{{$patro -> facebook}}">
                </div>
                <div class="form-group" id="rrss-group">
                    <input type="text" class="form-control" placeholder="Instagram" name="Instagram" value="{{$patro -> instagram}}">
                </div>
                <div class="form-group" id="email-group">
                    <input type="text" class="form-control" placeholder="Email" name="Email" value="{{$patro -> email}}">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="far fa-save"></i>  Guardar</button>
            </form>
            <div class="col-12 forgot" style="padding: 3px">
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