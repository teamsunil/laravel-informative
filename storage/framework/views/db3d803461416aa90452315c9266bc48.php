

<?php $__env->startSection('title', 'Manage Products'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <h1 class="h3 text-primary">
                <i class="fas fa-box-open"></i> Manage Products
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Add New Product
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Products</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($product->id); ?></td>
                                <td class="fw-bold"><?php echo e($product->name); ?></td>
                                <td class="text-muted"><?php echo e($product->slug); ?></td>
                                <td><?php echo e(number_format($product->price, 2)); ?></td>
                                <td>
                                    <?php if($product->status): ?>
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No products found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if(method_exists($products, 'links')): ?>
            <div class="card-footer">
                <?php echo e($products->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\products\index.blade.php ENDPATH**/ ?>