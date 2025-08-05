<footer class="footer section">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">Company</h4>
          <ul class="list-unstyled footer-menu lh-35">
            @foreach($footerCompanyMenus as $menu)
                <li><a href="{{ url($menu->url) }}">{{ $menu->title }}</a></li>
            @endforeach
        </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6">
        <div class="widget">
          <h4 class="text-capitalize mb-4">Quick Links</h4>
          <ul class="list-unstyled footer-menu lh-35">
            @foreach($footerQuickMenus as $menu)
                <li><a href="{{ url($menu->url) }}">{{ $menu->title }}</a></li>
            @endforeach
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
            <h3>{{ $settings['site_name'] ?? 'Megakit' }}</h3>
          </div>
          <p>{{ $settings['tagline'] ?? 'Creative Agency Template' }}</p>
          <h6><a href="mailto:{{ $settings['site_email'] ?? 'support@example.com' }}">{{ $settings['site_email'] ?? 'support@example.com' }}</a></h6>

           <a href="tel:{{ $settings['site_phone'] ?? '+00-000-0000' }}"><p><i class="ti-mobile mr-2"></i>{{ $settings['site_phone'] ?? '+00 0000 0000' }}</p></a>
        </div>
      </div>
    </div>

    <div class="footer-btm pt-4 mt-4 border-top">
      <div class="row">
        <div class="col-lg-6">
          <p class="mb-0 text-light">&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Megakit' }}. All rights reserved.</p>
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
