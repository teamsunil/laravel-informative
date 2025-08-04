

<?php $__env->startSection('title', 'Blog Categories'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>🗂 Blog Categories</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('blog-categories.create')); ?>" class="btn btn-primary mb-3">+ Add Category</a>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($category->name); ?></td>
                    <td><?php echo e($category->slug); ?></td>
                    <td>
                        <span class="badge <?php echo e($category->status ? 'bg-success' : 'bg-danger'); ?>">
                            <?php echo e($category->status ? 'Active' : 'Inactive'); ?>

                        </span>
                    </td>
                    <td>
                        <a href="<?php echo e(route('blog-categories.edit', $category->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?php echo e(route('blog-categories.destroy', $category->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="4">No Categories Found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <div class="mt-3">
        <?php echo e($categories->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\blog-categories\index.blade.php ENDPATH**/ ?>