
<?php $__env->startSection('contenido-principal'); ?>
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content" style="padding: 5px">
                <div class="col-12 user-image">
                    <img src="<?php echo e(asset('images\usuario.png')); ?>">
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
                <form action="" class="col-12" method="POST" action="">
                    <?php echo csrf_field(); ?>
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" name="nomUsuario" maxlength="50" value="<?php echo e(old('nomUsuario')); ?>">
                    </div>
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre" name="nombre" maxlength="50" value="<?php echo e(old('nombre')); ?>">
                    </div>
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Apellido" name="apellido" maxlength="50" value="<?php echo e(old('apellido')); ?>">
                    </div>
                    <div class="form-group" id="email-group">
                        <input type="email" class="form-control" placeholder="Correo electronico" name="email" value="<?php echo e(old('email')); ?>">
                    </div>
                    <div class="form-group" id="pass-group">
                        <input type="password" class="form-control" placeholder="Contraseña" name="password">
                    </div>
                    <div class="form-group" id="pass-group">
                        <input type="password" class="form-control" placeholder="Confirme Contraseña" name="cpassword">
                    </div>
                    <a href="<?php echo e(url()->previous()); ?>" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt"></i>  Registrarse</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Registro/registro.blade.php ENDPATH**/ ?>