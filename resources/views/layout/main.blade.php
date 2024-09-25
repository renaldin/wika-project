
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <title>Infrastructure 2 Division | {{ $subTitle }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/themify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/feather-icon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/js-datatables/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/intltelinput.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/tagify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/rangeslider/rSlider.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/fullcalender.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.css') }}">
     <!-- ico-font-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/icofont.css') }}">
     <!-- Themify icon-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/themify.css') }}">
     <!-- Flag icon-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/flag-icon.css') }}">
     <!-- Feather icon-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/feather-icon.css') }}">
     <!-- Plugins css start-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/slick-theme.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/scrollbar.css') }}">
     <!-- Range slider css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/rangeslider/rSlider.min.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/animate.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/prism.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/fullcalender.css') }}">
     <!-- Plugins css Ends-->
     <!-- Bootstrap css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">
     <!-- App css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
     <link id="color" rel="stylesheet" href="{{ asset('admin/assets/css/color-1.css') }}" media="screen">
     <!-- Responsive css-->
     <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">
    {{-- select --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <style>
      .select2-results__option--highlighted {
        background-color: #096f6f;
        color: #fff;
      }
    
      .select2-container--default .select2-results__option[aria-selected="true"] {
        background-color: #086464;
        color: #fff;
      }

      .select2-container--default .select2-results__option--highlighted[aria-selected] {
          background-color: #086464;
          color: #fff;
      }
    </style>
  </head>
  <body> 
    <div class="loader-wrapper">
      <div class="loader"> 
        <div class="loader4"></div>
      </div>
    </div>
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative"> 
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Riho .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading... </span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"> </div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">  
            <div class="logo-wrapper"> <a href="index.html"><img class="img-fluid for-light" src="{{ asset('admin/assets/images/logo/logo_dark.png') }}" alt="logo-light"><img class="img-fluid for-dark" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="logo-dark"></a></div>
            <div class="toggle-sidebar"> <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div> <a class="toggle-sidebar" href="#"> <i class="iconly-Category icli"> </i></a>
              <div class="d-flex align-items-center gap-2 ">
                <h4 class="f-w-600">Selamat Datang {{$user->nama_user}}</h4>
              </div>
            </div>
            <div class="welcome-content d-xl-block d-none">
              <span class="text-truncate col-12">
                Selamat datang di website Infrastructure 2 Division.
              </span>
            </div>
          </div>
          <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
              <li> 
                <div class="mode"><i class="moon" data-feather="moon"> </i></div>
              </li>
              <li class="profile-nav onhover-dropdown"> 
                <div class="media profile-media"><img class="b-r-10" src="{{ asset('foto_user/'.$user->foto_user) }}" width="35px" alt="">
                  <div class="media-body d-xxl-block d-none box-col-none">
                    <div class="d-flex align-items-center gap-2"> <span>{{$user->nama_user}} </span><i class="middle fa fa-angle-down"> </i></div>
                    <p class="mb-0 font-roboto">{{$user->role}}</p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="user-profile.html"><i data-feather="user"></i><span>My Profile</span></a></li>
                  <li><a class="btn btn-pill btn-outline-primary btn-sm" href="/logout">Log Out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="page-body-wrapper">
        @include('layout.sidebar')
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h4>{{$subTitle}}</h4>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">                                       
                        <svg class="stroke-icon">
                          <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                        </svg></a></li>
                    @if ($title)
                      <li class="breadcrumb-item">{{$title}}</li>
                    @endif
                    @if ($subTitle)
                      <li class="breadcrumb-item active">{{$subTitle}}</li>
                    @endif
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            @yield('content')
          </div>
        </div>
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright {{date('Y')}} by Infrastructure 2 Division</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scrollbar/custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sidebar-pin.js') }}"></script>
    <script src="{{ asset('admin/assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('admin/assets/js/header-slick.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/theme-customizer/customizer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}?v={{date('YmdHis')}}"></script>
    <script src="{{ asset('admin/assets/js/js-datatables/simple-datatables@latest.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom-list-product.js') }}"></script>
    <script src="{{ asset('admin/assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ecommerce.js') }}"></script>
    <script src="{{ asset('admin/assets/js/tooltip-init.js') }}"></script>
    <script src="{{ asset('admin/assets/js/flat-pickr/flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/js/flat-pickr/custom-flatpickr.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropzone/dropzone.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dropzone/dropzone-script.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/tagify.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/tagify.polyfills.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/select2/intltelinput.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/add-product/select4-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/editors/quill.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom-add-product.js') }}"></script>
    <script src="{{ asset('admin/assets/js/height-equal.js') }}"></script>
    <script src="{{ asset('admin/assets/js/calendar/fullcalender.js') }}"></script>
    <script src="{{ asset('admin/assets/js/calendar/custom-calendar.js') }}"></script>
    <script src="{{ asset('admin/assets/js/animation/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('admin/assets/js/range-slider/rSlider.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/rangeslider/rangeslider.js') }}"></script>
    <script src="{{ asset('admin/assets/js/prism/prism.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/counter/counter-custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom-card/custom-card.js') }}"></script>
    <script src="{{ asset('admin/assets/js/header-slick.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="{{ asset('admin/assets/js/dashboard/dashboard_2.js') }}"></script>
    <script>new WOW().init();</script>

    <script>
      if (document.querySelectorAll("#chartProject").length) {
          var chartElement = document.getElementById('chartProject');
          var persen_0_30 = parseInt(chartElement.getAttribute('persen_0_30'));
          var persen_30_50 = parseInt(chartElement.getAttribute('persen_30_50'));
          var persen_50_70 = parseInt(chartElement.getAttribute('persen_50_70'));
          var persen_70_100 = parseInt(chartElement.getAttribute('persen_70_100'));
  
          var options = {
            series: [{
                  name: '',
                  data: [persen_0_30, persen_30_50, persen_50_70, persen_70_100]
              }],
              colors: ['#FF5733', '#33FF57', '#3357FF', '#F1C40F'],
              chart: { 
                  type: 'bar',
                  height: 412, 
                  toolbar: {
                      show: false,
                      tools: {
                          download: false,
                      }
                  },
                  zoom: {
                      enabled: true 
                  }
              },
              plotOptions: {
                  bar: {
                      horizontal: false,
                      borderRadius: 6,
                      columnWidth: '30%',
                      barHeight: '100%',
                      distributed: true,
                      barSpacing: 20
                  },
              },
              dataLabels: {
                  enabled: false,
              },
              xaxis: {
                  categories: ['0 - 30 %', '30 - 50 %', '50 - 70 %', '70 - 100 %'],
                  axisTicks: {
                      show: false
                  },
                  axisBorder: {
                      show: false
                  },
              },
              legend: {
                  position: 'bottom',
                  offsetY: 5
              },
              fill: {
                  opacity: 1
              }
          };
  
          var chartProject = new ApexCharts(document.querySelector("#chartProject"), options);
          chartProject.render();
  
          function radialCommonOption(data) {
            return {
                series: data.radialYseries,
                chart: {
                  height: 90,
                  type: 'radialBar',
                  offsetX: -5,
                  offsetY: -15,
                },
                plotOptions: {
                  radialBar: {
                      hollow: {
                          size: '35%',
                      },
                      track: {
                          background: 'var(--theme-deafult)',
                          opacity: 0.2,
                      },
                      dataLabels: {
                          value: {
                              color: "var(--tag-text-color--edit)",
                              fontSize: "10px",
                              show: true,
                              offsetY: -12,
                          }
                      }
                  },
              },
              colors: ["var(--theme-deafult)"],
              stroke: {
                  lineCap: "round",
              },
            }
          }
  
          const radial1 = {
              radialYseries: [75],
          };
  
          const radialchart1 = document.querySelector('#widgetsChart1');
          if (radialchart1) {
              var radialprogessChart1 = new ApexCharts(radialchart1, radialCommonOption(radial1));
              radialprogessChart1.render();
          }
  
          // radial 2
          const radial2 = {
              radialYseries: [50],
          };
          const radialchart2 = document.querySelector('#widgetsChart2');
          if (radialchart2) {
              var radialprogessChart2 = new ApexCharts(radialchart2, radialCommonOption(radial2));
              radialprogessChart2.render();
          }
  
          // radial 3
          const radial3 = {
              radialYseries: [25],
          };
          const radialchart3 = document.querySelector('#widgetsChart3');
          if (radialchart3) {
              var radialprogessChart3 = new ApexCharts(radialchart3, radialCommonOption(radial3));
              radialprogessChart3.render();
          }
  
          // radial 4
          const radial4 = {
              radialYseries: [86],
          };
          const radialchart4 = document.querySelector('#widgetsChart4');
          if (radialchart4) {
              var radialprogessChart4 = new ApexCharts(radialchart4, radialCommonOption(radial4));
              radialprogessChart4.render();
          }
  
          // radial 5
          const radial5 = {
              chart: {
                  offsetY: -50,
              },
              radialYseries: [74],
          };
          const radialchart5 = document.querySelector('#widgetsChart5');
          if (radialchart5) { 
              var radialprogessChart5 = new ApexCharts(radialchart5, radialCommonOption(radial5));
              radialprogessChart5.render();
          }
      }
    </script>
  </body>
</html>