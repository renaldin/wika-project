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
                <form class="row g-3" action="@if($form == 'Tambah')/engineering/tambah-proyek @else/engineering/edit-proyek/{{$detail->id_proyek}}@endif" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-12"> 
                    <label class="form-label" for="nama_proyek">Nama Proyek</label>
                    <input class="form-control" id="nama_proyek" name="nama_proyek" type="text" placeholder="Masukkan Nama Proyek..." required value="@if($form == 'Tambah'){{old('nama_proyek')}}@else{{$detail->nama_proyek}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('nama_proyek')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="kode_spk">Kode SPK</label>
                    <input class="form-control" id="kode_spk" name="kode_spk" type="text" placeholder="Masukkan Kode SPK..." required value="@if($form == 'Tambah'){{old('kode_spk')}}@else{{$detail->kode_spk}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('kode_spk')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="tanggal">Tanggal</label>
                    <input class="form-control" id="tanggal" name="tanggal" type="date" placeholder="Masukkan Tanggal..." required value="@if($form == 'Tambah'){{old('tanggal')}}@else{{$detail->tanggal}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('tanggal')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="tipe_konstruksi">Tipe Konstruksi</label>
                    <select class="form-control select2" id="tipe_konstruksi" name="tipe_konstruksi" required @if($form == 'Detail') disabled @endif>
                      <option value="" selected disabled>-- Pilih --</option>
                      <option value="Road & Bridge" @if($form == "Tambah" && old("tipe_konstruksi") == "Road & Bridge") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->tipe_konstruksi == "Road & Bridge") selected @endif>Road & Bridge</option>
                      <option value="Water Resource" @if($form == "Tambah" && old("tipe_konstruksi") == "Water Resource") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->tipe_konstruksi == "Water Resource") selected @endif>Water Resource</option>
                      <option value="Dredging & Land Clearing" @if($form == "Tambah" && old("tipe_konstruksi") == "Dredging & Land Clearing") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->tipe_konstruksi == "Dredging & Land Clearing") selected @endif>Dredging & Land Clearing</option>
                      <option value="Harbour" @if($form == "Tambah" && old("tipe_konstruksi") == "Harbour") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->tipe_konstruksi == "Harbour") selected @endif>Harbour</option>
                    </select>
                    @error('tipe_konstruksi')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="prioritas">Prioritas</label>
                    <select class="form-control select2" id="prioritas" name="prioritas" required @if($form == 'Detail') disabled @endif>
                      <option value="" selected disabled>-- Pilih --</option>
                      <option value="Prioritas 1" @if($form == "Tambah" && old("prioritas") == "Prioritas 1") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->prioritas == "Prioritas 1") selected @endif>Prioritas 1</option>
                      <option value="Prioritas 2" @if($form == "Tambah" && old("prioritas") == "Prioritas 2") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->prioritas == "Prioritas 2") selected @endif>Prioritas 2</option>
                      <option value="Prioritas 3" @if($form == "Tambah" && old("prioritas") == "Prioritas 3") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->prioritas == "Prioritas 3") selected @endif>Prioritas 3</option>
                      <option value="Bukan Prioritas" @if($form == "Tambah" && old("prioritas") == "Bukan Prioritas") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->prioritas == "Bukan Prioritas") selected @endif>Bukan Prioritas</option>
                    </select>
                    @error('prioritas')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="status">Status</label>
                    <select class="form-control select2" id="status" name="status" required @if($form == 'Detail') disabled @endif>
                      <option value="" selected disabled>-- Pilih --</option>
                      <option value="Proyek Besar" @if($form == "Tambah" && old("status") == "Proyek Besar") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->status == "Proyek Besar") selected @endif>Proyek Besar</option>
                      <option value="Proyek Menengah" @if($form == "Tambah" && old("status") == "Proyek Menengah") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->status == "Proyek Menengah") selected @endif>Proyek Menengah</option>
                      <option value="Proyek Kecil" @if($form == "Tambah" && old("status") == "Proyek Kecil") selected @elseif(($form == 'Edit' || $form == 'Detail') && $detail->status == "Proyek Kecil") selected @endif>Proyek Kecil</option>
                    </select>
                    @error('status')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
            </div>
            <div class="col-sm-6"> 
              <div class="card-wrapper border rounded-3 light-card checkbox-checked">
                <div class="row g-3">
                  <div class="col-12"> 
                    <label class="form-label" for="latitude">Latitude</label>
                    <input class="form-control" id="latitude" name="latitude" type="text" placeholder="Masukkan Latitude..." required value="@if($form == 'Tambah'){{old('latitude')}}@else{{$detail->latitude}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('latitude')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="longitude">Longitude</label>
                    <input class="form-control" id="longitude" name="longitude" type="text" placeholder="Masukkan Longitude..." required value="@if($form == 'Tambah'){{old('longitude')}}@else{{$detail->longitude}}@endif" @if($form == 'Detail') readonly @endif>
                    @error('longitude')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  <div class="col-12"> 
                    <label class="form-label" for="deskripsi_proyek">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi_proyek" id="deskripsi_proyek" cols="20" rows="5" required placeholder="Masukkan Deskripsi..." @if($form == 'Detail') readonly @endif>@if($form == 'Tambah'){{old('deskripsi_proyek')}}@else{{$detail->deskripsi_proyek}}@endif</textarea>
                    @error('deskripsi_proyek')
                      <div class="text-danger">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                  @if ($form != 'Detail')
                    <div class="col-12"> 
                      <label class="form-label" for="gambar">Foto</label>
                      <input class="form-control" id="gambar" name="gambar" type="file" required>
                      @error('gambar')
                        <div class="text-danger">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  @endif
                  @if ($form == 'Detail')
                    <div class="col-12"> 
                      <label class="form-label" for="gambar">Foto</label><br>
                      <img src="{{ asset('proyek/'.$detail->gambar) }}" width="100px" alt="Gambar Proyek">
                    </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-sm-12">
                @if ($form != 'Detail')
                  <button class="btn btn-primary" type="submit">Simpan</button>
                @endif
                <a href="/engineering/kelola-proyek" class="btn btn-light">Kembali</a>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
