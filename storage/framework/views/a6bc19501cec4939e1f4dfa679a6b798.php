

<?php $__env->startSection('content'); ?>
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our Products</span>
          <h1 class="text-capitalize mb-4 text-lg">Product Catalog</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo e(url('/')); ?>" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Products</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section product-wrap bg-gray">
    <div class="container">
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="col-lg-6 col-md-6 mb-5">
                    <div class="product-item">
                        <img src="<?php echo e($product->image ? asset('storage/' . $product->image) : asset('images/product/default.jpg')); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid rounded">

                        <div class="product-item-content bg-white p-5">
                            <div class="product-item-meta bg-gray py-1 px-2 mb-2">
                                <span class="text-muted text-capitalize mr-3"><i class="ti-package mr-2"></i>Product</span>
                                <span class="text-black text-capitalize mr-3"><i class="ti-money mr-1"></i> £<?php echo e(number_format($product->price, 2)); ?></span>
                            </div> 

                            <h3 class="mt-3 mb-3">
                                <a href="<?php echo e(route('products.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                            </h3>
                            <p class="mb-4"><?php echo e(Str::limit($product->short_description, 120)); ?></p>

                            <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="btn btn-small btn-main btn-round-full">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-12 text-center">
                    <p>No products found.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="pagination justify-content-center mt-4">
            <?php echo e($products->links()); ?>

        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views/front/products/index.blade.php ENDPATH**/ ?>