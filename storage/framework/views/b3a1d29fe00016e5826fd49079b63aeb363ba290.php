
<?php $__env->startSection('contenido-principal'); ?>
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-image">
                <img src="<?php echo e(asset('images\Imagen.png')); ?>">
            </div>
            <form action="<?php echo e(route('fotografia.up', $id)); ?>" class="col-12" method="POST" action="" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group" id="nombre-group">
                    <input type="text" class="form-control" value="<?php echo e($fotografias -> nombre); ?>" name="Nombre" maxlength="15">
                </div>
                <div class="form-group" id="descripcion-group">
                    <input type="text" class="form-control" value="<?php echo e($fotografias -> descripcion); ?>" name="Descripcion" maxlength="200">
                </div>
                <div class="form-group" id="valor-group">
                    <input type="text" class="form-control" value="<?php echo e($fotografias -> valor); ?>" name="Valor" maxlength="10">
                </div>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Editar fotografia</button>
            </form>
            <div class="col-12 forgot">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Catalogo/editarFotografia.blade.php ENDPATH**/ ?>