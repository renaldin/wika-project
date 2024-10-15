@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Data</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="/edit-laporan-keuangan-sub-detail/{{$laporanKeuanganDetail->id}}/{{$detail->id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_dokumen_keuangan">Nama Dokumen</label>
                                <input type="text" class="form-control" name="nama_dokumen_keuangan" id="nama_dokumen_keuangan" placeholder="Masukkan Nama Dokumen" value="{{ old('nama_dokumen_keuangan', $detail->nama_dokumen_keuangan) }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_dokumen_keuangan">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal_dokumen_keuangan" id="tanggal_dokumen_keuangan" value="{{ old('tanggal_dokumen_keuangan', $detail->tanggal_dokumen_keuangan) }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="file_dokumen_keuangan">File Dokumen</label>
                                <input type="file" class="form-control" name="file_dokumen_keuangan" id="file_dokumen_keuangan">
                                {{-- Tambahkan untuk menampilkan file yang ada jika ada --}}
                                @if ($detail->file_dokumen_keuangan)
                                    <p>File saat ini: <a href="{{ asset('uploads/dokumen_keuangan/' . $detail->file_dokumen_keuangan) }}" target="_blank">{{ $detail->file_dokumen_keuangan }}</a></p>
                                @endif
                            </div>
                        </div>
                        @include('components.tombolForm', ['linkKembali' => "/sub-detail-laporan-keuangan/$laporanKeuanganDetail->id"])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
