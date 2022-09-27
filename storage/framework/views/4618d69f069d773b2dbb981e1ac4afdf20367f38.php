
<?php $__env->startSection('contenido-principal'); ?>
<div class="container">
    <div class="row" align = "center">
        <?php if(Auth::user()->rol_id == 1): ?>
        <a href="<?php echo e(route('crearNoticia')); ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-circle-plus"></i> Crear Noticia</a>
        <?php endif; ?>
    </div>
</div>
<br>
<div class="container-fluid"></div>
  <div class="row">
    <div class="card-body d-flex flex-column">
      <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$noticias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div  class="container">
        <div class="column div-noticia">
          <div class="row div-contenido">
            <h3><?php echo e($noticias -> titulo); ?></h3>
          </div>
          <div class="row div-contenido">
            <h6><?php echo e($noticias -> descripcion); ?></h6>
          </div>
          <div class="container">
            <div class="row div-contenido-fecha">
              <h8>Fecha de creacion: <?php echo e($noticias -> fecha); ?></h8>
            </div>
            <?php if(Auth::user()->rol_id == 1): ?>
              <div class="row div-botones" id="div-botones">
                <div class="col" id="div-botones" style="padding: 5px">
                  <button title="Eliminar" type="submit" class="btn btn-danger" form="delete_<?php echo e($noticias -> id); ?>" onclick="return" confirm('¿Seguro quiere eliminar?')>
                    <i class="fa fa-trash" aria-hidden="true"></i>
                  </button>
                  <form action="<?php echo e(route('borrarNoticia', $noticias -> id)); ?>" id="delete_<?php echo e($noticias -> id); ?>" method="POST" enctype="multipart/form-data" hidden>
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                  </form>
                  <a class="btn btn-ms btn-warning" title="Editar" href="<?php echo e(route('editarNoticia', $noticias -> id)); ?>" type="button"><i class="far fa-edit"></i></a>
                </div>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <br>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Noticias/noticia.blade.php ENDPATH**/ ?>