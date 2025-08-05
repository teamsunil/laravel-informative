

<?php $__env->startSection('title', 'Home Page Settings'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Home Page Settings</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.home-page-settings.update')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <!-- Title -->
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo e(old('title', $homeSection->title)); ?>">
        </div>

        <!-- Sub Title -->
        <div class="form-group">
            <label>Sub Title</label>
            <input type="text" name="sub_title" class="form-control"
                value="<?php echo e(old('sub_title', $homeSection->sub_title)); ?>">
        </div>

        <!-- Banner Image -->
        <div class="form-group">
            <label>Banner Image</label>
            <input type="file" name="banner_image" class="form-control">
            <?php if($homeSection->banner_image): ?>
                <img src="<?php echo e(asset('storage/' . $homeSection->banner_image)); ?>" width="100">
            <?php endif; ?>
        </div>


        <!-- CTA -->
        <div class="form-group">
            <label>CTA</label>
            <input type="text" name="cta" class="form-control" value="<?php echo e(old('cta', $homeSection->cta)); ?>">
        </div>

        <!-- Expert -->
        <div class="form-group">
            <label>Expert</label>
            <textarea name="expert" id="expert" class="form-control summernote"
                value="<?php echo e(old('expert', $homeSection->expert)); ?>"></textarea>
        </div>



        <!-- About Section Heading -->
        <div class="form-group">
            <label>About Section Heading</label>
            <input type="text" name="about_section_heading" class="form-control"
                value="<?php echo e(old('about_section_heading', $homeSection->about_section_heading)); ?>">
        </div>

        <!-- About Section Image -->
        <div class="form-group">
            <label>About Section Image</label>
            <input type="file" name="about_section_image" class="form-control">
            <?php if($homeSection->about_section_image): ?>
                <img src="<?php echo e(asset('storage/' . $homeSection->about_section_image)); ?>" width="100">
            <?php endif; ?>
        </div>

        <!-- About Section Description -->
        <div class="form-group">
            <label>About Section Description</label>
            <textarea name="about_section_description" id="about_section_description" class="form-control summernote"><?php echo e(old('about_section_description', $homeSection->about_section_description)); ?></textarea>
        </div>

        <!-- Services Lists -->
        <div class="form-group">
            <label>Services</label>
            <div id="services-wrapper">
                <?php $__currentLoopData = json_decode($homeSection->services_lists, true) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="service-item-block mb-3">
                        <textarea name="services_lists[]" class="form-control summernote"><?php echo $service; ?></textarea>
                        <button type="button" class="btn btn-danger btn-sm remove-service mt-2">Remove</button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="button" class="btn btn-success btn-sm mt-2" id="add-service">Add Service</button>
        </div>

        <!-- Testimonials Lists -->
        <div class="form-group">
            <label>Testimonials</label>
            <div id="testimonials-wrapper">
                <?php $__currentLoopData = json_decode($homeSection->testimonial_lists, true) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="testimonial-item-block mb-3">
                        <textarea name="testimonial_lists[]" class="form-control summernote"><?php echo $testimonial; ?></textarea>
                        <button type="button" class="btn btn-danger btn-sm remove-testimonial mt-2">Remove</button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button type="button" class="btn btn-success btn-sm mt-2" id="add-testimonial">Add Testimonial</button>
        </div>


        <div class="form-group">
            <label>Latest News</label>
            <textarea name="latest_news" class="form-control summernote"><?php echo e(old('latest_news', $homeSection->latest_news)); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
    <script>
        function initializeSummernote(element) {
            element.summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        }

        $(document).ready(function() {
            // Initialize existing summernote editors
            $('.summernote').each(function() {
                initializeSummernote($(this));
            });

            // Add Service
            $('#add-service').click(function() {
                let serviceBlock = `<div class="service-item-block mb-3">
                        <textarea name="services_lists[]" class="form-control summernote"></textarea>
                        <button type="button" class="btn btn-danger btn-sm remove-service mt-2">Remove</button>
                    </div>`;
                $('#services-wrapper').append(serviceBlock);
                initializeSummernote($('#services-wrapper .summernote').last());
            });

            // Add Testimonial
            $('#add-testimonial').click(function() {
                let testimonialBlock = `<div class="testimonial-item-block mb-3">
                        <textarea name="testimonial_lists[]" class="form-control summernote"></textarea>
                        <button type="button" class="btn btn-danger btn-sm remove-testimonial mt-2">Remove</button>
                    </div>`;
                $('#testimonials-wrapper').append(testimonialBlock);
                initializeSummernote($('#testimonials-wrapper .summernote').last());
            });

            // Remove Service Block
            $(document).on('click', '.remove-service', function() {
                let textarea = $(this).siblings('.summernote');
                textarea.summernote('destroy');
                $(this).closest('.service-item-block').remove();
            });

            // Remove Testimonial Block
            $(document).on('click', '.remove-testimonial', function() {
                let textarea = $(this).siblings('.summernote');
                textarea.summernote('destroy');
                $(this).closest('.testimonial-item-block').remove();
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\admin\home_sections\edit.blade.php ENDPATH**/ ?>