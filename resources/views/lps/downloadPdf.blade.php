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

  <table cellspacing='0' style="width: 55%;">
    <thead>
      <tr>
        <th colspan="2">Detail Proyek</th>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Nama Proyek</th>
        <td>{{$proyek->nama_proyek}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Tanggal Mulai</th>
        <td>{{$proyek->tanggal}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Tipe Konstruksi</th>
        <td>{{$proyek->tipe_konstruksi}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Prioritas BIM</th>
        <td>{{$proyek->prioritas}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Status</th>
        <td>{{$proyek->status}}</td>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Reviewer</th>
        <td>{{$proyek->userLps?->nama_user}}</td>
      </tr>
    </thead>
  </table>

  <br>
  
  <table cellspacing='0'>
    <thead>
      <tr>
        <th colspan="5" style="text-align: left;">Dokumen Utama</th>
      </tr>
      <tr>
        <th>No</th>
        <th colspan="2">Dokumen Utama Terdiri Dari:</th>
        <th>PDF</th>
        <th>NATIVE</th>
      </tr>
    </thead>
    <tbody>
      @isset($daftarLps)
        @php
        $no = 1;
        @endphp
        @forelse ($daftarLps as $item)
          @if ($item->dokumenLps->jenis_dokumen == 'Utama')
            <tr>
                <td style="text-align: center; width: 20px;">{{ $no++ }}</td>
                <td style="text-align: center; width: 35px;">{{ $item->dokumenLps?->no_urut }}</td>=
                <td>{{ $item->dokumenLps?->nama_dokumen }}</td>=
                <td style="text-align: center; width: 50px;">{{ $item->pdf == 1 ? 'V' : 'X' }}</td>=
                <td style="text-align: center; width: 50px;">{{ $item->native == 1 ? 'V' : 'X' }}</td>=
            </tr>
          @endif
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
  </table>

  <br>
  
  <table cellspacing='0'>
    <thead>
      <tr>
        <th colspan="5" style="text-align: left;">Dokumen Pendukung</th>
      </tr>
      <tr>
        <th>No</th>
        <th colspan="2">Dokumen Pendukung Terdiri Dari:</th>
        <th>PDF</th>
        <th>NATIVE</th>
      </tr>
    </thead>
    <tbody>
      @isset($daftarLps)
        @php
        $no = 1;
        @endphp
        @forelse ($daftarLps as $item)
          @if ($item->dokumenLps->jenis_dokumen == 'Pendukung')
            <tr>
                <td style="text-align: center; width: 20px;">{{ $no++ }}</td>
                <td style="text-align: center; width: 35px;">{{ $item->dokumenLps?->no_urut }}</td>=
                <td>{{ $item->dokumenLps?->nama_dokumen }}</td>=
                <td style="text-align: center; width: 50px;">{{ $item->pdf == 1 ? 'V' : 'X' }}</td>=
                <td style="text-align: center; width: 50px;">{{ $item->native == 1 ? 'V' : 'X' }}</td>=
            </tr>
          @endif
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
  </table>

</body>
</html>