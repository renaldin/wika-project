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
                <form class="row g-3" action="@if($form == 'Tambah')/engineering/tambah-jabatan @else/engineering/edit-jabatan/{{$detail->id}}@endif" method="POST">
                  @csrf
                  <div class="col-12"> 
                    <label class="form-label" for="nama_jabatan">Nama Jabatan</label>
                    <input class="form-control" id="nama_jabatan" name="nama_jabatan" type="text" placeholder="Masukkan Nama Jabatan..." required value="@if($form == 'Tambah'){{old('nama_jabatan')}}@else{{$detail->nama_jabatan}}@endif">
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="/engineering/kelola-jabatan" class="btn btn-light">Kembali</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection