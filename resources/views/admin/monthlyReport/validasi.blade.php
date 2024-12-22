@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">{{$title}}</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                <div class="row">
                    @if (session('success'))
                        <div class="col-lg-12">
                            <div class="alert bg-primary text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                    {{ session('success') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    @if (session('fail'))
                        <div class="col-lg-12">
                            <div class="alert bg-danger text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    {{ session('fail') }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Tanggal Input</th>
                            <th>Realisasi Proyek</th>
                            <th>Evidence</th>
                            <th>Status Check</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarMonthlyReport as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->proyek?->nama_proyek}}</td>
                                <td>{{$item->tanggal_report}}</td>
                                <td>{{$item->realisasi_proyek}}%</td>
                                <td>{{$item->evidence_link}}</td>
                                <td>
                                    @if ($item->is_check == 0)
                                        <span class="badge badge-danger">Belum Proses Validasi</span>
                                    @else
                                        <span class="badge badge-primary">Proses Validasi</span>
                                    @endif    
                                </td>
                                <td>
                                <div class="d-flex justify-content-start align-items-center list-user-action">
                                <button type="button" class="btn btn-sm btn-icon btn-primary btn-verifikasi" data-toggle="tooltip" data-placement="top" title="Kirim Ke Head Office" data-original-title="Kirim Ke Head Office" data-href="/proses-validasi-monthly-report/{{$item->id_monthly_report}}" data-content="Apakah Anda yakin akan kirim ke Head Office?" data-title="Kirim ke Head Office">
                                            <span class="btn-inner">
                                                <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                 
                                            </span>
                                        </button>

    <!-- Tombol Kirim Kembali ke Tim Proyek -->
    <button type="button" class="btn btn-sm btn-icon btn-danger btn-verifikasi" data-toggle="tooltip" data-placement="top" title="Kirim Kembali ke Tim Proyek">
        <span class="btn-inner">
            <svg class="icon-32" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 12H5m0 0l7-7m-7 7l7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
        </span>
    </button>

    <!-- Tombol Detail Proyek -->
    <button type="button" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#detail" data-placement="top" title="Detail Proyek">
        <span class="btn-inner">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22.4541 11.3918C22.7819 11.7385 22.7819 12.2615 22.4541 12.6082C21.0124 14.1335 16.8768 18 12 18C7.12317 18 2.98759 14.1335 1.54586 12.6082C1.21811 12.2615 1.21811 11.7385 1.54586 11.3918C2.98759 9.86647 7.12317 6 12 6C16.8768 6 21.0124 9.86647 22.4541 11.3918Z" stroke="currentColor"></path>
                <circle cx="12" cy="12" r="5" stroke="currentColor"></circle>
                <circle cx="12" cy="12" r="3" fill="#130F26"></circle>
            </svg>
        </span>
    </button>
</div>




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

@foreach ($daftarMonthlyReport as $item)
<div class="modal fade" id="detail{{$item->id_monthly_report}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Monthly Report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="media-support-body">
                        <h6 class="mb-0">Bulan Report :</h6>
                        <p>{{$item->bulan_report}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Kendala Implementasi Bim :</h6>
                        <p>{{$item->kendala_implementasi_bim}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Engineering Issue Berjalan :</h6>
                        <p>{{$item->engineering_issue_berjalan}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Masalah Produksi Berjalan :</h6>
                        <p>{{$item->masalah_produksi_berjalan}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Konsep Lean Construction Berjalan :</h6>
                        <p>{{$item->konsep_lean_construction_berjalan}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Feedback Untuk Perusahaan :</h6>
                        <p>{{$item->feedback_untuk_perusahaan}}</p>
                    </div>
                    @if($item->remarks !== null)
                        <div class="media-support-body">
                            <h6 class="mb-0">Remarks :</h6>
                            <p>{{$item->remarks}}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection