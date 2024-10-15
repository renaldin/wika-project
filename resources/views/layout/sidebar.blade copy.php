@php
    $jumlahKiKm = DB::table('ki_km')->where('is_respon', 0)->count();
    $jumlahTS = DB::table('technical_supporting')->where('is_respon', 0)->count();
   
    if ($user->role == 'Tim Proyek') {
        $detailTimPRoyek = DB::table('detail_tim_proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'detail_tim_proyek.id_tim_proyek')
            ->join('user', 'user.id_user', '=', 'detail_tim_proyek.id_user')
            ->where('detail_tim_proyek.id_user', $user->id_user)
            ->get();
        $dataProyekByUser = [];
        foreach($detailTimPRoyek as $item) {
            $dataProyekByUser[] = DB::table('proyek')
            ->join('tim_proyek', 'tim_proyek.id_tim_proyek', '=', 'proyek.id_tim_proyek', 'proyek')
            ->where('proyek.id_tim_proyek', $item->id_tim_proyek)
            ->first();
        }
        $jumlahRkp = 0;
        foreach ($dataProyekByUser as $item) {
           if ($item->status_rkp == 1) {
            $jumlahRkp += 1;
           }
        }

        $jumlahRkpMankon = 0;
        foreach ($dataProyekByUser as $item) {
           if ($item->status_rkp == 1) {
            $jumlahRkpMankon += 1;
           }
        }

        $jumlahLps = 0;
        foreach ($dataProyekByUser as $item) {
           if ($item->status_lps == 1) {
            $jumlahLps += 1;
           }
        }
    }
@endphp
<aside class="sidebar sidebar-default navs-rounded-all ">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="#" class="navbar-brand">
            <h4 class="logo-title">
                <img src="{{ asset('image/infra2black.png') }}" width="175" alt="Logo Jawer.id">
            </h4>
        </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true" style="background-color: #004899;">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
     
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list mb-5">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#" tabindex="-1">
                        <span class="default-icon">Home</span>
                        <span class="mini-icon">-</span>
                    </a>
                </li>
                <li>
                <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Dashboard') active @endif" aria-current="page"
                            @if ($subTitle == 'Dashboard') @endif href="/dashboard">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard</span>
                            </a>
                </li>
                    <hr class="hr-horizontal">
                </li>
                @if ($user->role == 'Admin')
                    @if ($user->divisi == 'Engineering')
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Data Master</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Landing') active @endif" data-bs-toggle="collapse"  href="#landing" role="button" aria-expanded="false" aria-controls="landing">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Landing</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="landing" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Activities' || $subTitle == 'Tambah Activities' || $subTitle == 'Edit Activities') active @endif" href="/data-activities">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Activities</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Events') active @endif" href="/data-events">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Events</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'News' || $subTitle == 'Tambah News' || $subTitle == 'Edit News') active @endif" href="/data-news">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">News</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Achievement' || $subTitle == 'Poin Achievement') active @endif" href="/data-achievement">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Achievement</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Carousel') active @endif" href="/data-carousel">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Carousel</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Jabatan') active @endif" aria-current="page" href="/daftar-jabatan">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Jabatan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Divisi') active @endif" aria-current="page" href="/daftar-divisi">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Divisi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data User') active @endif" data-bs-toggle="collapse"
                            @if ($title == 'Data User') @endif href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">User</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah User') active @endif" @if ($subTitle == 'Tambah User') @endif href="/tambah-user">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Daftar User' || $subTitle == 'Edit User') active @endif" href="/daftar-user" @if ($subTitle == 'Daftar User' || $subTitle == 'Edit User') @endif>
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Proyek') active @endif" data-bs-toggle="collapse" href="#sidebar-proyek" role="button" aria-expanded="false" aria-controls="sidebar-proyek">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Proyek</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-proyek" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah Proyek') active @endif" href="/tambah-proyek">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah Proyek</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Daftar Proyek' || $subTitle == 'Daftar Tim Proyek' || $subTitle == 'Edit Proyek') active @endif" href="/daftar-proyek">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar Proyek</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dokumen LPS') active @endif" aria-current="page" href="/daftar-dokumen-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dokumen LPS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Software') active @endif" data-bs-toggle="collapse"href="#software" role="button" aria-expanded="false" aria-controls="software">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Software</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="software" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data Software' && $subTitle == 'Tambah') active @endif" href="/tambah-software">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data Software' && $subTitle == 'Daftar Software') active @endif @if($title == 'Data Software' && $subTitle == 'Edit') active @endif" href="/daftar-software">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data SNI') active @endif" data-bs-toggle="collapse"href="#sni" role="button" aria-expanded="false" aria-controls="sni">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">SNI</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sni" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data SNI' && $subTitle == 'Tambah') active @endif" href="/tambah-sni">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data SNI' && $subTitle == 'Daftar SNI') active @endif @if($title == 'Data SNI' && $subTitle == 'Edit') active @endif" href="/daftar-sni">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Operasi</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar Monthly Report' || $subTitle == 'Edit Monthly Report' || $subTitle == 'Detail Monthly Report') active @endif" aria-current="page" href="/daftar-monthly-report-admin">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monthly Report</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if( $title == 'Master Activity') active @endif " aria-current="page" href="/pilih-bulan">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Master Activity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Review LPS' || $subTitle == 'Detail LPS') active @endif" aria-current="page" href="/input-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Review LPS</span>
                            </a>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Monitoring</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar Activity') active @endif" aria-current="page"  href="/daftar-activity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Daftar Activity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Technical Supporting') active @endif" data-bs-toggle="collapse" @if ($title == 'Technical Supporting') @endif href="#technical-supporting" role="button" aria-expanded="false" aria-controls="technical-supporting">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Technical Support</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="technical-supporting" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Technical Supporting' && $subTitle == 'Update') active @endif" href="/update-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Daftar Update</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Technical Supporting' && $subTitle == 'Progress') active @endif" href="/progress-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kolaborasi KI/KM') active @endif" data-bs-toggle="collapse" @if ($title == 'Kolaborasi KI/KM') @endif href="#ki-km" role="button" aria-expanded="false" aria-controls="ki-km">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">KI/KM</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="ki-km" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Kolaborasi KI/KM' && $subTitle == 'Update') active @endif" href="/update-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Daftar Update</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Kolaborasi KI/KM' && $subTitle == 'Progress') active @endif" href="/progress-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Productivity') active @endif" data-bs-toggle="collapse"
                            @if ($title == 'Data Productivity') @endif href="#sidebar-productivity" role="button" aria-expanded="false" aria-controls="sidebar-productivity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Productivity</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-productivity" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Team') active @endif" href="/productivity-by-team">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Team</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Person') active @endif" href="/productivity-by-person">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Person</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">RKP BAB 3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'LPS') active @endif" data-bs-toggle="collapse" href="#lps" role="button" aria-expanded="false" aria-controls="lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">LPS</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="lps" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'LPS' && $subTitle == 'Monitoring LPS') active @endif" href="/monitoring-lps">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'LPS' && $subTitle == 'Progress') active @endif" href="/progress-lps">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'License Software') active @endif" data-bs-toggle="collapse" href="#license-software" role="button" aria-expanded="false" aria-controls="license-software">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">License Software</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="license-software" data-bs-parent="#sidebar-menu">
                                {{-- <li class="nav-item">
                                    <a class="nav-link @if ($title == 'License Software' && $subTitle == 'Monitoring') active @endif" href="/monitoring-license-software">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'License Software' && $subTitle == 'Progress') active @endif" href="/progress-license">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar Proyek CSI' || $subTitle == 'Daftar CSI') active @endif" aria-current="page"  href="/monitoring-csi">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">CSI</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar License Software' || $subTitle == 'Daftar License') active @endif" aria-current="page"  href="/daftar-license">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring License</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Log') active @endif" aria-current="page"  href="/daftar-log">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Log Sistem</span>
                            </a>
                        </li>
                    @elseif($user->divisi == 'PCP')
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">PCP</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Dokumen Timeline') active @endif" aria-current="page" href="/daftar-dokumen-timeline">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dokumen Timeline</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Agenda') active @endif" aria-current="page" href="/daftar-agenda">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Agenda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kalender') active @endif" aria-current="page" href="/kalender">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Kalender</span>
                            </a>
                        </li>
                    @endif
                @elseif ($user->role == 'Tim Proyek')
                    @if ($user->divisi == 'Engineering')
                      <li class="nav-item">
                            <a class="nav-link @if ($title == 'Change Leader Program') active @endif" aria-current="page"  href="/change-leader">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Change Leader Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dashboard Change Leader') active @endif" aria-current="page"  href="/dashboard-change">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard Change</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Panduan Spesifik') active @endif" aria-current="page"  href="/panduan-spesifik">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Panduan Spesifik</span>
                            </a>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Form</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link @if ($title == 'Daftar AKHLAK') active @endif" aria-current="page"  href="/daftar-akhlak">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">AKHLAK</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Monthly Report') active @endif" data-bs-toggle="collapse" @if ($title == 'Monthly Report') @endif href="#monthly-report" role="button" aria-expanded="false" aria-controls="monthly-report">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Monthly Report</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="monthly-report" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah Monthly Report' || $subTitle == 'Pilih Proyek') active @endif" href="/pilih-proyek">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Check Monthly Report') active @endif" href="/check-monthly-report">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Check</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Daftar Monthly Report' || $subTitle == 'Edit Monthly Report' || $subTitle == 'Detail Monthly Report') active @endif" href="/daftar-monthly-report">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Technical Supporting') active @endif" data-bs-toggle="collapse" @if ($title == 'Technical Supporting') @endif href="#technical-supporting" role="button" aria-expanded="false" aria-controls="technical-supporting">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Technical Support</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="technical-supporting" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah Technical Supporting') active @endif" href="/tambah-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Technical Supporting' && $subTitle == 'Monitoring' || $subTitle == 'Edit Technical Supporting') active @endif" href="/monitoring-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kolaborasi KI/KM') active @endif" data-bs-toggle="collapse" @if ($title == 'Kolaborasi KI/KM') @endif href="#ki-km" role="button" aria-expanded="false" aria-controls="ki-km">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">KI/KM</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="ki-km" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah KI/KM') active @endif" href="/tambah-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Kolaborasi KI/KM' && $subTitle == 'Monitoring') active @endif" href="/monitoring-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'RKP') active @endif" data-bs-toggle="collapse" href="#rkp" role="button" aria-expanded="false" aria-controls="rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">RKP BAB 3</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="rkp" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Update Dokumen') active @endif" href="/update-dokumen-rkp">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Update Dokumen<span class="badge rounded-pill bg-danger item-name">{{$jumlahRkp}}</span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Monitoring RKP') active @endif" href="/monitoring-rkp">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring RKP</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'License Software') active @endif" aria-current="page" href="/daftar-license">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">License Software</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'CSI') active @endif" aria-current="page" href="/daftar-proyek-csi">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">CSI</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'LPS') active @endif" aria-current="page" href="/daftar-proyek-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">LPS<span class="badge rounded-pill bg-danger item-name">{{$jumlahLps}}</span></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data SNI') active @endif" aria-current="page"  href="/daftar-sni">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">SNI</span>
                            </a>
                        </li>
                    @elseif ($user->divisi == 'Mankon')
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Manajemen Kontrak</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link @if ($title == 'Change Leader Program') active @endif" aria-current="page"  href="/change-leader">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Change Leader Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dashboard Change Leader') active @endif" aria-current="page"  href="/dashboard-change">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard Change</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Panduan Spesifik') active @endif" aria-current="page"  href="/panduan-spesifik">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Panduan Spesifik</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link @if ($title == 'Daftar AKHLAK') active @endif" aria-current="page"  href="/daftar-akhlak">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">AKHLAK</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Agenda') active @endif" aria-current="page" href="/daftar-agenda">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Agenda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kalender') active @endif" aria-current="page" href="/kalender">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Kalender</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'RKP') active @endif" data-bs-toggle="collapse" href="#rkp" role="button" aria-expanded="false" aria-controls="rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">RKP BAB 12</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="rkp" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Update Dokumen') active @endif" href="/update-dokumen-rkp-mankon">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Update Dokumen<span class="badge rounded-pill bg-danger item-name">{{$jumlahRkpMankon}}</span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Monitoring RKP') active @endif" href="/monitoring-rkp-mankon">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @elseif ($user->divisi == 'PCP')
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">PCP</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                          <li class="nav-item">
                            <a class="nav-link @if ($title == 'Change Leader Program') active @endif" aria-current="page"  href="/change-leader">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Change Leader Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dashboard Change Leader') active @endif" aria-current="page"  href="/dashboard-change">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard Change</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Panduan Spesifik') active @endif" aria-current="page"  href="/panduan-spesifik">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Panduan Spesifik</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link @if ($title == 'Daftar AKHLAK') active @endif" aria-current="page"  href="/daftar-akhlak">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">AKHLAK</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kalender') active @endif" aria-current="page" href="/kalender">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Kalender</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Monthly Report') active @endif" aria-current="page"  href="/daftar-monthly-report-pcp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monthly Report</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Timeline') active @endif" aria-current="page"  href="/daftar-timeline">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Timeline</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Task PCP (Per Orang)') active @endif" aria-current="page"  href="/daftar-task-pcp-per-orang">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task PCP (Per Orang)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Task PCP (Proyek)') active @endif" aria-current="page"  href="/daftar-task-pcp-proyek">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task PCP (Proyek)</span>
                            </a>
                        </li>
                    @endif
                @elseif ($user->role == 'Head Office')
                    @if ($user->divisi == 'Engineering')
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Chat') active @endif" aria-current="page"  href="/daftar-chat">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Chat</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Change Leader Program') active @endif" aria-current="page"  href="/change-leader">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Change Leader Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dashboard Change Leader') active @endif" aria-current="page"  href="/dashboard-change">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard Change</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Panduan Spesifik') active @endif" aria-current="page"  href="/panduan-spesifik">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Panduan Spesifik</span>
                            </a>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Operasi</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Daftar AKHLAK') active @endif" aria-current="page"  href="/daftar-akhlak">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">AKHLAK</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Tambah Activity') active @endif" aria-current="page"  href="/tambah-activity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Tambah Activity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Check Activity' || $subTitle == 'Edit Activity') active @endif" aria-current="page"  href="/check-activity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Check Activity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Monthly Report') active @endif" data-bs-toggle="collapse" @if ($title == 'Monthly Report') @endif href="#monthly-report" role="button" aria-expanded="false" aria-controls="monthly-report">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Monthly Report</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="monthly-report" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Validasi Monthly Report') active @endif" href="/validasi-monthly-report">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Validasi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Monitoring Monthly Report') active @endif" href="/monitoring-monthly-report">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if ($user->jabatan == 'Coordinator')
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Validasi Activity' || $subTitle == 'Edit Validasi Activity') active @endif" aria-current="page"  href="/validasi-activity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Validasi Activity</span>
                            </a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Technical Supporting') active @endif" data-bs-toggle="collapse" @if ($title == 'Technical Supporting') @endif href="#technical-supporting" role="button" aria-expanded="false" aria-controls="technical-supporting">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Technical Support<span class="badge rounded-pill bg-danger item-name">{{$jumlahTS}}</span></span>
                                {{-- <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i> --}}
                            </a>
                            <ul class="sub-nav collapse" id="technical-supporting" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Permintaan' || $subTitle == 'Form Permintaan') active @endif" href="/permintaan-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Permintaan<span class="badge rounded-pill bg-danger item-name">{{$jumlahTS}}</span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Technical Supporting' && $subTitle == 'Update') active @elseif($title == 'Technical Supporting' &&  $subTitle == 'Form Update') active @endif" href="/update-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Update</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kolaborasi KI/KM') active @endif" data-bs-toggle="collapse" @if ($title == 'Kolaborasi KI/KM') @endif href="#ki-km" role="button" aria-expanded="false" aria-controls="ki-km">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">KI/KM<span class="badge rounded-pill bg-danger item-name">{{$jumlahKiKm}}</span></span>
                                {{-- <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i> --}}
                            </a>
                            <ul class="sub-nav collapse" id="ki-km" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Pengajuan' || $subTitle == 'Form Pengajuan') active @endif" href="/pengajuan-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Pengajuan<span class="badge rounded-pill bg-danger item-name">{{$jumlahKiKm}}</span></span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Kolaborasi KI/KM' && $subTitle == 'Update' || $subTitle == 'Form Update KI/KM') active @endif" href="/update-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Update</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'RKP') active @endif" data-bs-toggle="collapse" @if ($title == 'RKP') @endif href="#rkp" role="button" aria-expanded="false" aria-controls="rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">RKP BAB 3</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="rkp" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'RKP' && $subTitle == 'Tambah') active @endif" href="/tambah-rkp">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'RKP' && $subTitle == 'Update') active @elseif($title == 'RKP' && $subTitle == 'Form Update') active @endif" href="/update-rkp">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Update</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Review LPS' || $subTitle == 'Detail LPS') active @endif" aria-current="page" href="/input-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Review LPS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'License Software') active @endif" aria-current="page" href="/daftar-license">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">License Software</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Task') active @endif" aria-current="page" href="/daftar-task">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task</span>
                            </a>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Monitoring</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar Activity') active @endif" aria-current="page"  href="/daftar-activity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Daftar Activity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Productivity') active @endif" data-bs-toggle="collapse"
                            @if ($title == 'Data Productivity') @endif href="#sidebar-productivity" role="button" aria-expanded="false" aria-controls="sidebar-productivity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Productivity</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-productivity" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Team') active @endif" href="/productivity-by-team">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Team</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Person') active @endif" href="/productivity-by-person">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Person</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring RKP BAB 3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Monitoring LPS') active @endif" aria-current="page"  href="/monitoring-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring LPS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'CSI') active @endif" aria-current="page"  href="/monitoring-csi">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring CSI</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data SNI') active @endif" aria-current="page"  href="/daftar-sni">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">SNI</span>
                            </a>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Data Master</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Rencana') active @endif" data-bs-toggle="collapse"  href="#rencana" role="button" aria-expanded="false" aria-controls="rencana">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Rencana</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="rencana" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'KI/KM') active @endif" href="/rencana-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">KI/KM</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Technical Supporting') active @endif" href="/rencana-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Technical Support</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                    @elseif($user->divisi == 'Mankon')
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Manajemen Kontrak</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                               <li class="nav-item">
                            <a class="nav-link @if ($title == 'Daftar AKHLAK') active @endif" aria-current="page"  href="/daftar-akhlak">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">AKHLAK</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link @if ($title == 'Change Leader Program') active @endif" aria-current="page"  href="/change-leader">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Change Leader Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dashboard Change Leader') active @endif" aria-current="page"  href="/dashboard-change">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard Change</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Panduan Spesifik') active @endif" aria-current="page"  href="/panduan-spesifik">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Panduan Spesifik</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Task') active @endif" aria-current="page" href="/daftar-task">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task</span>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Agenda') active @endif" aria-current="page" href="/daftar-agenda">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Agenda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kalender') active @endif" aria-current="page" href="/kalender">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Kalender</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'RKP') active @endif" data-bs-toggle="collapse" @if ($title == 'RKP') @endif href="#rkp" role="button" aria-expanded="false" aria-controls="rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">RKP BAB 12</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="rkp" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'RKP' && $subTitle == 'Tambah') active @endif" href="/tambah-rkp-mankon">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'RKP' && $subTitle == 'Update') active @elseif($title == 'RKP' && $subTitle == 'Form Update') active @endif" href="/update-rkp-mankon">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Update</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @elseif($user->divisi == 'PCP')
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">PCP</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link @if ($title == 'Daftar AKHLAK') active @endif" aria-current="page"  href="/daftar-akhlak">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">AKHLAK</span>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link @if ($title == 'Change Leader Program') active @endif" aria-current="page"  href="/change-leader">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Change Leader Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dashboard Change Leader') active @endif" aria-current="page"  href="/dashboard-change">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard Change</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Panduan Spesifik') active @endif" aria-current="page"  href="/panduan-spesifik">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Panduan Spesifik</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Task') active @endif" aria-current="page" href="/daftar-task">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task</span>
                            </a>
                        </li>  <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Dokumen Timeline') active @endif" aria-current="page" href="/daftar-dokumen-timeline">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dokumen Timeline</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Monthly Report') active @endif" data-bs-toggle="collapse" @if ($title == 'Monthly Report') @endif href="#monthly-report-pcp" role="button" aria-expanded="false" aria-controls="monthly-report-pcp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Monthly Report</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="monthly-report-pcp" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah Monthly Report PCP') active @endif" href="/tambah-monthly-report-pcp">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Daftar Monthly Report PCP' || $subTitle == 'Edit Monthly Report PCP' || $subTitle == 'Detail Monthly Report PCP') active @endif" href="/daftar-monthly-report-pcp">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Task PCP') active @endif" aria-current="page" href="/daftar-task-pcp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task PCP</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kalender') active @endif" aria-current="page" href="/kalender">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Kalender</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Timeline') active @endif" data-bs-toggle="collapse" href="#timeline" role="button" aria-expanded="false" aria-controls="timeline">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Timeline</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="timeline" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Verifikasi Timeline' || $subTitle == 'Detail Timeline' || $subTitle == 'Sub Detail Timeline') active @endif" href="/verifikasi-timeline">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Verifikasi</span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Daftar Timeline' || $subTitle == 'Detail Timeline') active @endif" href="/daftar-timeline">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                    @endif
                @elseif ($user->role == 'Manajemen')
                    @if ($user->divisi == 'Engineering')
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Chat') active @endif" aria-current="page"  href="/daftar-chat">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Chat</span>
                            </a>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Monitoring</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Productivity') active @endif" data-bs-toggle="collapse"
                            @if ($title == 'Data Productivity') @endif href="#sidebar-productivity" role="button" aria-expanded="false" aria-controls="sidebar-productivity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Productivity</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-productivity" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Team') active @endif" href="/productivity-by-team">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Team</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Person') active @endif" href="/productivity-by-person">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Person</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring RKP BAB 3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Monitoring LPS') active @endif" aria-current="page"  href="/monitoring-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring LPS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Monitoring License Software') active @endif" aria-current="page"  href="/monitoring-license">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">License Software</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'CSI') active @endif" aria-current="page"  href="/monitoring-csi">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring CSI</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data SNI') active @endif" aria-current="page"  href="/daftar-sni">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">SNI</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Task') active @endif" aria-current="page"  href="/daftar-task">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Monthly Report') active @endif" aria-current="page"  href="/monitoring-monthly-report">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monthly Report</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link @if ($title == 'Monitoring Task') active @endif" data-bs-toggle="collapse"
                            href="#sidebar-monitoring-task" role="button" aria-expanded="false" aria-controls="sidebar-monitoring-task">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Task</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-monitoring-task" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Data Task') active @endif" href="/data-task">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Data Task</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Task Komentar') active @endif" href="/data-task-komentar">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Task Komentar</span>
                                    </a>
                                </li>
                            </ul>
                        </li> --}}
                    @endif
                @elseif ($user->role == 'Divisi')
                         <li class="nav-item">
                            <a class="nav-link @if ($title == 'Change Leader Program') active @endif" aria-current="page"  href="/change-leader">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Change Leader Program</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dashboard Change Leader') active @endif" aria-current="page"  href="/dashboard-change">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dashboard Change</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Panduan Spesifik') active @endif" aria-current="page"  href="/panduan-spesifik">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Panduan Spesifik</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Task') active @endif" aria-current="page" href="/daftar-task">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Task</span>
                            </a>
                        </li>
                        @if ($user->divisi == 'Engineering')
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Data Master</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Landing') active @endif" data-bs-toggle="collapse"  href="#landing" role="button" aria-expanded="false" aria-controls="landing">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Landing</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="landing" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Activities' || $subTitle == 'Tambah Activities' || $subTitle == 'Edit Activities') active @endif" href="/data-activities">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Activities</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Events') active @endif" href="/data-events">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Events</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'News' || $subTitle == 'Tambah News' || $subTitle == 'Edit News') active @endif" href="/data-news">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">News</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Achievement' || $subTitle == 'Poin Achievement') active @endif" href="/data-achievement">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Achievement</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Carousel') active @endif" href="/data-carousel">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Carousel</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Jabatan') active @endif" aria-current="page" href="/daftar-jabatan">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Jabatan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Divisi') active @endif" aria-current="page" href="/daftar-divisi">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Divisi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data User') active @endif" data-bs-toggle="collapse"
                            @if ($title == 'Data User') @endif href="#sidebar-user" role="button" aria-expanded="false" aria-controls="sidebar-user">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">User</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-user" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah User') active @endif" @if ($subTitle == 'Tambah User') @endif href="/tambah-user">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah User</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Daftar User' || $subTitle == 'Edit User') active @endif" href="/daftar-user" @if ($subTitle == 'Daftar User' || $subTitle == 'Edit User') @endif>
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar User</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Proyek') active @endif" data-bs-toggle="collapse" href="#sidebar-proyek" role="button" aria-expanded="false" aria-controls="sidebar-proyek">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Proyek</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-proyek" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Tambah Proyek') active @endif" href="/tambah-proyek">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah Proyek</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'Daftar Proyek' || $subTitle == 'Daftar Tim Proyek' || $subTitle == 'Edit Proyek') active @endif" href="/daftar-proyek">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar Proyek</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Dokumen LPS') active @endif" aria-current="page" href="/daftar-dokumen-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Dokumen LPS</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Software') active @endif" data-bs-toggle="collapse"href="#software" role="button" aria-expanded="false" aria-controls="software">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Software</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="software" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data Software' && $subTitle == 'Tambah') active @endif" href="/tambah-software">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data Software' && $subTitle == 'Daftar Software') active @endif @if($title == 'Data Software' && $subTitle == 'Edit') active @endif" href="/daftar-software">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data SNI') active @endif" data-bs-toggle="collapse"href="#sni" role="button" aria-expanded="false" aria-controls="sni">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">SNI</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sni" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data SNI' && $subTitle == 'Tambah') active @endif" href="/tambah-sni">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Tambah</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Data SNI' && $subTitle == 'Daftar SNI') active @endif @if($title == 'Data SNI' && $subTitle == 'Edit') active @endif" href="/daftar-sni">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Daftar</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Operasi</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar Monthly Report' || $subTitle == 'Edit Monthly Report' || $subTitle == 'Detail Monthly Report') active @endif" aria-current="page" href="/daftar-monthly-report-admin">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monthly Report</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if( $title == 'Master Activity') active @endif " aria-current="page" href="/pilih-bulan">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Master Activity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Review LPS' || $subTitle == 'Detail LPS') active @endif" aria-current="page" href="/input-lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Review LPS</span>
                            </a>
                        </li>
                        <li class="nav-item static-item">
                            <a class="nav-link static-item disabled" href="#" tabindex="-1">
                                <span class="default-icon">Monitoring</span>
                                <span class="mini-icon">-</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar Activity') active @endif" aria-current="page"  href="/daftar-activity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Daftar Activity</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Technical Supporting') active @endif" data-bs-toggle="collapse" @if ($title == 'Technical Supporting') @endif href="#technical-supporting" role="button" aria-expanded="false" aria-controls="technical-supporting">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Technical Support</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="technical-supporting" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Technical Supporting' && $subTitle == 'Update') active @endif" href="/update-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Daftar Update</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Technical Supporting' && $subTitle == 'Progress') active @endif" href="/progress-technical-supporting">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Kolaborasi KI/KM') active @endif" data-bs-toggle="collapse" @if ($title == 'Kolaborasi KI/KM') @endif href="#ki-km" role="button" aria-expanded="false" aria-controls="ki-km">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">KI/KM</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="ki-km" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Kolaborasi KI/KM' && $subTitle == 'Update') active @endif" href="/update-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Daftar Update</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'Kolaborasi KI/KM' && $subTitle == 'Progress') active @endif" href="/progress-ki-km">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Productivity') active @endif" data-bs-toggle="collapse"
                            @if ($title == 'Data Productivity') @endif href="#sidebar-productivity" role="button" aria-expanded="false" aria-controls="sidebar-productivity">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">Productivity</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="sidebar-productivity" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Team') active @endif" href="/productivity-by-team">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Team</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($subTitle == 'By Person') active @endif" href="/productivity-by-person">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">By Person</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Monitoring RKP') active @endif" aria-current="page"  href="/monitoring-rkp">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">RKP BAB 3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'LPS') active @endif" data-bs-toggle="collapse" href="#lps" role="button" aria-expanded="false" aria-controls="lps">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">LPS</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="lps" data-bs-parent="#sidebar-menu">
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'LPS' && $subTitle == 'Monitoring LPS') active @endif" href="/monitoring-lps">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'LPS' && $subTitle == 'Progress') active @endif" href="/progress-lps">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'License Software') active @endif" data-bs-toggle="collapse" href="#license-software" role="button" aria-expanded="false" aria-controls="license-software">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>                            
                                </i>
                                <span class="item-name">License Software</span>
                                <i class="right-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </i>
                            </a>
                            <ul class="sub-nav collapse" id="license-software" data-bs-parent="#sidebar-menu">
                                {{-- <li class="nav-item">
                                    <a class="nav-link @if ($title == 'License Software' && $subTitle == 'Monitoring') active @endif" href="/monitoring-license-software">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> A </i>
                                        <span class="item-name">Monitoring</span>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link @if ($title == 'License Software' && $subTitle == 'Progress') active @endif" href="/progress-license">
                                        <i class="icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <g>
                                                    <circle cx="12" cy="12" r="8" fill="currentColor">
                                                    </circle>
                                                </g>
                                            </svg>
                                        </i>
                                        <i class="sidenav-mini-icon"> U </i>
                                        <span class="item-name">Progress</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar Proyek CSI' || $subTitle == 'Daftar CSI') active @endif" aria-current="page"  href="/monitoring-csi">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">CSI</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($subTitle == 'Daftar License Software' || $subTitle == 'Daftar License') active @endif" aria-current="page"  href="/daftar-license">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Monitoring License</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if ($title == 'Data Log') active @endif" aria-current="page"  href="/daftar-log">
                                <i class="icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-32" width="20" viewBox="0 0 24 24" fill="none">                                    <circle cx="12" cy="12" r="7.5" fill="currentColor" fill-opacity="0.4" stroke="currentColor"></circle>                                </svg>  
                                </i>
                                <span class="item-name">Log Sistem</span>
                            </a>
                        </li>
                  
                @endif
                <li class="nav-item">
                    <br><br>
                </li>
            </ul>
            <!-- Sidebar Menu End -->
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside>

