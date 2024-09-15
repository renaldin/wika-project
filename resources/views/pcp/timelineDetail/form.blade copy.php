@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form == 'Tambah')/tambah-detail-timeline @else/edit-detail-timeline/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
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
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_dokumen">Nama Dokumen</label>
                                <input type="text" class="form-control" name="nama_dokumen" id="nama_dokumen" placeholder="Masukkan Nama Dokumen" @if($form == 'Tambah') value="{{old('nama_dokumen')}}" @else value="{{$detail->nama_dokumen}}" @endif required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_timeline">Tanggal Timeline</label>
                                <input type="date" class="form-control" name="tanggal_timeline" id="tanggal_timeline" placeholder="Masukkan Tanggal Dokumen" @if($form == 'Tambah') value="{{old('tanggal_timeline')}}" @else value="{{$detail->tanggal_timeline}}" @endif required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="file_dokumen">File Dokumen</label>
                                <input type="file" class="form-control" name="file_dokumen" id="file_dokumen">
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-timeline'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection