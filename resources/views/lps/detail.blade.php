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
                            <input type="text" class="form-control" value="{{$detailProyek->nama_proyek}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Tanggal Mulai</label>
                            <input type="text" class="form-control" value="{{$detailProyek->tanggal}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Tipe Konstruksi</label>
                            <input type="text" class="form-control" value="{{$detailProyek->tipe_konstruksi}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Prioritas BIM</label>
                            <input type="text" class="form-control" value="{{$detailProyek->prioritas}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Status</label>
                            <input type="text" class="form-control" value="{{$detailProyek->status}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Reviewer</label>
                            <input type="text" class="form-control" value="{{$detailProyek->nama_user}}" readonly>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($user->role == 'Manajemen')
                                <a href="/download-monitoring-lps/{{$detailProyek->id_proyek}}" target="_blank" class="btn btn-primary mb-4">Download PDF</a>      
                            @endif
                        </div>
                    </div>
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
                <h4 class="card-title">Dokumen Utama</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                <div class="row">
                    @if (session('successUtama'))
                        <div class="col-lg-12">
                            <div class="alert bg-primary text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                    {{ session('successUtama') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    @if (session('failUtama'))
                        <div class="col-lg-12">
                            <div class="alert bg-danger text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    {{ session('failUtama') }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped" id="lpsUtamaTable">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th colspan="2">Dokumentasi Utama Terdiri Dari:</th>
                                <th>PDF</th>
                                <th>NATIVE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($detailProyekLps as $item)
                                @if ($item->id_proyek == $detailProyek->id_proyek && $item->jenis_dokumen == 'Utama')
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->no_urut}}</td>
                                        <td width="900px" class="text-wrap">{{$item->nama_dokumen}}</td>
                                        <td class="text-center">
                                            <form action="/edit-proyek-lps/{{$item->id_lps}}/pdf" id="pdfForm{{$item->id_lps}}" method="POST">
                                                @csrf
                                                <div class="form-check d-block">
                                                    <input class="form-check-input" type="checkbox" name="pdf" id="pdf{{$item->id_lps}}" @if($item->pdf == 1) checked @endif onclick="submitForm('pdfForm{{$item->id_lps}}')">
                                                    <input type="hidden" name="jenis_dokumen" value="{{$item->jenis_dokumen}}">
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <form action="/edit-proyek-lps/{{$item->id_lps}}/native" id="nativeForm{{$item->id_lps}}" method="POST">
                                                @csrf
                                                <div class="form-check d-block">
                                                    <input class="form-check-input" type="checkbox" name="native" id="native{{$item->id_lps}}" @if($item->native == 1) checked @endif onclick="submitForm('nativeForm{{$item->id_lps}}')">
                                                    <input type="hidden" name="jenis_dokumen" value="{{$item->jenis_dokumen}}">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
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
                <h4 class="card-title">Dokumen Pendukung</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                <div class="row">
                    @if (session('successPendukung'))
                        <div class="col-lg-12">
                            <div class="alert bg-primary text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                    {{ session('successPendukung') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    @if (session('failPendukung'))
                        <div class="col-lg-12">
                            <div class="alert bg-danger text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    {{ session('failPendukung') }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th colspan="2">Dokumentasi Pendukung Terdiri Dari:</th>
                                <th>PDF</th>
                                <th>NATIVE</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($detailProyekLps as $item)
                                @if ($item->id_proyek == $detailProyek->id_proyek && $item->jenis_dokumen == 'Pendukung')
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$item->no_urut}}</td>
                                        <td width="900px" class="text-wrap">{{$item->nama_dokumen}}</td>
                                        <td class="text-center">
                                            <form action="/edit-proyek-lps/{{$item->id_lps}}/pdf" id="pdfForm{{$item->id_lps}}" method="POST">
                                                @csrf
                                                <div class="form-check d-block">
                                                    <input class="form-check-input" type="checkbox" name="pdf" id="pdf{{$item->id_lps}}" @if($item->pdf == 1) checked @endif onclick="submitForm('pdfForm{{$item->id_lps}}')">
                                                    <input type="hidden" name="jenis_dokumen" value="{{$item->jenis_dokumen}}">
                                                </div>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <form action="/edit-proyek-lps/{{$item->id_lps}}/native" id="nativeForm{{$item->id_lps}}" method="POST">
                                                @csrf
                                                <div class="form-check d-block">
                                                    <input class="form-check-input" type="checkbox" name="native" id="native{{$item->id_lps}}" @if($item->native == 1) checked @endif onclick="submitForm('nativeForm{{$item->id_lps}}')">
                                                    <input type="hidden" name="jenis_dokumen" value="{{$item->jenis_dokumen}}">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @foreach ($detailProyekLps as $item)
<div class="modal fade" id="edit{{$item->id_lps}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/edit-proyek-lps/{{$item->id_lps}}" method="POST">
                    @csrf
                    <div class="form-group col-md-6">
                        <label class="form-label">PDF</label>
                        <div class="form-check d-block">
                            <input class="form-check-input" type="checkbox" name="pdf" id="pdf" @if($item->pdf == 1) checked @endif>
                            <input type="hidden" name="jenis_dokumen" value="{{$item->jenis_dokumen}}">
                            <label class="form-check-label" for="pdf">
                                Check
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">NATIVE</label>
                        <div class="form-check d-block">
                            <input class="form-check-input" type="checkbox" name="native" id="native" @if($item->native == 1) checked @endif>
                            <label class="form-check-label" for="native">
                                Check
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

@endsection