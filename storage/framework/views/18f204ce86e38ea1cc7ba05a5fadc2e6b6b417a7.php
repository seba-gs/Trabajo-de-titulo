<?php $__env->startSection('contenido-principal'); ?>
    <div class="row">
        <div class="col d-flex">
            <?php $__currentLoopData = $fotografias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fotografias): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card m-2 p-3 " style="width: 15rem ">
                    <img class="card-img-top" src="<?php echo e(Storage::url($fotografias->imagen)); ?>" alt="">
                    <div class="card-body">
                        <div class="card-title">
                            <h3><?php echo e($fotografias->nombre); ?></h3>
                            <br>
                            <p class="card-text">
                                <?php echo e($fotografias->descripcion); ?>

                            </p>
                            <div class="row">
                                <div class="col">
                                    $<?php echo e($fotografias->valor); ?>

                                </div>
                                <div class="card-title">
                                    <?php if(Auth::user()->rol_id == 1): ?>
                                    <a href="<?php echo e(route('listar.compras', $fotografias -> id)); ?>" class="btn btn-primary" role="button" aria-pressed="true"><i class="fas fa-shopping-cart" title="Comprar"></i> </a>
                                    <?php else: ?>   
                                        <a href="<?php echo e(route('compra', ['foto' => $fotografias ->id, 'valor' => $fotografias -> valor, 'usuario' => Auth::user()->rol_id])); ?>" class="btn btn-primary" role="button" aria-pressed="true"><i class="fas fa-shopping-cart" title="Comprar"></i> </a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(route('comentarios', $fotografias -> id)); ?>" class="btn btn-success" role="button" aria-pressed="true" title="Comentar"><i class="fas fa-comment"></i> </a>
                                </div>
                                <div class="card-title">
                                    <?php if(Auth::user()->rol_id == 1): ?>
                                        <a class="btn btn-ms btn-warning" href="<?php echo e(route('editFotografia', $fotografias ->id)); ?>" type="button" title="Editar"><i class="far fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger" form="delete_<?php echo e($fotografias -> id); ?>" title="Eliminar">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                        <form action="<?php echo e(route('borrarFoto', ['foto' => $fotografias -> id, 'epecie' => $id])); ?>" id="delete_<?php echo e($fotografias -> id); ?>" method="POST" enctype="multipart/form-data" hidden>
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Catalogo/fotografia.blade.php ENDPATH**/ ?>