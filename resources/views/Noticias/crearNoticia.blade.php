@extends('welcome')
@section('contenido-principal')
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content" style="padding: 3px">
            <div class="col-12 user-image">
                <img src="images\Noticia.png">
            </div>
            <form action="" class="col-12" method="POST" action="">
                @csrf
                <div class="form-group" id="noticia-group">
                    <input type="text" class="form-control" placeholder="titulo" name="titulo" maxlength="25" value="{{old('titulo')}}">
                </div>
                <div class="form-group div-descripcion">
                    <input type="text" class="form-control" placeholder="descripcion" name="descripcion" style="height: 3cm" maxlength="1000" value="{{old('descripcion')}}">
                </div>
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
                <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Crear</button>
            </form>
        </div>
    </div>
</div>
@endsection