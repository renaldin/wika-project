@extends('layout.main')

@section('content')
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
                    <div class="col-lg-8 mb-1">
                        <button type="button" class="btn btn-primary mb-4"  data-bs-toggle="modal" data-bs-target="#tambah">Tambah</button>
                    </div>
                    <div class="col-lg-4 mb-1">
                        <form action="" class="d-flex">
                            <input type="MONTH" class="form-control" name="filterMonth" id="filterMonth" value="{{$filterMonth}}">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </form>
                    </div>
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
                        <th>Pengguna</th>
                        <th>Waktu</th>
                        <th style="min-width: 100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;?>
                    @foreach ($daftarChat sebagai $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td><span class="badge bg-primary">
                                {{$item->userSatu->nama_user}} <!-- atau gunakan $item->userDua->nama_user sesuai kebutuhan -->
                            </span></td>
                            <td>{{date('d F Y | H:m', strtotime($item->created_at))}}</td>
                            <td>
                                <div class="flex align-items-center list-user-action">
                                    <a href="/detail-chat/{{$item->id_chat}}" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip"  data-placement="top" title="Chat" data-original-title="Chat">
                                        <span class="btn-inner">
                                            <!-- SVG Icon -->
                                        </span>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-icon btn-danger btn-delete" data-toggle="tooltip" data-placement="top" title="Hapus" data-original-title="Hapus" data-href="/hapus-chat/{{$item->id_chat}}" data-content="Apakah Anda yakin akan hapus data ini ?">
                                        <span class="btn-inner">
                                            <!-- SVG Icon -->
                                        </span>
                                    </button>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Chat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/tambah-chat" method="POST">
                    <div class="row">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="form-label" for="id_user_dua">Pilih Pengguna</label>
                            <select class="form-control selectpicker" data-live-search="true" id="id_user_dua" name="id_user_dua" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                @foreach ($daftarUser as $item)
                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                @endforeach 
                            </select>
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


@endsection