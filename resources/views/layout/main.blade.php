
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

    <link rel="icon" href="{{ asset('image/wider1.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('image/wider1.png') }}" type="image/x-icon">
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css" rel="stylesheet">
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
    <!-- TIU Calendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tiu-calendar@2.0.0/dist/css/tiu-calendar.css" rel="stylesheet">

<!-- Layout Main -->


    <!-- TIU Calendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/tiu-calendar@2.0.0/dist/js/tiu-calendar.js"></script>

    <!-- FullCalendar CSS -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/font-awesome.css') }}">

    <!-- AOS CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <!-- AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- jQuery (untuk Bootstrap Calendar) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Calendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-calendar/js/calendar.js"></script>
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
     <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    @isset($user)
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
                <div class="logo-wrapper"> <a href="index.html"><img class="img-fluid for-light" src="{{ asset('image/wider 2.png') }}" alt="logo-light"><img class="img-fluid for-dark" src="{{ asset('image/wider 2.png') }}" alt="logo-dark"></a></div>
                <div class="toggle-sidebar"> <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
            </div>
        
            <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
                <div> <a class="toggle-sidebar" href="#"> <i class="iconly-Category icli"> </i></a>
                <div class="d-flex align-items-center gap-2 ">
                    <h4 class="f-w-600">Selamat Datang {{$user->nama_user}}</h4><img class="mt-0" src="../image/hand.gif" alt="hand-gif">
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
                    <li><a href="/profil"><i data-feather="user"></i><span>My Profile</span></a></li>
                    <li><a href="/ubah-password"><i data-feather="lock"></i><span>Change Password</span></a></li>
                    <li><a class="btn btn-pill btn-outline-primary btn-sm" href="/logout">Log Out</a></li>
                    </ul>
                </li>
                </ul>
            </div>
            </div>
        </div>
    @endisset
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
   
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap Select JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
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
    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.7/main.min.js"></script>
    <!-- Moment.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('admin/assets/js/dashboard/dashboard_2.js') }}"></script>
      <!-- Fullcalender Javascript -->
     
    <script>new WOW().init();</script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Pastikan jQuery terload -->
<script>
    $(document).ready(function() {
        console.log("Script loaded"); // Cek jika script terload

        // Event klik untuk tombol hapus
        $('.btn-delete').on('click', function(event) {
            event.preventDefault(); // Mencegah aksi default
            console.log("Delete button clicked"); // Debugging log

            // Menampilkan dialog konfirmasi
            if (confirm("Apakah Anda yakin akan menghapus data ini?")) {
                // Mendapatkan URL dari atribut data-href
                const url = $(this).data('href');
                console.log("Navigating to: ", url); // Debugging log URL
                
                // Arahkan ke URL penghapusan
                window.location.href = url;
            }
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Grafik untuk Dokumen Keuangan
        @isset($dokumenKeuanganCharts)
            @foreach($dokumenKeuanganCharts as $idDokumenKeuangan => $statusCounts)
                var ctxKeuangan{{ $idDokumenKeuangan }} = document.getElementById('statusChartKeuangan_{{ $idDokumenKeuangan }}').getContext('2d');
                new Chart(ctxKeuangan{{ $idDokumenKeuangan }}, {
                    type: 'pie',
                    data: {
                        labels: ['Pending', 'Disetujui', 'Ditolak'],
                        datasets: [{
                            data: [
                                {{ $statusCounts['Pending'] }},
                                {{ $statusCounts['Disetujui'] }},
                                {{ $statusCounts['Ditolak'] }}
                            ],
                            backgroundColor: [
                                'rgba(255, 205, 86, 0.2)', // Pending
                                'rgba(75, 192, 192, 0.2)',  // Disetujui
                                'rgba(255, 99, 132, 0.2)'   // Ditolak
                            ],
                            borderColor: [
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Status Dokumen Keuangan ID: {{ $idDokumenKeuangan }}'
                            }
                        }
                    }
                });
            @endforeach
        @endisset

        // Grafik untuk Dokumen Akuntansi
        @isset($dokumenAkuntansiCharts)
            @foreach($dokumenAkuntansiCharts as $idDokumenAkuntansi => $statusAkuntansiCounts)
                var ctxAkuntansi{{ $idDokumenAkuntansi }} = document.getElementById('statusChartAkuntansi_{{ $idDokumenAkuntansi }}').getContext('2d');
                new Chart(ctxAkuntansi{{ $idDokumenAkuntansi }}, {
                    type: 'pie',
                    data: {
                        labels: ['Pending', 'Disetujui', 'Ditolak'],
                        datasets: [{
                            data: [
                                {{ $statusAkuntansiCounts['Pending'] }},
                                {{ $statusAkuntansiCounts['Disetujui'] }},
                                {{ $statusAkuntansiCounts['Ditolak'] }}
                            ],
                            backgroundColor: [
                                'rgba(255, 205, 86, 0.2)', // Pending
                                'rgba(75, 192, 192, 0.2)',  // Disetujui
                                'rgba(255, 99, 132, 0.2)'   // Ditolak
                            ],
                            borderColor: [
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Status Dokumen Akuntansi ID: {{ $idDokumenAkuntansi }}'
                            }
                        }
                    }
                });
            @endforeach
        @endisset

        // Grafik untuk Dokumen Pajak
        @isset($dokumenPajakCharts)
            @foreach($dokumenPajakCharts as $idDokumenPajak => $statusPajakCounts)
                var ctxPajak{{ $idDokumenPajak }} = document.getElementById('statusChartPajak_{{ $idDokumenPajak }}').getContext('2d');
                new Chart(ctxPajak{{ $idDokumenPajak }}, {
                    type: 'pie',
                    data: {
                        labels: ['Pending', 'Disetujui', 'Ditolak'],
                        datasets: [{
                            data: [
                                {{ $statusPajakCounts['Pending'] }},
                                {{ $statusPajakCounts['Disetujui'] }},
                                {{ $statusPajakCounts['Ditolak'] }}
                            ],
                            backgroundColor: [
                                'rgba(255, 205, 86, 0.2)', // Pending
                                'rgba(75, 192, 192, 0.2)',  // Disetujui
                                'rgba(255, 99, 132, 0.2)'   // Ditolak
                            ],
                            borderColor: [
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Status Dokumen Pajak ID: {{ $idDokumenPajak }}'
                            }
                        }
                    }
                });
            @endforeach
        @endisset

        // Grafik untuk Dokumen Proyek
        @isset($dokumenProyekCharts)
            @foreach($dokumenProyekCharts as $idDokumenProyek => $statusProyekCounts)
                var ctxProyek{{ $idDokumenProyek }} = document.getElementById('statusChartProyek_{{ $idDokumenProyek }}').getContext('2d');
                new Chart(ctxProyek{{ $idDokumenProyek }}, {
                    type: 'pie',
                    data: {
                        labels: ['Pending', 'Disetujui', 'Ditolak'],
                        datasets: [{
                            data: [
                                {{ $statusProyekCounts['Pending'] }},
                                {{ $statusProyekCounts['Disetujui'] }},
                                {{ $statusProyekCounts['Ditolak'] }}
                            ],
                            backgroundColor: [
                                'rgba(255, 205, 86, 0.2)', // Pending
                                'rgba(75, 192, 192, 0.2)',  // Disetujui
                                'rgba(255, 99, 132, 0.2)'   // Ditolak
                            ],
                            borderColor: [
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: 'Status Dokumen Proyek ID: {{ $idDokumenProyek }}'
                            }
                        }
                    }
                });
            @endforeach
        @endisset
    });
</script>

<?php
use App\Models\LaporanProyekDetails;
$jumlahDitolak = LaporanProyekDetails::where('status', 2)->count();
?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menambahkan event listener pada semua elemen dengan kelas 'link-laporan'
        document.querySelectorAll('.link-laporan').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();  // Menghindari aksi default (misalnya pengalihan otomatis)

                // Mengambil ID laporan keuangan dari atribut 'data-id' tombol
                const idLaporan = item.getAttribute('data-id');
                
                // Menyusun URL untuk pengalihan berdasarkan ID
                const url = `/sub-detail-laporan-keuangan/${idLaporan}`;
                
                // Mengalihkan pengguna ke halaman yang sesuai dengan ID
                window.location.href = url;
            });
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        Chart.register(ChartDataLabels);

        var progressChart, bimChart;

        // Function to create Progress Chart
        function createProgressChart(data) {
            if (progressChart) {
                progressChart.destroy();
            }
            progressChart = Highcharts.chart('pie-chart-progress-proyek', {
                chart: {
                    type: 'pie',
                    backgroundColor: 'transparent'
                },
                title: {
                    text: 'Progress Proyek',
                    style: {
                        display: 'none'
                    }
                },
                tooltip: {
                    useHTML: true,
                    pointFormat: '<b>{point.name}</b>: {point.y} proyek',
                    followPointer: true
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        innerSize: '50%'
                    }
                },
                series: [{
                    name: 'Proyek',
                    colorByPoint: true,
                    data: data
                }],
                credits: {
                    enabled: false
                }
            });
        }

        // Function to create BIM Status Chart
        function createBIMChart(data) {
            var ctx = document.getElementById('pie-chart-status-implementasi-bim').getContext('2d');
            if (bimChart) {
                bimChart.destroy(); // Destroy the previous chart if exists
            }
            bimChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Bukan Prioritas', 'Prioritas 1', 'Prioritas 2', 'Prioritas 3'],
                    datasets: [{
                        data: data,
                        backgroundColor: ['#FF6384', '#FFCE56', '#36A2EB', '#4BC0C0'] // Colors for each segment
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                pointStyle: 'circle',
                                boxWidth: 6,
                                boxHeight: 6,
                                font: {
                                    size: 10
                                },
                                padding: 5
                            }
                        },
                        tooltip: { enabled: true },
                        datalabels: {
                            formatter: (value, context) => {
                                let total = context.dataset.data.reduce((acc, val) => acc + val, 0);
                                let percentage = (value / total * 100).toFixed(2) + '%';
                                return percentage;
                            },
                            color: '#fff'
                        }
                    }
                }
            });
        }

        // Function to update the table for Progress Proyek
        function updateProgressTable(selectedProyek) {
            const tbody = document.querySelector('#progressTable tbody');
            tbody.innerHTML = ''; // Clear the table content

            let no = 1;
            if (selectedProyek && Array.isArray(selectedProyek)) {
                selectedProyek.forEach(item => {
                    tbody.insertAdjacentHTML('beforeend', `
                        <tr>
                            <td>${no++}</td>
                            <td>${item.nama_proyek}</td>
                            <td>${item.realisasi.toFixed(2)}%</td>
                        </tr>
                    `);
                });
            } else {
                // Tampilkan semua proyek jika selectedProyek kosong (all proyek)
                @isset($daftarProyek)
                    @foreach ($daftarProyek as $item)
                        tbody.insertAdjacentHTML('beforeend', `
                            <tr>
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$item->nama_proyek}}</td>
                                <td>{{ number_format($item->realisasi, 2) }}%</td>
                            </tr>
                        `);
                    @endforeach
                @endisset
            }
        }

// Function to update the table for RKP Proyek
function updateRkpTable(selectedProyek) {
    const tbody = document.querySelector('#basic-table tbody');
    tbody.innerHTML = ''; // Clear the table content
    
    let no = 1;
    if (selectedProyek && Array.isArray(selectedProyek)) {
        selectedProyek.forEach(item => {
            tbody.insertAdjacentHTML('beforeend', `
                <tr>
                    <td>${no++}</td>
                    <td>${item.nama_proyek}</td>
                    <td class="text-center">
                        ${item.review1 == 1 ? 
                            `<span class="btn-inner"><svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path></svg></span>` 
                            : 
                            `<span class="btn-inner"><svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path></svg></span>`
                        }
                    </td>
                    <td class="text-center">
                        ${item.review2 == 1 ? 
                            `<span class="btn-inner"><svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path></svg></span>` 
                            : 
                            `<span class="btn-inner"><svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path></svg></span>`
                        }
                    </td>
                </tr>
            `);
        });
    } else {
        @isset($daftarRkp)
        // Jika selectedProyek kosong, tampilkan semua proyek
        // Pastikan data semua proyek tersedia di `allProyek` dalam bentuk array
            const allProyek = {!! json_encode($daftarRkp) !!};  // Menggunakan Laravel Blade untuk encode data PHP ke JavaScript

            allProyek.forEach(item => {
                tbody.insertAdjacentHTML('beforeend', `
                    <tr>
                        <td>${no++}</td>
                        <td>${item.nama_proyek}</td>
                        <td class="text-center">
                            ${item.review1 == 1 ? 
                                `<span class="btn-inner"><svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path></svg></span>` 
                                : 
                                `<span class="btn-inner"><svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path></svg></span>`
                            }
                        </td>
                        <td class="text-center">
                            ${item.review2 == 1 ? 
                                `<span class="btn-inner"><svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path></svg></span>` 
                                : 
                                `<span class="btn-inner"><svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path></svg></span>`
                            }
                        </td>
                    </tr>
                `);
            });
        @endisset
    }
}


        // Event listener for the dropdown
        document.getElementById('projectSelect').addEventListener('change', function () {
            var selectedOption = this.options[this.selectedIndex];

            // Ambil data terkait proyek yang dipilih
            var progress = JSON.parse(selectedOption.getAttribute('data-progress'));
            var bimData = JSON.parse(selectedOption.getAttribute('data-bim'));
    
            var proyekData = JSON.parse(selectedOption.getAttribute('data-proyek')) || [];
            var dokumen = parseInt(selectedOption.getAttribute('data-dokumen')) || 1;
        
            
    
            // Update Progress Chart
            createProgressChart([
                { name: '0 - 20%', y: progress['0-20'], color: '#FF6384' },
                { name: '20 - 50%', y: progress['20-50'], color: '#FFCE56' },
                { name: '50 - 70%', y: progress['50-70'], color: '#36A2EB' },
                { name: '70 - 99.99%', y: progress['70-99'], color: '#4BC0C0' },
                { name: '100%', y: progress['100'], color: '#000080' }
            ]);

            // Data for Status Implementasi BIM chart
        
            // Data for Status Implementasi BIM chart
            const selectedBimData = (selectedOption.value === "all") 
                ? bimData 
                : bimData.map((value, index) => (value > 0 ? 100 : 0));

            // Update BIM chart
            createBIMChart(selectedBimData);

            // Update Progress Proyek table with selected project data
            const selectedProyek = (selectedOption.value === "all") ? null : [proyekData]; // Jika "all", tampilkan semua proyek; jika tidak, tampilkan proyek yang dipilih
            updateProgressTable(selectedProyek);
            updateRkpTable(selectedProyek); 
            // Update bar charts with the new data (if needed)
            createBarCharts(proyekData, dokumen);
        });

        // Initial chart and table updates when the page loads
        @isset($persen_0_20)
            createProgressChart([
                { name: '0 - 20%', y: {{ $persen_0_20 }}, color: '#64b5f6' },
                { name: '20 - 50%', y: {{ $persen_20_50 }}, color: '#f66d00' },
                { name: '50 - 70%', y: {{ $persen_50_70 }}, color: '#1565c0' },
                { name: '70 - 99.99%', y: {{ $persen_70_99 }}, color: '#388e3c' },
                { name: '100%', y: {{ $persen_100 }}, color: '#388e3c' }
            ]);
        @endisset

        @isset($bukanPrioritas, $prioritas1, $prioritas2, $prioritas3)
            createBIMChart([ 
                {{ $bukanPrioritas }},
                {{ $prioritas1 }},
                {{ $prioritas2 }},
                {{ $prioritas3 }}
            ]);
        @endisset

        // Initial data load for the tables
        updateProgressTable(null);
        updateRkpTable(null); // Update table initially with all 
        

    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');
        const keywordSelect = document.getElementById('keyword');
        let calendar;

        // Fungsi untuk memuat data agenda dari server
        function loadData(url) {
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    if (data) {
                        let agenda = [];
                        data.forEach(function(item) {
                            // Ambil tanggal acara
                            let eventDate = moment(item.tanggal_kegiatan, 'YYYY-MM-DD HH:mm:ss');
                            let twoDaysBefore = moment(item.tanggal_kegiatan).subtract(2, 'days');
                            let currentDate = moment();

                            // Cek apakah saat ini dalam rentang H-2 hingga tanggal acara
                            if (currentDate.isBetween(twoDaysBefore, eventDate, 'days', '[]')) {
                                // Tampilkan modal pop-up jika dalam rentang waktu
                                let modalContent = '<p>Agenda: ' + item.nama_kegiatan + '</p>';
                                modalContent += '<p>Tanggal: ' + moment(item.tanggal_kegiatan).format('YYYY-MM-DD') + '</p>';
                                $('#modalAgendaDetail').html(modalContent);
                                $('#agendaModal').modal('show');
                            }

                            agenda.push({
                                title: moment(item.tanggal_kegiatan).format('HH:mm') + ' ' + item.nama_kegiatan,
                                start: eventDate.format('YYYY-MM-DD'),
                                backgroundColor: 'rgba(58,87,232,0.2)',
                                textColor: 'rgba(58,87,232,1)',
                                borderColor: 'rgba(58,87,232,1)'
                            });
                        });

                        // Menambahkan agenda ke kalender
                        calendar.addEventSource(agenda);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        // Inisialisasi Kalender
        calendar = new FullCalendar.Calendar(calendarEl, {
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: [], // Menampung data event
        });
        calendar.render();

        // Panggil loadData untuk pertama kali
        loadData('/getAgenda');

        // Event listener untuk perubahan nilai pada elemen <select>
        keywordSelect.addEventListener('change', function () {
            const selectedValue = keywordSelect.value;
            let url = selectedValue ? '/getAgenda/' + selectedValue : '/getAgenda';
            // Memuat data kalender berdasarkan proyek yang dipilih
            loadData(url);
        });
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('calendar2');
    const keywordSelect = document.getElementById('keyword');
    let calendar2;

    function loadData(url) {
        $.ajax({
            type: 'GET',
            url: url,
            success: function(data) {
                if (data) {
                    let pelatihan = data.map(item => {
                        let eventDate = moment(item.tanggal_kegiatan, 'YYYY-MM-DD HH:mm:ss');

                        return {
                            title: moment(item.tanggal_kegiatan).format('HH:mm') + ' ' + item.nama_kegiatan,
                            start: eventDate.format('YYYY-MM-DD'),
                            backgroundColor: 'rgba(58,87,232,0.2)',
                            textColor: 'rgba(58,87,232,1)',
                            borderColor: 'rgba(58,87,232,1)',
                            extendedProps: {
                                nama_kegiatan: item.nama_kegiatan,
                                tanggal: moment(item.tanggal_kegiatan).format('YYYY-MM-DD')
                            }
                        };
                    });

                    calendar2.addEventSource(pelatihan);
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    calendar2 = new FullCalendar.Calendar(calendarEl, {
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: [],
        eventClick: function(info) {
            // Tampilkan modal popup dengan detail pelatihan
            let modalContent = '<p>Pelatihan: ' + info.event.extendedProps.nama_kegiatan + '</p>';
            modalContent += '<p>Tanggal: ' + info.event.extendedProps.tanggal + '</p>';
            $('#modalPelatihanDetail').html(modalContent);
            $('#pelatihanModal').modal('show');
        }
    });
    calendar2.render();

    // Panggil loadData untuk pertama kali
    loadData('/getPelatihan');

    // Event listener untuk perubahan nilai pada elemen <select>
    keywordSelect.addEventListener('change', function() {
        const selectedValue = keywordSelect.value;
        let url = selectedValue ? '/getPelatihan/' + selectedValue : '/getPelatihan';
        // Memuat data kalender berdasarkan proyek yang dipilih
        loadData(url);
    });
});
</script>

<script>

      // Inisialisasi untuk Pie Chart Lisensi Software
      if (document.querySelectorAll("#pie-chart-software-1").length) {
          var chartElement = document.getElementById('pie-chart-software-1');
          var val1 = parseInt(chartElement.getAttribute('val1'));
          var val2 = parseInt(chartElement.getAttribute('val2'));

          var options = {
              chart: {
                  height: 300,
                  type: "pie"
              },
              labels: ['Lisensi Full', 'Lisensi Lain-lain'],
              series: [val1, val2],
              colors: ["#BA440A", "#F69433"],
              legend: {
                  position: "bottom"
              }
          };

          if (typeof ApexCharts !== 'undefined') {
              new ApexCharts(chartElement, options).render();
          }
      }

      if (document.querySelectorAll("#pie-chart-software-2").length) {
          var chartElement = document.getElementById('pie-chart-software-2');
          var val1 = parseInt(chartElement.getAttribute('val1'));
          var val2 = parseInt(chartElement.getAttribute('val2'));

          var options = {
              chart: {
                  height: 300,
                  type: "pie"
              },
              labels: ['Software Engineering', 'Software Lain'],
              series: [val1, val2],
              colors: ["#0971A7", "#010642"],
              legend: {
                  position: "bottom"
              }
          };

          if (typeof ApexCharts !== 'undefined') {
              new ApexCharts(chartElement, options).render();
          }
      }

      if (document.querySelectorAll("#pie-chart-software-3").length) {
          var chartElement = document.getElementById('pie-chart-software-3');
          var val1 = parseInt(chartElement.getAttribute('val1'));
          var val2 = parseInt(chartElement.getAttribute('val2'));

          var options = {
              chart: {
                  height: 300,
                  type: "pie"
              },
              labels: ['Software Office', 'Software Lain'],
              series: [val1, val2],
              colors: ["#39E8B0", "#039C69"],
              legend: {
                  position: "bottom"
              }
          };

          if (typeof ApexCharts !== 'undefined') {
              new ApexCharts(chartElement, options).render();
          }
      }
</script>


<script>
    $(document).ready(function() {
        function setEqualHeight() {
            var maxHeight = 0;

            // Reset height
            $('.equal-height').css('height', 'auto');

            // Cari tinggi maksimum
            $('.equal-height').each(function() {
                var thisHeight = $(this).outerHeight();
                if (thisHeight > maxHeight) {
                    maxHeight = thisHeight;
                }
            });

            // Set semua kotak dengan tinggi yang sama
            $('.equal-height').css('height', maxHeight + 'px');
        }

        // Panggil fungsi saat dokumen siap
        setEqualHeight();

        // Jika Anda menggunakan AOS atau efek animasi lainnya, pastikan untuk mengatur ulang setelah animasi selesai
        AOS.init({
            duration: 800,
            easing: 'slide',
            once: true,
            mirror: false,
            complete: setEqualHeight
        });

        // Panggil ulang saat jendela diubah ukurannya
        $(window).resize(function() {
            setEqualHeight();
        });
    });
</script>

<script>
    var myChart = echarts.init(document.getElementById('chart-productivity-rate-mixed'));

    // Data example from Laravel
    var xData = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    var productivityData = [
        parseFloat("{{ $productivityJan ?? 0 }}"), 
        parseFloat("{{ $productivityFeb ?? 0 }}"), 
        parseFloat("{{ $productivityMar ?? 0 }}"), 
        parseFloat("{{ $productivityApr ?? 0 }}"), 
        parseFloat("{{ $productivityMei ?? 0 }}"), 
        parseFloat("{{ $productivityJun ?? 0 }}"), 
        parseFloat("{{ $productivityJul ?? 0 }}"), 
        parseFloat("{{ $productivityAug ?? 0 }}"), 
        parseFloat("{{ $productivitySep ?? 0 }}"), 
        parseFloat("{{ $productivityOct ?? 0 }}"), 
        parseFloat("{{ $productivityNov ?? 0 }}"), 
        parseFloat("{{ $productivityDes ?? 0 }}")
    ]; // Ganti dengan data Anda

    var targetData = [80, 85, 90, 80, 85, 90, 95, 90, 92, 93, 94, 95]; // Data target yang dapat diubah sesuai kebutuhan

    var option = {
        title: {
            text: 'Productivity Rate',
            left: 'center',
            top: '20px',
            textStyle: {
                color: '#000',
                fontSize: 18
            }
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['Productivity', 'Target'],
            bottom: '5%'
        },
        xAxis: {
            type: 'category',
            data: xData,
            axisLabel: {
                color: '#000'
            }
        },
        yAxis: {
            type: 'value',
            axisLabel: {
                color: '#000'
            },
            splitLine: {
                show: false
            }
        },
        series: [
            {
                name: 'Productivity',
                type: 'bar',
                itemStyle: {
                    color: {
                        type: 'linear',
                        x: 0,
                        y: 0,
                        x2: 0,
                        y2: 1,
                        colorStops: [
                            { offset: 0, color: 'rgba(64, 224, 208, 1)' }, // Gradient color start
                            { offset: 1, color: 'rgba(0, 191, 165, 1)' } // Gradient color end
                        ],
                        global: false // false by default
                    },
                    barBorderRadius: [10, 10, 0, 0], // Rounded corners
                },
                data: productivityData
            },
            {
                name: 'Target',
                type: 'line',
                smooth: true,
                symbol: 'circle',
                symbolSize: 10,
                itemStyle: {
                    color: 'rgba(128, 148, 212, 1)',
                },
                lineStyle: {
                    width: 2,
                    color: 'rgba(128, 148, 212, 1)',
                },
                data: targetData
            }
        ],
    };

    myChart.setOption(option);
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Chart for bar-chart-new-1
    if (document.querySelectorAll('#bar-chart-new-1').length) {
        var chartElement = document.getElementById('bar-chart-new-1');
        var proyekData = JSON.parse(chartElement.getAttribute('proyek'));
        var dokumen = parseInt(chartElement.getAttribute('dokumen'));

        var categories = [];
        var filePdf = [];
        var fileNative = [];
        proyekData.forEach(function(item) {
            categories.push(item.nama_proyek);
            filePdf.push(Math.round(item.pdf_utama / dokumen * 100));
            fileNative.push(Math.round(item.native_utama / dokumen * 100));
        });

        var ctx1 = document.getElementById('bar-chart-new-1').getContext('2d');
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: categories,
                datasets: [
                    {
                        label: 'File PDF',
                        data: filePdf,
                        backgroundColor: '#FF6600'
                    },
                    {
                        label: 'File Native',
                        data: fileNative,
                        backgroundColor: '#009EA9'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw + ' %';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Proyek'
                        },
                        ticks: {
                            color: '#8A92A6'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Persentase'
                        },
                        ticks: {
                            color: '#8A92A6',
                            callback: function(value) { return value + '%'; }
                        },
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    }

    // Chart for bar-chart-new-2
    if (document.querySelectorAll('#bar-chart-new-2').length) {
        var chartElement = document.getElementById('bar-chart-new-2');
        var proyekData = JSON.parse(chartElement.getAttribute('proyek'));
        var dokumen = parseInt(chartElement.getAttribute('dokumen'));

        var categories = [];
        var filePdf = [];
        var fileNative = [];
        proyekData.forEach(function(item) {
            categories.push(item.nama_proyek);
            filePdf.push(Math.round(item.pdf_pendukung / dokumen * 100));
            fileNative.push(Math.round(item.native_pendukung / dokumen * 100));
        });

        var ctx2 = document.getElementById('bar-chart-new-2').getContext('2d');
        new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: categories,
                datasets: [
                    {
                        label: 'File PDF',
                        data: filePdf,
                        backgroundColor: '#FF6600'
                    },
                    {
                        label: 'File Native',
                        data: fileNative,
                        backgroundColor: '#009EA9'
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'top' },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw + ' %';
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Proyek'
                        },
                        ticks: {
                            color: '#8A92A6'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Persentase'
                        },
                        ticks: {
                            color: '#8A92A6',
                            callback: function(value) { return value + '%'; }
                        },
                        beginAtZero: true,
                        max: 100
                    }
                }
            }
        });
    }
});
</script>

<script>
 document.addEventListener('DOMContentLoaded', function() {
    @isset($topThreeAkhlak)
        var ctx = document.getElementById('akhlakChart').getContext('2d');

        var labels = @json($topThreeAkhlak->pluck('nama_user')); // Ambil nama Akhlak
        var dataValues = @json($topThreeAkhlak->pluck('total_nilai')); // Ambil total nilai Akhlak
        
        // Cek jika semua nilai adalah 0
        var isZeroData = @json($isZeroData); // Ambil nilai dari controller

        if (isZeroData) {
            // Menyembunyikan chart dan menampilkan pesan atau gambar sedih
            document.querySelector('#akhlakChart').style.display = 'none';
            var sadMessage = `
                <div class="empty-chart-message text-center">
                    <img src="{{ asset('images/sad_face.png') }}" alt="Sad Face" class="sad-face-img">
                    <p>Data Akhlak belum tersedia atau semua nilai masih 0.</p>
                </div>
            `;
            document.querySelector('.mt-4').innerHTML = sadMessage; // Ganti dengan pesan sedih
        } else {
            // Data untuk chart
            var data = {
                labels: labels,
                datasets: [{
                    label: 'Total Nilai Akhlak',
                    data: dataValues,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            };

            // Opsi konfigurasi untuk chart
            var config = {
    type: 'bar',
    data: data,
    options: {
        responsive: true, // Tetap diaktifkan untuk membuat chart responsif
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return 'Nilai: ' + tooltipItem.raw;
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    // Mengatur tinggi minimum label pada sumbu y agar bar lebih kecil
                    stepSize: 1,
                    padding: 5 // Jarak antar label dan bar
                }
            },
            x: {
                ticks: {
                    padding: 10 // Jarak antar label dan bar
                }
            }
        }
    }
};


            // Inisialisasi chart
            var myChart = new Chart(ctx, config);
        }
    @endisset
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inisialisasi selectpicker dengan teks kustom
        $('#id_pic').selectpicker({
            noneSelectedText: '-- Pilih --', // Mengganti teks 'Nothing selected' menjadi '-- Pilih --'
            deselectAllText: 'Hapus Semua',
            selectAllText: 'Pilih Semua',
            liveSearchPlaceholder: 'Cari PIC...',
        });
    });
</script>





  </body>
</html>