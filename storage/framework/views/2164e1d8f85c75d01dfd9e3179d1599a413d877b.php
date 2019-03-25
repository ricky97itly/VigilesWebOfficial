<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vigiles Web</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container mt-4">
      <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </body>
</html>

<?php /* /Users/masterp/Desktop/VIGILESWEB/resources/views/layouts/app.blade.php */ ?>