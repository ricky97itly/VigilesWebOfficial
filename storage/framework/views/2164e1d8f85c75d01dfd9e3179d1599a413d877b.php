<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

      <title>Vigiles Milano | La sicurezza a portata di clic</title>

      <!-- Scripts -->
      <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

      <!-- Styles -->
      <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
      
  </head>
  <body>
    <script src="js/sweetalert.min.js"></script>

    
    <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div id="app">

      
      <?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      
      <?php if($errors->any()): ?>
        <div class="container mt-4">
          <?php echo $__env->make('inc.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
      <?php endif; ?>

      
      <main id="content" class="<?php echo e(Request::is('/') ? '' : 'container py-4'); ?>">
        <?php echo $__env->yieldContent('content'); ?>
      </main>
    </div>

    
    <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>
<?php /**PATH /Users/masterp/Desktop/VIGILESWEB/resources/views/layouts/app.blade.php ENDPATH**/ ?>