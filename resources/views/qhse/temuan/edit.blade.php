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
          
            <div class="card-body px-4">
                <form action="{{ route('proses-edit-temuan', ['id' => $temuan->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="id_agenda">Agenda</label>
                        <select name="id_agenda" id="id_agenda" class="form-control">
                            @foreach($daftarAgenda as $agenda)
                                <option value="{{ $agenda->id }}" {{ $temuan->id_agenda == $agenda->id ? 'selected' : '' }}>
                                    {{ $agenda->nama_kegiatan }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_agenda')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="temuan">Temuan</label>
                        <textarea name="temuan" id="temuan" class="form-control">{{ $temuan->temuan }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_temuan">Tanggal Temuan</label>
                        <input type="date" name="tanggal_temuan" id="tanggal_temuan" class="form-control" value="{{ $temuan->tanggal_temuan }}">
                    </div>

                    <div class="form-group">
                        <label for="duedate">Due Date Closing</label>
                        <input type="date" name="duedate" id="duedate" class="form-control" value="{{ $temuan->duedate }}">
                    </div>

                    <div class="form-group">
                        <label for="file_dokumen_temuan">File Dokumen Temuan</label>
                        <input type="file" name="file_dokumen_temuan" id="file_dokumen_temuan" class="form-control">
                        @if($temuan->file_dokumen_temuan)
                            <p>File sebelumnya: <a href="{{ asset('file_dokumen_temuan/' . $temuan->file_dokumen_temuan) }}" target="_blank">Lihat file</a></p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="{{ $temuan->keterangan }}">
                    </div>
                    <div class="row">
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                            <!-- Button Kembali -->
                        <div class="form-group">
                                <a href="{{ route('daftar-temuan') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
</div>
@endsection
