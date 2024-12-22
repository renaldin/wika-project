@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <h4 class="mb-0">{{$subTitle}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>            
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="" class="d-flex" id="filterProyekCalendar">
                                <select class="form-control selectpicker" style="height: 38px; margin-top: 10px;" name="keyword" id="keyword" data-live-search="true">
                                    <option value="">--Pilih Proyek--</option>
                                    @foreach ($daftarProyek as $item)
                                        <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="container mt-5">
                        <div id="calendar2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h4>Daftar Pelatihan</h4>
                    <div style="max-height: 250px; overflow-y: auto;">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarPelatihan as $index => $pelatihan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $pelatihan->nama_kegiatan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pelatihan->tanggal_kegiatan)->format('d M Y') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal dipindahkan ke bagian akhir body untuk menghindari konflik -->
<div class="modal fade" id="pelatihanModal" tabindex="-1" aria-labelledby="pelatihanModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pelatihanModalLabel">Peringatan Pelatihan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Gambar warning -->
        <div class="text-center mb-3">
          <img src="{{ asset('image/bell.gif') }}" alt="Warning" style="width: 200px; height: auto;">
        </div>
        <!-- Detail Agenda -->
        <div id="modalAgendaDetail"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endsection



