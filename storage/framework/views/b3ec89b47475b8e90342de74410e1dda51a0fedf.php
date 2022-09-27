<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Animalitos V Region</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script src="https://kit.fontawesome.com/5986ad155e.js" crossorigin="anonymous"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
        crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js" integrity="sha512-SuxO9djzjML6b9w9/I07IWnLnQhgyYVSpHZx0JV97kGBfTIsUYlWflyuW4ypnvhBrslz1yJ3R+S14fdCWmSmSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/inicio.css')); ?>">
    
    <title>Animalitos V Region</title>
     
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo e(route('inicio')); ?>">Inicio</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="" id="btn-catalogo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catalogo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="btn-catalogo">
                        <a class="dropdown-item" href="<?php echo e(route('catalogo')); ?>">Fotografias</a>
                        <a class="dropdown-item" href="<?php echo e(route('video')); ?>">Videos</a>
                    </div>
                </li>
                <li class="nav-item active" href="">
                    <a class="nav-link" href="<?php echo e(route('noticia')); ?>">Noticias</a>
                </li>
                <li class="nav-item active" href="">
                    <a class="nav-link" href="<?php echo e(route('patrocinadores')); ?>">Patrocinadores</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php if( Auth::check() ): ?>
                    <?php if(Auth::user()->rol_id == 1): ?>
                        <li class="nav-item active" href="">
                            <a class="nav-link" href="<?php echo e(route('usuarios')); ?>">Usuarios</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item active" href="">
                        <a class="nav-link" href="<?php echo e(route('perfil')); ?>">Perfil</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item active" href="">
                        <a class="nav-link" href="<?php echo e(route('index')); ?>">iniciar sesion</a>
                    </li>
                    <li class="nav-item active" href="">
                        <a class="nav-link" href="<?php echo e(route('registro')); ?>">registrarse</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav> 
    <div class="p-2 container-fluid">
        <?php echo $__env->yieldContent('contenido-principal'); ?>
    </div>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
    <script type='text/javascript'>
        
    </script> 
    
    
</body>
</html><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/welcome.blade.php ENDPATH**/ ?>