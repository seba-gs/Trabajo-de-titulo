
<?php $__env->startSection('contenido-principal'); ?>
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content">
            <div class="col-12 user-image">
                <img src="<?php echo e(asset('images\Patrocinador.png')); ?>">
            </div>
            <form action="" class="col-12" method="POST" action="">
                <?php echo csrf_field(); ?>
                <h3>Editar Patrocinador</h3>
                <div class="form-group" id="nombre-group">
                    <input type="text" class="form-control" placeholder="Nombre del patrocinador" name="Nombre" value="<?php echo e($patro -> nombre); ?>" maxlength="20">
                </div>
                <div class="form-group" id="descripcion-group">
                    <input type="text" class="form-control" placeholder="Descripcion" name="Descripcion" value="<?php echo e($patro -> descripcion); ?>" maxlength="200">
                </div>
                <div class="form-group" id="rrss-group">
                    <input type="text" class="form-control" placeholder="Facebook" name="Facebook" value="<?php echo e($patro -> facebook); ?>">
                </div>
                <div class="form-group" id="rrss-group">
                    <input type="text" class="form-control" placeholder="Instagram" name="Instagram" value="<?php echo e($patro -> instagram); ?>">
                </div>
                <div class="form-group" id="email-group">
                    <input type="text" class="form-control" placeholder="Email" name="Email" value="<?php echo e($patro -> email); ?>">
                </div>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="far fa-save"></i>  Guardar</button>
            </form>
            <div class="col-12 forgot" style="padding: 3px">
                <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                <?php endif; ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Patrocinadores/editarPatrcinador.blade.php ENDPATH**/ ?>