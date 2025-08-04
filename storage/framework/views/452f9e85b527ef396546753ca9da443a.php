


<?php $__env->startSection('title', 'Page Details'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Page Details</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-header">
            <strong><?php echo e($page->title); ?></strong>
        </div>
        <div class="card-body">
            <p><strong>Status:</strong> <?php echo e($page->status ? 'Active' : 'Inactive'); ?></p>
            <p><strong>Content:</strong></p>
            <div><?php echo nl2br(e($page->content)); ?></div>
        </div>
        <div class="card-footer">
            <a href="<?php echo e(route('pages.edit', $page)); ?>" class="btn btn-warning">Edit</a>
            <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-secondary">Back</a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\pages\show.blade.php ENDPATH**/ ?>