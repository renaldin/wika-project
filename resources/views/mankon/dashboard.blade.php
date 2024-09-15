@extends('layout.main')

@section('content')

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
   <div class="col-md-12 col-lg-12">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-2 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-01" class="text-center circle-progress-01 circle-progress" style="colour: #3AEDB5"data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Cu Satisfaction Index</p>
                           <h4 class="counter">{{ number_format($akumulasiCsi, 2) }}</h4> <small>Skala: 5.00</small>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-success" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Persentase Pencapaian Program SASAA</p>
                           <h4 class="counter">{{$akumulasiTechnicalSupport}}%</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="900">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-03" class="text-center circle-progress-01 circle-progress circle-progress-warning"  data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">KI/KM</p>
                           <h4 class="counter">{{$akumulasiKiKm}}%</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-04" class="text-center circle-progress-01 circle-progress circle-progress-danger" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Proyek</p>
                           <h4 class="counter">{{$jumlahProyek}}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               {{-- <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-02" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           <svg class="card-slie-arrow icon-24" width="24" viewBox="0 0 24 24">
                              <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                           </svg>
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Dokumen LPS</p>
                           <h4 class="counter">{{$jumlahDokumenLps}}</h4>
                        </div>
                     </div>
                  </div>
               </li> --}}
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div id="circle-progress-05" class="text-center circle-progress-01 circle-progress circle-progress-info" data-min-value="0" data-max-value="100" data-value="100" data-type="percent">
                           {{-- <svg class="card-slie-arrow icon-24" width="24px"  viewBox="0 0 24 24">
                              <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                           </svg> --}}
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">User</p>
                           <h4 class="counter">{{$jumlahUser}}</h4>
                        </div>
                     </div>
                  </div>
               </li>
            </ul>
            <div class="swiper-button swiper-button-next"></div>
            <div class="swiper-button swiper-button-prev"></div>
         </div>
      </div>
   </div>
   <div class="col-md-12 col-lg-12">
      <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
              <div class="flex-wrap card-header d-flex justify-content-between">
                  <div class="header-title">
                    <h4 class="mb-2 card-title text-primary">MONITORING TIMELINE PROYEK</h4>         
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
                              @foreach ($dokumenTimeline as $item)
                                 <th>{{$item->dokumen}}</th>
                              @endforeach
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($timelineMonitor as $item)
                              <tr>
                                 <td>{{$no++}}</td>
                                 <td>{{$item->nama_proyek}}</td>
                                 @foreach($dokumenTimeline as $row)
                                    @php
                                       $timeline_detail = \App\Models\TimelineDetails::where('id_timeline', $item->id)->where('id_dokumen_timeline', $row->id)->first();
                                    @endphp
                                    <td>
                                       @if ($timeline_detail->status <> 0)
                                       <span class="btn-inner">
                                             <svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>                            </svg>                        
                                       </span>
                                       @else
                                          <span class="btn-inner">
                                                <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>                            </svg>                        
                                          </span>
                                       @endif
                                    </td>
                                 @endforeach
                                 {{-- <td class="text-center">
                                    @if ($item->jumlah_dokumen_1 > 0)
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
                                    @if ($item->jumlah_dokumen_2 > 0)
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
                                    @if ($item->jumlah_dokumen_3 > 0)
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
                                    @if ($item->jumlah_dokumen_4 > 0)
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
                                    @if ($item->jumlah_dokumen_5 > 0)
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
                                    @if ($item->jumlah_dokumen_6 > 0)
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
                                    @if ($item->jumlah_dokumen_7 > 0)
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
                                    @if ($item->jumlah_dokumen_8 > 0)
                                      <span class="btn-inner">
                                          <svg class="icon-25 text-success" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 2H16.34C19.73 2 22 4.38 22 7.92V16.091C22 19.62 19.73 22 16.34 22H7.67C4.28 22 2 19.62 2 16.091V7.92C2 4.38 4.28 2 7.67 2ZM11.43 14.99L16.18 10.24C16.52 9.9 16.52 9.35 16.18 9C15.84 8.66 15.28 8.66 14.94 9L10.81 13.13L9.06 11.38C8.72 11.04 8.16 11.04 7.82 11.38C7.48 11.72 7.48 12.27 7.82 12.62L10.2 14.99C10.37 15.16 10.59 15.24 10.81 15.24C11.04 15.24 11.26 15.16 11.43 14.99Z" fill="currentColor"></path>                            </svg>                        
                                      </span>
                                    @else
                                       <span class="btn-inner">
                                             <svg class="icon-25 text-danger" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927ZM15.01 14.9993C15.35 14.6603 15.35 14.1103 15.01 13.7703L13.23 11.9903L15.01 10.2093C15.35 9.87027 15.35 9.31027 15.01 8.97027C14.67 8.62927 14.12 8.62927 13.77 8.97027L12 10.7493L10.22 8.97027C9.87 8.62927 9.32 8.62927 8.98 8.97027C8.64 9.31027 8.64 9.87027 8.98 10.2093L10.76 11.9903L8.98 13.7603C8.64 14.1103 8.64 14.6603 8.98 14.9993C9.15 15.1693 9.38 15.2603 9.6 15.2603C9.83 15.2603 10.05 15.1693 10.22 14.9993L12 13.2303L13.78 14.9993C13.95 15.1803 14.17 15.2603 14.39 15.2603C14.62 15.2603 14.84 15.1693 15.01 14.9993Z" fill="currentColor"></path>                            </svg>                        
                                       </span>
                                    @endif
                                 </td> --}}
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                    <DIV class="flex-wrap card-header d-flex justify-content-between mb-4">
                    </DIV>
                  </div>
              </div>
            </div>
          </div>
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
                        <div id="pie-chart-progress-proyek" persen_0_30="{{$persen_0_30}}" persen_30_50="{{$persen_30_50}}" persen_50_70="{{$persen_50_70}}" persen_70_100="{{$persen_70_100}}"></div>
                     </div>
                     <div class="col-md-12">
                        <div class="table-responsive">
                           <table class="table mt-3">
                              <thead>
                                 <tr>
                                    <th>No</th>
                                    <th>Proyek</th>
                                    <th>Progress</th>
                                    <th>Persentase Report</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @php
                                    $no = 1;
                                 @endphp
                                 @foreach ($daftarProyek as $item)
                                    <tr style="max-width: 10px; overflow-y: auto;">
                                       <td>{{$no++}}</td>
                                       <td style="width: 10px;">{{$item->nama_proyek}}</td>
                                       <td>{{number_format($item->realisasi, 2)}}%</td>
                                       <td>{{number_format($item->status_percentage)}}%</td>
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
          <div class="col-md-12 col-lg-12">
            <div class="overflow-hidden card" data-aos="fade-up" data-aos-delay="600">
               <div class="card-header">
                   <div class="header-title">
                     <h4 class="mb-2 card-title text-primary">MONITORING KELENGKAPAN DATA ENGINEERING UNTUK LPS</h4>         
                   </div>
               </div>
               <div class="card-body">
                 <div class="row p-2">
                   <div class="col-md-12 mb-2">
                      <div class="text-primary">
                         <strong>Keterangan:</strong><br>
                         1. Jika datanya banyak, Anda bisa scroll ke samping <br>
                         2. Arahkan cursor ke setiap chart bar untuk melihat datanya <br>
                         3. <div style="display: inline-block; background-color: #FF6600; width: 20px; height: 20px;"></div> File PDF <br>
                         4. <div style="display: inline-block; background-color: #009EA9; width: 20px; height: 20px;"></div> File Native
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="text-center text-primary"><strong>Dokumen Utama</strong></div>
                     <div class="border rounded">
                      <div style="overflow-x: auto; overflow-y: hidden; height: 100%;">
                         <div id="bar-chart-new-1" proyek="{{$proyekLps}}" dokumen="{{$dokumenLps['utama']}}" ></div>
                      </div>
                     </div>
                   </div>
                   <div class="col-md-12 mt-3">
                     <div class="text-center text-primary"><strong>Dokumen Pendukung</strong></div>
                     <div class="border rounded">
                      <div style="overflow-x: auto; overflow-y: hidden; height: 100%;">
                         <div id="bar-chart-new-2" proyek="{{$proyekLps}}" dokumen="{{$dokumenLps['pendukung']}}"></div>
                      </div>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <A href="/progress-lps" class="btn btn-sm btn-primary float-right mt-3">LPS</A>
                   </div>
                 </div>
               </div>
            </div>
          </div>
      </div>
   </div>
   
</div>

<div class="row">
   <div class="col-md-6">
      <div class="row">
         <div class="col-md-12">
            <div class="card" data-aos="fade-up" data-aos-delay="800">
               <div class="flex-wrap card-header d-flex justify-content-between align-items-center">
                  <div class="header-title">
                     <h4 class="card-title text-primary">REALISASI IMPLEMENTASI BIM PROYEK</h4>
                     {{-- <p class="mb-0">Gross Sales</p>           --}}
                  </div>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table mt-3">
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
                                 <td>Priotitas 1</td>
                                 <td>{{number_format($realisasiPrioritas1, 2)}}%</td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>Priotitas 2</td>
                                 <td>{{number_format($realisasiPrioritas2, 2)}}%</td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>Priotitas 3</td>
                                 <td>{{number_format($realisasiPrioritas3, 2)}}%</td>
                              </tr>
                              <tr>
                                 <td>4</td>
                                 <td>Bukan Priotitas</td>
                                 <td>{{number_format($realisasiBukanPrioritas, 2)}}%</td>
                              </tr>
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

@endsection

