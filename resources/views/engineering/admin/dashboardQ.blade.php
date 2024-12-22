@extends('layout.main')

@section('content')
<form method="GET" action="{{ route('dashboardQhse') }}">
    <div class="form-group">
        <label for="bulan">Filter Periode</label>
        <input type="month" id="bulan" name="bulan" class="form-control" value="{{ request()->get('bulan') }}">
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>


@php
    // Calculate values for the charts
    $global = $chartLicense['fullEngineering'] + $chartLicense['fullOffice'];
    $nonGlobal = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'] + $chartLicense['nonOffice'] + $chartLicense['trialOffice'] + $chartLicense['studentOffice'];
    $totalGlobal = $global + $nonGlobal;
    $persenGlobal = $global != 0 ? $global / $totalGlobal * 100 : 0;
    $persenNonGlobal = $nonGlobal != 0 ? $nonGlobal / $totalGlobal * 100 : 0;

    $totalEngineer = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'] + $chartLicense['fullEngineering'];
    $lainEngineer = $chartLicense['nonEngineering'] + $chartLicense['trialEngineering'] + $chartLicense['studentEngineering'];
    $persenFullEngineer =$chartLicense['fullEngineering'] != 0 ? $chartLicense['fullEngineering'] / $totalEngineer * 100 : 0;
    $persenLainEngineer = $lainEngineer != 0 ? $lainEngineer / $lainEngineer * 100 : 0;

    $lainOffice = $chartLicense['nonOffice'] + $chartLicense['trialOffice'] + $chartLicense['studentOffice'];
    $totalOffice = $lainOffice + $chartLicense['fullOffice'];
    $persenLainOffice = $lainOffice != 0 ? $lainOffice / $totalOffice * 100 : 0;
    $persenFullOffice = $chartLicense['fullOffice'] != 0 ? $chartLicense['fullOffice'] / $totalOffice * 100 : 0;
@endphp
 <!-- Kotak atau Tabel Temuan Terbaru -->
<div class="row mt-4">
    <!-- Kotak Temuan Terbaru -->
    <div class="col-md-6">
        <div class="card shadow-lg mb-3 border-primary">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 text-white">Temuan Terbaru</h5>
        </div>

            <div class="card-body">
                @if ($latestTemuan->isNotEmpty())
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <strong class="text-dark">{{ $latestTemuan[0]->nama_temuan }}</strong><br>
                            <strong class="text-muted">Tanggal Temuan: {{ $latestTemuan[0]->tanggal_temuan }}</strong><br>
                            <strong>Proyek:</strong>  
                            @if ($latestTemuan[0]->agenda &&  $latestTemuan[0]->agenda->proyek)
                                {{ $latestTemuan[0]->agenda->proyek->nama_proyek }}
                            @else
                                <span class="text-danger">Tidak ada Proyek</span>
                            @endif<br>
                            <strong class="text-muted">Temuan: {{ $latestTemuan[0]->temuan }}</strong>
                        </li>
                    </ul>
                @else
                    <p class="text-center text-warning">Belum ada temuan terbaru.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Kotak Temuan dengan Deadline Mendekati -->
    <div class="col-md-6">
        <div class="card shadow-lg mb-3 border-warning">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Temuan dengan Deadline Mendekati</h5>
            </div>
            <div class="card-body">
                @if ($upcomingTemuan->isNotEmpty())
                    <ul class="list-unstyled">
                        @foreach ($upcomingTemuan as $temuan)
                            <li class="mb-3">
                                <strong class="text-dark">{{ $temuan->nama_temuan }}</strong><br>
                                <!-- Periksa apakah duedate ada dan bukan null, jika ya format -->
                                @if ($temuan->duedate)
                                    <strong class="text-muted">Deadline Closing: {{ \Carbon\Carbon::parse($temuan->duedate)->format('d-m-Y') }}</strong><br>
                                @else
                                    <strong class="text-muted">Deadline Closing: Tanggal tidak tersedia</strong><br>
                                @endif
                                <strong>Proyek:</strong>  
                                @if ($temuan->agenda && $temuan->agenda->proyek)
                                    {{ $temuan->agenda->proyek->nama_proyek }}
                                @else
                                    <span class="text-danger">Tidak ada Proyek</span>
                                @endif <br> 
                                <strong class="text-dark">Temuan : {{ $temuan->temuan }}</strong><br>    
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-center text-warning">Tidak ada temuan dengan deadline mendekati.</p>
                @endif
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- Laporan Keuangan -->
        <h4 style="padding: 10px 0; font-weight: bold; color: #1a4a92;">LAPORAN QA</h4>
        <div class="table-container">
        <table class="styled-table" id="table-laporan-keuangan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Proyek</th>
                    <th>Periode</th>
                    @foreach ($daftarDokumenQa as $dokumen)
                        <th>{{ $dokumen->dokumen }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarLaporanQa as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->nama_proyek ?? 'Proyek tidak ditemukan' }}</td>
                        <td>{{ $laporan->periode }}</td>
                        @foreach ($daftarDokumenQa as $dokumen)
                            <td>
                                @php
                                    $statusData = $laporan->status_dokumen[$dokumen->dokumen] ?? null;
                                @endphp
                                @if ($statusData)
                                    @if ($statusData['status'] == 1)
                                        <a href="{{ url('/sub-detail-laporan-qa/'.$statusData['id_laporan_qa_details']) }}">✔️</a>
                                    @elseif ($statusData['status'] == 2)
                                        <a href="{{ url('/sub-detail-laporan-qa/'.$statusData['id_laporan_qa_details']) }}">❌</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 1)
                                        <a href="{{ url('/sub-detail-laporan-qa/'.$statusData['id_laporan_qa_details']) }}">📩</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 0)
                                        <a href="{{ url('/sub-detail-laporan-qa/'.$statusData['id_laporan_qa_details']) }}">⚠️</a>
                                    @else
                                        <span>⚠️</span>
                                    @endif
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>  
    <div class="col-md-12">
        <!-- Laporan Keuangan -->
        <h4 style="padding: 10px 0; font-weight: bold; color: #1a4a92;">LAPORAN HSE</h4>
        <div class="table-container">
        <table class="styled-table" id="table-laporan-keuangan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Proyek</th>
                    <th>Periode</th>
                    @foreach ($daftarDokumenHse as $dokumen)
                        <th>{{ $dokumen->dokumen }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarLaporanHse as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->nama_proyek ?? 'Proyek tidak ditemukan' }}</td>
                        <td>{{ $laporan->periode }}</td>
                        @foreach ($daftarDokumenHse as $dokumen)
                            <td>
                                @php
                                    $statusData = $laporan->status_dokumen[$dokumen->dokumen] ?? null;
                                @endphp
                                @if ($statusData)
                                    @if ($statusData['status'] == 1)
                                        <a href="{{ url('/sub-detail-laporan-hse/'.$statusData['id_laporan_hse_details']) }}">✔️</a>
                                    @elseif ($statusData['status'] == 2)
                                        <a href="{{ url('/sub-detail-laporan-hse/'.$statusData['id_laporan_hse_details']) }}">❌</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 1)
                                        <a href="{{ url('/sub-detail-laporan-hse/'.$statusData['id_laporan_hse_details']) }}">📩</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 0)
                                        <a href="{{ url('/sub-detail-laporan-hse/'.$statusData['id_laporan_hse_details']) }}">⚠️</a>
                                    @else
                                        <span>⚠️</span>
                                    @endif
                                @else
                                    <span>-</span>
                                @endif
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>    
</div>

<style>
    .col-md-12 {
        padding: 0;
        margin: 0;
        width: 100%;
    }

    .table-container, .styled-table {
        padding: 0;
        margin: 0;
    }
    /* Container for adding padding and rounded border effect */
    .table-container {
        overflow-x: auto;
        padding: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    /* Styling for tables */
    .styled-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
    }

    /* Header of tables */
    .styled-table thead {
        background-color: #f5f5f5;
        color: #333;
        font-weight: bold;
    }

    .styled-table th, .styled-table td {
        padding: 10px;
        text-align: center;
        border-bottom: 1px solid #e0e0e0;
    }

    /* Border radius for table corners */
    .styled-table th:first-child, .styled-table td:first-child {
        border-top-left-radius: 10px;
    }

    .styled-table th:last-child, .styled-table td:last-child {
        border-top-right-radius: 10px;
    }

    /* Scrollbar styling */
    .table-container {
        scrollbar-color: #a1a1a1 #f5f5f5;
        scrollbar-width: thin;
    }

    /* Scrollbar styling for Webkit browsers */
    .table-container::-webkit-scrollbar {
        height: 8px;
    }
    .table-container::-webkit-scrollbar-thumb {
        background-color: #a1a1a1;
        border-radius: 4px;
    }
    .table-container::-webkit-scrollbar-track {
        background-color: #f5f5f5;
    }
  
</style>

@endsection
