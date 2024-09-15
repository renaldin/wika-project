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
                    <form action="@if($form == 'Tambah')/tambah-task-pcp @else/edit-task-pcp/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data" id="taskPcpForm">
                        <div class="row">
                            @csrf
                            @if ($user->role == 'Head Office')
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="tanggal_permintaan">Tanggal Permintaan</label>
                                    <input type="date" class="form-control @error('tanggal_permintaan') is-invalid @enderror" @if($form == 'Tambah') value="{{old('tanggal_permintaan')}}" @else value="{{$detail->tanggal_permintaan}}" @endif id="tanggal_permintaan" name="tanggal_permintaan" @if($form == 'Detail') disabled @endif placeholder="Masukkan Tanggal Permintaan" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="judul_tugas">Judul Tugas</label>
                                    <input type="text" class="form-control @error('judul_tugas') is-invalid @enderror" @if($form == 'Tambah') value="{{old('judul_tugas')}}" @else value="{{$detail->judul_tugas}}" @endif id="judul_tugas" name="judul_tugas" @if($form == 'Detail') disabled @endif placeholder="Masukkan Judul Tugas" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="instruksi_pekerjaan">Instruksi Pekerjaan</label>
                                    <textarea class="form-control" name="instruksi_pekerjaan" id="instruksi_pekerjaan" cols="15" rows="5" @if($form == 'Detail') disabled @endif placeholder="Masukkan Instruksi Pekerjaan" required>@if($form == 'Tambah'){{old('instruksi_pekerjaan')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->instruksi_pekerjaan}}@endif</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="batas_waktu">Batas Waktu</label>
                                    <input type="datetime-local" class="form-control @error('batas_waktu') is-invalid @enderror" @if($form == 'Tambah') value="{{old('batas_waktu')}}" @else value="{{$detail->batas_waktu}}" @endif id="batas_waktu" name="batas_waktu" @if($form == 'Detail') disabled @endif placeholder="Masukkan Batas Waktu" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="link_pengumpulan_tugas">Hyperlink Pengumpulan Tugas @if($form == 'Detail')<a href="{{$detail->link_pengumpulan_tugas}}">Klik Link</a>@endif</label>
                                    <textarea class="form-control" name="link_pengumpulan_tugas" id="link_pengumpulan_tugas" cols="15" rows="5" @if($form == 'Detail') disabled @endif placeholder="Masukkan Link Pengumpulan Tugas" required>@if($form == 'Tambah'){{old('link_pengumpulan_tugas')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->link_pengumpulan_tugas}}@endif</textarea>
                                </div>
                            @endif
                            <div class="form-group col-md-6">
                                <label class="form-label" for="status_tugas">Status Tugas</label>
                                <select name="status_tugas" id="status_tugas" class="form-control @error('status_tugas') is-invalid @enderror" @if($form == 'Detail' || Session()->get('role') == 'Manajemen') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @if ($user->role == 'Head Office')
                                        <option value="Open" @if($form == "Tambah" && old("status_tugas") == "Open") selected @elseif($form == "Edit" && $detail->status_tugas == "Open") selected @elseif($form == "Detail" && $detail->status_tugas == "Open") selected @endif>Open</option>
                                        <option value="Revisi" @if($form == "Tambah" && old("status_tugas") == "Revisi") selected @elseif($form == "Edit" && $detail->status_tugas == "Revisi") selected @elseif($form == "Detail" && $detail->status_tugas == "Revisi") selected @endif>Revisi</option>
                                        <option value="Close" @if($form == "Tambah" && old("status_tugas") == "Close") selected @elseif($form == "Edit" && $detail->status_tugas == "Close") selected @elseif($form == "Detail" && $detail->status_tugas == "Close") selected @endif>Close</option>
                                    @endif
                                    @if ($user->role == 'Tim Proyek' || $form == 'Detail')
                                        <option value="Have Worked" @if($form == "Tambah" && old("status_tugas") == "Have Worked") selected @elseif($form == "Edit" && $detail->status_tugas == "Have Worked") selected @elseif($form == "Detail" && $detail->status_tugas == "Have Worked") selected @endif>Have Worked</option>  
                                    @endif
                                </select>
                            </div>
                            @if ($form == 'Detail')
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="komentar">Catatan / Komentar (Opsional)</label>
                                    <textarea class="form-control" name="komentar" id="komentar" cols="15" rows="5" @if($form == 'Detail') disabled @endif placeholder="">@if($form == 'Tambah'){{old('komentar')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->komentar}}@endif</textarea>
                                </div>
                            @endif
                            <div class="form-group col-md-6" id="div_komentar" style="display: none;">
                                <label class="form-label" for="komentar">Catatan / Komentar (Opsional)</label>
                                <textarea class="form-control" name="komentar" id="komentar" cols="15" rows="5" @if($form == 'Detail') disabled @endif placeholder="Masukkan Instruksi Pekerjaan">@if($form == 'Tambah'){{old('komentar')}}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->komentar}}@endif</textarea>
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-task-pcp'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection