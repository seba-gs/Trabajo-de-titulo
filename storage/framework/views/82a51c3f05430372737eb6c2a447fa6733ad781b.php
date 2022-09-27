
<?php $__env->startSection('contenido-principal'); ?>
<div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
        <div class="modal-content" style="padding:5px">
            <div class="col-12 user-image">
                <img src="images\Imagen.png">
            </div>
            <form action="<?php echo e(route('crearFoto')); ?>" class="col-12" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="form-group" id="image-group">
                    <input type="file" class="form-control" placeholder="Fotografia" name="Fotografia" accept="image/*">
                </div>
                <div class="form-group" id="nombre-group">
                    <input type="text" class="form-control" placeholder="Nombre" name="Nombre" maxlength="15" value="<?php echo e(old('Nombre')); ?>">
                </div>
                <div class="form-group" id="descripcion-group">
                    <input type="text" class="form-control" placeholder="Descripcion" name="Descripcion" maxlength="200" value="<?php echo e(old('Descripcion')); ?>">
                </div>
                <div class="form-group" id="valor-group" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)">
                    <input type="text" class="form-control" placeholder="Valor" name="Valor" maxlength="10" value="<?php echo e(old('Valor')); ?>">
                </div>
                <div class="form-group">
                    <label for="especie" placeholder="Especie"></label>
                    <select class="form-control"  name='id_especie'>
                        <?php $__currentLoopData = $especies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $especies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($especies->id); ?>"><?php echo e($especies->nom_especie); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-12 forgot">
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
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Crear especie</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Catalogo/crearFotografia.blade.php ENDPATH**/ ?>