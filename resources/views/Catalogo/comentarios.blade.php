@extends('welcome')
@section('contenido-principal')
@php
    $val = false;
@endphp
<div class="row">
    <div class="col d-flex">
        <form action="{{route('comentarios.store', $idfoto)}}" class="col-12 text-center" method="POST">
            @csrf
            <div class="card-title">
                <div class="row">
                    <div class="col">
                        <input type="text" placeholder="Comentario" name="comentario" style="height: 3cm">
                        <div class="form-group" style="padding: 3px">
                            <select class="" name="clasificacion">
                                <option selected>10</option>
                                <option>9</option>
                                <option>8</option>
                                <option>7</option>
                                <option>6</option>
                                <option>5</option>
                                <option>4</option>
                                <option>3</option>
                                <option>2</option>
                                <option>1</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-12 forgot">
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
                <button type="submit" class="btn btn-dark"><i class="fas fa-comment"></i>  Comentar</button>
            </div>
            @foreach ($comentarios->all() as $comentarios )
                <div class="column div-noticia">
                    <div class="row div-contenido" style="margin: 3px">
                        @if ($comentarios -> id_foto == $idfoto)
                            <div class="row div-contenido">
                                <div class="col align-content-start" style="width: 100%">
                                        <p>{{$comentarios-> comentario}}</p>
                                </div>
                            </div>
                            <div class="row div-contenido">
                                <div class="col text-left" style="width: 100%">
                                    <p>Calificacion: {{$comentarios-> clasificacion}}/10</p>
                                </div>
                            </div>
                            @php
                                $val = true; 
                            @endphp
                        @endif
                    </div>
                </div>
            @endforeach
            @if ($val == false)
                <div class="row div-noticia">
                    <div class="col div-contenido">
                        <p>No existen comentarios para esta fotografia</p>
                    </div>
                </div>
            @endif
        </form>
    </div>
</div>
@endsection