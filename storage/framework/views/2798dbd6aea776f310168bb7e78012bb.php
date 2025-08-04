

<?php $__env->startSection('title', $page->title); ?>

<?php $__env->startSection('content'); ?>
       <div class="main-wrapper ">
        <section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white"><?php echo e($page->title); ?></span>
          <h1 class="text-capitalize mb-4 text-lg"><?php echo e($page->short_description); ?></h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo e(url('/')); ?>" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50"><?php echo e($page->title); ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


 <section class="page-content "><?php echo $page->content; ?></section>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views/front/pages/show.blade.php ENDPATH**/ ?>