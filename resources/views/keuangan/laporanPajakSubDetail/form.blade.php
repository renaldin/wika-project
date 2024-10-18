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
                <form action="@if($form == 'Tambah')/tambah-laporan-pajak-sub-detail/{{$LaporanPajakDetail->id}} @else/edit-laporan-pajak-sub-detail/{{$LaporanPajakDetail->id}}/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data">
    <div class="row">
        @csrf
        <div class="form-group col-md-6">
            <label class="form-label" for="nama_dokumen_pajak">Nama Dokumen</label>
            <input type="text" class="form-control" name="nama_dokumen_pajak" id="nama_dokumen_pajak" placeholder="Masukkan Nama Dokumen" @if($form == 'Tambah') value="{{old('nama_dokumen_pajak')}}" @else value="{{$detail->nama_dokumen_pajak}}" @endif required>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="tanggal_dokumen_pajak">Tanggal </label>
            <input type="date" class="form-control" name="tanggal_dokumen_pajak" id="tanggal_dokumen_pajak placeholder="Masukkan Tanggal Dokumen" @if($form == 'Tambah') value="{{old('tanggal_dokumen_pajak')}}" @else value="{{$detail->tanggal_dokumen_pajak}}" @endif required>
        </div>
        <div class="form-group col-md-6">
            <label class="form-label" for="file_dokumen_">File Dokumen</label>
            <input type="file" class="form-control" name="file_dokumen_pajak" id="file_dokumen">
        </div>
    </div>
    {{-- Component: tombolForm --}}
    @include('components.tombolForm', ['linkKembali' => "/sub-detail-laporan-pajak/$LaporanPajakDetail->id"])
</form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection