
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Infrastructure 2 Division</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('image/LOGO INFRA 2 BLUE.png') }}" rel="icon">
  <link href="{{ asset('image/LOGO INFRA 2 BLUE.png') }}" >

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
<!-- Maps -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
  <!-- Vendor CSS Files -->
  <link href="{{ asset('templateLand/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('templateLand/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('templateLand/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('templateLand/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('templateLand/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('templateLand/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('templateLand/assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction - v1.3.0
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <script>
        function loadContent(contentType) {
            const contentDiv = document.querySelector('.content');
            if (contentType === 'overview') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <h3>Overview</h3>
                        <div class="chart">Chart Area</div>
                    </div>
                `;
            } else if (contentType === 'akhlak') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQj5GSW_1hWscXuLDzA5_b9cEW-byjwYUxgyfe9LvutnK9_GLgvhPCjg4KtQIaZuQ/embed?start=true&loop=true&delayms=3000" frameborder="0" width="1280" height="749" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    </div>
                `;
            } else if (contentType === 'default') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQqPZ6uqlZiGiGPeAiQMjmqKkdYkHPZcUNmU1Xds3M1Z_IAfHrR9t6OPAydMr1b2w/embed?start=true&loop=true&delayms=3000" frameborder="0" width="1280" height="749" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    </div>
                `;
            } else if (contentType === 'dashboard') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <iframe class="trello-embed" src="https://trello.com/b/KVXIYC4t.html" frameborder="0" width="100%" height="600" scrolling="no" allowtransparency="true"></iframe>
                    </div>
                `;
                        }
        }

        function toggleProfileDropdown() {
            const dropdown = document.querySelector('.profile-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        function showLogoutModal() {
            document.getElementById('logoutModal').style.display = 'block';
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        function editRow(button) {
            // Implement edit functionality here
            alert('Edit functionality not yet implemented.');
        }

        function deleteRow(button) {
            // Implement delete functionality here
            alert('Delete functionality not yet implemented.');
        }

        window.onclick = function(event) {
            if (!event.target.matches('.profile-menu img')) {
                const dropdowns = document.getElementsByClassName("profile-dropdown");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }
    </script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="{{ asset('image/infra2white.png') }}" alt="Logo">
    </a>
    

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="/" class="active">Home</a></li>
          <li><a href="/about">About</a></li>
          <li class="dropdown"><a href="#"><span>Info</span> <i
            class="bi bi-chevron-down dropdown-indicator"></i></a>
        <ul>
          <li><a href="#constructions">Activities</a></li>
          <li><a href="#infra-news">InfraNews</a></li>
        </ul>
          </li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="/login">Login</a></li>
          <li><a href="/login">Transformation Space</a></li>
        <li class="dropdown"><a href="#"><span> Transformation Space</span>
          <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
            <li><a href="https://docs.google.com/presentation/d/1x7Jc0kQnqENdkSIEGbWhbJMeDlHIHrXs/edit?usp=sharing&ouid=112403144328917126065&rtpof=true&sd=true">Change Leader Program 2024</a></li>
              <li><a href="https://trello.com/invite/b/KVXIYC4t/ATTI391872b9c785b891b16221b35a78119309F40831/change-leader-program-2024">Dashboard Change Leader</a></li>
            </ul>
        </li>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

 <!-- ======= Hero Section ======= -->
 <section id="hero" class="hero">
  <div class="info d-flex align-items-center">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-6 text-center">
                  <a data-aos="fade-up" data-aos-delay="200" href="https://www.youtube.com/@Infrastructure2Division" class="btn-get-started">Learn More</a>
              </div>
          </div>
      </div>
  </div>

  <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    @foreach ($daftarCarousel as $item)
        <div class="carousel-item active" style="background-image: url('{{ asset('carousel/'.$item->item) }}')"></div>
    @endforeach

      <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>
  </div>
</section>
<!-- End Hero Section -->
  <main id="main">

    @yield('content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-content position-relative">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Infrastructure 2 Division</h3>
              <p>
               
JL. D.I. Panjaitan Kav. 9-10, <br>
Jakarta 13340<br><br>
                 <strong>Phone:</strong> +6221 8067 9200<br>
                <strong>Email:</strong> infrastructure2division@gmail.com<br>
              </p>
              <div class="social-links d-flex mt-3">
                <a href="https://www.youtube.com/Infrastructure2Division" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube"></i></a>
                <a href="https://www.instagram.com/wika_infrastructure2?igsh=MXkxc3B3eWNmYTFwNQ==" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                <a href="https://www.linkedin.com/company/ptwijayakaryaperserotbk./mycompany/" class="d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div><!-- End footer info column-->

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#infra-news">News</a></li>
              <li><a href="#constructions">Activities</a></li>
              <li><a href="#">Our Project</a></li>
            </ul>
          </div><!-- End footer links column-->

         
        </div>
      </div>
    </div>

    <div class="footer-legal text-center position-relative">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Infrastructure 2 Division</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BIM & Digilization</a> Distributed by <a
            href="https://themewagon.com">Infrastructure 2 Division</a>
        </div>
      </div>
    </div>

  </footer>
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('templateLand/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('templateLand/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('templateLand/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('templateLand/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('templateLand/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('templateLand/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('templateLand/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('templateLand/assets/js/main.js') }}"></script>

</body>

</html>