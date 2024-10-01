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
        <th colspan="2">Detail AKHLAK</th>
      </tr>
      <tr>
        <th style="width: 150px; text-align: left;">Nama Pegawai</th>
        <td>{{$akhlak->nama_user}}</td>
      </tr>
    </thead>
  </table>

  <br>
  
  <table cellspacing='0'>
                                <thead>
                                    <tr class="ligth text-center">
                                        <td rowspan="2" class="text-wrap">No</td>
                                        <td rowspan="2" class="text-wrap">Parameter</td>
                                        <td rowspan="2" class="text-wrap">Aspek Yang Dinilai</td>
                                        <td rowspan="2" class="text-wrap">Deskripsi</td>
                                        <td rowspan="2" class="text-wrap">Periode</td>
                                        <td rowspan="2" class="text-wrap">Evidence</td>
                                        <td rowspan="2" class="text-wrap">Bobot (%)</td>
                                        <td colspan="5">Penilaian</td>  
                                            <td rowspan="2">Nilai</td>
                                            <td rowspan="2">Total</td>
                                            <td rowspan="2">Aksi</td>
                                    </tr>
                                    <tr class="ligth text-center">
                                        <td class="text-wrap">Sangat Kurang</td>
                                        <td class="text-wrap">Kurang</td>
                                        <td class="text-wrap">Cukup</td>
                                        <td class="text-wrap">Baik</td>
                                        <td class="text-wrap">Sangat Baik</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                        $totalBobot = 0;
                                        $totalNilai = 0;
                                    @endphp
                                    @foreach ($daftarDetailAkhlak as $item)
                                        @if ($item->id_akhlak == $akhlak->id_akhlak)
                                        @php
                                            $nilai = $item->nilai != 0 ? round($item->nilai * $item->bobot / 100, 2) : 0;
                                            $totalBobot += $item->bobot; // Menambahkan nilai bobot ke totalBobot
                                            $totalNilai += $nilai; // Menambahkan nilai ke totalNilai
                                        @endphp
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->aspek}}</td>
                                                <td class="text-wrap">{{$item->parameter}}</td>
                                                <td class="text-center">{{$item->deskripsi}}</td>
                                                <td class="text-center">{{$item->periode}}</td>
                                                <td class="text-center">
                                                    @if ($item->evidence)
                                                        <a href="{{ asset('/' . $item->evidence) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Dokumen</a>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$item->bobot}}</td>
                                                <td class="text-center">
                                                    @if ($item->penilaian == 'sangat-kurang')
                                                        <i class="fa fa-check" style="color: green;"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->penilaian == 'kurang')
                                                        <i class="fa fa-check" style="color: green;"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->penilaian == 'cukup')
                                                        <i class="fa fa-check" style="color: green;"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->penilaian == 'baik')
                                                        <i class="fa fa-check" style="color: green;"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($item->penilaian == 'sangat baik')
                                                        <i class="fa fa-check" style="color: green;"></i>
                                                    @else
                                                        <i class="fa fa-times" style="color: red;"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $nilai }}</td>
                                                <td class="text-center">{{ $item->nilai }}</td>
                                                <td class="text-center">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id_detail_akhlak}}">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="text-center"><strong>Total</strong></td>
                                        <td class="text-center">{{ $totalBobot }}</td>
                                        <td colspan="5" class="text-center">{{ $totalNilai }}</td>
                                        <td></td>
                                    </tr>
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