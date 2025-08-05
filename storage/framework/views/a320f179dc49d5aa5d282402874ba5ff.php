<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?php echo e($settings['meta_description'] ?? 'Your Default Description'); ?>">
    <meta name="author" content="<?php echo e($settings['meta_author'] ?? 'Your Company Name'); ?>">

    <title><?php echo e($settings['site_name'] ?? 'Megakit'); ?> | <?php echo e($settings['tagline'] ?? 'We Build Scalable Software for Future'); ?></title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('front/plugins/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/plugins/themify/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/plugins/fontawesome/css/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/plugins/magnific-popup/dist/magnific-popup.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/plugins/slick-carousel/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('front/plugins/slick-carousel/slick/slick-theme.css')); ?>">
    <script src="<?php echo e(asset('plugins/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('js/contact.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(asset('front/css/style.css')); ?>">
  </head>

  <body>
    <?php echo $__env->make('front.partials.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main-wrapper">
      <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('front.partials.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <!-- Scripts -->
    <script src="<?php echo e(asset('front/plugins/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('front/js/contact.js')); ?>"></script>
    <script src="<?php echo e(asset('front/plugins/bootstrap/js/popper.js')); ?>"></script>
    <script src="<?php echo e(asset('front/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/plugins/magnific-popup/dist/jquery.magnific-popup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/plugins/slick-carousel/slick/slick.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/plugins/counterup/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/plugins/counterup/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('front/plugins/google-map/map.js')); ?>"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_KEY&callback=initMap" async defer></script>
    <script src="<?php echo e(asset('front/js/script.js')); ?>"></script>
  </body>
</html><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views/front/layouts/app.blade.php ENDPATH**/ ?>