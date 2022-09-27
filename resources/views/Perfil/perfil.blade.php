@extends('welcome')
@section('contenido-principal')
<div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-image">
                    <img src="images\usuario.png">
                    <div class="col-12 forgot">
                        <h5>Usuario: {{Auth::user()->nombre_usuario}}</h5>
                    </div>
                    <div class="col-12 forgot">
                        <h5>Nombre: {{Auth::user()->Nombre}} {{Auth::user()->Apellido}}</h5>
                    </div>
                    <div class="col-12 forgot">
                        <h5>Email: {{Auth::user()->Email}}</h5>
                    </div>
                    <div class="col" style="padding: 5px">
                        <a href="{{route('logout')}}" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true"><i class="fas fa-sign-in-alt"></i>  Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection