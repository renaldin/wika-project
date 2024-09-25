@extends('layout.main')

@section('content')

<div class="row"> 
    <div class="col-sm-12"> 
      <div class="card"> 
        <div class="card-body">
          <div class="list-product-header">
            <div> 
              <a class="btn btn-primary" href="/engineering/tambah-software"><i class="fa fa-plus"></i>Tambah</a>
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
                  <th><span class="f-light f-w-600">Gambar</span></th>
                  <th><span class="f-light f-w-600">Nama Software</span></th>
                  <th><span class="f-light f-w-600">Fungsi</span></th>
                  <th><span class="f-light f-w-600">Kategori</span></th>
                  <th><span class="f-light f-w-600">Aksi</span></th>
                </tr>
              </thead>
              <tbody> 
                @php
                    $no = 1;
                @endphp
                @foreach ($daftarSoftware as $item)
                  <tr class="product-removes">
                    <td> 
                      <p class="f-light">{{$no++}}</p>
                    </td>
                    <td class="product-names"><img class="bg-soft-primary rounded img-fluid avatar-40 me-3" src="@if($item->gambar == null) {{ asset('software/default1.jpg') }} @else {{ asset('software/'.$item->gambar) }} @endif" alt="profile"></td>
                    <td> 
                      <div class="product-names">
                        <p>{{$item->nama_software}}</p>
                      </div>
                    </td>
                    <td> 
                      <p class="f-light">{{$item->fungsi}}</p>
                    </td>
                    <td> 
                      <p class="f-light">{{$item->kategori}}</p>
                    </td>
                    <td> 
                      <div class="product-action">
                        <a href="/engineering/edit-software/{{$item->id_software}}"> 
                          <i class="icofont icofont-edit text-success"></i>
                        </a>
                        <a href="#" class="btn-confirm" data-title="Hapus" data-button-color="btn-primary" data-href="/engineering/hapus-software/{id}" data-content="Apakah Anda yakin akan hapus data ini ?"> 
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


@foreach ($daftarSoftware as $item)
<div class="modal fade" id="hapus{{$item->id_software}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan hapus software <strong>{{$item->nama_software}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <a href="/hapus-software/{{$item->id_software}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection