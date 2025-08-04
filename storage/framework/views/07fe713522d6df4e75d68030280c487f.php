

<?php $__env->startSection('title', 'Site Settings'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1><i class="fas fa-cogs text-primary"></i> Site Settings</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card <?php echo e(session('adminlte_dark_mode') ? 'bg-dark text-light border-secondary' : ''); ?> shadow-sm">
        <div class="card-header <?php echo e(session('adminlte_dark_mode') ? 'bg-info text-dark' : 'bg-primary text-white'); ?>">
            <h3 class="card-title">Site Configuration</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="<?php echo e(route('admin.settings.update')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">
                    
                    <div class="col-md-6">
                        <?php $__currentLoopData = [
                            'site_name' => 'Site Name',
                            'tagline' => 'Tagline',
                            'site_email' => 'Email',
                            'site_phone' => 'Phone',
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3">
                                <label for="<?php echo e($key); ?>" class="form-label"><?php echo e($label); ?></label>
                                <input type="text" id="<?php echo e($key); ?>" name="<?php echo e($key); ?>"
                                       class="form-control bg-light border-secondary"
                                       value="<?php echo e($settings[$key] ?? ''); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <div class="mb-3">
                            <label for="site_address" class="form-label">Address</label>
                            <textarea class="form-control bg-light border-secondary" id="site_address" name="site_address" rows="3"><?php echo e($settings['site_address'] ?? ''); ?></textarea>
                        </div>

                        <?php $__currentLoopData = [
                            'facebook_url' => 'Facebook URL',
                            'twitter_url' => 'Twitter URL',
                            'instagram_url' => 'Instagram URL',
                            'footer_text' => 'Footer Text',
                            'working_hours' => 'Working Hours'
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3">
                                <label for="<?php echo e($key); ?>" class="form-label"><?php echo e($label); ?></label>
                                <input type="text" class="form-control bg-light border-secondary" id="<?php echo e($key); ?>" name="<?php echo e($key); ?>"
                                       value="<?php echo e($settings[$key] ?? ''); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <div class="col-md-6">
                        <?php $__currentLoopData = [
                            'logo' => ['label' => 'Logo', 'height' => 50],
                            'favicon' => ['label' => 'Favicon', 'height' => 30],
                            'hero_background_url' => ['label' => 'Hero Background Image', 'height' => 60],
                            'about_image' => ['label' => 'About Section Image', 'height' => 60],
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3">
                                <label class="form-label"><?php echo e($data['label']); ?></label><br>
                                <?php if(!empty($settings[$key])): ?>
                                    <img src="<?php echo e(asset('storage/' . $settings[$key])); ?>" alt="<?php echo e($key); ?>"
                                         height="<?php echo e($data['height']); ?>" class="mb-2 d-block">
                                <?php endif; ?>
                                <input type="file" class="form-control-file" name="<?php echo e($key); ?>">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success mt-3">
                        <i class="fas fa-save me-1"></i> Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\settings\edit.blade.php ENDPATH**/ ?>