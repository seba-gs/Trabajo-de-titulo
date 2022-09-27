@extends('welcome')
@section('contenido-principal')
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content" style="padding:5px">
            <div class="col-12 user-image">
                <img src="images\Imagen.png">
            </div>
            <form action="{{route('crearFoto')}}" class="col-12" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group" id="image-group">
                    <input type="file" class="form-control" placeholder="Fotografia" name="Fotografia" accept="image/*">
                </div>
                <div class="form-group" id="nombre-group">
                    <input type="text" class="form-control" placeholder="Nombre" name="Nombre" maxlength="15" value="{{old('Nombre')}}">
                </div>
                <div class="form-group" id="descripcion-group">
                    <input type="text" class="form-control" placeholder="Descripcion" name="Descripcion" maxlength="200" value="{{old('Descripcion')}}">
                </div>
                <div class="form-group" id="valor-group" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    <input type="text" class="form-control" placeholder="Valor" name="Valor" maxlength="10" value="{{old('Valor')}}">
                </div>
                <div class="form-group">
                    <label for="especie" placeholder="Especie"></label>
                    <select class="form-control"  name='id_especie'>
                        @foreach ($especies as $especies)
                            <option value="{{$especies->id}}">{{$especies->nom_especie}}</option>
                        @endforeach
                    </select>
                </div>
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
                <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Crear especie</button>
            </form>
        </div>
    </div>
</div>
@endsection