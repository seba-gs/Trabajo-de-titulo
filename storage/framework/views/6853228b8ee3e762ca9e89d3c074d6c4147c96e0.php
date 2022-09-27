<?php $__env->startSection('contenido-principal'); ?>
<div class="row">
    <div class="col">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de usuario</th>
                    <th>Rol</th>
                    <th>Activo</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $num=>$usuarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($num+1); ?></td>
                    <td><?php echo e($usuarios->Nombre); ?></td>
                    <td><?php echo e($usuarios->Apellido); ?></td>
                    <td><?php echo e($usuarios->nombre_usuario); ?></td>
                    <td><?php echo e($usuarios->rol_id); ?></td>
                    <td><?php echo e($usuarios -> activo?'Si':'No'); ?></td>
                    
                    <td class="text-center" style="width:1rem">
                        <a type="submit" class="btn btn-ms btn-warning" data-toggle="tooltip"
                            data-placement="top" title="Modificar usuario" href="<?php echo e(route('editar.usuarios', $usuarios->id)); ?>">
                            <i class="fas fa-user-edit"></i>
                        </a>
                    </td>
                    
                    <td class="text-center" style="width:1rem">
                        <?php if(Auth::user()->id != $usuarios -> id): ?>
                            <form action="<?php echo e(route('activar', $usuarios->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                
                                <button type="submit" class="btn btn-ms btn-<?php echo e($usuarios -> activo?'danger':'success'); ?>" data-toggle="tooltip"
                                data-placement="top" title="<?php echo e($usuarios -> activo?'Desactivar':'Activar'); ?> usuario">
                                <i class="fas fa-user-<?php echo e($usuarios -> activo?'alt-slash':'check'); ?>"></i>
                                </button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <div class="col" style="text-align: right">
            <a href="<?php echo e(route('nuevo.usuarios')); ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true"><i class="fas fa-user-plus"></i>  Crear Usuario</a>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/general/Usuarios.blade.php ENDPATH**/ ?>