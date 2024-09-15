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

  <table cellspacing='0'>
    <thead>
      <tr>
        <th rowspan="2">No</th>
        <th rowspan="2">Tanggal</th>
        <th rowspan="2">Reviewer</th>
        <th rowspan="2">Kode SPK</th>
        <th rowspan="2">Proyek</th>
        <th colspan="6">Review RKP</th>
      </tr>
      <tr>
        <th>Tahap 1</th>
        <th>Tahap 2</th>
        <th>Tahap 3</th>
        <th>Tahap 4</th>
        <th>Tahap 5</th>
        <th>Tahap 6</th>
      </tr>
    </thead>
    <tbody>
      @isset($daftarRkpMankon)
        @php
        $no = 1;
        @endphp
        @forelse ($daftarRkpMankon as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->tanggal_rkp}}</td>
                <td>{{ $item->userRespon?->nama_user }}</td>
                <td>{{ $item->proyek?->kode_spk }}</td>
                <td>{{ $item->proyek?->nama_proyek }}</td>
                <td style="text-align: center">{{ $item->review1 == 1 ? 'V' : 'X' }}</td>
                <td style="text-align: center">{{ $item->review2 == 1 ? 'V' : 'X' }}</td>
                <td style="text-align: center">{{ $item->review3 == 1 ? 'V' : 'X' }}</td>
                <td style="text-align: center">{{ $item->review4 == 1 ? 'V' : 'X' }}</td>
                <td style="text-align: center">{{ $item->review5 == 1 ? 'V' : 'X' }}</td>
                <td style="text-align: center">{{ $item->review6 == 1 ? 'V' : 'X' }}</td>
            </tr>
        @empty
        <tr>
            <td colspan="11">tidak ada data. . .</td>
        </tr>
        @endforelse
      @else
        <tr>
            <td colspan="11">tidak ada data. . .</td>
        </tr>
      @endisset
    </tbody>
  </table>

</body>
</html>