<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infrastructure 2 Division| {{ $subTitle }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('image/WIDER.png') }}" />
    <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>

    <!-- select2 -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" integrity="sha512-ARJR74swou2y0Q2V9k0GbzQ/5vJ2RBSoCWokg4zkfM29Fb3vZEQyv0iWBMW/yvKgyHSR/7D64pFMmU8nYmbRkg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{ asset('template/html/assets/vendor/bootstrap-select/css/bootstrap-select.min.css') }}" /> --}}
    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/core/libs.min.css') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/vendor/aos/dist/aos.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/hope-ui.min.css?v=1.2.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/custom.min.css?v=1.2.0') }}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/dark.min.css') }}" />

    <link rel="stylesheet" href="{{ asset('template/html/assets/css/tabel.css') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/customizer.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ asset('template/html/assets/css/rtl.min.css') }}" />

    <!-- Fullcalender CSS -->
    <link rel='stylesheet' href='{{ asset('template/html/assets/vendor/fullcalendar/core/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('template/html/assets/vendor/fullcalendar/daygrid/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('template/html/assets/vendor/fullcalendar/timegrid/main.css') }}' />
    <link rel='stylesheet' href='{{ asset('template/html/assets/vendor/fullcalendar/list/main.css') }}' />

   <style>
        body {
        font-family: 'Open Sans', sans-serif;
    }

   </style>

   {{-- ckediotr --}}
   {{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script> --}}
   <script>

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

<body class="  ">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body"></div>
        </div>
    </div>
    <!-- loader END -->

    {{-- sidebar --}}
    @include('layout.sidebar')

    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="#" class="navbar-brand">
                        <!--Logo start-->
                        <!--logo End-->
                        <h4 class="logo-title">Infra 2 Division</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" height="20px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <span class="mt-2 navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="@if ($user->foto_user === null) {{ asset('foto_user/default1.jpg') }} @else {{ asset('foto_user/' . $user->foto_user) }} @endif"
                                        alt="User-Profile"
                                        class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">{{ $user->nama_user }}</h6>
                                        <p class="mb-0 caption-sub-title">{{ $user->role }}</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a href="/profil" class="dropdown-item" href="#">Profil</a>
                                    </li>
                                    <li>
                                        <a href="/ubah-password" class="dropdown-item" href="#">Ubah Password</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#logout">Logout</button></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    @if ($subTitle === 'Dashboard')
                                        <h1>Hello, {{ $user->nama_user }}
                                        </h1>
                                        <p>Selamat Datang Di Website Monitoring Dashboard Infrastructure 2 Division.</p>
                                    @else
                                        <h1>{{ $subTitle }}</h1>
                                        <p>Silahkan Jelajahi {{ $subTitle }}.</p>
                                    @endif
                                </div>
                                <div>
                                    <a href="" class="btn btn-link btn-soft-light">
                                        @if ($title === null)
                                            {{ $subTitle }}
                                        @else
                                            {{ $title }} / {{ $subTitle }}
                                        @endif
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{ asset('template/html/assets/images/dashboard/top-header.png') }}" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ asset('template/html/assets/images/dashboard/top-header1.png') }}" alt="header"
                        class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ asset('template/html/assets/images/dashboard/top-header2.png') }}" alt="header"
                        class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ asset('template/html/assets/images/dashboard/top-header3.png') }}" alt="header"
                        class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ asset('template/html/assets/images/dashboard/top-header4.png') }}" alt="header"
                        class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ asset('template/html/assets/images/dashboard/top-header5.png') }}" alt="header"
                        class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">

            {{-- content --}}
            @yield('content')

        </div>
        {{-- <div class="btn-download">
          <a class="btn btn-danger px-3 py-2" href="https://iqonic.design/product/admin-templates/hope-ui-admin-free-open-source-bootstrap-admin-template/" target="_blank" >
              <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M5.91064 20.5886C5.91064 19.7486 6.59064 19.0686 7.43064 19.0686C8.26064 19.0686 8.94064 19.7486 8.94064 20.5886C8.94064 21.4186 8.26064 22.0986 7.43064 22.0986C6.59064 22.0986 5.91064 21.4186 5.91064 20.5886ZM17.1606 20.5886C17.1606 19.7486 17.8406 19.0686 18.6806 19.0686C19.5106 19.0686 20.1906 19.7486 20.1906 20.5886C20.1906 21.4186 19.5106 22.0986 18.6806 22.0986C17.8406 22.0986 17.1606 21.4186 17.1606 20.5886Z" fill="currentColor"></path>
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1907 6.34909C20.8007 6.34909 21.2007 6.55909 21.6007 7.01909C22.0007 7.47909 22.0707 8.13909 21.9807 8.73809L21.0307 15.2981C20.8507 16.5591 19.7707 17.4881 18.5007 17.4881H7.59074C6.26074 17.4881 5.16074 16.4681 5.05074 15.1491L4.13074 4.24809L2.62074 3.98809C2.22074 3.91809 1.94074 3.52809 2.01074 3.12809C2.08074 2.71809 2.47074 2.44809 2.88074 2.50809L5.26574 2.86809C5.60574 2.92909 5.85574 3.20809 5.88574 3.54809L6.07574 5.78809C6.10574 6.10909 6.36574 6.34909 6.68574 6.34909H20.1907ZM14.1307 11.5481H16.9007C17.3207 11.5481 17.6507 11.2081 17.6507 10.7981C17.6507 10.3781 17.3207 10.0481 16.9007 10.0481H14.1307C13.7107 10.0481 13.3807 10.3781 13.3807 10.7981C13.3807 11.2081 13.7107 11.5481 14.1307 11.5481Z" fill="currentColor"></path>
              </svg>
          </a>
      </div> --}}
        <!-- Footer Section Start -->
        <footer class="footer">
            <div class="footer-body">
                <ul class="left-panel list-inline mb-0 p-0">
                    <li class="list-inline-item"><a href="#">PT. Wijaya Karya (Persero) Tbk</a></li>
                </ul>
                <div class="right-panel">
                    ©
                    <script>
                        document.write(new Date().getFullYear())
                    </script> Designed Infra Wika
                </div>
            </div>
        </footer>

        <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin akan logout ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <a href="/logout" type="button" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- Library Bundle Script -->
        <script src="{{ asset('template/html/assets/js/core/libs.min.js') }}"></script>

        <!-- External Library Bundle Script -->
        <script src="{{ asset('template/html/assets/js/core/external.min.js') }}"></script>

        <!-- Widgetchart Script -->
        <script src="{{ asset('template/html/assets/js/charts/widgetcharts.js') }}"></script>

        <!-- mapchart Script -->
        <script src="{{ asset('template/html/assets/js/charts/vectore-chart.js') }}"></script>
        <script src="{{ asset('template/html/assets/js/charts/dashboard.js') }}"></script>

        <!-- fslightbox Script -->
        <script src="{{ asset('template/html/assets/js/plugins/fslightbox.js') }}"></script>

        <!-- Settings Script -->
        <script src="{{ asset('template/html/assets/js/plugins/setting.js') }}"></script>

        <!-- Slider-tab Script -->
        <script src="{{ asset('template/html/assets/js/plugins/slider-tabs.js') }}"></script>

        <!-- Form Wizard Script -->
        <script src="{{ asset('template/html/assets/js/plugins/form-wizard.js') }}"></script>

        <!-- AOS Animation Plugin-->
        <script src="{{ asset('template/html/assets/vendor/aos/dist/aos.js') }}"></script>

        <!-- App Script -->
        <script src="{{ asset('template/html/assets/js/hope-ui.js') }}" defer></script>

        {{-- ckeditor --}}
        <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

        <!-- Fullcalender Javascript -->
        <script src='{{ asset('template/html/assets/vendor/fullcalendar/daygrid/main.js') }}'></script>
        <script src='{{ asset('template/html/assets/vendor/fullcalendar/core/main.js') }}'></script>
        <script src='{{ asset('template/html/assets/vendor/fullcalendar/timegrid/main.js') }}'></script>
        <script src='{{ asset('template/html/assets/vendor/fullcalendar/list/main.js') }}'></script>
        <script src='{{ asset('template/html/assets/vendor/fullcalendar/interaction/main.js') }}'></script>
        <script src='{{ asset('template/html/assets/vendor/moment.min.js') }}'></script>
        <script src='{{ asset('template/html/assets/js/plugins/calender.js') }}'></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" integrity="sha512-yDlE7vpGDP7o2eftkCiPZ+yuUyEcaBwoJoIhdXv71KZWugFqEphIS3PU60lEkFaz8RxaVsMpSvQxMBaKVwA5xg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            const editor1 = document.getElementById('editor1');
            if (editor1) {
                $(function() {
                  // Replace the <textarea id="editor1"> with a CKEditor
                  // instance, using default configuration.
                  CKEDITOR.replace('editor1')
                  //bootstrap WYSIHTML5 - text editor
                  $('.textarea').wysihtml5()
                })
                $(function() {
                  // Replace the <textarea id="editor1"> with a CKEditor
                  // instance, using default configuration.
                  CKEDITOR.replace('editor2')
                  //bootstrap WYSIHTML5 - text editor
                  $('.textarea').wysihtml5()
                })
            }
          </script>

        {{-- chart --}}
        <script>

            // LINE ROLL CHART
            if (document.querySelectorAll('#chart-roll-1').length) {
              var chartElement = document.getElementById('chart-roll-1');
              var val1 = chartElement.getAttribute('val1');
              var val2 = chartElement.getAttribute('val2');
              const options = {
                series: [val1, val2],
                chart: {
                height: 230,
                type: 'radialBar',
              },
              colors: ["#4bc7d2", "#3a57e8"],
              plotOptions: {
                radialBar: {
                  hollow: {
                      margin: 10,
                      size: "50%",
                  },
                  track: {
                      margin: 10,
                      strokeWidth: '50%',
                  },
                  dataLabels: {
                      show: false,
                  }
                }
              },
              labels: ['Apples', 'Oranges'],
              };
              if(ApexCharts !== undefined) {
                const chart = new ApexCharts(document.querySelector("#chart-roll-1"), options);
                chart.render();
                document.addEventListener('ColorChange', (e) => {
                    const newOpt = {colors: [e.detail.detail2, e.detail.detail1],}
                    chart.updateOptions(newOpt)

                })
              }
            }

            // BAR CHART
            if ($('#bar-chart-1').length) {
                var chartElement = document.getElementById('bar-chart-1');
                var proyekData = JSON.parse(chartElement.getAttribute('proyek'));
                var dokumen = parseInt(chartElement.getAttribute('dokumen'));

                var categories = [];
                var filePdf = [];
                var fileNative = [];
                proyekData.forEach(function(item) {
                    categories.push(item.nama_proyek);
                    filePdf.push(Math.round(item.pdf_utama / dokumen * 100, 2));
                    fileNative.push(Math.round(item.native_utama / dokumen * 100, 2));
                })

                const seriesData = [
                    {
                        name: 'File PDF',
                        data: filePdf
                    },
                    {
                        name: 'File Native',
                        data: fileNative
                    }
                ];

                const isWideChart = seriesData.reduce((total, series) => total + series.data.length, 0) > 20;

                const options = {
                    series: seriesData,
                    chart: {
                        type: 'bar',
                        height: 250,
                        width: isWideChart ? '250%' : '100%',
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            borderRadius: 5,
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        curve: 'smooth',
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: categories,
                    },
                    yaxis: {
                        title: {
                            text: '$ (%)'
                        }
                    },
                    fill: {
                        opacity: 1,
                        colors: ['#004899', '#0a72e9']
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return " " + val + ` %`
                            }
                        }
                    }
                };

                const chartContainer = document.querySelector("#bar-chart-1");

                const chart = new ApexCharts(chartContainer, options);
                chart.render();
            }

            if ($('#bar-chart-2').length) {
                var chartElement = document.getElementById('bar-chart-2');
                var proyekData = JSON.parse(chartElement.getAttribute('proyek'));
                var dokumen = parseInt(chartElement.getAttribute('dokumen'));

                var categories = [];
                var filePdf = [];
                var fileNative = [];
                proyekData.forEach(function(item) {
                    categories.push(item.nama_proyek);
                    filePdf.push(Math.round(item.pdf_pendukung / dokumen * 100, 2));
                    fileNative.push(Math.round(item.native_pendukung / dokumen * 100, 2));
                })

                const seriesData = [
                    {
                        name: 'File PDF',
                        data: filePdf
                    },
                    {
                        name: 'File Native',
                        data: fileNative
                    }
                ];

                const isWideChart = seriesData.reduce((total, series) => total + series.data.length, 0) > 20;

                const options = {
                    series: seriesData,
                    chart: {
                        type: 'bar',
                        height: 250,
                        width: isWideChart ? '250%' : '100%',
                        sparkline: {
                            enabled: true
                        }
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '55%',
                            borderRadius: 5,
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        curve: 'smooth',
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: categories,
                    },
                    yaxis: {
                        title: {
                            text: '$ (%)'
                        }
                    },
                    fill: {
                        opacity: 1,
                        colors: ['#004899', '#0a72e9']
                    },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return " " + val + ` %`
                            }
                        }
                    }
                };

                const chartContainer = document.querySelector("#bar-chart-2");

                const chart = new ApexCharts(chartContainer, options);
                chart.render();
            }

            if (document.querySelectorAll('#bar-chart-new-1').length) {

                var chartElement = document.getElementById('bar-chart-new-1');
                var proyekData = JSON.parse(chartElement.getAttribute('proyek'));
                var dokumen = parseInt(chartElement.getAttribute('dokumen'));

                var categories = [];
                var filePdf = [];
                var fileNative = [];
                proyekData.forEach(function(item) {
                    categories.push(item.nama_proyek);
                    filePdf.push(Math.round(item.pdf_utama / dokumen * 100, 2));
                    fileNative.push(Math.round(item.native_utama / dokumen * 100, 2));
                })

                const seriesData = [
                    {
                        name: 'File PDF',
                        data: filePdf
                    },
                    {
                        name: 'File Native',
                        data: fileNative
                    }
                ];

                const isWideChart = seriesData.reduce((total, series) => total + series.data.length, 0) > 10;

                const options = {
                series: seriesData,
                chart: {
                    type: 'bar',
                    height: 230,
                    width: isWideChart ? '300%' : '100%',
                    stacked: true,
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#FF6600', '#009EA9'],
                plotOptions: {
                    bar: {
                    horizontal: false,
                    columnWidth: '40%',
                    endingShape: 'rounded',
                    borderRadius: 5,
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: categories,
                    labels: {
                    minHeight: 20,
                    maxHeight: 20,
                    style: {
                        colors: "#8A92A6",
                    },
                    }
                },
                yaxis: {
                    title: {
                    text: ''
                    },
                    labels: {
                    minWidth: 19,
                    maxWidth: 19,
                    style: {
                        colors: "#8A92A6",
                    },
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                    formatter: function (val) {
                        return " " + val + " %"
                    }
                    }
                }
                };

                const chart = new ApexCharts(document.querySelector("#bar-chart-new-1"), options);
                chart.render();
                document.addEventListener('ColorChange', (e) => {
                const newOpt = { colors: [e.detail.detail1, e.detail.detail2], }
                chart.updateOptions(newOpt)
                })
            }

            if (document.querySelectorAll('#bar-chart-new-2').length) {

                var chartElement = document.getElementById('bar-chart-new-2');
                var proyekData = JSON.parse(chartElement.getAttribute('proyek'));
                var dokumen = parseInt(chartElement.getAttribute('dokumen'));

                var categories = [];
                var filePdf = [];
                var fileNative = [];
                proyekData.forEach(function(item) {
                    categories.push(item.nama_proyek);
                    filePdf.push(Math.round(item.pdf_pendukung / dokumen * 100, 2));
                    fileNative.push(Math.round(item.native_pendukung / dokumen * 100, 2));
                })

                const seriesData = [
                    {
                        name: 'File PDF',
                        data: filePdf
                    },
                    {
                        name: 'File Native',
                        data: fileNative
                    }
                ];

                const isWideChart = seriesData.reduce((total, series) => total + series.data.length, 0) > 20;

                const options = {
                series: seriesData,
                chart: {
                    type: 'bar',
                    height: 230,
                    width: isWideChart ? '300%' : '100%',
                    stacked: true,
                    toolbar: {
                    show: false
                    }
                },
                colors: ['#FF6600', '#009EA9'],
                plotOptions: {
                    bar: {
                    horizontal: false,
                    columnWidth: '40%',
                    endingShape: 'rounded',
                    borderRadius: 5,
                    },
                },
                legend: {
                    show: false
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    show: true,
                    width: 2,
                    colors: ['transparent']
                },
                xaxis: {
                    categories: categories,
                    labels: {
                        minHeight: 20,
                        maxHeight: 20,
                        style: {
                            colors: "#8A92A6",
                        },
                    }
                },
                yaxis: {
                    title: {
                        text: ''
                    },
                    labels: {
                        minWidth: 19,
                        maxWidth: 19,
                        style: {
                            colors: "#8A92A6",
                        },
                    }
                },
                fill: {
                    opacity: 1
                },
                tooltip: {
                    y: {
                    formatter: function (val) {
                        return " " + val + " %"
                    }
                    }
                }
                };

                const chart = new ApexCharts(document.querySelector("#bar-chart-new-2"), options);
                chart.render();
                document.addEventListener('ColorChange', (e) => {
                const newOpt = { colors: [e.detail.detail1, e.detail.detail2], }
                chart.updateOptions(newOpt)
                })
            }

            // PIE CHART
            if (document.querySelectorAll("#pie-chart-software-1").length) {
                var chartElement = document.getElementById('pie-chart-software-1');
                var val1 = parseInt(chartElement.getAttribute('val1'));
                var val2 = parseInt(chartElement.getAttribute('val2'));
                options = {
                    chart: {
                        height: 500,
                        type: "pie"
                    },
                    labels: ['1', '2'],
                    series: [val1, val2],
                    colors: ["#BA440A", "#F69433"],
                    legend: {
                        position: "bottom"
                    }
                };
                if(typeof ApexCharts !== undefined){
                    (chart = new ApexCharts(document.querySelector("#pie-chart-software-1"), options)).render()
                }
            }
            if (document.querySelectorAll("#pie-chart-software-2").length) {
                var chartElement = document.getElementById('pie-chart-software-2');
                var val1 = parseInt(chartElement.getAttribute('val1'));
                var val2 = parseInt(chartElement.getAttribute('val2'));
                options = {
                    chart: {
                        height: 500,
                        type: "pie"
                    },
                    labels: ['1', '2'],
                    series: [val1, val2],
                    colors: ["#0971A7", "#010642"],
                    legend: {
                        position: "bottom"
                    }
                };
                if(typeof ApexCharts !== undefined){
                    (chart = new ApexCharts(document.querySelector("#pie-chart-software-2"), options)).render()
                }
            }
            if (document.querySelectorAll("#pie-chart-software-3").length) {
                var chartElement = document.getElementById('pie-chart-software-3');
                var val1 = parseInt(chartElement.getAttribute('val1'));
                var val2 = parseInt(chartElement.getAttribute('val2'));
                options = {
                    chart: {
                        height: 500,
                        type: "pie"
                    },
                    labels: ['1', '2'],
                    series: [val1, val2],
                    colors: ["#39E8B0", "#039C69"],
                    legend: {
                        position: "bottom"
                    }
                };
                if(typeof ApexCharts !== undefined){
                    (chart = new ApexCharts(document.querySelector("#pie-chart-software-3"), options)).render()
                }
            }

            if (document.querySelectorAll("#pie-chart-progress-proyek").length) {
                var chartElement = document.getElementById('pie-chart-progress-proyek');
                var persen_0_30 = parseInt(chartElement.getAttribute('persen_0_30'));
                var persen_30_50 = parseInt(chartElement.getAttribute('persen_30_50'));
                var persen_50_70 = parseInt(chartElement.getAttribute('persen_50_70'));
                var persen_70_100 = parseInt(chartElement.getAttribute('persen_70_100'));
                options = {
                    chart: {
                        height: 350,
                        type: "pie"
                    },
                    labels: ["0 - 30 %", "30 - 50 %", "50 - 70 %", "70 - 100 %"],
                    series: [persen_0_30, persen_30_50, persen_50_70, persen_70_100],
                    colors: ["#64B5F6", "#388E3C", "#1565C0", "#F66D00"],
                    legend: {
                        position: "bottom"
                    }
                };
                if(typeof ApexCharts !== undefined){
                    (chart = new ApexCharts(document.querySelector("#pie-chart-progress-proyek"), options)).render()
                }
            }

            if (document.querySelectorAll('#chart-productivity-rate').length) {
                var chartElement = document.getElementById('chart-productivity-rate');
                var productivityJan = parseFloat(chartElement.getAttribute('productivityJan')).toFixed(2);
                var productivityFeb = parseFloat(chartElement.getAttribute('productivityFeb')).toFixed(2);
                var productivityMar = parseFloat(chartElement.getAttribute('productivityMar')).toFixed(2);
                var productivityApr = parseFloat(chartElement.getAttribute('productivityApr')).toFixed(2);
                var productivityMei = parseFloat(chartElement.getAttribute('productivityMei')).toFixed(2);
                var productivityJun = parseFloat(chartElement.getAttribute('productivityJun')).toFixed(2);
                var productivityJul = parseFloat(chartElement.getAttribute('productivityJul')).toFixed(2);
                var productivityAug = parseFloat(chartElement.getAttribute('productivityAug')).toFixed(2);
                var productivitySep = parseFloat(chartElement.getAttribute('productivitySep')).toFixed(2);
                var productivityOct = parseFloat(chartElement.getAttribute('productivityOct')).toFixed(2);
                var productivityNov = parseFloat(chartElement.getAttribute('productivityNov')).toFixed(2);
                var productivityDes = parseFloat(chartElement.getAttribute('productivityDes')).toFixed(2);

                const options = {
                series: [{
                    name: '',
                    data: [productivityJan, productivityFeb, productivityMar, productivityApr, productivityMei, productivityJun, productivityJul, productivityAug, productivitySep, productivityOct, productivityNov, productivityDes]
                }],
                chart: {
                    fontFamily: '"Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
                    height: 245,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    sparkline: {
                        enabled: false,
                    },
                },
                colors: ["#3a57e8"],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3,
                },
                yaxis: {
                    show: true,
                    labels: {
                        show: true,
                        minWidth: 19,
                        maxWidth: 19,
                        style: {
                            colors: "#8A92A6",
                        },
                        offsetX: -5,
                    },
                },
                legend: {
                    show: false,
                },
                xaxis: {
                    labels: {
                        minHeight: 22,
                        maxHeight: 22,
                        show: true,
                        style: {
                            colors: "#8A92A6",
                        },
                    },
                    lines: {
                        show: false  //or just here to disable only x axis grids
                    },
                    categories: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
                },
                grid: {
                    show: false,
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0,
                        gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: .4,
                        opacityTo: .1,
                        stops: [0, 50, 80],
                        colors: ["#3a57e8", "#4bc7d2"]
                    }
                },
                tooltip: {
                    enabled: true,
                    y: {
                        formatter: function (val) {
                            return `${val.toFixed(2)}%`;
                        }
                    }
                },
                };

                const chart = new ApexCharts(document.querySelector("#chart-productivity-rate"), options);
                chart.render();
                document.addEventListener('ColorChange', (e) => {
                console.log(e)
                const newOpt = {
                    colors: [e.detail.detail1, e.detail.detail2],
                    fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0,
                        gradientToColors: [e.detail.detail1, e.detail.detail2], // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: .4,
                        opacityTo: .1,
                        stops: [0, 50, 60],
                        colors: [e.detail.detail1, e.detail.detail2],
                    }
                    },
                }
                chart.updateOptions(newOpt)
                })
            }

            if (document.querySelectorAll("#pie-chart-status-implementasi-bim").length) {
                var chartElement = document.getElementById('pie-chart-status-implementasi-bim');
                var bukanPrioritas = parseInt(chartElement.getAttribute('bukanPrioritas'));
                var prioritas1 = parseInt(chartElement.getAttribute('prioritas1'));
                var prioritas2 = parseInt(chartElement.getAttribute('prioritas2'));
                var prioritas3 = parseInt(chartElement.getAttribute('prioritas3'));
                console.log(prioritas3);
                options = {
                    chart: {
                        height: 350,
                        type: "pie"
                    },
                    labels: ["Bukan Prioritas", "Prioritas 1", "Prioritas 2", "Prioritas 3"],
                    series: [bukanPrioritas, prioritas1, prioritas2, prioritas3],
                    colors: ["#64B5F6", "#388E3C", "#1565C0", "#F66D00"],
                    legend: {
                        position: "bottom"
                    }
                };
                if(typeof ApexCharts !== undefined){
                    (chart = new ApexCharts(document.querySelector("#pie-chart-status-implementasi-bim"), options)).render()
                }
            }
        </script>

        <script>
            // umum
            function readImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#load_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#preview_image').change(function() {
                readImage(this);
            })

            function readImage2(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#load_image_2').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('#preview_image_2').change(function() {
                readImage2(this);
            })
        </script>

        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(1500, 0).slideUp(1500, function() {
                    $(this).remove();
                });
            }, 6000);
        </script>

        <script>
            $(function() {
                $("#role").on("change", function() {
                    let role = $(this).val();
                    if (role == 'Head Office') {
                        $(".fungsi").append('<div class="form-group col-md-6 fungsi2">\
                            <label class="form-label" for="fungsi">Fungsi</label>\
                            <select name="fungsi" id="fungsi" class="form-control" required>\
                                <option value="" selected disabled>-- Pilih --</option>\
                                <option value="Design & Analysis")>Design & Analysis</option>\
                                <option value="BIM & Digitalization Engineering">BIM & Digitalization Engineering</option>\
                                <option value="System Engineering & Lean Construction">System Engineering & Lean Construction</option>\
                                <option value="Manager of Engineering">Manager of Engineering</option>\
                            </select>\
                        </div>');
                    } else {
                        $('#fungsi').closest('#fungsi').remove();
                        $('.fungsi2').closest('.fungsi2').remove();
                    }
                });
            });
        </script>

        <!-- Select2 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        {{-- <script>
            $(document).ready(function () {
                $("#jabatan").select2({
                    theme: 'bootstrap4',
                    placeholder: "-- Pilih --"
                });
            });
        </script> --}}

        <!-- Sebaiknya diletakkan di bagian bawah halaman sebelum tag </body> -->
        <script>
            // Fungsi untuk menangani pemilihan tanggal merah secara dinamis
            function handleDateSelection(elementId) {
                // Ambil elemen input date
                var dateInput = document.getElementById(elementId);

                // Buat elemen hidden untuk menyimpan daftar tanggal merah yang dipilih
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'holidays';
                hiddenInput.id = 'hiddenHolidays';

                // Tambahkan elemen hidden ke dalam formulir
                dateInput.parentNode.appendChild(hiddenInput);

                // Inisialisasi array untuk menyimpan tanggal merah yang dipilih
                var selectedDates = [];

                // Tambahkan event listener untuk menangani perubahan pada elemen input date
                dateInput.addEventListener('change', function() {
                    // Ambil nilai dari elemen input date
                    var selectedDate = dateInput.value;

                    // Periksa apakah tanggal sudah dipilih sebelumnya
                    if (!selectedDates.includes(selectedDate)) {
                        // Tambahkan tanggal ke dalam array
                        selectedDates.push(selectedDate);

                        // Update nilai elemen hidden dengan array tanggal yang dipilih
                        hiddenInput.value = selectedDates.join(',');
                    }
                });
            }

            // Panggil fungsi untuk menangani pemilihan tanggal merah di modal tambah
            handleDateSelection('holidays');
        </script>

        <script>
            // ================== MODAL DELETE
            document.addEventListener('DOMContentLoaded', function () {
                const deleteButtons = document.querySelectorAll('.btn-delete');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const deleteModalHref = this.getAttribute('data-href');
                        const deleteModalContent = this.getAttribute('data-content');

                        const existingModal = document.getElementById('deleteModal');
                        if (existingModal) {
                            existingModal.remove();
                        }

                        const modalHtml = `
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>${deleteModalContent}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="${deleteModalHref}" type="button" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        document.body.insertAdjacentHTML('beforeend', modalHtml);
                        $('#deleteModal').modal('show');
                    });
                });
            });
            // ================== END MODAL DELETE

            // ================== MODAL VERIFIKASI
            document.addEventListener('DOMContentLoaded', function () {
                const deleteButtons = document.querySelectorAll('.btn-verifikasi');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function () {
                        const verifikasiModalHref = this.getAttribute('data-href');
                        const verifikasiModalContent = this.getAttribute('data-content');
                        const title = this.getAttribute('data-title');

                        const existingModal = document.getElementById('verifikasiModal');
                        if (existingModal) {
                            existingModal.remove();
                        }

                        const modalHtml = `
                            <div class="modal fade" id="verifikasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">${title}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>${verifikasiModalContent}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <a href="${verifikasiModalHref}" type="button" class="btn btn-primary">Kirim</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;

                        document.body.insertAdjacentHTML('beforeend', modalHtml);
                        $('#verifikasiModal').modal('show');
                    });
                });
            });
            // ================== END MODAL VERIFIKASI
        </script>

        {{-- <script>
            const calendar2 = document.getElementById('calendar2')
            if (calendar2) {
                if (document.querySelectorAll('#calendar2').length) {
                    document.addEventListener('DOMContentLoaded', function () {
                        let calendarEl = document.getElementById('calendar2');

                        $.ajax({
                            type: 'GET',
                            url: '/getAgenda',
                            success: function(data) {
                                if (data) {
                                    console.log(data)
                                    let agenda = []
                                    data.forEach(function(item) {
                                        agenda.push({
                                            title: moment(item.tanggal_kegiatan, 'YYYY-MM-DD HH:mm:ss').format('HH:mm') + ' ' + item.nama_kegiatan,
                                            start: moment(item.tanggal_kegiatan, 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD'),
                                            backgroundColor: 'rgba(58,87,232,0.2)',
                                            textColor: 'rgba(58,87,232,1)',
                                            borderColor: 'rgba(58,87,232,1)'
                                        })
                                    })
                                    let calendar2 = new FullCalendar.Calendar(calendarEl, {
                                        selectable: true,
                                        plugins: ["timeGrid", "dayGrid", "list", "interaction"],
                                        timeZone: "Asia/Jakarta",
                                        defaultView: "dayGridMonth",
                                        contentHeight: "auto",
                                        eventLimit: true,
                                        dayMaxEvents: 4,
                                        header: {
                                            left: "prev,next today",
                                            center: "title",
                                            right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                                        },
                                        dateClick: function (info) {
                                            $('#schedule-start-date').val(info.dateStr)
                                            $('#schedule-end-date').val(info.dateStr)
                                            $('#date-event').modal('show')
                                        },
                                        events: agenda
                                    });
                                    calendar2.render();
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    });
                }
            }
        </script> --}}

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const calendarEl = document.getElementById('calendar2');
                const keywordSelect = document.getElementById('keyword');
                let calendar;

                function loadData(url) {
                    $.ajax({
                        type: 'GET',
                        url: url,
                        success: function(data) {
                            if (data) {
                                console.log(data);
                                let agenda = [];
                                data.forEach(function(item) {
                                    agenda.push({
                                        title: moment(item.tanggal_kegiatan, 'YYYY-MM-DD HH:mm:ss').format('HH:mm') + ' ' + item.nama_kegiatan,
                                        start: moment(item.tanggal_kegiatan, 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD'),
                                        backgroundColor: 'rgba(58,87,232,0.2)',
                                        textColor: 'rgba(58,87,232,1)',
                                        borderColor: 'rgba(58,87,232,1)'
                                    });
                                });
                                // Hapus semua acara dari kalender
                                calendar.removeAllEvents();
                                // Tambahkan acara baru ke kalender
                                calendar.addEventSource(agenda);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }

                calendar = new FullCalendar.Calendar(calendarEl, {
                    selectable: true,
                    plugins: ["timeGrid", "dayGrid", "list", "interaction"],
                    timeZone: "Asia/Jakarta",
                    defaultView: "dayGridMonth",
                    contentHeight: "auto",
                    eventLimit: true,
                    dayMaxEvents: 4,
                    header: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
                    },
                    dateClick: function (info) {
                        $('#schedule-start-date').val(info.dateStr)
                        $('#schedule-end-date').val(info.dateStr)
                        $('#date-event').modal('show')
                    }
                });
                calendar.render();

                loadData('/getAgenda')

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
                const taskPcpForm = document.getElementById('taskPcpForm');
                const monthlyReportPcpForm = document.getElementById('monthlyReportPcpForm');

                if (monthlyReportPcpForm) {
                    const selectAll = document.getElementById('select_all');
                    const idProyek = document.getElementById('id_proyek_select');
                    const divIdProyek = document.getElementById('div_id_proyek_select');
                    $(document).ready(function() {
                        $('#id_proyek_select').change(function() {
                            if ($('#id_proyek_select').val() && $('#id_proyek_select').val().length > 0) {
                                selectAll.disabled = true;
                                selectAll.checked = false;
                                selectAll.required = false;
                            } else {
                                selectAll.disabled = false;
                                selectAll.required = true;
                                idProyek.required = true;
                            }
                        });

                        selectAll.addEventListener('click', function() {
                            if (this.checked) {
                                $('#id_proyek_select').val([]);
                                idProyek.required = false;
                                idProyek.disabled = true;
                                divIdProyek.style.display = 'none';
                            } else {
                                divIdProyek.style.display = 'block';
                                idProyek.disabled = false;
                                selectAll.required = true;
                                idProyek.required = true;
                            }
                        });
                    });
                }

                if (taskPcpForm) {
                    $(document).ready(function() {
                        $('#status_tugas').change(function() {
                            let status = document.getElementById("status_tugas").value;
                            let div_komentar = document.getElementById("div_komentar");

                            if (status == "Revisi") {
                                div_komentar.style.display = "block";
                            } else {
                                div_komentar.style.display = "none";
                            }
                        })
                    })
                }
            })
        </script>

        <script>
            const lpsUtamaTable = document.getElementById('lpsUtamaTable')
            const lpsPendukungTable = document.getElementById('lpsPendukungTable')
            const csiTable = document.getElementById('csiTable')

            if (lpsUtamaTable || lpsPendukungTable || csiTable) {
                function submitForm(formId) {
                    document.getElementById(formId).submit();
                }
            }
        </script>

</body>

</html>
