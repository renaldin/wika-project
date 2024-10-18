@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form == 'Tambah')/tambah-laporan-keuangan-sub-detail/{{$LaporanKeuanganDetail->id}} @else/edit-laporan-keuangan-sub-detail/{{$LaporanKeuanganDetail->id}}/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_dokumen_keuangan">Nama Dokumen</label>
                                <input type="text" class="form-control" name="nama_dokumen_keuangan" id="nama_dokumen_keuangan" placeholder="Masukkan Nama Dokumen" @if($form == 'Tambah') value="{{old('nama_dokumen_keuangan')}}" @else value="{{$detail->nama_dokumen_keuangan}}" @endif required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_dokumen_keuangan">Tanggal </label>
                                <input type="date" class="form-control" name="tanggal_dokumen_keuangan" id="tanggal_dokumen_keuangan" placeholder="Masukkan Tanggal Dokumen" @if($form == 'Tambah') value="{{old('tanggal_dokumen_keuangan')}}" @else value="{{$detail->tanggal_dokumen_keuangan}}" @endif required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="file_dokumen_keuangan">File Dokumen</label>
                                <input type="file" class="form-control" name="file_dokumen_keuangan" id="file_dokumen">
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => "/sub-detail-laporan-keuangan/$LaporanKeuanganDetail->id"])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection