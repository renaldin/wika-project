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
                    <form action="@if($form == 'Tambah') /tambah-library @elseif($form == 'Edit') /edit-library/{{$detail->id_library}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_dokumen">Nama Library</label>
                            <input type="text" class="form-control @error('nama_dokumen') is-invalid @enderror" id="nama_dokumen" name="nama_dokumen" value="@if($form == 'Tambah'){{ old('nama_dokumen') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->nama_dokumen}}@endif" autofocus placeholder="Masukkan Nama Dokumen">
                            @error('nama_dokumen')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="file">File</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="preview_file" name="file">
                            @error('file')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-library'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection