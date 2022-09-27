@extends('welcome')
@section('contenido-principal')
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-image">
                    <img src="images\usuario.png">
                </div>
                <form class="col-12" method="POST" action="{{route('login')}}">
                    @csrf
                    <div class="form-group" id="user-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                    </div>
                    <div class="form-group" id="pass-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Iniciar sesion</button>
                </form>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif 
                <br>
            </div>
        </div>
    </div>
@endsection