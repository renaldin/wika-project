@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Proyek</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <input type="text" class="form-control" value="{{$detail->nama_proyek}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Implementasi Bim</label>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="dua_d" id="dua_d" @if($detail->dua_d == 1) checked @endif disabled>
                                <label class="form-check-label" for="dua_d">
                                    2D
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="tiga_d" id="tiga_d" @if($detail->tiga_d == 1) checked @endif disabled>
                                <label class="form-check-label" for="tiga_d">
                                    3D
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="empat_d" id="empat_d" @if($detail->empat_d == 1) checked @endif disabled>
                                <label class="form-check-label" for="empat_d">
                                    4D
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="lima_d" id="lima_d" @if($detail->lima_d == 1) checked @endif disabled>
                                <label class="form-check-label" for="lima_d">
                                    5D
                                </label>
                            </div>
                            <div class="form-check d-block">
                                <input class="form-check-input" type="checkbox" name="cde" id="cde" @if($detail->cde == 1) checked @endif disabled>
                                <label class="form-check-label" for="cde">
                                    CDE
                                </label>
                            </div>
                            <div>
                                <input type="text" class="form-control" value="{{$detail->kesiapan_bim5d}}" readonly>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Tanggal Mulai</label>
                            <input type="text" class="form-control" value="{{$detail->tanggal}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Tipe Konstruksi</label>
                            <input type="text" class="form-control" value="{{$detail->tipe_konstruksi}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Prioritas</label>
                            <input type="text" class="form-control" value="{{$detail->prioritas}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Status</label>
                            <input type="text" class="form-control" value="{{$detail->status}}" readonly>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">{{$subTitle}}</h4>
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
                            <th><span class="f-light f-w-600">No</span></th>
                            <th><span class="f-light f-w-600">Nama Proyek</span></th>
                            <th><span class="f-light f-w-600">Tanggal Input</span></th>
                            <th><span class="f-light f-w-600">Realisasi Proyek</span></th>
                            <th><span class="f-light f-w-600">Evidence</span></th>
                            <th style="min-width: 100px"><span class="f-light f-w-600">Aksi</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarProyek as $item)
                        <tr>
                            <td><p class="f-light">{{$no++}}</p></td>
                            <td><p class="f-light">{{$item->nama_proyek}}</p></td>
                            <td><p class="f-light">{{$item->tanggal_input}}</p></td>
                            <td><p class="f-light">{{$item->realisasi_proyek}}%</p></td>
                            <td><p class="f-light">{{$item->evidence_link}}%</p></td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Monthly Report" data-original-title="Edit" href="/detail-monthly-report-admin/{{$item->id_proyek}}">
                                        <span class="btn-inner">
                                            Monthly Report
                                        </span>
                                    </a>
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
                        <h6 class="mb-0">Nama Proyek :</h6>
                        <p>{{$item->nama_proyek}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Tanggal Input :</h6>
                        <p>{{$item->tanggal_report}}</p>
                    </div>
                    <div class="media-support-body">
                        <h6 class="mb-0">Realisasi Proyek :</h6>
                        <p>{{$item->realisasi_proyek}}</p>
                    </div>
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
                    <div class="media-support-body">
                        <h6 class="mb-0">Evidence :</h6>
                        <p>{{$item->evidence_link}}</p>
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