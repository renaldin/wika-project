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
                <form class="row g-3" action="@if($form == 'Tambah')/engineering/tambah-user @else/engineering/edit-user/{{$detail->id_user}}@endif" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-12"> 
                    <label class="form-label" for="nama_user">Nama Lengkap</label>
                    <input class="form-control" id="nama_user" name="nama_user" type="text" placeholder="Masukkan Nama Lengkap..." required value="@if($form == 'Tambah'){{old('nama_user')}}@else{{$detail->nama_user}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('nama_user')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="nip">NIP</label>
                    <input class="form-control" id="nip" name="nip" type="text" placeholder="Masukkan NIP..." required value="@if($form == 'Tambah'){{old('nip')}}@else{{$detail->nip}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('nip')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="telepon">Nomor Telepon</label>
                    <input class="form-control" id="telepon" name="telepon" type="number" placeholder="Masukkan Nomor Telepon..." required value="@if($form == 'Tambah'){{old('telepon')}}@else{{$detail->telepon}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('telepon')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  @if ($form != 'Detail')
                    <div class="col-12"> 
                      <label class="form-label" for="password">Password</label>
                      <div class="form-input position-relative" style="position: relative;">
                        <input class="form-control" id="password" name="login[password]" type="password" placeholder="Masukkan Password..." required>
                        <div class="show-hide" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"> <span class="show"></span></div>
                      </div>
                      @error('password')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                    <div class="col-12"> 
                      <label class="form-label" for="foto_user">Foto</label>
                      <input class="form-control" id="foto_user" name="foto_user" type="file" required>
                      @error('foto_user')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  @endif
                  @if ($form == 'Detail')
                  <div class="col-12"> 
                    <label class="form-label" for="foto_user">Foto</label><br>
                    <img src="{{ asset('foto_user/'.$detail->foto_user) }}" width="100px" alt="Foto User">
                  </div>
                  @endif
                </div>
            </div>
            <div class="col-sm-6"> 
              <div class="card-wrapper border rounded-3 light-card checkbox-checked">
                <div class="row g-3">
                  <div class="col-12"> 
                    <label class="form-label" for="id_jabatan">Divisi</label>
                    <select class="form-control select2" id="id_divisi" name="id_divisi" required @if($form == 'Detail') disabled @endif>
                      <option value="" selected disabled>-- Pilih --</option>
                      @foreach ($daftarDivisi as $item)
                          <option value="{{$item->id}}" @if($form == "Tambah" && old("id_divisi") == $item->id) selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->id_divisi == $item->id) selected @endif>{{$item->nama_divisi}}</option>
                      @endforeach
                    </select>
                    @error('id_divisi')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="id_jabatan">Jabatan</label>
                    <select class="form-control select2" id="id_jabatan" name="id_jabatan" required @if($form == 'Detail') disabled @endif>
                      <option value="" selected disabled>-- Pilih --</option>
                      @foreach ($daftarJabatan as $item)
                          <option value="{{$item->id}}" @if($form == "Tambah" && old("id_jabatan") == $item->id) selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->id_jabatan == $item->id) selected @endif>{{$item->nama_jabatan}}</option>
                      @endforeach
                    </select>
                    @error('id_jabatan')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="role">Role</label>
                    <select class="form-control select2" id="role" name="role" required @if($form == 'Detail') disabled @endif>
                      <option value="" selected disabled>-- Pilih --</option>
                      <option value="Admin" @if($form == "Tambah" && old("role") == "Admin") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->role == "Admin") selected @endif>Admin</option>
                      <option value="Tim Proyek" @if($form == "Tambah" && old("role") == "Tim Proyek") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->role == "Tim Proyek") selected @endif>Tim Proyek</option>
                      <option value="Head Office" @if($form == "Tambah" && old("role") == "Head Office") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->role == "Head Office") selected @endif>Head Office</option>
                      <option value="Manajemen" @if($form == "Tambah" && old("role") == "Manajemen") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->role == "Manajemen") selected @endif>Manajemen</option>
                    </select>
                    @error('role')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12" id="fungsi-div" style="display: none;">
                    <label class="form-label" for="fungsi" id="fungsi-label" style="display: none;">Fungsi</label>
                    <select class="form-control" name="fungsi" id="fungsi-form" style="display: none;" @if($form == 'Detail') disabled @endif>
                        <option value="" selected disabled>-- Pilih --</option>
                        <option @if($form == "Tambah" && old("fungsi") == "Design & Analysis") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "Design & Analysis") selected @endif value="Design & Analysis">Design & Analysis</option>
                        <option @if($form == "Tambah" && old("fungsi") == "BIM & Digitalization Engineering") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "BIM & Digitalization Engineering") selected @endif value="BIM & Digitalization Engineering">BIM & Digitalization Engineering</option>
                        <option @if($form == "Tambah" && old("fungsi") == "System Engineering & Lean Construction") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "System Engineering & Lean Construction") selected @endif value="System Engineering & Lean Construction">System Engineering & Lean Construction</option>
                        <option @if($form == "Tambah" && old("fungsi") == "Manager of Engineering") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "Manager of Engineering") selected @endif value="Manager of Engineering">Manager of Engineering</option>
                    </select>
                  </div>
                  @if ($form == 'Detail')
                    <div class="col-12" id="fungsi-div">
                      <label class="form-label" for="fungsi" id="fungsi-label">Fungsi</label>
                      <select class="form-control" name="fungsi" id="fungsi-form" @if($form == 'Detail') disabled @endif>
                          <option value="" selected disabled>-- Pilih --</option>
                          <option @if($form == "Tambah" && old("fungsi") == "Design & Analysis") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "Design & Analysis") selected @endif value="Design & Analysis">Design & Analysis</option>
                          <option @if($form == "Tambah" && old("fungsi") == "BIM & Digitalization Engineering") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "BIM & Digitalization Engineering") selected @endif value="BIM & Digitalization Engineering">BIM & Digitalization Engineering</option>
                          <option @if($form == "Tambah" && old("fungsi") == "System Engineering & Lean Construction") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "System Engineering & Lean Construction") selected @endif value="System Engineering & Lean Construction">System Engineering & Lean Construction</option>
                          <option @if($form == "Tambah" && old("fungsi") == "Manager of Engineering") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->fungsi == "Manager of Engineering") selected @endif value="Manager of Engineering">Manager of Engineering</option>
                      </select>
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-sm-12">
                @if ($form != 'Detail')
                  <button class="btn btn-primary" type="submit">Simpan</button>
                @endif
                <a href="/engineering/kelola-user" class="btn btn-light">Kembali</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection