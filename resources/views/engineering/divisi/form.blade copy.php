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
                    <form action="@if($form == 'Tambah')/tambah-divisi @else/edit-divisi/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_divisi">Nama Divisi</label>
                                <input type="text" class="form-control @error('nama_divisi') is-invalid @enderror" @if($form == 'Tambah') value="{{old('nama_divisi')}}" @else value="{{$detail->nama_divisi}}" @endif id="nama_divisi" name="nama_divisi" @if($form == 'Detail') disabled @endif placeholder="Masukkan Nama Jabatan" required>
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-divisi'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection