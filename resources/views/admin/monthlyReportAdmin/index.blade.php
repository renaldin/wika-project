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
                  <th><span class="f-light f-w-600">Tanggal</span></th>
                  <th><span class="f-light f-w-600">Tipe Konstruksi</span></th>
                  <th><span class="f-light f-w-600">Prioritas</span></th>
                  <th><span class="f-light f-w-600">Aksi</span></th>
                </tr>
              </thead>
              <tbody> 
                @php
                    $no = 1;
                @endphp
                @foreach ($daftarProyek as $item)
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
                      <p class="f-light">{{$item->tanggal}}</p>
                    </td>
                    <td> 
                      <p class="f-light">{{$item->tipe_konstruksi}}</p>
                    </td>
                    <td> 
                      <p class="f-light">{{$item->prioritas}}</p>
                    </td>
                    <td> 
                      <div class="product-action">
                        <a href="/detail-monthly-report-admin/{{$item->id_proyek}}"> 
                          <i class="icofont icofont-eye-alt text-info"></i>
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