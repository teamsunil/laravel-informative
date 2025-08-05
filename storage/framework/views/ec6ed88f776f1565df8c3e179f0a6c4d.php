<header class="navigation">
  <div class="header-top">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="col-lg-2 col-md-4">
          <div class="header-top-socials text-center text-lg-left text-md-left">
            <a href="#"><i class="ti-facebook"></i></a>
            <a href="#"><i class="ti-twitter"></i></a>
            <a href="#"><i class="ti-github"></i></a>
          </div>
        </div>
        <div class="col-lg-10 col-md-8 text-center text-lg-right text-md-right">
          <div class="header-top-info">
            <a href="tel:<?php echo e($settings['site_phone'] ?? '+00-000-0000'); ?>">Call Us : <span><?php echo e($settings['site_phone'] ?? '+00-000-0000'); ?></span></a>
            <a href="mailto:<?php echo e($settings['site_email'] ?? 'info@example.com'); ?>"><i class="fa fa-envelope mr-2"></i><span><?php echo e($settings['site_email'] ?? 'info@example.com'); ?></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg py-4" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
        <img src="<?php echo e(asset('storage/' . ($settings['logo'] ?? 'front/images/logo.png'))); ?>" alt="logo" height="40">
      
      </a>

      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsMain" aria-controls="navbarsMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navbarsMain">
        <ul class="navbar-nav ml-auto">
          <?php $__currentLoopData = $headerMenus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(url($menu->url)); ?>"><?php echo e($menu->title); ?></a>
              </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <a href="<?php echo e(url('/contact')); ?>" class="btn btn-solid-border btn-round-full ml-lg-4">Get a Quote</a>
      </div>
    </div>
  </nav>
</header>
<?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views/front/partials/header.blade.php ENDPATH**/ ?>