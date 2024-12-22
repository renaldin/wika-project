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
        <div class="col-md-12 col-lg-12">
      <div class="row">
         
          <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
              <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                    <h4 class="mb-2 card-title text-primary">MONITORING RKP BAB 12 PROYEK</h4>         
                  </div>
              </div>
              <div class="p-0 card-body">
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
                            @foreach ($daftarRkpMankon as $item)
                              <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_proyek}}</td>
                                <td class="text-center">
                                  @if ($item->review1 == 1)
                                      <span class="btn-inner">
                                          <svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>                            </svg>                        
                                      </span>
                                  @else
                                      <span class="btn-inner">
                                          <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>                            </svg>                        
                                      </span>
                                  @endif
                                </td>
                                <td class="text-center">
                                    @if ($item->review2 == 1)
                                        <span class="btn-inner">
                                            <svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>                            </svg>                        
                                        </span>
                                    @else
                                        <span class="btn-inner">
                                            <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>                            </svg>                        
                                        </span>
                                    @endif
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                    <DIV class="flex-wrap card-header d-flex justify-content-between mb-4">
                      <A href="/monitoring-rkp-mankon" class="btn btn-sm btn-primary">RKP</A>
                    </DIV>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-lg-12">
            <div class="card" data-aos="fade-up" data-aos-delay="600">
               <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                     <h4 class="mb-2 card-title">Update Progress Proyek</h4>
                     <p class="mb-0">
                        <svg class ="me-2 icon-24" width="24" height="24" viewBox="0 0 24 24">
                           <path fill="#17904b" d="M13,20H11V8L5.5,13.5L4.08,12.08L12,4.16L19.92,12.08L18.5,13.5L13,8V20Z" />
                        </svg>
                        {{-- 16% this month --}}
                     </p>
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div id="pie-chart-progress-proyek" persen_0_20="{{$persen_0_20}}" persen_20_50="{{$persen_20_50}}" persen_50_70="{{$persen_50_70}}" persen_70_99="{{$persen_70_99}}" persen_100="{{$persen_100}}"></div>
                     </div>
                     <div class="col-md-12">
                     <div class="table-responsive mt-3" style="max-height: 350px; overflow-y: auto;">
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
 
                     </div>
                  </div>
               </div>
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