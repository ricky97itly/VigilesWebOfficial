<?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('cornford.googlmapper.map', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo Mapper::render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/masterp/Desktop/VIGILESWEB/resources/views/home.blade.php ENDPATH**/ ?>