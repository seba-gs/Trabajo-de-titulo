<?php $__env->startSection('contenido-principal'); ?>
<div class="container">
    <div class="column" style="padding: 5px">
      <div class="row" align = "center">
        <?php if(Auth::user()->rol_id == 1): ?>
        <a href="<?php echo e(route('crearVideo')); ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fa-solid fa-circle-plus"></i> Crear video</a>
        <?php endif; ?>
      </div>
    </div>
</div>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">N°</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$videos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tbody>
          <tr>
          <td><?php echo e($num + 1); ?></td>
          <td><?php echo e($videos->nombre); ?></td>
          <td><?php echo e($videos->descripcion); ?></td>
          <td>
            <a href="<?php echo e($videos->link); ?>" class="btn btn-primary" role="button" aria-pressed="true"><i class="fas fa-link"></i></a>
            <?php if(Auth::user()->rol_id == 1): ?>
              <a class="btn btn-ms btn-warning" href="<?php echo e(route('editVideo', $videos ->id)); ?>" type="button"><i class="far fa-edit"></i></a>
              <button type="submit" class="btn btn-danger" form="delete_<?php echo e($videos -> id); ?>" onclick="return" confirm('¿Seguro quiere eliminar?')>
                <i class="fa fa-trash" aria-hidden="true"></i>
              </button>
              <form action="<?php echo e(route('borrarVideo', $videos -> id)); ?>" id="delete_<?php echo e($videos -> id); ?>" method="POST" enctype="multipart/form-data" hidden>
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
              </form>
            <?php endif; ?>
          </td>
          </tr>
      </tbody>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Catalogo/videos.blade.php ENDPATH**/ ?>