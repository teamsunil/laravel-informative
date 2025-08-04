

<?php $__env->startSection('title', 'Edit Page'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1 class="text-primary fw-bold">🛠️ Edit Page</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <form action="<?php echo e(route('pages.update', $page)); ?>" method="POST"  enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="row">
            
            <div class="col-md-8 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Page Details</h5>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label text-muted">Title</label>
                            <input type="text" name="title" class="form-control" value="<?php echo e($page->title); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Slug</label>
                            <input type="text" name="slug" class="form-control" value="<?php echo e($page->slug); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Content</label>
                            <textarea id="summernote" name="content" class="form-control" rows="5" required><?php echo e($page->content); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3" required><?php echo e($page->short_description); ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Banner Image</label>
                            <input type="file" name="image" class="form-control">
                            <?php if($page->image): ?>
                                <img src="<?php echo e(asset('storage/' . $page->image)); ?>" class="mt-2" width="120" alt="Feature Image">
                            <?php endif; ?>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?php if($page->status): ?> selected <?php endif; ?>>Active</option>
                                    <option value="0" <?php if(!$page->status): ?> selected <?php endif; ?>>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Template</label>
                                <select name="template" class="form-control">
                                    <option value="home" <?php if($page->template == 'home'): ?> selected <?php endif; ?>>Home Page</option>
                                    <option value="common" <?php if($page->template == 'common'): ?> selected <?php endif; ?>>Common Page</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">SEO Settings</h5>
                    </div>
                    <div class="card-body">
                        <?php $__currentLoopData = [
                            'seo_title' => 'SEO Title',
                            'seo_description' => 'SEO Description',
                            'seo_keywords' => 'SEO Keywords',
                            'og_title' => 'OG Title',
                            'og_description' => 'OG Description',
                            'twitter_title' => 'Twitter Title',
                            'twitter_description' => 'Twitter Description',
                        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="mb-3">
                                <label class="form-label text-muted"><?php echo e($label); ?></label>
                                <?php if(str_contains($field, 'description')): ?>
                                    <textarea name="<?php echo e($field); ?>" class="form-control" rows="2"><?php echo e(optional($page->seoMeta)->$field); ?></textarea>
                                <?php else: ?>
                                    <input type="text" name="<?php echo e($field); ?>" class="form-control" value="<?php echo e(optional($page->seoMeta)->$field); ?>">
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update</button>
            <a href="<?php echo e(route('pages.index')); ?>" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        body.dark-mode .card {
            background-color: #2e3440 !important;
            border-color: #4c566a !important;
        }
        body.dark-mode .form-control {
            background-color: #3b4252 !important;
            color: #e5e9f0 !important;
            border-color: #4c566a !important;
        }
        body.dark-mode label {
            color: #e5e9f0;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\pages\edit.blade.php ENDPATH**/ ?>