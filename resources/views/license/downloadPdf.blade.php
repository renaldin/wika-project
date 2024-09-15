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
      Laporan License Software
    </span>
    <br>

    <hr style="border-top: 3px double #8c8b8b">
  </div>

  <table cellspacing='0'>
    <thead>
      <tr>
        <th>No</th>
        <th>Pengguna</th>
        <th>Unit Kerja</th>
        <th>Software</th>
        <th>Nama Software</th>
        <th>Fungsi</th>
        <th>Kategori</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      @isset($detailLicense)
        @php
        $no = 1;
        @endphp
        @forelse ($detailLicense as $item)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->license?->user?->nama_user }}</td>=
                <td>{{ $item->license?->user?->jabatan }}</td>=
                <td>
                    <center>
                        <img class="" src="https://cdn.pixabay.com/photo/2022/09/21/10/42/ms-word-logo-7470029_960_720.png" style="width: 80px; padding: 3px;" alt="profile">    
                        {{-- <img class="" src="http://127.0.0.1:8000/{{$item->software?->gambar}}" style="width: 80px; padding: 3px;" alt="Gambar Software">  --}}
                    </center>
                </td>
                <td>{{ $item->software?->nama_software }}</td>=
                <td>{{ $item->software?->fungsi }}</td>=
                <td>{{ $item->software?->kategori }}</td>=
                <td>{{ $item->status }}</td>=
            </tr>
        @empty
        <tr>
            <td colspan="6">tidak ada data. . .</td>
        </tr>
        @endforelse
      @else
        <tr>
            <td colspan="6">tidak ada data. . .</td>
        </tr>
      @endisset
    </tbody>
  </table>

</body>
</html>