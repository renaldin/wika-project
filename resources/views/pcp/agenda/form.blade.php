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
                    <form action="@if($form == 'Tambah')/tambah-agenda @else/edit-agenda/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="id_proyek">Proyek (Opsional)</label>
                                <select name="id_proyek" id="id_proyek" class="form-control selectpicker @error('id_proyek') is-invalid @enderror" @if($form == 'Detail') disabled @endif data-live-search="true">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach ($daftarProyek as $item)
                                        <option value="{{$item->id_proyek}}" @if($form == "Tambah" && old("id_proyek") == $item->id_proyek) selected @elseif($form == "Edit" && $detail->id_proyek == $item->id_proyek) selected @elseif($form == "Detail" && $detail->id_proyek == $item->id_proyek) selected @endif>{{$item->nama_proyek}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                <input type="datetime-local" class="form-control @error('tanggal_kegiatan') is-invalid @enderror" @if($form == 'Tambah') value="{{old('tanggal_kegiatan')}}" @else value="{{$detail->tanggal_kegiatan}}" @endif id="tanggal_kegiatan" name="tanggal_kegiatan" @if($form == 'Detail') disabled @endif placeholder="Masukkan Tanggal Permintaan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_kegiatan">Nama Kegiatan</label>
                                <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" @if($form == 'Tambah') value="{{old('nama_kegiatan')}}" @else value="{{$detail->nama_kegiatan}}" @endif id="nama_kegiatan" name="nama_kegiatan" @if($form == 'Detail') disabled @endif placeholder="Masukkan Nama Kegiatan" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="catatan_agenda">Catatan</label>
                                <textarea class="form-control" name="catatan_agenda" id="catatan_agenda" cols="15" rows="5" @if($form == 'Detail') disabled @endif placeholder="Masukkan Catatan" required>@if($form == 'Tambah'){{old('catatan_agenda')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->catatan_agenda}}@endif</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="link">Link</label>
                                <textarea class="form-control" name="link" id="link" cols="15" rows="5" @if($form == 'Detail') disabled @endif placeholder="Masukkan Link" required>@if($form == 'Tambah'){{old('link')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->link}}@endif</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="status_agenda">Status Kegiatan</label>
                                <select name="status_agenda" id="status_agenda" class="form-control @error('status_agenda') is-invalid @enderror" @if($form == 'Detail' || Session()->get('role') == 'Manajemen') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Closed" @if($form == "Tambah" && old("status_agenda") == "Closed") selected @elseif($form == "Edit" && $detail->status_agenda == "Closed") selected @elseif($form == "Detail" && $detail->status_agenda == "Closed") selected @endif>Closed</option>
                                    <option value="Reschedule" @if($form == "Tambah" && old("status_agenda") == "Reschedule") selected @elseif($form == "Edit" && $detail->status_agenda == "Reschedule") selected @elseif($form == "Detail" && $detail->status_agenda == "Reschedule") selected @endif>Reschedule</option>
                                    <option value="Cancel" @if($form == "Tambah" && old("status_agenda") == "Cancel") selected @elseif($form == "Edit" && $detail->status_agenda == "Cancel") selected @elseif($form == "Detail" && $detail->status_agenda == "Cancel") selected @endif>Cancel</option>
                                </select>
                            </div>
                            @if ($form == 'Tambah')
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="id_pic">PIC</label>
                                    <select name="id_pic[]" id="id_pic" class="selectpicker form-control @error('id_pic') is-invalid @enderror" data-live-search="true" multiple required>
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach($daftarPic as $item)
                                            <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-agenda'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection