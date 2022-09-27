@extends('welcome')
@section('contenido-principal')
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-image">
                <img src="{{ asset('images/Especie.png') }}">
            </div>
            <form action="" class="col-12" method="POST" action="">
                @csrf
                <h3>Editar especie</h3>
                <div class="form-group" id="esp-group">
                    <input type="text" class="form-control" placeholder="" name="Especie" value="{{$especies->nom_especie}}">
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Editar especie</button>
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