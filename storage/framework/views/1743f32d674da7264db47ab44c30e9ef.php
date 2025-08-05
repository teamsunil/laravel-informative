

<?php $__env->startSection('title', 'Manage Blogs'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <h1 class="h3 text-primary">
                <i class="fas fa-newspaper"></i> Manage Blogs
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>
        <a href="<?php echo e(route('blogs.create')); ?>" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Add New Blog
        </a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Blogs</h5>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($blog->id); ?></td>
                                <td class="fw-bold"><?php echo e($blog->title); ?></td>
                                <td class="text-muted"><?php echo e($blog->slug); ?></td>
                                <td>
                                    <?php if($blog->status): ?>
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Active</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($blog->created_at->format('d M, Y')); ?></td>
                                <td class="text-end">
                                    <a href="<?php echo e(route('blogs.edit', $blog)); ?>" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('blogs.destroy', $blog)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No blogs found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if(method_exists($blogs, 'links')): ?>
            <div class="card-footer">
                <?php echo e($blogs->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views/admin/blogs/index.blade.php ENDPATH**/ ?>