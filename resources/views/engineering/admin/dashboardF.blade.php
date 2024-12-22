@extends('layout.main')

@section('content')
<form method="GET" action="{{ route('dashboardFinance') }}">
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

<div class="row">
    <div class="col-md-12">
        <!-- Laporan Keuangan -->
        <h4 style="padding: 10px 0; font-weight: bold; color: #1a4a92;">LAPORAN KEUANGAN</h4>
        <div class="table-container">
        <table class="styled-table" id="table-laporan-keuangan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Proyek</th>
                    <th>Periode</th>
                    @foreach ($daftarDokumenKeuangan as $dokumen)
                        <th>{{ $dokumen->dokumen }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarLaporanKeuangan as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->nama_proyek ?? 'Proyek tidak ditemukan' }}</td>
                        <td>{{ $laporan->periode }}</td>
                        @foreach ($daftarDokumenKeuangan as $dokumen)
                            <td>
                                @php
                                    $statusData = $laporan->status_dokumen[$dokumen->dokumen] ?? null;
                                @endphp
                                @if ($statusData)
                                    @if ($statusData['status'] == 1)
                                        <a href="{{ url('/sub-detail-laporan-keuangan/'.$statusData['id_laporan_keuangan_details']) }}">✔️</a>
                                    @elseif ($statusData['status'] == 2)
                                        <a href="{{ url('/sub-detail-laporan-keuangan/'.$statusData['id_laporan_keuangan_details']) }}">❌</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 1)
                                        <a href="{{ url('/sub-detail-laporan-keuangan/'.$statusData['id_laporan_keuangan_details']) }}">📩</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 0)
                                        <a href="{{ url('/sub-detail-laporan-keuangan/'.$statusData['id_laporan_keuangan_details']) }}">⚠️</a>
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
        <h4 style="padding: 10px 0; font-weight: bold; color: #1a4a92;">LAPORAN AKUNTANSI</h4>
        <div class="table-container">
        <table class="styled-table" id="table-laporan-keuangan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Proyek</th>
                    <th>Periode</th>
                    @foreach ($daftarDokumenAkuntansi as $dokumen)
                        <th>{{ $dokumen->dokumen }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarLaporanAkuntansi as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->nama_proyek ?? 'Proyek tidak ditemukan' }}</td>
                        <td>{{ $laporan->periode }}</td>
                        @foreach ($daftarDokumenAkuntansi as $dokumen)
                            <td>
                                @php
                                    $statusData = $laporan->status_dokumen[$dokumen->dokumen] ?? null;
                                @endphp
                                @if ($statusData)
                                    @if ($statusData['status'] == 1)
                                        <a href="{{ url('/sub-detail-laporan-akuntansi/'.$statusData['id_laporan_akuntansi_details']) }}">✔️</a>
                                    @elseif ($statusData['status'] == 2)
                                        <a href="{{ url('/sub-detail-laporan-akuntansi/'.$statusData['id_laporan_akuntansi_details']) }}">❌</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 1)
                                        <a href="{{ url('/sub-detail-laporan-akuntansi/'.$statusData['id_laporan_akuntansi_details']) }}">📩</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 0)
                                        <a href="{{ url('/sub-detail-laporan-akuntansi/'.$statusData['id_laporan_akuntansi_details']) }}">⚠️</a>
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
        <h4 style="padding: 10px 0; font-weight: bold; color: #1a4a92;">LAPORAN PAJAK</h4>
        <div class="table-container">
        <table class="styled-table" id="table-laporan-keuangan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Proyek</th>
                    <th>Periode</th>
                    @foreach ($daftarDokumenPajak as $dokumen)
                        <th>{{ $dokumen->dokumen }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarLaporanPajak as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->nama_proyek ?? 'Proyek tidak ditemukan' }}</td>
                        <td>{{ $laporan->periode }}</td>
                        @foreach ($daftarDokumenPajak as $dokumen)
                            <td>
                                @php
                                    $statusData = $laporan->status_dokumen[$dokumen->dokumen] ?? null;
                                @endphp
                                @if ($statusData)
                                    @if ($statusData['status'] == 1)
                                        <a href="{{ url('/sub-detail-laporan-pajak/'.$statusData['id_laporan_pajak_details']) }}">✔️</a>
                                    @elseif ($statusData['status'] == 2)
                                        <a href="{{ url('/sub-detail-laporan-pajak/'.$statusData['id_laporan_pajak_details']) }}">❌</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 1)
                                        <a href="{{ url('/sub-detail-laporan-pajak/'.$statusData['id_laporan_pajak_details']) }}">📩</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 0)
                                        <a href="{{ url('/sub-detail-laporan-pajak/'.$statusData['id_laporan_pajak_details']) }}">⚠️</a>
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
        <h4 style="padding: 10px 0; font-weight: bold; color: #1a4a92;">LAPORAN PROYEK</h4>
        <div class="table-container">
        <table class="styled-table" id="table-laporan-keuangan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Proyek</th>
                    <th>Periode</th>
                    @foreach ($daftarDokumenProyek as $dokumen)
                        <th>{{ $dokumen->dokumen }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($daftarLaporanProyek as $index => $laporan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $laporan->nama_proyek ?? 'Proyek tidak ditemukan' }}</td>
                        <td>{{ $laporan->periode }}</td>
                        @foreach ($daftarDokumenProyek as $dokumen)
                            <td>
                                @php
                                    $statusData = $laporan->status_dokumen[$dokumen->dokumen] ?? null;
                                @endphp
                                @if ($statusData)
                                    @if ($statusData['status'] == 1)
                                        <a href="{{ url('/sub-detail-laporan-proyek/'.$statusData['id_laporan_proyek_details']) }}">✔️</a>
                                    @elseif ($statusData['status'] == 2)
                                        <a href="{{ url('/sub-detail-laporan-proyek/'.$statusData['id_laporan_proyek_details']) }}">❌</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 1)
                                        <a href="{{ url('/sub-detail-laporan-proyek/'.$statusData['id_laporan_proyek_details']) }}">📩</a>
                                    @elseif (is_null($statusData['status']) && $statusData['jumlah_file'] >= 0)
                                        <a href="{{ url('/sub-detail-laporan-proyek/'.$statusData['id_laporan_proyek_details']) }}">⚠️</a>
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
