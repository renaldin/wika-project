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
                  <th><span class="f-light f-w-600">Nama SNI</span></th>
                  <th><span class="f-light f-w-600">Berkas</span></th>
                  <th><span class="f-light f-w-600">Aksi</span></th>
                </tr>
              </thead>
              <tbody> 
                @php
                    $no = 1;
                @endphp
                @foreach ($daftarSni as $item)
                  <tr class="product-removes">
                    <td> 
                      <p class="f-light">{{$no++}}</p>
                    </td>
                    <td> 
                      <div class="product-names">
                        <p>{{$item->nama_sni}}</p>
                      </div>
                    </td>
                    <td><div class="f-light">
                        <a href="{{ asset('sni/' . $item->file) }}" title="Lihat PDF" data-original-title="Lihat PDF"> 
                          <i class="icofont icofont-eye-alt text-info"></i>
                        </a>
                            </div></td>
                    <td> 
                      <div class="product-action">
                        
                        <a href="/engineering/edit-sni/{{$item->id_sni}}"> 
                          <i class="icofont icofont-edit text-success"></i>
                        </a>
                        <a href="#" class="btn-confirm" data-title="Hapus" data-button-color="btn-primary" data-href="/engineering/hapus-sni/{{$item->id_sni}}" data-content="Apakah Anda yakin akan hapus data ini ?"> 
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



@foreach ($daftarSni as $item)
<div class="modal fade" id="hapus{{$item->id_sni}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan hapus sni <strong>{{$item->nama_sni}}</strong>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <a href="/hapus-sni/{{$item->id_sni}}" type="button" class="btn btn-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection