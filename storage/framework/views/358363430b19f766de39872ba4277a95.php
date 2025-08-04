<?php $__env->startSection('content'); ?>
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our blog</span>
          <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo e(url('/')); ?>" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-6 col-md-6 mb-5">
                    <div class="blog-item">
                        <img src="<?php echo e($blog->image ? asset('storage/' . $blog->image) : asset('images/blog/default.jpg')); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid rounded">

                        <div class="blog-item-content bg-white p-5">
                            <div class="blog-item-meta bg-gray py-1 px-2">
                                <span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i><?php echo e($blog->category ?? 'Blog'); ?></span>
                                <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> <?php echo e($blog->created_at->format('jS F, Y')); ?></span>
                            </div> 

                            <h3 class="mt-3 mb-3">
                                <a href="<?php echo e(route('blogs.detail', $blog->slug)); ?>"><?php echo e($blog->title); ?></a>
                            </h3>
                            <p class="mb-4"><?php echo e($blog->short_description); ?></p>

                            <a href="<?php echo e(route('blogs.detail', $blog->slug)); ?>" class="btn btn-small btn-main btn-round-full">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\front\blog\blog_listing.blade.php ENDPATH**/ ?>