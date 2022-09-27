
<?php $__env->startSection('contenido-principal'); ?>
<?php if(Auth::user()->rol_id == 1): ?>
dd("funcionando");
<?php else: ?>
dd('aqui va la lista');
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\seba1\OneDrive\Escritorio\Trabajo de titulo\Animalitos V\Trabajo-de-titulo\resources\views/Fotos/catalogo.blade.php ENDPATH**/ ?>