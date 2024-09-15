<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $namaFile }}</title>

  <style>
    * {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 9pt;
    }

    table {
      width: 100%;
      font: 9pt arial, sans-serif;
      color: black;
      border: 1px solid black;
      border-collapse: collapse;
    }

    th {
      /* height: 70px; */
      padding: 3px;
      background-color: rgb(238, 238, 238);
      border: 1px solid black;
    }

    td {
      padding: 5px;
      border: 1px solid black;
      /* height: 70px; */
    }
  </style>
</head>

<body>
  <div style="margin-bottom: 10px">
    <span style="font-family: 'Courier New', monospace;font-size: 8pt;">
      dicetak pada: {{ Carbon\Carbon::create('now') }}
    </span>
  </div>

  <div style="text-align: center;">
    <span style="font-size: 12pt;font-weight: bold;">
      {{$namaFile}}
    </span>
    <br>

    <hr style="border-top: 3px double #8c8b8b">
  </div>

  <table cellspacing='0' style="width: 40%;">
    <thead>
      <tr>
        <th colspan="2">Detail Proyek</th>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Nama Proyek</th>
        <td>{{$csi->proyek->nama_proyek}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Tanggal Mulai</th>
        <td>{{$csi->proyek->tanggal}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Tipe Konstruksi</th>
        <td>{{$csi->proyek->tipe_konstruksi}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Prioritas BIM</th>
        <td>{{$csi->proyek->prioritas}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Status</th>
        <td>{{$csi->proyek->status}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Nama User</th>
        <td>{{$csi->user?->nama_user}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Nama User</th>
        <td>{{$csi->user?->jabatan}}</td>
      </tr>
    </thead>
  </table>

  <br>
  
  <table cellspacing='0'>
    <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Parameter</th>
        <th rowspan="2">Aspek Yang Dinilai</th>
        <th rowspan="2">Bobot (%)</th>
        <th colspan="5">Penilaian</th>
        <th rowspan="2">Nilai</th>
        <th rowspan="2">Total</th>
      </tr>
      <tr>
        <th>Sangat Kurang</th>
        <th>Kurang</th>
        <th>Cukup</th>
        <th>Baik</th>
        <th>Sangat Baik</th>
      </tr>
    </thead>
    <tbody>
      @isset($daftarDetailCsi)
        @php
          $no = 1;
          $totalBobot = 0;
          $totalNilai = 0;
        @endphp
        @forelse ($daftarDetailCsi as $item)
          @php
              $nilai = $item->nilai != 0 ? round($item->nilai * $item->aspekCsi->bobot / 100, 2) : 0;
          @endphp
          <tr>
              <td style="text-align: center; width: 20px;">{{ $no++ }}</td>
              <td>{{ $item->aspekCsi?->aspek }}</td>=
              <td style="text-align: center;">{{ $item->aspekCsi?->parameter }}</td>=
              <td style="text-align: center; width: 50px;">{{ $item->aspekCsi?->bobot }}</td>=
              <td style="text-align: center; width: 50px;">{{ $item->penilaian == 'Sangat Kurang' ? 'V' : '' }}</td>=
              <td style="text-align: center; width: 50px;">{{ $item->penilaian == 'Kurang' ? 'V' : '' }}</td>=
              <td style="text-align: center; width: 50px;">{{ $item->penilaian == 'Cukup' ? 'V' : '' }}</td>=
              <td style="text-align: center; width: 50px;">{{ $item->penilaian == 'Baik' ? 'V' : '' }}</td>=
              <td style="text-align: center; width: 50px;">{{ $item->penilaian == 'Sangat Baik' ? 'V' : '' }}</td>=
              <td style="text-align: center; width: 50px;">{{ $item->nilai }}</td>=
              <td style="text-align: center; width: 50px;">{{ $nilai }}</td>=
          </tr>
          @php
              $totalBobot = $totalBobot + $item->aspekCsi->bobot;
              $totalNilai = $totalNilai + $nilai;
          @endphp
        @empty
        <tr>
            <td colspan="5">tidak ada data. . .</td>
        </tr>
        @endforelse
      @else
        <tr>
            <td colspan="5">tidak ada data. . .</td>
        </tr>
      @endisset
    </tbody>
    <tfoot>
      <tr>
        <th rowspan="2" colspan="3"></th>
        <th rowspan="2" style="text-align: center; width: 50px;">{{$totalBobot}}</th>
        <th colspan="6" style="text-align: center;">NILAI RATA-RATA</th>
        <th style="text-align: center; width: 50px;">{{number_format($totalNilai, 2)}}</th>
      </tr>
      <tr>
        <th colspan="6" style="text-align: center;">KONVERSI SKALA MX. 5</th>
        <th style="text-align: center; width: 50px;">{{number_format($totalNilai != 0 ? $totalNilai * 5 / 5 : 0, 2)}}</th>
      </tr>
    </tfoot>
  </table>

</body>
</html>