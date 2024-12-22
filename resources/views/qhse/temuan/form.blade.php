@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ $subTitle }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="{{ route('temuan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Filter Bulan dan Tahun -->
                            <div class="form-group col-md-6">
                                <label for="filterPeriode">Filter Periode (Bulan dan Tahun)</label>
                                <select class="form-control" id="filterPeriode">
                                    <option value="">Semua Periode</option>
                                    @foreach($daftarAgenda as $agenda)
                                        @php
                                            $bulanTahun = date('n-Y', strtotime($agenda->tanggal_kegiatan));
                                            $labelBulanTahun = date('F Y', strtotime($agenda->tanggal_kegiatan));
                                        @endphp
                                        @if (!isset($uniquePeriode[$bulanTahun]))
                                            <option value="{{ $bulanTahun }}">{{ $labelBulanTahun }}</option>
                                            @php $uniquePeriode[$bulanTahun] = true; @endphp
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- Dropdown Nama Agenda -->
                            <div class="form-group col-md-6">
                                <label for="id_agenda">Nama Agenda</label>
                                <select class="form-control" name="id_agenda" id="id_agenda">
                                    <option value="">Pilih Agenda</option>
                                    @foreach($daftarAgenda as $agenda)
                                        @php
                                            $bulanTahun = date('n-Y', strtotime($agenda->tanggal_kegiatan));
                                        @endphp
                                        <option 
                                            value="{{ $agenda->id }}" 
                                            data-periode="{{ $bulanTahun }}",
                                            {{ old('id_agenda') == $agenda->id ? 'selected' : '' }}>
                                            {{ $agenda->nama_kegiatan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_agenda')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Kolom Form Lainnya -->
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="temuan">Temuan</label>
                                <input type="text" class="form-control @error('temuan') is-invalid @enderror" name="temuan" id="temuan">
                                @error('temuan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tanggal_temuan">Tanggal Temuan</label>
                                <input type="date" class="form-control @error('tanggal_temuan') is-invalid @enderror" name="tanggal_temuan" id="tanggal_temuan" value="{{ old('tanggal_temuan') }}" required>
                                @error('tanggal_temuan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">

                        <!-- Tambahan: Upload dokumen -->
                        <div class="form-group col-md-6">
                                <label class="form-label" for="file_dokumen_temuan">Dokumen Temuan</label>
                                <input type="file" class="form-control @error('file_dokumen_temuan') is-invalid @enderror" name="file_dokumen_temuan" id="file_dokumen_temuan" accept="application/pdf, image/*">
                                @error('file_dokumen_temuan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="duedate">Due Date Closing</label>
                                <input type="date" class="form-control @error('duedate') is-invalid @enderror" name="duedate" id="duedate" value="{{ old('duedate') }}" required>
                                @error('duedate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            
                        </div>

                        <!-- Tambahan: Keterangan -->
                        <div class="form-group col-md-12">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="4" required>{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterPeriode = document.getElementById('filterPeriode');
        const dropdownAgenda = document.getElementById('id_agenda');

        function filterAgenda() {
            const periode = filterPeriode.value;

            Array.from(dropdownAgenda.options).forEach(option => {
                if (option.value === "") return; // Skip placeholder option
                const optionPeriode = option.getAttribute('data-periode');

                if (!periode || optionPeriode === periode) {
                    option.style.display = ""; // Tampilkan
                } else {
                    option.style.display = "none"; // Sembunyikan
                }
            });
        }

        filterPeriode.addEventListener('change', filterAgenda);
    });
</script>
@endsection
