<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ $settings['meta_description'] ?? 'Your Default Description' }}">
    <meta name="author" content="{{ $settings['meta_author'] ?? 'Your Company Name' }}">

    <title>{{ $settings['site_name'] ?? 'Megakit' }} | {{ $settings['tagline'] ?? 'We Build Scalable Software for Future' }}</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('front/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/themify/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/magnific-popup/dist/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/plugins/slick-carousel/slick/slick-theme.css') }}">
    <script src="{{ asset('plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('js/contact.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
  </head>

  <body>
    @include('front.partials.header')

    <div class="main-wrapper">
      @yield('content')
    </div>

    @include('front.partials.footer')

    <!-- Scripts -->
    <script src="{{ asset('front/plugins/jquery/jquery.js') }}"></script>
    <script src="{{ asset('front/js/contact.js') }}"></script>
    <script src="{{ asset('front/plugins/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('front/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('front/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('front/plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('front/plugins/google-map/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_KEY&callback=initMap" async defer></script>
    <script src="{{ asset('front/js/script.js') }}"></script>
  </body>
</html>