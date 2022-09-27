@extends('welcome')
@section('contenido-principal')
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-image">
                    <img src="{{ asset('images\usuario.png') }}">
                </div>
                <form action="{{route('update.usuarios', $usuario->id)}}" class="col-12" method="POST" action="">
                    @csrf
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="nomUsuario" maxlength="50"
                        value="{{$usuario->nombre_usuario}}">
                    </div>
                    <div class="form-group" id="email-group">
                        <input type="email" class="form-control" placeholder="Correo electronico" name="email"
                        value="{{$usuario->Email}}">
                    </div>
                    <div class="form-group" id="pass-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password"
                        value="{{$usuario->password}}">
                    </div>
                    <div class="form-group" id="pass-group">
                        <input type="password" class="form-control" placeholder="Confirme Contraseña" name="cpassword"
                        value="{{$usuario->password}}">
                    </div>
                    @if (Auth::user()->rol_id == 1)
                        <div class="form-group">
                            <select name="rol_id" id="rol_id" class="form-control">
                                @foreach ($roles as $rol)
                                    <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <a href="{{ url()->previous() }}" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Editar</button>
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