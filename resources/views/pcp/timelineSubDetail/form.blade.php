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
                    <form action="@if($form == 'Tambah')/tambah-timeline-sub-detail/{{$timelineDetail->id}} @else/edit-timeline-sub-detail/{{$timelineDetail->id}}/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
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
                        @include('components.tombolForm', ['linkKembali' => "/sub-detail-timeline/$timelineDetail->id"])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection