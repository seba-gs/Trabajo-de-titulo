<?php $__env->startSection('contenido-principal'); ?>
<div class="row">
    <div class="col">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre usuario</th>
                    <th>Nombre/Apellido</th>
                    <th>Nombre fotografia</th>
                    <th>Id compra</th>
                    <th>N° de transaccion</th>
                    <th>Cancelar</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $compras; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$compra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($num+1); ?></td>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($compra -> id_usuario == $usuario -> id): ?>
                            <td><?php echo e($usuario -> nombre_usuario); ?></td>
                            <td><?php echo e($usuario -> Nombre); ?> <?php echo e($usuario -> Apellido); ?></td>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <td><?php echo e($fotografia -> nombre); ?></td>
                    <td><?php echo e($compra -> id); ?></td>
                    <td><?php echo e($compra -> transaccion); ?></td>
                    
                    <td class="text-center" style="width:1rem">
                        <button type="submit" class="btn btn-ms btn-danger" title="Cancelar compra" form="delete_<?php echo e($fotografia -> id, $compra ->id); ?>">
                            <i class="fa-solid fa-ban" aria-hidden="true"></i>
                        </button>
                        <form action="<?php echo e(route('cancelar.compra', ['foto' => $fotografia -> id, 'compra' => $compra -> id])); ?>" id="delete_<?php echo e($fotografia -> id, $compra ->id); ?>" method="POST" enctype="multipart/form-data" hidden>
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Catalogo/ListarCompras.blade.php ENDPATH**/ ?>