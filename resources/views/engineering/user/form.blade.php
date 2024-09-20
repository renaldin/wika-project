@extends('layout.main')

@section('content')
<div class="row"> 
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{$subTitle}}</h4>
          <p class="f-m-light mt-1">
            Silahkan isi form dibawah dengan data yang sesuai.
          </p>
        </div>
        <div class="card-body">
          <div class="row g-3"> 
            <div class="col-sm-6"> 
              <div class="card-wrapper border rounded-3 light-card checkbox-checked">
                <form class="row g-3" action="@if($form == 'Tambah')/engineering/tambah-user @else/engineering/edit-user/{{$detail->id}}@endif" method="POST">
                  @csrf
                  <div class="col-12"> 
                    <label class="form-label" for="nama_user">Nama Lengkap</label>
                    <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Masukkan Nama Lengkap..." required value="@if($form == 'Tambah'){{old('nama_user')}}@else{{$detail->nama_user}}@endif">
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="nip">NIP</label>
                    <input class="form-control" id="nip" name="nip" type="text" placeholder="Masukkan NIP..." required value="@if($form == 'Tambah'){{old('nip')}}@else{{$detail->nip}}@endif">
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="telepon">Nomor Telepon</label>
                    <input class="form-control" id="telepon" name="telepon" type="number" placeholder="Masukkan Nomor Telepon..." required value="@if($form == 'Tambah'){{old('telepon')}}@else{{$detail->telepon}}@endif">
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="password">Password</label>
                    <div class="form-input position-relative" style="position: relative;">
                      <input class="form-control" id="password" name="login[password]" type="password" placeholder="Masukkan Password..." required>
                      <div class="show-hide" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"> <span class="show"></span></div>
                    </div>
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="foto_user">Foto</label>
                    <div class="form-input position-relative" style="position: relative;">
                      <input class="form-control" id="foto_user" name="foto_user" type="password" placeholder="Masukkan Password..." required>
                      <div class="show-hide" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"> <span class="show"></span></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-sm-12">
                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="/engineering/kelola-jabatan" class="btn btn-light">Kembali</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection