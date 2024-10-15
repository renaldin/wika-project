@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">AKHLAK</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama User</label>
                            <input type="text" class="form-control" value="{{$detailAkhlak->nama_user}}" readonly>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                            <label class="form-label">Periode</label>
                            <input type="text" class="form-control" value="{{date('F Y', strtotime($detailAkhlak->periode))}}" readonly>
                        </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($user->role == 'Divisi')
                                <a href="/download-monitoring-akhlak/{{$detailAkhlak->id_akhlak}}" target="_blank" class="btn btn-primary mb-4">Download PDF</a>      
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                <h4 class="card-title">Daftar AKHLAK</h4>
                </div>

            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                <div class="row">
                    @if (session('success'))
                        <div class="col-lg-12">
                            <div class="alert bg-primary text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                                    {{ session('success') }}
                                </span>
                            </div>
                        </div>
                    @endif
                    @if (session('fail'))
                        <div class="col-lg-12">
                            <div class="alert bg-danger text-white alert-dismissible">
                                <span>
                                    <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                    {{ session('fail') }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="akhlakTable">
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
                                        @if ($item->id_akhlak == $detailAkhlak->id_akhlak)
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

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<!-- Modal Edit -->
@foreach ($daftarDetailAkhlak as $item)
   <!-- Modal Edit -->
    <div class="modal fade" id="editModal{{$item->id_detail_akhlak}}" tabindex="-1" aria-labelledby="editModalLabel{{$item->id_detail_akhlak}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel{{$item->id_detail_akhlak}}">Edit Detail Akhlak</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/update-detail-akhlak/{{$item->id_detail_akhlak}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       
                        <!-- Fields for all users -->
                        <div class="mb-3">
                            <label for="deskripsi{{$item->id_detail_akhlak}}" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi{{$item->id_detail_akhlak}}" name="deskripsi">{{$item->deskripsi}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="periode{{$item->id_detail_akhlak}}" class="form-label">Periode</label>
                            <input type="date" class="form-control" id="periode{{$item->id_detail_akhlak}}" name="periode" value="{{$item->periode}}">
                        </div>
                        <div class="mb-3">
                            <label for="evidence{{$item->id_detail_akhlak}}" class="form-label">Evidence</label>
                            <input type="file" class="form-control" id="evidence{{$item->id_detail_akhlak}}" name="evidence">
                        </div>
              
                        <!-- Conditionally show penilaian field for HC role -->
                         @if ($user->role == 'HC')
                            <div class="mb-3">
                                <label for="penilaian{{$item->id_detail_akhlak}}" class="form-label">Penilaian</label>
                                <select class="form-select" id="penilaian{{$item->id_detail_akhlak}}" name="penilaian">
                                    <option value="--Pilih--" @if($item->penilaian == '--Pilih--') selected @endif>--Pilih--</option>
                                    <option value="sangat baik" @if($item->penilaian == 'sangat baik') selected @endif>Sangat Baik</option>
                                    <option value="baik" @if($item->penilaian == 'baik') selected @endif>Baik</option>
                                    <option value="cukup" @if($item->penilaian == 'cukup') selected @endif>Cukup</option>
                                    <option value="kurang" @if($item->penilaian == 'kurang') selected @endif>Kurang</option>
                                    <option value="sangat-kurang" @if($item->penilaian == 'sangat-kurang') selected @endif>Sangat Kurang</option>
                                </select>
                            </div>
                        @endif

                        <!-- Only show save button if the logged-in user is the owner -->
                       
                        <button type="submit" class="btn btn-primary">Simpan</button>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
 
@endforeach


@endsection
