@extends('layout.main')

@section('content')
<div class="row"> 
    <div class="col-sm-12"> 
      <div class="card"> 
        <div class="card-body">
          <div class="list-product-header">
            <div> 
              <a class="btn btn-primary" href="/tambah-activity"><i class="fa fa-plus"></i>Tambah</a>
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
                  <th><span class="f-light f-w-600">Tanggal Masuk</span></th>
                  <th><span class="f-light f-w-600">Nama Lengkap</span></th>
                  <th><span class="f-light f-w-600">Status Kerja</span></th>
                  <th><span class="f-light f-w-600">Judul / Deskripsi Pekerjaan</span></th>
                  <th><span class="f-light f-w-600">Validasi</span></th>
                  @if($checked == false)
                                <th style="min-width: 100px"><span class="f-light f-w-600">Aksi</span></th>
                            @endif
               
                </tr>
              </thead>
              <tbody> 
                        @php
                            $no = 1;
                            if ($checked == true) {
                                $check = 1;
                            } else {
                                $check = 0;
                            }
                        @endphp
                        @foreach ($daftar as $item)
                        @if($user->role == 'Admin' || $item->id_user == $user->id_user)
                          
                                <tr class="product-removes">
                                    <td> 
                                    <p class="f-light">{{$no++}}</p>
                                    </td>
                                    <td> 
                                    <div class="product-names">
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#detail{{$item->id_engineering_activity}}">{{$item->tanggal_masuk_kerja}}</a>
                                    </div>
                                    </td>
                                    <td> 
                                    <p class="f-light">{{$item->nama_user}}</p>
                                    </td>
                                    <td> 
                                    <p class="f-light">{{$item->status_kerja}}</p>
                                    </td>
                                    <td> 
                                    <p class="f-light">{{$item->judul_pekerjaan}}</p>
                                    </td>
                                    <td> 
                                    <p class="f-light">{{$item->validasi==1?'Validasi':'Belum Tervalidasi'}}</p>
                                    </td>
                                                    @if($checked == false)
                                                            <td>
                                                                <div class="flex align-items-center list-user-action">
                                                                    @if($item->checked == 0)
                                                                        <button type="button" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#check{{$item->id_engineering_activity}}" data-placement="top" title="Check" data-original-title="Check">
                                                                            <span class="btn-inner">
                                                                                <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M15.8325 8.17463L10.109 13.9592L3.59944 9.88767C2.66675 9.30414 2.86077 7.88744 3.91572 7.57893L19.3712 3.05277C20.3373 2.76963 21.2326 3.67283 20.9456 4.642L16.3731 20.0868C16.0598 21.1432 14.6512 21.332 14.0732 20.3953L10.106 13.9602" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                                            </span>
                                                                        </button>
                                                                        <a class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" data-placement="top" title="Edit" data-original-title="Edit" href="/edit-activity/{{$item->id_engineering_activity}}">
                                                                            <span class="btn-inner">
                                                                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                                </svg>
                                                                            </span>
                                                                        </a>
                                                                        <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#hapus{{$item->id_engineering_activity}}" data-placement="top" title="Hapus" data-original-title="Delete">
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
                                                        @endif
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



<div class="modal fade" id="export-activity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/export-activity" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="bulan">Bulan</label>
                                <input type="month" class="form-control" name="bulan" id="bulan" required>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Export</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($daftar as $item)
<div class="modal fade" id="check{{$item->id_engineering_activity}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Check</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin dengan activity ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <a href="/check-activity/{{$item->id_engineering_activity}}" type="button" class="btn btn-primary">Check</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($daftar as $item)
<div class="modal fade" id="hapus{{$item->id_engineering_activity}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan hapus activity <strong>{{$item->judul_pekerjaan}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <a href="/hapus-activity/{{$item->id_engineering_activity}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach ($daftar as $item)
<div class="modal fade" id="detail{{$item->id_engineering_activity}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>:</td>
                            <td>{{$item->nama_user}}</td>
                        </tr>
                        <tr>
                            <th>NIP</th>
                            <td>:</td>
                            <td>{{$item->nip}}</td>
                        </tr>
                        <tr>
                            <th>Jabatan</th>
                            <td>:</td>
                            <td>{{$item->jabatan}}</td>
                        </tr>
                       
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>:</td>
                            <td>{{$item->telepon}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Masuk Kerja</th>
                            <td>:</td>
                            <td>{{$item->tanggal_masuk_kerja}}</td>
                        </tr>
                        <tr>
                            <th>Status Kerja</th>
                            <td>:</td>
                            <td>{{$item->status_kerja}}</td>
                        </tr>
                        <tr>
                            <th>Judul / Deskripsi Pekerjaan</th>
                            <td>:</td>
                            <td>{{$item->judul_pekerjaan}}</td>
                        </tr>
                        <tr>
                            <th>Kategori Pekerjaan</th>
                            <td>:</td>
                            <td>{{$item->kategori_pekerjaan}}</td>
                        </tr>
                        <tr>
                            <th>Durasi</th>
                            <td>:</td>
                            <td>{{$item->durasi}}</td>
                        </tr>
                        <tr>
                            <th>Evidence</th>
                            <td>:</td>
                            <td>
                                <div class="profile-img-edit position-relative">
                                    <img src="{{ asset('evidence/'.$item->evidence) }} " alt="profile-pic" id="load_image" class="theme-color-default-img profile-pic rounded avatar-100">
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection