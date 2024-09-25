@extends('layout.main')

@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card o-hidden small-widget">
                <div class="card-body total-project border-b-primary border-2"><span class="f-light f-w-500 f-14">Customer Satisfaction Index</span>
                  <div class="project-details"> 
                    <div class="project-counter"> 
                      <h2 class="f-w-600">{{$akumulasiCsi}}</h2><small>Skala: 5.00</small>
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
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card o-hidden small-widget">
                <div class="card-body total-Progress border-b-warning border-2"> <span class="f-light f-w-500 f-14">Persentase Pencapaian Program SASAA</span>
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
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card o-hidden small-widget">
                <div class="card-body total-Complete border-b-secondary border-2"><span class="f-light f-w-500 f-14">KI/KM <br>&nbsp;</span>
                  <div class="project-details">
                    <div class="project-counter">
                      <h2 class="f-w-600">{{$akumulasiKiKm}}%</h2>
                    </div>
                    <div class="product-sub bg-secondary-light"> 
                      <svg class="invoice-icon">
                        <use href="{{ asset('admin/assets/svg/icon-sprite.svg#add-square') }}"></use>
                      </svg>
                    </div>
                  </div>
                  <ul class="bubbles"> 
                    <li class="bubble"> </li>
                    <li class="bubble"></li>
                    <li class="bubble"></li>
                    <li class="bubble"> </li>
                    <li class="bubble"></li>
                    <li class="bubble"> </li>
                    <li class="bubble"></li>
                    <li class="bubble"></li>
                    <li class="bubble"> </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card o-hidden small-widget">
                <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Proyek<br>&nbsp;</span>
                  <div class="project-details"> 
                    <div class="project-counter">
                      <h2 class="f-w-600">{{$jumlahProyek}}</h2>
                    </div>
                    <div class="product-sub bg-light-light"> 
                      <svg class="invoice-icon">
                        <use href="{{ asset('admin/assets/svg/icon-sprite.svg#edit-2') }}"></use>
                      </svg>
                    </div>
                  </div>
                  <ul class="bubbles"> 
                    <li class="bubble"> </li>
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
            <div class="col-xl-3 col-sm-6">
              <div class="card o-hidden small-widget">
                <div class="card-body total-upcoming"><span class="f-light f-w-500 f-14">Dokumen LPS<br>&nbsp;</span>
                  <div class="project-details"> 
                    <div class="project-counter">
                      <h2 class="f-w-600">{{$jumlahDokumenLps}}</h2>
                    </div>
                    <div class="product-sub bg-light-light"> 
                      <svg class="invoice-icon">
                        <use href="{{ asset('admin/assets/svg/icon-sprite.svg#edit-2') }}"></use>
                      </svg>
                    </div>
                  </div>
                  <ul class="bubbles"> 
                    <li class="bubble"> </li>
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
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-no-border total-revenue"> 
                  <h4>Update Progress Proyek</h4>
                  <div class="sales-chart-dropdown-select">
                    <div class="card-header-right-icon">
                      <div class="dropdown">
                        <button class="btn dropdown-toggle dropdown-toggle-store" id="dropdownMenuButtonStore" data-bs-toggle="dropdown" aria-expanded="false">This Week</button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonStore"><a class="dropdown-item" href="#">This Day</a><a class="dropdown-item" href="#">This Month</a><a class="dropdown-item" href="#">This year</a></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body pt-0"> 
                  <div class="statistics"> 
                    <div id="chartProject" persen_0_30="{{$persen_0_30}}" persen_30_50="{{$persen_30_50}}" persen_50_70="{{$persen_50_70}}" persen_70_100="{{$persen_70_100}}"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6"> 
              <div class="card"> 
                <div class="card-header card-no-border total-revenue"> 
                  <h4>Today Work</h4><a href="product.html">View All </a>
                </div>
                <div class="card-body pt-0"> 
                  <div class="today-work-table table-responsive custom-scrollbar">
                    <table class="today-working-table w-100"> 
                      <tbody>
                        <tr>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">App Design</span><a class="f-w-500 f-14" href="product.html">NFT Illustration...</a></td>
                          <td> <span class="f-w-500 f-light d-block f-12 mb-1">Assigned to</span><a class="f-w-500 f-14" href="product.html">Cody Fisher</a></td>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Days Left</span><a class="f-w-500 f-14" href="product.html">02</a></td>
                          <td class="text-end">
                            <div class="badge-light-primary product-sub badge rounded-pill "><span>High</span></div>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">App Design</span><a class="f-w-500 f-14" href="product.html">NFT Illustration...</a></td>
                          <td> <span class="f-w-500 f-light d-block f-12 mb-1">Arlene McCoy</span><a class="f-w-500 f-14" href="product.html">Assigned to</a></td>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Days Left</span><a class="f-w-500 f-14" href="product.html">12</a></td>
                          <td class="text-end">
                            <div class="badge-light-primary product-sub badge rounded-pill "><span>High</span></div>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Web Design</span><a class="f-w-500 f-14" href="product.html">Appron’s 3D Co...</a></td>
                          <td> <span class="f-w-500 f-light d-block f-12 mb-1">Assigned to</span><a class="f-w-500 f-14" href="product.html">Kristin Watson</a></td>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Days Left</span><a class="f-w-500 f-14" href="product.html">12</a></td>
                          <td class="text-end">
                            <div class="badge-light-warning product-sub badge rounded-pill "><span>Medium</span></div>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Desktop App</span><a class="f-w-500 f-14" href="product.html">Rental Car</a></td>
                          <td> <span class="f-w-500 f-light d-block f-12 mb-1">Assigned to</span><a class="f-w-500 f-14" href="product.html">Darlene Robertson</a></td>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Days Left</span><a class="f-w-500 f-14" href="product.html">05</a></td>
                          <td class="text-end">
                            <div class="badge-light-secondary product-sub badge rounded-pill "><span>low</span></div>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Template Design</span><a class="f-w-500 f-14" href="product.html">E-commerce</a></td>
                          <td> <span class="f-w-500 f-light d-block f-12 mb-1">Assigned to</span><a class="f-w-500 f-14" href="product.html">Wade Warren</a></td>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Days Left</span><a class="f-w-500 f-14" href="product.html">31</a></td>
                          <td class="text-end">
                            <div class="badge-light-primary product-sub badge rounded-pill "><span>High</span></div>
                          </td>
                        </tr>
                        <tr>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">App Design</span><a class="f-w-500 f-14" href="product.html">Food Delivery</a></td>
                          <td> <span class="f-w-500 f-light d-block f-12 mb-1">Assigned to</span><a class="f-w-500 f-14" href="product.html">Smith John</a></td>
                          <td><span class="f-w-500 f-light d-block f-12 mb-1">Days Left</span><a class="f-w-500 f-14" href="product.html">20</a></td>
                          <td class="text-end">
                            <div class="badge-light-warning product-sub badge rounded-pill "><span>Medium</span></div>
                          </td>
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
@endsection



