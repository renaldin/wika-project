@extends('layout.main')

@section('content')

<div class="row"> 
    <div class="col-sm-12"> 
      <div class="card"> 
        <div class="card-body">
          <div class="list-product-header">
            <div> 
              <a class="btn btn-primary" href="/engineering/tambah-sni"><i class="fa fa-plus"></i>Tambah</a>
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
                  <th><span class="f-light f-w-600">Nama Proyek</span></th>
                  <th><span class="f-light f-w-600">Kode SPK</span></th>
                  <th><span class="f-light f-w-600">Dokumen</span></th>
                  <th><span class="f-light f-w-600">Aksi</span></th>
                </tr>
              </thead>
              <tbody> 
                @php
                    $no = 1;
                @endphp
                @foreach ($daftarProyekLps as $item)
                  <tr class="product-removes">
                    <td> 
                      <p class="f-light">{{$no++}}</p>
                    </td>
                    <td> 
                      <div class="product-names">
                        <p>{{$item->nama_proyek}}</p>
                      </div>
                    </td>
                    <td> 
                      <div class="product-names">
                        <p>{{$item->kode_spk}}</p>
                      </div>
                    </td>
                    <td><div class="f-light">
                    <a href="{{$item->dokumen_lps}}" target="_blank" class="btn btn-sm btn-primary">Klik</a>
                            </div></td>
                    <td> 
                      <div class="product-action">
                        <a href="/detail-proyek-lps/{{$item->id_proyek}}"> 
                          <i class="icofont icofont-eye-alt text-info"></i>
                        </a>
                        <a href="#edit{{$item->id_proyek}}"> 
                          <i class="icofont icofont-edit text-success"></i>
                        </a>
                        <a href="#hapus{{$item->id_proyek}}" class="btn-confirm" data-title="Hapus" data-button-color="btn-primary" data-href="/engineering/hapus-proyek/{{$item->id_proyek}}" data-content="Apakah Anda yakin akan hapus data ini ?"> 
                          <i class="icofont icofont-trash text-danger"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                <div class="row">
                    @if ($user->role !== 'Admin')
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                    </div>
                    @endif
                    @if (session('success'))
                        <div class="col-lg-12">
                            <div class="alert bg-primary text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                    {{ session('success') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    @if (session('fail'))
                        <div class="col-lg-12">
                            <div class="alert bg-danger text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    {{ session('fail') }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                    <thead>
                        <tr class="ligth">
                            <th>No</th>
                            <th>Nama Proyek</th>
                            <th>Kode SPK</th>
                            <th>Dokumen</th>
                            <th style="min-width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($daftarProyekLps as $item)
                            {{-- @if ($user->id_user == $item->id_user_respon || $user->role == 'Admin') --}}
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_proyek}}</td>
                                <td>{{$item->kode_spk}}</td>
                                <td><a href="{{$item->dokumen_lps}}" target="_blank" class="btn btn-sm btn-primary">Klik</a></td>
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <a href="/detail-proyek-lps/{{$item->id_proyek}}" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Detail" data-original-title="Detail">
                                            <span class="btn-inner">
                                                <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                            </span>
                                        </a>
                                        @if ($user->role !== 'Admin')
                                            <button type="button" class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Update Tanggal PHO" data-original-title="Update Tanggal PHO" data-bs-toggle="modal" data-bs-target="#edit{{$item->id_proyek}}">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id_proyek}}" data-placement="top" title="Hapus" data-original-title="Hapus">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                    <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
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
                    <form action="/tambah-proyek-lps" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="form-label" for="id_proyek">Proyek</label>
                            <select class="form-control @error('id_proyek') is-invalid @enderror selectpicker" data-live-search="true" id="id_proyek" name="id_proyek" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                @foreach ($daftarProyek as $row)
                                    @if ($row->status_lps == 0)
                                        <option value="{{$row->id_proyek}}">{{$row->nama_proyek}}</option>
                                    @endif
                                @endforeach 
                            </select>
                            @error('id_proyek')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label class="form-label">Kode SPK</label>
                            <input type="text" class="form-control" name="kode_spk" placeholder="Masukkan Kode" required>
                        </div> --}}
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

@foreach ($daftarProyekLps as $item)
<div class="modal fade" id="hapus{{$item->id_proyek}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <a href="/hapus-proyek-lps/{{$item->id_proyek}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($daftarProyekLps as $item)
<div class="modal fade" id="edit{{$item->id_proyek}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/update-tanggal-pho/{{$item->id_proyek}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label" for="tanggal_pho_lps">Tanggal PHO</label>
                            <input type="date" class="form-control @error('tanggal_pho_lps') is-invalid @enderror" id="tanggal_pho_lps" name="tanggal_pho_lps" value="{{$item->tanggal_pho_lps}}" placeholder="Masukkan Tanggal PHO LPS" required>
                        </div>
                        {{-- <div class="form-group col-md-12">
                            <label class="form-label">Kode SPK</label>
                            <input type="text" class="form-control" value="{{$item->kode_spk}}" name="kode_spk" placeholder="Masukkan Kode" required>
                        </div> --}}
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