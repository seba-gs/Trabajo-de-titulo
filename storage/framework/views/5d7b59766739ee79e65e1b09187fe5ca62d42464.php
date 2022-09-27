
<?php $__env->startSection('contenido-principal'); ?>
    <div class="container-flex">
        <div class="column text-center compra" style="padding: 5px">
            <div class="col">
                <h3>Datos de transferencia</h3>
            </div>
            <div class="col">
                Nombre 
            </div>
            <div class="col">
                Rut
            </div>
            <div class="col">
                banco
            </div>
            <div class="col">
                Tipo de cuenta
            </div>
            <div class="col">
                Numero de cuenta
            </div>
            <div class="col">
                Email de cuenta
            </div>
            <form action="<?php echo e(Route('compra.store', ['foto' => $idfoto, 'valor' => $cantvalor, 'usuario' => $idusuario])); ?>" class="col-12" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group" id="">
                    <input type="text" placeholder="Numero de transaccion" name="transaccion" class="">
                </div>
                <div class="col-12 forgot">
                    <?php if(session()->has('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if($errors->any()): ?>
                    <div class="col-12 alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-dark" type="button"><i class="fa-solid fa-arrow-left"></i>  Volver</a>
                <button type="submit" class="btn btn-dark"><i class="fas fa-check-circle"></i> Confirmar Transaccion</button>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Catalogo/Compra.blade.php ENDPATH**/ ?>