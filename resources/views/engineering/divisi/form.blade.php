@extends('layout.main')

@section('content')
<div class="row"> 
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4>{{$subTitle}}</h4>
          <p class="f-m-light mt-1">
            Silahkan isi form dibawah dengan data yang sesuai.s
          </p>
        </div>
        <div class="card-body">
          <div class="row g-3"> 
            <div class="col-sm-6"> 
              <div class="card-wrapper border rounded-3 light-card checkbox-checked">
                <form class="row g-3" action="@if($form == 'Tambah')/engineering/tambah-divisi @else/engineering/edit-divisi/{{$detail->id}}@endif" method="POST">
                  @csrf
                  <div class="col-12"> 
                    <label class="form-label" for="nama_divisi">Nama Divisi</label>
                    <input class="form-control" id="nama_divisi" name="nama_divisi" type="text" placeholder="Masukkan Nama Divisi..." required value="@if($form == 'Tambah'){{old('nama_divisi')}}@else{{$detail->nama_divisi}}@endif">
                  </div>
                  <div class="col-12">
                    <button class="btn btn-primary" type="submit">Simpan</button>
                    <a href="/engineering/kelola-divisi" class="btn btn-light">Kembali</a>
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