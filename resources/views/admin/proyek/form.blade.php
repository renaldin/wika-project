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
                    <form action="@if($form == 'Tambah') /tambah-proyek @elseif($form == 'Edit') /edit-proyek/{{$detail->id_proyek}} @endif" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="nama_proyek">Nama Proyek</label>
                            <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek" name="nama_proyek" value="@if($form == 'Tambah'){{ old('nama_proyek') }}@elseif($form == 'Edit'){{$detail->nama_proyek}}@endif" @if($form == 'Detail') disabled @endif autofocus placeholder="Masukkan Nama Proyek">
                            @error('nama_proyek')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="kode_spk">Kode SPK</label>
                            <input type="text" class="form-control @error('kode_spk') is-invalid @enderror" id="kode_spk" name="kode_spk" value="@if($form == 'Tambah'){{ old('kode_spk') }}@elseif($form == 'Edit'){{$detail->kode_spk}}@endif" @if($form == 'Detail') disabled @endif autofocus placeholder="Masukkan Kode SPK">
                            @error('kode_spk')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" value="@if($form == 'Tambah'){{ old('tanggal') }}@elseif($form == 'Edit'){{$detail->tanggal}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Tanggal">
                            @error('tanggal')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="tipe_konstruksi">Tipe Konstruksi</label>
                            <select class="form-control @error('tipe_konstruksi') is-invalid @enderror" id="tipe_konstruksi" name="tipe_konstruksi" @if($form == 'Detail') disabled @endif>
                                <option value="" selected disabled>-- Pilih Tipe Konstruksi --</option>
                                <option value="Road & Bridge" @if($form == 'Tambah' && old('tipe_konstruksi') == 'Road & Bridge') selected @elseif($form == 'Edit' && $detail->tipe_konstruksi == 'Road & Bridge') selected @endif>Road & Bridge</option>
                                <option value="Water Resource" @if($form == 'Tambah' && old('tipe_konstruksi') == 'Water Resource') selected @elseif($form == 'Edit' && $detail->tipe_konstruksi == 'Water Resource') selected @endif>Water Resource</option>
                                <option value="Dredging & Land Clearing" @if($form == 'Tambah' && old('tipe_konstruksi') == 'Dredging & Land Clearing') selected @elseif($form == 'Edit' && $detail->tipe_konstruksi == 'Dredging & Land Clearing') selected @endif>Dredging & Land Clearing</option>
                                <option value="Harbour" @if($form == 'Tambah' && old('tipe_konstruksi') == 'Harbour') selected @elseif($form == 'Edit' && $detail->tipe_konstruksi == 'Harbour') selected @endif>Harbour</option>
                            </select>
                            @error('tipe_konstruksi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label" for="prioritas">Prioritas</label>
                            <select class="form-control @error('prioritas') is-invalid @enderror" id="prioritas" name="prioritas" @if($form == 'Detail') disabled @endif>
                                <option value="" selected disabled>-- Pilih Prioritas --</option>
                                <option value="Prioritas 1" @if($form == 'Tambah' && old('prioritas') == 'Prioritas 1') selected @elseif($form == 'Edit' && $detail->prioritas == 'Prioritas 1') selected @endif>Prioritas 1</option>
                                <option value="Prioritas 2" @if($form == 'Tambah' && old('prioritas') == 'Prioritas 2') selected @elseif($form == 'Edit' && $detail->prioritas == 'Prioritas 2') selected @endif>Prioritas 2</option>
                                <option value="Prioritas 3" @if($form == 'Tambah' && old('prioritas') == 'Prioritas 3') selected @elseif($form == 'Edit' && $detail->prioritas == 'Prioritas 3') selected @endif>Prioritas 3</option>
                                <option value="Bukan Prioritas" @if($form == 'Tambah' && old('prioritas') == 'Bukan Prioritas') selected @elseif($form == 'Edit' && $detail->prioritas == 'Bukan Prioritas') selected @endif>Bukan Prioritas</option>
                            </select>
                            @error('prioritas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" @if($form == 'Detail') disabled @endif>
                                <option value="" selected disabled>-- Pilih Status --</option>
                                <option value="Proyek Besar" @if($form == 'Tambah' && old('status') == 'Proyek Besar') selected @elseif($form == 'Edit' && $detail->status == 'Proyek Besar') selected @endif>Proyek Besar</option>
                                <option value="Proyek Menengah" @if($form == 'Tambah' && old('status') == 'Proyek Menengah') selected @elseif($form == 'Edit' && $detail->status == 'Proyek Menengah') selected @endif>Proyek Menengah</option>
                                <option value="Proyek Kecil" @if($form == 'Tambah' && old('status') == 'Proyek Kecil') selected @elseif($form == 'Edit' && $detail->status == 'Proyek Kecil') selected @endif>Proyek Kecil</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="form-label" for="latitude">Latitude</label>
                            <input type="text" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" value="@if($form == 'Tambah'){{ old('latitude') }}@elseif($form == 'Edit'){{$detail->latitude}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Latitude">
                            @error('latitude')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="longitude">Longitude</label>
                            <input type="text" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" value="@if($form == 'Tambah'){{ old('longitude') }}@elseif($form == 'Edit'){{$detail->longitude}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Longitude">
                            @error('longitude')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="deskripsi_proyek">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi_proyek" cols="20" rows="5" placeholder="Masukkan Deskripsi">@if($form == 'Tambah'){{old('deskripsi_proyek')}}@else{{$detail->deskripsi_proyek}}@endif</textarea>
                            @error('deskripsi_proyek')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="gambar">Gambar <small class="text-danger text-small">* png/jpg/jpeg</small></label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="preview_image" name="gambar" placeholder="Masukkan Gambar" @if($form == 'Tambah') required @endif>
                                    @error('gambar')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="foto_user"></label>
                                    <div class="profile-img-edit position-relative">
                                        <img src="@if($form == 'Tambah'){{ asset('proyek/default1.jpg') }}@else{{ asset('proyek/'.$detail->gambar) }}@endif" alt="profile-pic" id="load_image" class="theme-color-default-img profile-pic rounded avatar-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-proyek'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection