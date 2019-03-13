<?php /* /Users/masterp/Desktop/VIGILESWEB/resources/views/layouts/app.blade.php */ ?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Vigiles Web</title>
</head>
<body>
  <?php $__env->startSection('navbar'); ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-vigiles">
    <a class="navbar-brand ml-auto" href="#"><img id="navLogo" src="<?php echo e(asset('/img/White0.5x.png')); ?>" alt="Vigiles White Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Notifiche</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Segnalazione</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cerca</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php echo $__env->yieldSection(); ?>

  <div class="container">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
  <!-- Richiamo css/bootstrap -->
  <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</body>
</html>
