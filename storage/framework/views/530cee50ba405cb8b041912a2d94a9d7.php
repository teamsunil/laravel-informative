


<?php $__env->startSection('content'); ?>
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Contact Us</span>
          <h1 class="text-capitalize mb-4 text-lg">Get in Touch</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="<?php echo e(url('/')); ?>" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact form start -->
<section class="contact-form-wrap section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                 <?php if(session('success')): ?>
                    <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                 <?php endif; ?>
                 <form id="contact-form" class="contact__form" method="post" action="<?php echo e(route('contact.send')); ?>">
                    <?php echo csrf_field(); ?>
                    <span class="text-color">Send a message</span>
                    <h3 class="text-md mb-4">Contact Form</h3>
                    <div class="form-group">
                        <input name="name" type="text" class="form-control" placeholder="Your Name" value="<?php echo e(old('name')); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email Address" value="<?php echo e(old('email')); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" class="form-control" rows="4" placeholder="Your Message"><?php echo e(old('message')); ?></textarea>
                        <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <small class="text-danger"><?php echo e($message); ?></small> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button class="btn btn-main" name="submit" type="submit">Send Message</button>
                </form>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                    <span class="text-muted"><?php echo e($settings['tagline']); ?>  are Professionals</span>
                    <h2 class="mb-5 mt-2">Don’t Hesitate to contact with us for any kind of information</h2>

                    <ul class="address-block list-unstyled">
                        <li>
                            <i class="ti-direction mr-3"></i><?php echo e($settings['site_address']); ?>

                        </li>
                        <li>
                            
                        <a href="tel:<?php echo e($settings['site_phone'] ?? '+00-000-0000'); ?>"><i class="ti-mobile mr-3"></i>Phone:+ <?php echo e($settings['site_phone']); ?>

                        </li></a>
                        <li>
                        <a href="mailto:<?php echo e($settings['site_email'] ?? 'info@example.com'); ?>"><i class="ti-email mr-3"></i>Email: <?php echo e($settings['site_email']); ?>

                        </li></a>
                    </ul>

                    <ul class="social-icons list-inline mt-5">
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views/front/contact.blade.php ENDPATH**/ ?>