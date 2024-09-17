@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header pb-0 card-no-border">
          <h4>{{$subTitle}}</h4>
          <span>Anda bisa melakukan kelola data berikut.</span>
        </div>
        <div class="card-body">
          <div class="row my-2">
            <div class="col-sm-12 text-end">
              <a href="/engineering/tambah-divisi" class="btn btn-primary">Tambah</a>
            </div>
          </div>
          <div class="row my-2">
            <div class="col-sm-12 text-end">
              @if (Session('success'))
                <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                  {{Session('success')}}
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              @if (Session('fail'))
                <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                  {{Session('fail')}}
                  <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
            </div>
          </div>
          <div class="table-responsive user-datatable custom-scrollbar">
            <table class="display" id="datatable-basic">
              <thead>
                <tr>
                    <th style="min-width: 20px">No</th>
                    <th>Nama Divisi</th>
                    <th style="min-width: 100px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;?>
                @foreach ($daftarDivisi as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->nama_divisi}}</td>
                        <td> 
                            <ul class="action"> 
                                <li class="edit"> <a href="/engineering/edit-divisi/{{$item->id}}"><i class="icon-pencil-alt"></i></a></li>
                                <li class="delete"><a href="#" class="btn-confirm" data-title="Hapus" data-button-color="btn-primary" data-href="/engineering/hapus-divisi/{{$item->id}}" data-content="Apakah Anda yakin akan hapus data ini ?"><i class="icon-trash"></i></a></li>
                            </ul>
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