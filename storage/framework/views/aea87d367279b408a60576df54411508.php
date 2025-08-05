

<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('content'); ?>
<!-- Product Detail Banner -->
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <div class="page-title-content">
                    <h1 class="text-white mb-3"><?php echo e($product->name); ?></h1>
                    <p class="text-white"><?php echo e($product->short_description); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Details -->
<section class="section product-details">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-3"><?php echo e($product->name); ?></h2>
                <?php if($product->on_sale): ?>
                    <h4 class="text-danger">£<?php echo e($product->sale_price); ?> <del class="text-muted fs-6">£<?php echo e($product->regular_price); ?></del></h4>
                <?php else: ?>
                    <h4 class="text-primary">£<?php echo e($product->price); ?></h4>
                <?php endif; ?>

                <p class="mt-3"><?php echo e($product->description); ?></p>

                <ul class="list-unstyled mt-4">
                    <li><strong>SKU:</strong> <?php echo e($product->sku); ?></li>
                    <li><strong>Type:</strong> <?php echo e(ucfirst($product->type)); ?></li>
                    <li><strong>Brand:</strong> <?php echo e($product->brand); ?></li>
                    <li><strong>Stock Status:</strong> 
                        <?php if($product->stock_status === 'instock'): ?>
                            <span class="text-success">In Stock</span>
                        <?php else: ?>
                            <span class="text-danger">Out of Stock</span>
                        <?php endif; ?>
                    </li>
                    <?php if($product->free_delivery): ?>
                        <li><span class="badge bg-success">Free Delivery</span></li>
                    <?php endif; ?>
                </ul>

                <a href="<?php echo e(route('contact.show')); ?>" class="btn btn-main btn-round-full mt-4">Enquire Now <i class="fa fa-angle-right ml-2"></i></a>
            </div>
        </div>

    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\front\products\show.blade.php ENDPATH**/ ?>