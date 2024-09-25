@extends('layout.main')

@section('content')
<div class="row"> 
    <div class="col-sm-12"> 
      <div class="card"> 
        <div class="card-body">
          <div class="list-product-header">
            <div> 
              <a class="btn btn-primary" href="/engineering/tambah-proyek"><i class="fa fa-plus"></i>Tambah</a>
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
                  <th><span class="f-light f-w-600">Tanggal Submit</span></th>
                  <th><span class="f-light f-w-600">Kendala Teknis</span></th>
                  <th><span class="f-light f-w-600">Status</span></th>
                  <th><span class="f-light f-w-600">Aksi</span></th>
                </tr>
              </thead>
              <tbody> 
              <?php $no = 1;?>
                @foreach ($daftarTechnicalSupporting as $item)
                    @if ($user->role == 'Admin' || $item->id_user !== null && $item->id_user == $user->id_user && $item->is_respon == 1)
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
                      <p class="f-light">{{$item->tanggal_submit}}</p>
                    </td>
                    <td> 
                      <p class="f-light">{{$item->kendala}}</p>
                    </td>
                    <td> 
                      <p class="f-light">@if ($item->status_support == null)
                                            Belum Ada Status
                                        @else
                                            <span class="badge bg-primary">{{$item->status_support}}</span>
                                        @endif</p>
                    </td>
                    <td> 
                      <div class="product-action">
                        <a data-bs-target="#detail{{$item->id_technical_supporting}}"> 
                          <i class="icofont icofont-eye-alt text-info"></i>
                        </a>
                        <a href="/updated-technical-supporting/{{$item->id_technical_supporting}}"> 
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



<div class="modal fade" id="export-technical-support" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="/export-technical-support" method="POST">
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

@foreach ($daftarTechnicalSupporting as $item)
<div class="modal fade" id="detail{{$item->id_technical_supporting}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Technical Supporting</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <div class="mb-2">
                        @if ($item->upload_file != null)
                            <a href="/download-file-technical-supporting/{{$item->id_technical_supporting}}" class="btn btn-sm btn-primary">
                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                File
                            </a>
                        @endif
                        @if ($item->upload_file_hasil != null)
                            <a href="/download-file-hasil-technical-supporting/{{$item->id_technical_supporting}}" class="btn btn-sm btn-primary">
                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                Hasil
                            </a>
                        @endif
                    </div>
                    <table>
                        <tr>
                            <th>Nama Proyek</th>
                            <td>:</td>
                            <td>{{$item->nama_proyek}}</td>
                        </tr>
                        <tr>
                            <th>PIC</th>
                            <td>:</td>
                            <td>{{$item->pic}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Laporan</th>
                            <td>:</td>
                            <td>{{$item->nomor_laporan}}</td>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <td>:</td>
                            <td>{{$item->kode}}</td>
                        </tr>
                        <tr>
                            <th>Topik</th>
                            <td>:</td>
                            <td>{{$item->topik}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Submit</th>
                            <td>:</td>
                            <td>{{$item->tanggal_submit}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>:</td>
                            <td>{{$item->tanggal_selesai ? $item->tanggal_selesai : '-'}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{$item->status_support ? $item->status_support : '-'}}</td>
                        </tr>
                        <tr>
                            <th>Kendala</th>
                            <td>:</td>
                            <td>{{$item->kendala}}</td>
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