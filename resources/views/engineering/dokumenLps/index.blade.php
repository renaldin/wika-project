@extends('layout.main')

@section('content')
<div class="row"> 
    <div class="col-sm-12"> 
      <div class="card"> 
        <div class="card-body">
          <div class="list-product-header">
            <div> 
              <a class="btn btn-primary" href="/engineering/tambah-dokumen-lps"><i class="fa fa-plus"></i>Tambah</a>
            </div>
            @if (Session('success'))
              <div class="alert alert-primary dark alert-dismissible fade show my-3" role="alert">
                {{Session('success')}}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (Session('fail'))
              <div class="alert alert-danger dark alert-dismissible fade show my-3" role="alert">
                {{Session('fail')}}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          </div>
          <div class="list-product">
            <table class="table" id="project-status">
              <thead> 
                <tr>
                  <th><span class="f-light f-w-600">No</span></th>
                  <th><span class="f-light f-w-600">Jenis Dokumen</span></th>
                  <th><span class="f-light f-w-600">Nama Dokumen</span></th>
                  <th><span class="f-light f-w-600">No Urut</span></th>
                  <th><span class="f-light f-w-600">Aksi</span></th>
                </tr>
              </thead>
              <tbody> 
                @php
                    $no = 1;
                @endphp
                @foreach ($daftar as $item)
                 @if ($item->is_active == 1)
                  <tr class="product-removes">
                    <td> 
                      <p class="f-light">{{$no++}}</p>
                    </td>
                    <td> 
                                        @if ($item->jenis_dokumen == 'Utama')
                                            <span class="badge bg-primary" style="cursor: pointer;">{{$item->jenis_dokumen}}</span>
                                        @else
                                            <span class="badge bg-danger" style="cursor: pointer;">{{$item->jenis_dokumen}}</span>
                                        @endif
                    </td>
                    <td> 
                      <p class="f-light">{{$item->nama_dokumen}}</p>
                    </td>
                    <td> 
                      <p class="f-light">{{$item->no_urut}}</p>
                    </td>
                    <td> 
                      <div class="product-action">
                        <a href="/engineering/edit-dokumen-lps/{{$item->id_dokumen_lps}}"> 
                          <i class="icofont icofont-edit text-success"></i>
                        </a>

                      </div>
                    </td>
                  </tr>
                  @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="/tambah-dokumen-lps" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="form-label" for="jenis_dokumen">Jenis Dokumen</label>
                            <select class="form-control @error('jenis_dokumen') is-invalid @enderror" id="jenis_dokumen" name="jenis_dokumen" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Utama">Utama</option>
                                <option value="Pendukung">Pendukung</option>    
                            </select>
                            @error('jenis_dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="nama_dokumen">Nama Dokumen</label>
                            <input type="text" class="form-control @error('nama_dokumen') is-invalid @enderror" id="nama_dokumen" name="nama_dokumen" placeholder="Masukkan Nama Dokumen" required>
                            @error('nama_dokumen')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="no_urut">No Urut</label>
                            <input type="text" class="form-control @error('no_urut') is-invalid @enderror" id="no_urut" name="no_urut" placeholder="Masukkan No Urut" required>
                            @error('no_urut')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($daftar as $item)
<div class="modal fade" id="hapus{{$item->id_dokumen_lps}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan hapus data ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <a href="/hapus-dokumen-lps/{{$item->id_dokumen_lps}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($daftar as $item)
<div class="modal fade" id="edit{{$item->id_dokumen_lps}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form action="/edit-dokumen-lps/{{$item->id_dokumen_lps}}" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="form-label" for="jenis_dokumen">Jenis Dokumen</label>
                            <select class="form-control @error('jenis_dokumen') is-invalid @enderror" id="jenis_dokumen" name="jenis_dokumen" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Utama" @if($item->jenis_dokumen == 'Utama') selected @endif>Utama</option>
                                <option value="Pendukung" @if($item->jenis_dokumen == 'Pendukung') selected @endif>Pendukung</option>    
                            </select>
                            @error('jenis_dokumen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="nama_dokumen">Nama Dokumen</label>
                            <input type="text" class="form-control @error('nama_dokumen') is-invalid @enderror" id="nama_dokumen" name="nama_dokumen" value="{{$item->nama_dokumen}}"placeholder="Masukkan Nama Dokumen" required>
                            @error('nama_dokumen')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="no_urut">No Urut</label>
                            <input type="text" class="form-control @error('no_urut') is-invalid @enderror" id="no_urut" name="no_urut" value="{{$item->no_urut}}"placeholder="Masukkan No Urut" required>
                            @error('no_urut')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection