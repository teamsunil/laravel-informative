<footer class="footer section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">Company</h4>
          <ul class="list-unstyled footer-menu lh-35">
            <li><a href="<?php echo e(url('/terms-and-conditions')); ?>">Terms & Conditions</a></li>
            <li><a href="<?php echo e(url('/privacy-policy')); ?>">Privacy Policy</a></li>
            <li><a href="<?php echo e(url('/support')); ?>">Support</a></li>
            <li><a href="<?php echo e(url('/faq	')); ?>">FAQ</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">Quick Links</h4>
          <ul class="list-unstyled footer-menu lh-35">
            <li><a href="<?php echo e(url('/about')); ?>">About</a></li>
            <li><a href="<?php echo e(url('/services')); ?>">Services</a></li>
            <li><a href="<?php echo e(url('/team')); ?>">Team</a></li>
            <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">Subscribe Us</h4>
          <p>Subscribe to get latest news article and resources</p>
          <form action="#" class="sub-form">
            <input type="text" class="form-control mb-3" placeholder="Subscribe Now ...">
            <a href="#" class="btn btn-main btn-small">subscribe</a>
          </form>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="widget">
          <div class="logo mb-4">
            <h3><?php echo e($settings['site_name'] ?? 'Megakit'); ?></h3>
          </div>
          <p><?php echo e($settings['tagline'] ?? 'Creative Agency Template'); ?></p>
          <h6><a href="mailto:<?php echo e($settings['site_email'] ?? 'support@example.com'); ?>"><?php echo e($settings['site_email'] ?? 'support@example.com'); ?></a></h6>
          <p><i class="ti-mobile mr-2"></i><?php echo e($settings['site_phone'] ?? '+00 0000 0000'); ?></p>
        </div>
      </div>
    </div>

    <div class="footer-btm pt-4 mt-4 border-top">
      <div class="row">
        <div class="col-lg-6">
          <p class="mb-0 text-light">&copy; <?php echo e(date('Y')); ?> <?php echo e($settings['site_name'] ?? 'Megakit'); ?>. All rights reserved.</p>
        </div>
        <div class="col-lg-6 text-lg-right">
          <ul class="list-inline footer-socials">
            <li class="list-inline-item"><a href="#"><i class="ti-facebook mr-2"></i>Facebook</a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-twitter mr-2"></i>Twitter</a></li>
            <li class="list-inline-item"><a href="#"><i class="ti-instagram mr-2"></i>Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php /**PATH D:\AI-Laravel\dotsquares-infoweb\resources\views\front\partials\footer.blade.php ENDPATH**/ ?>