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
    <span style="font-size: 12pt;">
      {{date('F Y', strtotime($bulan))}}
    </span>
    <hr style="border-top: 3px double #8c8b8b">
  </div>

  <br>
  
  @php
      $totalSubtotal = 0;
      $totalWork = 0;
  @endphp

  @foreach ($kategoriPekerjaan as $kategori)
      @if ($kategori->fungsi != null)
        <table cellspacing='0'>
          <thead>
            <tr>
              <th colspan="3" style="border: 1px solid black; text-align: left;">{{strtoupper($kategori->fungsi)}}</th>
            </tr>
            <tr>
              <th style="text-align: center; width: 20px;">No</th>
              <th>Nama User</th>
              <th>Jumlah Durasi Pekerjaan</th>
            </tr>
          </thead>
          <tbody>
            @isset($activity)
              @php
                  $no = 1; 
                  $subTotal = 0;   
                  $totalWorkHours = 0;
                  foreach($masterActivity as $row) {
                      if($row->fungsi == $kategori->fungsi) {
                          $totalWorkHours = $totalWorkHours + $row->work_hours;
                      }
                  }
              @endphp
              @forelse ($activity as $item)
                @if ($kategori->fungsi == $item->fungsi)
                  <tr>
                      <td style="text-align: center; width: 20px;">{{$no++}}</td>
                      <td>{{$item->nama_user}}</td>
                      <td style="text-align: center; width: 200px;">{{$item->jumlah_durasi}}</td>
                  </tr>
                  @php
                      $subTotal = $subTotal + $item->jumlah_durasi;
                  @endphp
                @endif
              @empty
              <tr>
                  <td colspan="3">tidak ada data. . .</td>
              </tr>
              @endforelse
            @else
              <tr>
                  <td colspan="3">tidak ada data. . .</td>
              </tr>
            @endisset
          </tbody>
          @php
              if ($totalWorkHours == 0){
                  $persen = 0;
              } else {
                  $persen = round(($subTotal / $totalWorkHours) * 100, 1);
              }

              $totalSubtotal = $totalSubtotal + $subTotal;
              $totalWork = $totalWork + $totalWorkHours;
          @endphp
          <tfoot>
            <tr>
              <th colspan="2" style="text-align: right;">Sub Total</th>
              <th style="text-align: center; width: 200px;">{{$subTotal}}</th>
            </tr>
            <tr>
              <th colspan="2" style="text-align: right;">Hourly Working Requirement</th>
              <th style="text-align: center; width: 200px;">{{$totalWorkHours}}</th>
            </tr>
            <tr>
              <th colspan="2" style="text-align: right;">Achievement Rate Current Month</th>
              <th style="text-align: center; width: 200px;">{{ $persen }}%</th>
            </tr>
          </tfoot>
        </table>
        <br>
      @endif
  @endforeach
  <br>
  <table cellspacing='0'>
    <tfoot>
      <tr>
        <th colspan="2" style="text-align: right;">Hourly Work Productive Job Item (a)</th>
        <th style="text-align: center; width: 200px;">{{ $totalSubtotal }}</th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right;">Hourly Working Requirement (b)</th>
        <th style="text-align: center; width: 200px;">{{ $totalWork }}</th>
      </tr>
      <tr>
        <th colspan="2" style="text-align: right;">Achievement Rate Current Month (a/b)</th>
        <th style="text-align: center; width: 200px;">{{ round($totalWork == 0? 0 : ($totalSubtotal / $totalWork) * 100) }}%</th>
      </tr>
    </tfoot>
  </table>

</body>
</html>