<?php $__env->startSection('head_content'); ?>
  <?php echo $map['js']; ?>

<?php $__env->stopSection(); ?>

<?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
  <?php echo $map['html']; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /Users/masterp/Desktop/VIGILESWEB/resources/views/home.blade.php */ ?>