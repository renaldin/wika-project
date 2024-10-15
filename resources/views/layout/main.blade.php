
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
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
    <script src="{{ asset('admin/assets/js/dashboard/dashboard_2.js') }}"></script>
    <script>new WOW().init();</script>
  

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var isDarkMode = document.body.classList.contains('dark-mode'); // Cek apakah dark mode aktif

        var chart = Highcharts.chart('pie-chart-progress-proyek', {
            chart: {
                type: 'pie',
                backgroundColor: 'transparent' // Buat background chart transparan
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
                followPointer: true,
                style: {
                    color: isDarkMode ? '#ffffff' : '#000000' // Warna teks tooltip sesuai mode
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    innerSize: '50%' // Efek donut
                }
            },
            series: [{
                name: 'Proyek',
                colorByPoint: true,
                data: [{
                    name: '0 - 30%',
                    y: {{ $persen_0_30 ?? 0 }},
                    color: '#64b5f6'
                }, {
                    name: '30 - 50%',
                    y: {{ $persen_30_50 ?? 0 }},
                    color: '#f66d00'
                }, {
                    name: '50 - 70%',
                    y: {{ $persen_50_70 ?? 0 }},
                    color: '#1565c0'
                }, {
                    name: '70 - 100%',
                    y: {{ $persen_70_100 ?? 0 }},
                    color: '#388e3c'
                }]
            }],
            credits: {
                enabled: false // Hilangkan logo Highcharts
            }
        });
    });
</script>




<script>
    // Memastikan elemen grafik ada di DOM
    if (document.querySelectorAll("#pie-chart-status-implementasi-bim").length) {
        var chartElement = document.getElementById('pie-chart-status-implementasi-bim');
        var bukanPrioritas = parseInt(chartElement.getAttribute('bukanPrioritas'));
        var prioritas1 = parseInt(chartElement.getAttribute('prioritas1'));
        var prioritas2 = parseInt(chartElement.getAttribute('prioritas2'));
        var prioritas3 = parseInt(chartElement.getAttribute('prioritas3'));
        console.log(prioritas3);
        
        var options = {
            chart: {
                height: 350,
                type: "pie"
            },
            labels: ["Bukan Prioritas", "Prioritas 1", "Prioritas 2", "Prioritas 3"],
            series: [bukanPrioritas, prioritas1, prioritas2, prioritas3],
            colors: ["#1565c0", "#f66d00", "#388e3c", "#64b5f6"],
            legend: {
                position: "bottom"
            }
        };

        // Memastikan ApexCharts terdefinisi
        if (typeof ApexCharts !== 'undefined') {
            var chart = new ApexCharts(chartElement, options);
            chart.render();
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


<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    const options = {
        chart: {
            height: 350,
            type: 'line',
            toolbar: { show: false },
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                },
                dynamicAnimation: {
                    enabled: true,
                    speed: 350
                }
            }
        },
        series: [
            {
                name: 'Productivity',
                type: 'line',
                data: [
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
                ]
            },
            {
                name: 'Target Productivity',
                type: 'column',
                data: [80, 85, 90, 80, 85, 90, 95, 90, 92, 93, 94, 95] // Adjust this target data as needed
            }
        ],
        xaxis: {
            categories: [
                'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ],
            labels: { style: { colors: '#8A92A6' } }
        },
        tooltip: {
            shared: true,
            intersect: false,
            y: {
                formatter: function (val) {
                    return `${val}%`;
                }
            }
        },
        theme: {
            mode: 'light',
            palette: 'palette1',
        },
        stroke: {
            width: [2, 0],
            curve: 'smooth'
        },
        grid: {
            borderColor: '#e0e0e0',
            row: {
                colors: ['#f3f3f3', 'transparent'],
                opacity: 0.5
            },
        }
    };

    const chart = new ApexCharts(document.querySelector("#chart-productivity-rate-mixed"), options);
    chart.render();
});
</script> -->
 <!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    // Menginisialisasi chart menggunakan ECharts
    var chartDom = document.getElementById('chart-productivity-rate-mixed');
    var myChart = echarts.init(chartDom);

    var option = {
        title: {
            text: 'Productivity Rate {{date('Y')}}',
            left: 'center'
        },
        xAxis: {
            type: 'category',
            data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisTick: { show: false },
            axisLine: { lineStyle: { color: '#8A92A6' } }
        },
        yAxis: {
            type: 'value',
            max: 100,
            axisLine: { show: false },
            axisTick: { show: false },
            splitLine: { lineStyle: { color: '#e0e0e0' } }
        },
        series: [
            {
                name: 'Productivity',
                type: 'pictorialBar',
                symbol: 'rect', // Anda bisa mengganti dengan path gambar atau simbol lain
                symbolRepeat: true,
                symbolSize: [30, 10],
                symbolMargin: 2,
                data: [
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
                ],
                z: 10,
                label: {
                    show: true,
                    position: 'top',
                    formatter: '{c}%'
                },
                itemStyle: {
                    color: '#64b5f6'
                }
            },
            {
                name: 'Target Productivity',
                type: 'line',
                data: [80, 85, 90, 80, 85, 90, 95, 90, 92, 93, 94, 95],
                lineStyle: { color: '#f39c12', width: 3 },
                symbolSize: 8
            }
        ],
        tooltip: {
            trigger: 'axis',
            formatter: function(params) {
                let output = '';
                params.forEach((param) => {
                    output += `${param.seriesName}: ${param.data}%<br>`;
                });
                return output;
            }
        }
    };

    // Menampilkan chart dengan opsi yang telah didefinisikan
    myChart.setOption(option);
});
</script>  -->
<!-- <script>
document.addEventListener("DOMContentLoaded", function () {
    // Mendapatkan elemen container untuk chart
    var chartDom = document.getElementById('chart-productivity-rate-mixed');
    var myChart = echarts.init(chartDom);

    // Data productivity untuk tiap bulan
    var option = {
        title: {
            text: 'Pictorial Single Chart',
            left: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'shadow'
            }
        },
        legend: {
            data: ['line', 'bar'],
            top: '5%'
        },
        xAxis: {
            type: 'category',
            data: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des'],
            axisLabel: {
                color: '#8A92A6'
            }
        },
        yAxis: {
            type: 'value',
            max: 100,  // Sesuaikan dengan range produktivitas
            axisLabel: {
                formatter: '{value}%',
            }
        },
        series: [
            {
                name: 'bar',
                type: 'pictorialBar',
                barCategoryGap: '-130%',
                symbol: 'rect',
                itemStyle: {
                    color: '#64b5f6'
                },
                label: {
                    show: true,
                    position: 'top',
                    formatter: '{c}%',
                },
                symbolRepeat: true,
                symbolSize: [12, 8],
                data: [
                    {{ $productivityJan ?? 0 }},
                    {{ $productivityFeb ?? 0 }},
                    {{ $productivityMar ?? 0 }},
                    {{ $productivityApr ?? 0 }},
                    {{ $productivityMei ?? 0 }},
                    {{ $productivityJun ?? 0 }},
                    {{ $productivityJul ?? 0 }},
                    {{ $productivityAug ?? 0 }},
                    {{ $productivitySep ?? 0 }},
                    {{ $productivityOct ?? 0 }},
                    {{ $productivityNov ?? 0 }},
                    {{ $productivityDes ?? 0 }}
                ]
            },
            {
                name: 'line',
                type: 'line',
                smooth: true,
                lineStyle: {
                    width: 2
                },
                data: [
                    {{ $productivityJan ?? 0 }},
                    {{ $productivityFeb ?? 0 }},
                    {{ $productivityMar ?? 0 }},
                    {{ $productivityApr ?? 0 }},
                    {{ $productivityMei ?? 0 }},
                    {{ $productivityJun ?? 0 }},
                    {{ $productivityJul ?? 0 }},
                    {{ $productivityAug ?? 0 }},
                    {{ $productivitySep ?? 0 }},
                    {{ $productivityOct ?? 0 }},
                    {{ $productivityNov ?? 0 }},
                    {{ $productivityDes ?? 0 }}
                ]
            }
        ]
    };

    // Render the chart
    myChart.setOption(option);
});
</script> -->
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

</script>
<script>
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
        });

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

        const options = {
            series: seriesData,
            chart: {
                type: 'bar',
                height: 250,
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
                    endingShape: 'flat',
                    borderRadius: 5,
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: categories,
                labels: {
                    style: {
                        colors: '#8A92A6',
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#8A92A6',
                    }
                }
            },
            fill: {
                opacity: 1,
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: "vertical",
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 0.85,
                    opacityTo: 0.85,
                    stops: [50, 0, 100]
                },
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return " " + val + " %";
                    }
                }
            }
        };

        const chart = new ApexCharts(document.querySelector("#bar-chart-new-1"), options);
        chart.render();
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
        });

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

        const options = {
            series: seriesData,
            chart: {
                type: 'bar',
                height: 250,
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
                    endingShape: 'flat',
                    borderRadius: 5,
                },
            },
            legend: {
                position: 'top',
                horizontalAlign: 'left',
                offsetX: 40
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: categories,
                labels: {
                    style: {
                        colors: '#8A92A6',
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#8A92A6',
                    }
                }
            },
            fill: {
                opacity: 1,
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: "vertical",
                    shadeIntensity: 0.25,
                    gradientToColors: undefined,
                    inverseColors: true,
                    opacityFrom: 0.85,
                    opacityTo: 0.85,
                    stops: [50, 0, 100]
                },
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return " " + val + " %";
                    }
                }
            }
        };

        const chart = new ApexCharts(document.querySelector("#bar-chart-new-2"), options);
        chart.render();
    }
</script>


  </body>
</html>