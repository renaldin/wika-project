
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('image/WIDER.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('image/WIDER.png') }}" type="image/x-icon">
    <title>Infrastructure 2 Division | {{$title}}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">
  </head>
  <body>
    <div class="container-fluid p-0">
      <div class="row m-0">
        <div class="col-12 p-0">    
          <div class="login-card login-dark">
            <div>
              <div><a class="logo" href="index.html"><img class="img-fluid for-dark" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="looginpage"><img class="img-fluid for-light" src="{{ asset('admin/assets/images/logo/logo_dark.png') }}" alt="looginpage"></a></div>
              @yield('content')
            </div>
          </div>
        </div>
      </div>
      <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
      <script src="{{ asset('admin/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
      <script src="{{ asset('admin/assets/js/alert.js') }}"></script>
      <script src="{{ asset('admin/assets/js/config.js') }}"></script>
      <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    </div>
  </body>
</html>