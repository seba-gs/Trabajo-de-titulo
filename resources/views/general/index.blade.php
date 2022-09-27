@extends('welcome')
@section('contenido-principal')
    <div class="container-flex div-contenedor">
        <div class="row row-titulo text-center">
            <div class="column">
                <img class="logo" src="images/logo.png">
            </div>
            <div class="column">
                <h1 class="titulo"> 
                    Animalitos V Region
                </h1>
            </div>
        </div>
        <div class="column div-parrafo text-center">
            <h5 class="subtitulo">Bienvenidos a nuestra pagina web</h5>
            <p class="parrafo">
                En esta pagina podras encontrar las distintas
                fotografias en venta de nuestro amplio catalogo de especies,
                las cuales podras adquirir para distintos usos.
            </p>
            <p class="parrafo">
                Pueden seguirnos en nuestras redes sociales o unirse a nuestro 
                grupo de whatsapp en donde podran interactuar entre uds y ademas podremos resolver
                problemas y/o dudas que puedan tener, tambien mencionar que por este grupo organizamos
                salidas de fotografias y mas. <br> <br>
                <a href="https://www.instagram.com/animalitos.vregion/" class="btn btn-secondary parrafo" role="button" aria-pressed="true"><i class="fab fa-instagram icono-ig"></i></a>
                <a href="https://chat.whatsapp.com/Izy01zTEtEgJZ0UAWWHXAr" class="btn btn-secondary parrafo" role="button" aria-pressed="true"><i class="fab fa-whatsapp icono-wsp"></i></i></a>   
            </p>
            
        </div>
    </div>
@endsection