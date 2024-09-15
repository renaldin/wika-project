@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Proyek</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama Proyek</label>
                            <input type="text" class="form-control" value="{{$detailCsi->nama_proyek}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Periode</label>
                            <input type="text" class="form-control" value="{{date('F Y', strtotime($detailCsi->periode))}}" readonly>
                        </div>
                        @if ($user->role !== 'Tim Proyek')
                            <div class="form-group col-md-6">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="{{$detailCsi->nama_user}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Jabatan</label>
                                <input type="text" class="form-control" value="{{$detailCsi->jabatan}}" readonly>
                            </div>
                        @endif
                        @if ($user->role == 'Tim Proyek')
                            <form action="/pendapat-csi/{{$detailCsi->id_csi}}" method="POST">
                                @csrf
                                <div class="form-group col-md-6">
                                    <label class="form-label">Masukkan / Pendapat</label>
                                    <textarea class="form-control" name="pendapat" id="pendapat" cols="10" rows="5" placeholder="Masukkan Pendapat Anda" required>{{$detailCsi->pendapat}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-primary mt-3">Masukkan</button>
                                </div>
                            </form>
                            {{-- <div class="form-group col-md-6">
                            </div> --}}
                        @endif
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            @if ($user->role == 'Manajemen')
                                <a href="/download-monitoring-csi/{{$detailCsi->id_csi}}" target="_blank" class="btn btn-primary mb-4">Download PDF</a>      
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
                <h4 class="card-title">Daftar Csi</h4>
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
                            <table class="table table-bordered" id="csiTable">
                                <thead>
                                    <tr class="ligth text-center">
                                        <td rowspan="2" class="text-wrap">No</td>
                                        <td rowspan="2" class="text-wrap">Parameter</td>
                                        <td rowspan="2" class="text-wrap">Aspek Yang Dinilai</td>
                                        <td rowspan="2" class="text-wrap">Bobot (%)</td>
                                        <td colspan="5">Penilaian</td>
                                        @if ($user->role !== 'Tim Proyek')
                                            <td rowspan="2">Nilai</td>
                                            <td rowspan="2">Total</td>
                                        @endif
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
                                    @foreach ($daftarDetailCsi as $item)
                                        @if ($item->id_csi == $detailCsi->id_csi)
                                        @php
                                            $nilai = $item->nilai != 0 ? round($item->nilai * $item->bobot / 100, 2) : 0;
                                        @endphp
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->parameter}}</td>
                                                <td class="text-wrap">{{$item->aspek}}</td>
                                                <td class="text-center">{{$item->bobot}}</td>
                                                <td class="text-center">
                                                    <form action="/edit-detail-csi/{{$item->id_detail_csi}}/sangat-kurang" id="sangatKurangForm{{$item->id_detail_csi}}" method="POST">
                                                        @csrf
                                                        <div class="form-check d-block">
                                                            <input class="form-check-input" type="checkbox" name="penilaian" id="penilaian{{$item->id_detail_csi}}" @if($item->penilaian == 'Sangat Kurang') checked @endif onclick="submitForm('sangatKurangForm{{$item->id_detail_csi}}')">
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <form action="/edit-detail-csi/{{$item->id_detail_csi}}/kurang" id="kurangForm{{$item->id_detail_csi}}" method="POST">
                                                        @csrf
                                                        <div class="form-check d-block">
                                                            <input class="form-check-input" type="checkbox" name="penilaian" id="penilaian{{$item->id_detail_csi}}" @if($item->penilaian == 'Kurang') checked @endif onclick="submitForm('kurangForm{{$item->id_detail_csi}}')">
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <form action="/edit-detail-csi/{{$item->id_detail_csi}}/cukup" id="cukupForm{{$item->id_detail_csi}}" method="POST">
                                                        @csrf
                                                        <div class="form-check d-block">
                                                            <input class="form-check-input" type="checkbox" name="penilaian" id="penilaian{{$item->id_detail_csi}}" @if($item->penilaian == 'Cukup') checked @endif onclick="submitForm('cukupForm{{$item->id_detail_csi}}')">
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <form action="/edit-detail-csi/{{$item->id_detail_csi}}/baik" id="baikForm{{$item->id_detail_csi}}" method="POST">
                                                        @csrf
                                                        <div class="form-check d-block">
                                                            <input class="form-check-input" type="checkbox" name="penilaian" id="penilaian{{$item->id_detail_csi}}" @if($item->penilaian == 'Baik') checked @endif onclick="submitForm('baikForm{{$item->id_detail_csi}}')">
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-center">
                                                    <form action="/edit-detail-csi/{{$item->id_detail_csi}}/sangat-baik" id="sangatBaikForm{{$item->id_detail_csi}}" method="POST">
                                                        @csrf
                                                        <div class="form-check d-block">
                                                            <input class="form-check-input" type="checkbox" name="penilaian" id="penilaian{{$item->id_detail_csi}}" @if($item->penilaian == 'Sangat Baik') checked @endif onclick="submitForm('sangatBaikForm{{$item->id_detail_csi}}')">
                                                        </div>
                                                    </form>
                                                </td>
                                                @if ($user->role !== 'Tim Proyek')
                                                    <td>{{$item->nilai}}</td>
                                                    <td>{{$nilai}}</td>
                                                @endif
                                            </tr>
                                            @php
                                                $totalBobot = $totalBobot + $item->bobot;
                                                $totalNilai = $totalNilai + $nilai;
                                            @endphp
                                        @endif
                                    @endforeach
                                    @if ($user->role !== 'Tim Proyek')
                                        <tr class="text-center">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><strong>{{$totalBobot}}</strong></td>
                                            <td colspan="6"><strong>NILAI RATA-RATA</strong></td>
                                            <td>{{number_format($totalNilai, 2)}}</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="6"><strong>KONVERSI SKALA MAX. 5</strong></td>
                                            <td>{{number_format($totalNilai != 0 ? $totalNilai * 5 / 5 : 0, 2)}}</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($daftarDetailCsi as $item)
<div class="modal fade" id="edit{{$item->id_detail_csi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/edit-detail-csi/{{$item->id_detail_csi}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Penilaian</label>
                            <select name="penilaian" id="penilaian" class="selectpicker form-control @error('penilaian') is-invalid @enderror" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                <option value="Sangat Baik" @if($item->penilaian == 'Sangat Baik') selected @endif>Sangat Baik</option>
                                <option value="Baik" @if($item->penilaian == 'Baik') selected @endif>Baik</option>
                                <option value="Cukup" @if($item->penilaian == 'Cukup') selected @endif>Cukup</option>
                                <option value="Kurang" @if($item->penilaian == 'Kurang') selected @endif>Kurang</option>
                                <option value="Sangat Kurang" @if($item->penilaian == 'Sangat Kurang') selected @endif>Sangat Kurang</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="pendapat{{$detailCsi->id_csi}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan / Pendapat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/pendapat-csi/{{$detailCsi->id_csi}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Masukkan / Pendapat</label>
                            <textarea class="form-control" name="pendapat" id="pendapat" cols="30" rows="10" placeholder="Masukkan Pendapat Anda" required>{{$item->pendapat}}</textarea>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection