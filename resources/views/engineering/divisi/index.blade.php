@extends('layout.main')

@section('content')
<div class="row"> 
  <div class="col-sm-12"> 
    <div class="card"> 
      <div class="card-body">
        <div class="list-product-header">
          <div> 
            <a class="btn btn-primary" href="/engineering/tambah-divisi"><i class="fa fa-plus"></i>Tambah</a>
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
                <th><span class="f-light f-w-600">Nama Divisi</span></th>
                <th><span class="f-light f-w-600">Aksi</span></th>
              </tr>
            </thead>
            <tbody> 
              @php
                  $no = 1;
              @endphp
              @foreach ($daftarDivisi as $item)
                <tr class="product-removes">
                  <td> 
                    <p class="f-light">{{$no++}}</p>
                  </td>
                  <td> 
                    <div class="product-names">
                      <p>{{$item->nama_divisi}}</p>
                    </div>
                  </td>
                  <td> 
                    <div class="product-action">
                      <a href="/engineering/edit-divisi/{{$item->id}}"> 
                        <i class="icofont icofont-edit text-success"></i>
                      </a>
                      <a href="#" class="btn-confirm" data-title="Hapus" data-button-color="btn-primary" data-href="/engineering/hapus-divisi/{{$item->id}}" data-content="Apakah Anda yakin akan hapus data ini ?"> 
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
@endsection