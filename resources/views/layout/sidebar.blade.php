@php
    $firstDivisi = 'engineering';
@endphp
<div class="sidebar-wrapper" data-layout="stroke-svg">
    <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo.png') }}" alt=""></a>
      <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo-icon.png') }}" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo-icon.png') }}" alt=""></a>
            <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="pin-title sidebar-main-title">
            <div> 
              <h6>Pinned</h6>
            </div>
          </li>
          @if ($user->role == 'Head Office')
            <li class="sidebar-main-title">
                <div>
                    <h6>General</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Dashboard</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-chat">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Chat</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/change-leader">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Leader Program</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/dashboard-change">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Dashboard Change</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/panduan-spesifik">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Panduan Spesific</span></a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h6>Operasi</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-akhlak">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Akhlak</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/tambah-activity">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Tambah Activity</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/check-activity">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Check Activity</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Monthly Report</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/validasi-monthly-report">Validasi</a></li>
                    <li><a href="/monitoring-monthly-report">Monitoring</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Technical Support</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/permintaan-technical-supporting">Permintaan</a></li>
                    <li><a href="/update-technical-supporting">Update</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>KI/KM</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/pengajuan-ki-km">Pengajuan</a></li>
                    <li><a href="/update-ki-km">Update</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>RKP BAB 3</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/tambah-rkp">Tambah</a></li>
                    <li><a href="/update-rkp">Update</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/input-lps">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Review LPS</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-license">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>License Software</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-task">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Task</span></a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h6>Monitoring</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-activity">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Daftar Activity</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Productivity</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/productivity-by-team">By Team</a></li>
                    <li><a href="/productivity-by-person">By Person</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/monitoring-rkp">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>RKP BAB 3</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href=/monitoring-lps"">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Monitoring LPS</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/monitoring-csi">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Monitoring CSI</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-sni">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>SNI</span></a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h6>Data Master</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Rencana</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/rencana-ki-km">KI/KM</a></li>
                    <li><a href="/rencana-technical-supporting">Technical Support</a></li>
                </ul>
            </li>
          @endif
          @if ($user->role == 'Admin')
            <li class="sidebar-main-title">
                <div>
                    <h6>General</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/dashboard">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Dashboard</span></a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h6>Data Master</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Landing</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/data-activities">Activities</a></li>
                    <li><a href="/data-events">Events</a></li>
                    <li><a href="/data-news">News</a></li>
                    <li><a href="/data-achievement">Achievement</a></li>
                    <li><a href="/data-carousel">Carousel</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/{{$firstDivisi}}/kelola-jabatan">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Jabatan</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/{{$firstDivisi}}/kelola-divisi">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Divisi</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/engineering/kelola-user">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>User</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/engineering/kelola-proyek">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Proyek</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/engineering/daftar-dokumen-lps">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Dokumen LPS</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/engineering/daftar-software">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Software</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/engineering/daftar-sni">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>SNI</span></a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h6>Operasi</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-monthly-report-admin">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Monthly Report</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/pilih-bulan">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Master Activity</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/input-lps">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Review LPS</span></a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h6>Monitoring</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-activity">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Daftar Activity</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Technical Support</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/update-technical-supporting">Daftar Update</a></li>
                    <li><a href="/progress-technical-supporting">Progress</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>KI/KM</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/update-ki-km">Daftar Update</a></li>
                    <li><a href="/progress-ki-km">Progress</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Productivity</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/productivity-by-team">By Team</a></li>
                    <li><a href="/productivity-by-person">By Person</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/monitoring-rkp">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>RKP BAB 3</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>LPS</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/monitoring-lps">Monitoring</a></li>
                    <li><a href="/progress-lps">Progress</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>License Software</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="/progress-license">Progress</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/monitoring-csi">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>CSI</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-license">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Monitoring License</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-log">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Log Sistem</span></a>
            </li>
          @endif
          @if ($user->role == 'Tim Proyek')
            <li class="sidebar-main-title">
                <div>
                    <h6>General</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="">
              <svg class="stroke-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
              </svg>
              <svg class="fill-icon">
                <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
              </svg><span>Dashboard</span></a>
            </li>

            <li class="sidebar-main-title">
                <div>
                    <h6>Form</h6>
                </div>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Monthly Report</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="">Tambah</a></li>
                    <li><a href="">Check</a></li>
                    <li><a href="">Daftar</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>Technical Support</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="">Tambah</a></li>
                    <li><a href="">Monitoring</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>KI/KM</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="">Tambah</a></li>
                    <li><a href="">Monitoring</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">
                <svg class="stroke-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                  <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>RKP BAB 3</span></a>
                <ul class="sidebar-submenu">
                    <li><a href="">Update Dokumen</a></li>
                    <li><a href="">Monitoring</a></li>
                </ul>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>License Software</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>CSI</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>LPS</span></a>
            </li>
            <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="/daftar-sni">
                <svg class="stroke-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-project') }}"></use>
                </svg>
                <svg class="fill-icon">
                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-project') }}"></use>
                </svg><span>SNI</span></a>
            </li>
          @endif
        </ul>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
      </div>
    </nav>
</div>