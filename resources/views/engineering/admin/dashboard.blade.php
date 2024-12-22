@extends('layout.main')

@section('content')
<!-- Modal -->
<!-- Modal -->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"> <!-- Menambahkan kelas modal-lg untuk memperbesar modal -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selamat datang!</h5>
                <!-- Tombol Tutup -->
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Menampilkan gambar dari public/image -->
                <img src="{{ asset('image/carousel2.jpeg') }}" alt="Selamat datang!" class="img-fluid" style="width: 130%; height: auto;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>



<div class="row mb-4">
    <div class="col-md-12">
        <label for="projectSelect">Pilih Proyek:</label>
        <select id="projectSelect" class="form-control">
            <!-- Option untuk memilih "Semua Proyek" -->
            <option value="all" 
                    data-progress="{{ json_encode([ 
                        '0-20' => $persen_0_20, 
                        '20-50' => $persen_20_50, 
                        '50-70' => $persen_50_70, 
                        '70-99' => $persen_70_99, 
                        '100' => $persen_100 
                    ]) }}" 
                    data-proyek="{{ json_encode($daftarProyek->toArray()) }}" 
                    data-bim="{{ json_encode([$bukanPrioritas, $prioritas1, $prioritas2, $prioritas3]) }}" 
                    data-rkp="{{ json_encode($daftarRkp->toArray()) }}" 
                    data-dokumen="{{ 1 }}">
                Semua Proyek
            </option>

            <!-- Loop untuk setiap proyek -->
            @foreach ($daftarProyek as $item)
                <option value="{{ $item->id_proyek }}" 
                        data-progress="{{ json_encode([ 
                            '0-20' => $item->realisasi <= 20 ? 1 : 0, 
                            '20-50' => $item->realisasi > 20 && $item->realisasi <= 50 ? 1 : 0, 
                            '50-70' => $item->realisasi > 50 && $item->realisasi <= 70 ? 1 : 0,
                            '70-99' => $item->realisasi > 70 && $item->realisasi <= 99.99 ? 1 : 0,  
                            '100' => $item->realisasi >= 100 ? 1 : 0 
                        ]) }}" 
                        data-bim="{{ json_encode([ 
                            $item->prioritas === 'Bukan Prioritas' ? 100 : 0, 
                            $item->prioritas === 'Prioritas 1' ? 100 : 0, 
                            $item->prioritas === 'Prioritas 2' ? 100 : 0, 
                            $item->prioritas === 'Prioritas 3' ? 100 : 0 
                        ]) }}"
                        data-proyek="{{ json_encode($item) }}"
                        data-rkp="{{ json_encode($item) }}">
                    {{ $item->nama_proyek }}
                </option>
            @endforeach
        </select>
    </div>
</div>



@php
    $global = $chartLicense['fullEngineering'] + $chartLicense['fullOffice'];
    $nonGlobal = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'] + $chartLicense['nonOffice'] + $chartLicense['trialOffice'] + $chartLicense['studentOffice'];
    $totalGlobal = $global + $nonGlobal;
    $persenGlobal = $global != 0 ? $global / $totalGlobal * 100 : 0;
    $persenNonGlobal = $nonGlobal != 0 ? $nonGlobal / $totalGlobal * 100 : 0;

    $totalEngineer = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'] + $chartLicense['fullEngineering'];
    $lainEngineer = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'];
    $persenFullEngineer =$chartLicense['fullEngineering'] != 0 ? $chartLicense['fullEngineering'] / $totalEngineer * 100 : 0;
    $persenLainEngineer = $lainEngineer != 0 ? $lainEngineer / $lainEngineer * 100 : 0;

    $lainOffice = $chartLicense['nonOffice'] + $chartLicense['trialOffice'] + $chartLicense['studentOffice'];
    $totalOffice = $lainOffice + $chartLicense['fullOffice'];
    $persenLainOffice = $lainOffice != 0 ? $lainOffice / $totalOffice * 100 : 0;
    $persenFullOffice = $chartLicense['fullOffice'] != 0 ? $chartLicense['fullOffice'] / $totalOffice * 100 : 0;
@endphp

<div class="row"> 
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-3 col-sm-6 d-flex align-items-stretch">
                <div class="card o-hidden small-widget flex-fill">
                    <div class="card-body total-project border-b-primary border-2">
                        <span class="f-light f-w-500 f-14">Customer Satisfaction Index</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{ number_format($akumulasiCsi, 2) }}</h2>
                                <small>Skala: 5.00</small>
                            </div>
                            <div class="product-sub bg-primary-light">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#color-swatch') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 d-flex align-items-stretch">
                <div class="card o-hidden small-widget flex-fill">
                    <div class="card-body total-Progress border-b-warning border-2">
                        <span class="f-light f-w-500 f-14">Persentase Pencapaian Program SASAA</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{$akumulasiTechnicalSupport}}%</h2>
                            </div>
                            <div class="product-sub bg-warning-light">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#tick-circle') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 d-flex align-items-stretch">
                <div class="card o-hidden small-widget flex-fill">
                    <div class="card-body total-Complete border-b-secondary border-2">
                        <span class="f-light f-w-500 f-14">KI/KM <br>&nbsp;</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{$jumlahKIKM}}</h2>
                            </div>
                            <div class="product-sub bg-secondary-light">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#add-square') }}"></use>
                                </svg>
                            </div>
                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 d-flex align-items-stretch">
                <div class="card o-hidden small-widget flex-fill">
                    <div class="card-body total-upcoming">
                        <span class="f-light f-w-500 f-14">Proyek<br>&nbsp;</span>
                        <div class="project-details">
                            <div class="project-counter">
                                <h2 class="f-w-600">{{$jumlahProyek}}</h2>
                            </div>
                            <div class="product-sub" style="background-color: #64b5f6;">
                                <svg class="invoice-icon">
                                    <use href="{{ asset('admin/assets/svg/icon-sprite.svg#edit-2') }}"></use>
                                </svg>
                            </div>

                        </div>
                        <ul class="bubbles">
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                            <li class="bubble"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card" data-aos="fade-up" data-aos-delay="600"> <!-- Update Progress Proyek -->
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="mb-2 card-title text-center">UPDATE PROGRESS PROYEK</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <!-- Pie Chart Progress Proyek -->
                            <div class="col-md-6">
                                <div id="pie-chart-progress-proyek" style="width: 150px; height: 150px; margin: 0 auto;"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="legend mt-3">
                                    <ul class="list-unstyled">
                                        <li>
                                            <span style="background-color: #FF6384; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 5px;"></span>
                                            0 - 20%
                                        </li>
                                        <li>
                                            <span style="background-color: #FFCE56; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 5px;"></span>
                                            20 - 50%
                                        </li>
                                        <li>
                                            <span style="background-color: #36A2EB; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 5px;"></span>
                                            50 - 70%
                                        </li>
                                        <li>
                                            <span style="background-color: #4BC0C0; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 5px;"></span>
                                            70 - 99.99%
                                        </li>
                                        <li>
                                            <span style="background-color: #000080; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 5px;"></span>
                                            100% (Proyek Selesai)
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="mb-2 card-title text-center">TABEL PROGRESS PROYEK</h4>
                            </div>
                        </div>
                        <!-- Tabel Progress Proyek -->
   
                        <div class="table-responsive mt-3" style="max-height: 150px; overflow-y: auto;">
                        <table id="progressTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Proyek</th>
                                        <th>Realisasi (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($daftarProyek as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama_proyek}}</td>
                                            <td>{{number_format($item->realisasi, 2)}}%</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
 

                        <!-- Pie Chart Lisensi Software -->
                        <div class="row mt-3">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="mb-2 card-title text-center">LISENSI SOFTWARE</h4>
                            </div>
                        </div>
                            <!-- Software Global -->
                            <div class="col-md-4 text-center">
                                <strong>Software Global</strong>
                                <div>
                                    <canvas id="pie-chart-software-1" style="width: 100px; height: 100px;"></canvas>
                                </div>
                            </div>
                            <!-- Software Engineering -->
                            <div class="col-md-4 text-center">
                                <strong>Software Engineering</strong>
                                <div>
                                    <canvas id="pie-chart-software-2" style="width: 100px; height: 100px;"></canvas>
                                </div>
                            </div>
                            <!-- Software Office -->
                            <div class="col-md-4 text-center">
                                <strong>Software Office</strong>
                                <div>
                                    <canvas id="pie-chart-software-3" style="width: 100px; height: 100px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">STATUS IMPLEMENTASI BIM</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex">
                            <!-- Pie Chart -->
                            <div class="flex-shrink-0" style="width: 200px; height: 200px;">
                                <canvas id="pie-chart-status-implementasi-bim"></canvas>
                            </div>
                            <!-- Tabel -->
                            <div class="flex-grow-1 ml-3">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Prioritas</th>
                                            <th>Persentase</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Prioritas 1</td>
                                            <td>{{ number_format($realisasiPrioritas1, 2) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Prioritas 2</td>
                                            <td>{{ number_format($realisasiPrioritas2, 2) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Prioritas 3</td>
                                            <td>{{ number_format($realisasiPrioritas3, 2) }}%</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Bukan Prioritas</td>
                                            <td>{{ number_format($realisasiBukanPrioritas, 2) }}%</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Kotak Productivity Rate -->
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card" data-aos="fade-up" data-aos-delay="800">
                    <div class="card-header text-center">
                        <h4 class="card-title">PRODUCTIVITY RATE {{date('Y')}}</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart-productivity-rate-mixed" style="width: 250px; height: 250px; margin: 0 auto;"></div>
                    </div>
                </div>
                </div>
            </div>

            <style>
                /* Style untuk layout Flexbox */
                .d-flex {
                    display: flex;
                    justify-content: space-between; /* Memastikan pie chart dan tabel tersebar rata */
                }

                /* Menyesuaikan tabel dan chart */
                .table-sm th, .table-sm td {
                    padding: 0.5rem;
                    font-size: 0.875rem;
                }

                .flex-shrink-0 {
                    flex-shrink: 0; /* Agar pie chart tidak mengecil */
                }

                .flex-grow-1 {
                    flex-grow: 1; /* Agar tabel mengisi ruang yang tersedia */
                }

                .ml-3 {
                    margin-left: 1rem;
                }
            </style>
<!-- Kotak RKP (Monitoring RKP Proyek) -->
    <div class="col-md-6 mt-4">
        <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
            <div class="flex-wrap card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="mb-2 card-title text-primary">MONITORING RKP PROYEK</h4>         
                </div>
            </div>
            <div class="p-0 card-body" id="basic-table-container">
                <div class="p-0 card-body" id="basic-table-container">
                    <div class="mt-4 table-responsive">
                        <div style="max-height: 300px; overflow-y: auto;">
                            <table id="basic-table" class="table mb-0" role="grid">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Proyek</th>
                                        <th>Review RKP Tahap 1</th>
                                        <th>Review RKP Tahap 2</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($daftarRkp as $item)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->nama_proyek}}</td>
                                        <td class="text-center">
                                            @if ($item->review1 == 1)
                                                <span class="btn-inner">
                                                    <svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>
                                                    </svg>                        
                                                </span>
                                            @else
                                                <span class="btn-inner">
                                                    <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>
                                                    </svg>                        
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if ($item->review2 == 1)
                                                <span class="btn-inner">
                                                    <svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.9 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>
                                                    </svg>                        
                                                </span>
                                            @else
                                                <span class="btn-inner">
                                                    <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>
                                                    </svg>                        
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </div>
        </div>
        
    
        </div>
        
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
        <!-- Card Container -->
        <div class="card shadow-lg" data-aos="fade-up" data-aos-delay="600">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Monitoring Kelengkapan Data Engineering untuk LPS</h4>
            </div>
            <div class="card-body">
                <!-- Keterangan Section -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="text-muted">
                            <strong>Keterangan:</strong><br>
                            1. Jika datanya banyak, Anda bisa scroll ke samping <br>
                            2. Arahkan cursor ke setiap chart bar untuk melihat datanya <br>
                            3. 
                            <span class="badge" style="background-color: #FF6600;">File PDF</span> <br>
                            4. 
                            <span class="badge" style="background-color: #009EA9;">File Native</span>
                        </div>
                    </div>
                </div>

                <!-- Dokumen Utama and Dokumen Pendukung Sejajar -->
                <div class="row mb-4">
                    <!-- Dokumen Utama -->
                    <div class="col-md-6">
                        <div class="text-center text-success">
                            <h5><strong>Dokumen Utama</strong></h5>
                        </div>
                        <div class="border rounded p-3">
                            <div style="overflow-x: auto; overflow-y: hidden;">
                                <canvas id="bar-chart-new-1" proyek="{{$proyekLps}}" dokumen="{{$dokumenLps['utama']}}"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Dokumen Pendukung -->
                    <div class="col-md-6">
                        <div class="text-center text-success">
                            <h5><strong>Dokumen Pendukung</strong></h5>
                        </div>
                        <div class="border rounded p-3">
                            <div style="overflow-x: auto; overflow-y: hidden;">
                                <canvas id="bar-chart-new-2" proyek="{{$proyekLps}}" dokumen="{{$dokumenLps['pendukung']}}"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button LPS -->
                <div class="col-md-12 text-right">
                    <a href="/progress-lps" class="btn btn-sm btn-success mt-3">
                        LPS
                    </a>
                </div>
            </div>
        </div>
    </div>


<!-- Script for Modal (if needed) -->
<script>
    @if(session('showLoginModal'))
        $(document).ready(function() {
            $('#loginModal').modal('show');
        });
    @endif
</script>

@endsection