<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 fw-bold text-primary">📊 Admin Dashboard</h1>
            <p class="text-muted">Overview of your software site activity</p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    
    <?php $__currentLoopData = [
        ['count' => $totalPages, 'label' => 'Pages', 'icon' => 'file-alt', 'color' => 'info'],
        ['count' => $totalBlogs, 'label' => 'Blogs', 'icon' => 'newspaper', 'color' => 'success'],
        ['count' => $totalUsers, 'label' => 'Users', 'icon' => 'users', 'color' => 'primary'],
        ['count' => $totalContacts, 'label' => 'Contacts', 'icon' => 'envelope', 'color' => 'warning'],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3 col-6">
            <div class="small-box bg-<?php echo e($item['color']); ?>">
                <div class="inner">
                    <h3><?php echo e($item['count']); ?></h3>
                    <p><?php echo e($item['label']); ?></p>
                </div>
                <div class="icon">
                    <i class="fas fa-<?php echo e($item['icon']); ?>"></i>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="row">
    
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header fw-bold bg-light">
                🗓️ Blogs Created per Month
            </div>
            <div class="card-body">
                <canvas id="blogLineChart" height="200"></canvas>
            </div>
        </div>
    </div>

    
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header fw-bold bg-light">
                📄 Page Status Breakdown
            </div>
            <div class="card-body">
                <canvas id="pagePieChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>


<div class="card shadow-sm mt-4">
    <div class="card-header bg-light fw-bold">📝 Recent Blogs</div>
    <div class="card-body">
        <?php $__empty_1 = true; $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="d-flex justify-content-between border-bottom py-2">
                <div>
                    <i class="fas fa-circle text-success me-1"></i> <?php echo e($blog->title); ?>

                </div>
                <small class="text-muted"><?php echo e($blog->created_at->format('d M Y')); ?></small>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-muted text-center">No blog posts yet.</div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<style>
    body.dark-mode .card {
        background-color: #2e3440 !important;
        border-color: #4c566a !important;
    }
    body.dark-mode .card-header {
        background-color: #3b4252 !important;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('blogLineChart'), {
        type: 'line',
        data: {
            labels: <?php echo json_encode(array_keys($blogMonthlyCounts), 15, 512) ?>,
            datasets: [{
                label: 'Blogs',
                data: <?php echo json_encode(array_values($blogMonthlyCounts), 15, 512) ?>,
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.1)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    new Chart(document.getElementById('pagePieChart'), {
        type: 'pie',
        data: {
            labels: ['Active', 'Inactive'],
            datasets: [{
                data: <?php echo json_encode([$activePages, $inactivePages], 512) ?>,
                backgroundColor: ['#10b981', '#ef4444']
            }]
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>