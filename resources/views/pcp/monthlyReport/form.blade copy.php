@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Report</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form == 'Tambah') /tambah-monthly-report-pcp @elseif($form == 'Edit') /edit-monthly-report-pcp/{{$detail->id}} @endif" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
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
                        <div class="row">
                            @if ($form == 'Tambah')
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="id_proyek">Nama Proyek</label>
                                    <select name="id_proyek[]" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" @if($form == 'Detail' || $form == 'Edit') disabled @endif data-live-search="true" multiple required>
                                        <option value="" disabled>-- Pilih --</option>
                                        @foreach($daftarProyek as $item)
                                            <option value="{{$item->id_proyek}}" @if($form == 'Edit' && $detail->id_proyek == $item->id_proyek) selected @elseif($form == 'Detail' && $detail->id_proyek == $item->id_proyek) selected @endif>{{$item->nama_proyek}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_proyek')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="bulan_report">Bulan Report</label>
                                    <input type="MONTH" class="form-control @error('bulan_report') is-invalid @enderror" id="bulan_report" name="bulan_report" value="@if($form == 'Tambah'){{ old('bulan_report') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->bulan_report}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Bulan Report" required>
                                    @error('bulan_report')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <hr>
                                {{-- Evaluasi Hasil Usaha --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Evaluasi Hasil Usaha</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_evaluasi_hasil_usaha">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_evaluasi_hasil_usaha" id="due_date_evaluasi_hasil_usaha" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_evaluasi_hasil_usaha">PIC</label>
                                            <select name="pic_evaluasi_hasil_usaha[]" id="pic_evaluasi_hasil_usaha" class="selectpicker form-control @error('pic_evaluasi_hasil_usaha') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_evaluasi_hasil_usaha">Narasi</label>
                                            <textarea class="form-control" name="narasi_evaluasi_hasil_usaha" id="narasi_evaluasi_hasil_usaha" cols="15" rows="5" placeholder="Masukkan Narasi Evaluasi Hasil Usaha" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Laporan LC --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Laporan LC</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_laporan_lc">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_laporan_lc" id="due_date_laporan_lc" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_laporan_lc">PIC</label>
                                            <select name="pic_laporan_lc[]" id="pic_laporan_lc" class="selectpicker form-control @error('pic_laporan_lc') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_lc">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_lc" id="narasi_laporan_lc" cols="15" rows="5" placeholder="Masukkan Narasi Evaluasi Hasil Usaha" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Laporan Vendor Performance Index --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Laporan LC</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_laporan_vendor">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_laporan_vendor" id="due_date_laporan_vendor" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_laporan_vendor">PIC</label>
                                            <select name="pic_laporan_vendor[]" id="pic_laporan_vendor" class="selectpicker form-control @error('pic_laporan_vendor') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_vendor">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_vendor" id="narasi_laporan_vendor" cols="15" rows="5" placeholder="Masukkan Narasi Laporan LC" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Update Inventaris Extracomptable Proyek --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Update Inventaris Extracomptable Proyek</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_update_inventaris">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_update_inventaris" id="due_date_update_inventaris" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_update_inventaris">PIC</label>
                                            <select name="pic_update_inventaris[]" id="pic_update_inventaris" class="selectpicker form-control @error('pic_update_inventaris') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_update_inventaris">Narasi</label>
                                            <textarea class="form-control" name="narasi_update_inventaris" id="narasi_update_inventaris" cols="15" rows="5" placeholder="Masukkan Narasi Update Inventaris Extracomptable Proyek" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Prognosa Hasil Usaha --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Prognosa Hasil Usaha</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_prognosa_hasil_usaha">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_prognosa_hasil_usaha" id="due_date_prognosa_hasil_usaha" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_prognosa_hasil_usaha">PIC</label>
                                            <select name="pic_prognosa_hasil_usaha[]" id="pic_prognosa_hasil_usaha" class="selectpicker form-control @error('pic_prognosa_hasil_usaha') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_prognosa_hasil_usaha">Narasi</label>
                                            <textarea class="form-control" name="narasi_prognosa_hasil_usaha" id="narasi_prognosa_hasil_usaha" cols="15" rows="5" placeholder="Masukkan Narasi Prognosa Hasil Usaha" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <hr>
                                {{-- Laporan Bulanan IKN/PSN --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Laporan Bulanan IKN/PSN</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_laporan_bulanan_ikn">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_laporan_bulanan_ikn" id="due_date_laporan_bulanan_ikn" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_laporan_bulanan_ikn">PIC</label>
                                            <select name="pic_laporan_bulanan_ikn[]" id="pic_laporan_bulanan_ikn" class="selectpicker form-control @error('pic_laporan_bulanan_ikn') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_bulanan_ikn">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_bulanan_ikn" id="narasi_laporan_bulanan_ikn" cols="15" rows="5" placeholder="Masukkan Narasi Laporan Bulanan IKN/PSN" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Laporan Pengupayaan Klaim/Eskalasi --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Laporan Pengupayaan Klaim/Eskalasi</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_laporan_upaya_klaim">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_laporan_upaya_klaim" id="due_date_laporan_upaya_klaim" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_laporan_upaya_klaim">PIC</label>
                                            <select name="pic_laporan_upaya_klaim[]" id="pic_laporan_upaya_klaim" class="selectpicker form-control @error('pic_laporan_upaya_klaim') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_upaya_klaim">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_upaya_klaim" id="narasi_laporan_upaya_klaim" cols="15" rows="5" placeholder="Masukkan Narasi Laporan Pengupayaan Klaim/Eskalasi" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Laporan POTOB & SPI --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label text-dark">Laporan POTOB & SPI</label>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="due_date_laporan_potob">Due Date</label>
                                            <input type="date" class="form-control" name="due_date_laporan_potob" id="due_date_laporan_potob" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="pic_laporan_potob">PIC</label>
                                            <select name="pic_laporan_potob[]" id="pic_laporan_potob" class="selectpicker form-control @error('pic_laporan_potob') is-invalid @enderror" data-live-search="true" multiple required>
                                                <option value="" disabled>-- Pilih --</option>
                                                @foreach($daftarPic as $item)
                                                    <option value="{{$item->id_user}}">{{$item->nama_user}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_potob">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_potob" id="narasi_laporan_potob" cols="15" rows="5" placeholder="Masukkan Narasi Laporan POTOB & SPI" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($form == 'Edit')
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="id_proyek">Nama Proyek</label>
                                    <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" @if($form == 'Detail' || $form == 'Edit') disabled @endif data-live-search="true" required>\
                                        <option value="" selected disabled>-- Pilih --</option>
                                        @foreach($daftarProyek as $item)
                                            <option value="{{$item->id_proyek}}" @if($form == 'Edit' && $detail->id_proyek == $item->id_proyek) selected @elseif($form == 'Detail' && $detail->id_proyek == $item->id_proyek) selected @endif>{{$item->nama_proyek}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_proyek')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="bulan_report">Bulan Report</label>
                                    <input type="MONTH" class="form-control @error('bulan_report') is-invalid @enderror" id="bulan_report" name="bulan_report" value="@if($form == 'Tambah'){{ old('bulan_report') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->bulan_report}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Bulan Report" readonly required>
                                </div>
                                @if ($detail->id_monthly_report == null && $user->role == 'Tim Proyek')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="tanggal_report">Tanggal Input</label>
                                        <input type="date" class="form-control @error('tanggal_report') is-invalid @enderror" id="tanggal_report" name="tanggal_report" value="@if($form == 'Tambah'){{ old('tanggal_report') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->tanggal_report}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Tanggal Input" required>
                                        @error('tanggal_report')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="realisasi_proyek">Realisasi Proyek (%)</label>
                                        <input type="text" class="form-control @error('realisasi_proyek') is-invalid @enderror" id="realisasi_proyek" name="realisasi_proyek" value="@if($form == 'Tambah'){{ old('realisasi_proyek') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->realisasi_proyek}}@endif" @if($form == 'Detail') disabled @endif autofocus placeholder="Masukkan Realisasi Proyek" required>
                                        @error('realisasi_proyek')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <script>
                                        // Fungsi untuk mengganti koma menjadi titik
                                        function replaceComma() {
                                            var inputField = document.getElementById('realisasi_proyek');
                                            inputField.value = inputField.value.replace(/,/g, '.');
                                        }
                                    
                                        // Panggil fungsi replaceComma saat input berubah
                                        document.getElementById('realisasi_proyek').addEventListener('input', replaceComma);
                                    </script>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="kendala_implementasi_bim">Kendala Implementasi Bim</label>
                                        <input type="text" class="form-control @error('kendala_implementasi_bim') is-invalid @enderror" id="kendala_implementasi_bim" name="kendala_implementasi_bim" value="@if($form == 'Tambah'){{ old('kendala_implementasi_bim') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->kendala_implementasi_bim}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Kendala Implementasi Bim" required>
                                        @error('kendala_implementasi_bim')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="engineering_issue_berjalan">Engineering Issue Berjalan</label>
                                        <input type="text" class="form-control @error('engineering_issue_berjalan') is-invalid @enderror" id="engineering_issue_berjalan" name="engineering_issue_berjalan" value="@if($form == 'Tambah'){{ old('engineering_issue_berjalan') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->engineering_issue_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Engineering Issue Berjalan" required>
                                        @error('engineering_issue_berjalan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="masalah_produksi_berjalan">Masalah Produksi Berjalan</label>
                                        <input type="text" class="form-control @error('masalah_produksi_berjalan') is-invalid @enderror" id="masalah_produksi_berjalan" name="masalah_produksi_berjalan" value="@if($form == 'Tambah'){{ old('masalah_produksi_berjalan') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->masalah_produksi_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Masalah Produksi Berjalan" required>
                                        @error('masalah_produksi_berjalan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="konsep_lean_construction_berjalan">Konsep Lean Construction Berjalan</label>
                                        <input type="text" class="form-control @error('konsep_lean_construction_berjalan') is-invalid @enderror" id="konsep_lean_construction_berjalan" name="konsep_lean_construction_berjalan" value="@if($form == 'Tambah'){{ old('konsep_lean_construction_berjalan') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->konsep_lean_construction_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Konsep Lean Construction Berjalan" required>
                                        @error('konsep_lean_construction_berjalan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="feedback_untuk_perusahaan">Feedback Untuk Perusahaan</label>
                                        <input type="text" class="form-control @error('feedback_untuk_perusahaan') is-invalid @enderror" id="feedback_untuk_perusahaan" name="feedback_untuk_perusahaan" value="@if($form == 'Tambah'){{ old('feedback_untuk_perusahaan') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->feedback_untuk_perusahaan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Feedback Untuk Perusahaan" required>
                                        @error('feedback_untuk_perusahaan')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="evidence_link">Evidence Link</label>
                                        <input type="text" class="form-control @error('evidence_link') is-invalid @enderror" id="evidence_link" name="evidence_link" value="@if($form == 'Tambah'){{ old('evidence_link') }}@elseif($form == 'Edit'){{$detail->monthlyReportEng?->evidence_link}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Evidence Link" required>
                                        @error('evidence_link')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @endif

                                <hr>
                                {{-- Evaluasi Hasil Usaha --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label"><strong>Evaluasi Hasil Usaha</strong></label>
                                        </div>
                                        @if ($user->role == 'Tim Proyek')
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="evaluasi_hasil_usaha">Upload File</label>
                                                <input type="file" class="form-control @error('evaluasi_hasil_usaha') is-invalid @enderror" id="evaluasi_hasil_usaha" name="evaluasi_hasil_usaha" required>
                                            </div>
                                        @endif
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="status_evaluasi_hasil_usaha">Status</label>
                                            <select name="status_evaluasi_hasil_usaha" id="status_evaluasi_hasil_usaha" class="selectpicker form-control @error('status_evaluasi_hasil_usaha') is-invalid @enderror"  @if($user->role == 'Tim Proyek') disabled @endif data-live-search="true" required>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="Open" @if($form == 'Edit' && $detail->status_evaluasi_hasil_usaha == 'Open') selected @elseif($form == 'Detail' && $detail->status_evaluasi_hasil_usaha == 'Open') selected @endif>Open</option>
                                                <option value="Revisi" @if($form == 'Edit' && $detail->status_evaluasi_hasil_usaha == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_evaluasi_hasil_usaha == 'Revisi') selected @endif>Revisi</option>
                                                <option value="Close" @if($form == 'Edit' && $detail->status_evaluasi_hasil_usaha == 'Close') selected @elseif($form == 'Detail' && $detail->status_evaluasi_hasil_usaha == 'Close') selected @endif>Close</option>
                                            </select>
                                        </div>
                                        @if ($user->role == 'Head Office')
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="evaluasi_hasil_usaha">File</label><br>
                                                @if ($detail->evaluasi_hasil_usaha)
                                                    <a href="/download-monthly-report-pcp/{{$detail->id}}/evaluasi_hasil_usaha" class="btn btn-sm btn-primary">
                                                        <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                        File
                                                    </a>
                                                @else
                                                    Belum Ada File
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-label" for="persentase_evaluasi_hasil_usaha">Persentase</label>
                                                <select name="persentase_evaluasi_hasil_usaha" id="persentase_evaluasi_hasil_usaha" class="selectpicker form-control @error('persentase_evaluasi_hasil_usaha') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                                    <option value="" selected disabled>-- Pilih --</option>
                                                    <option value="0" @if($form == 'Edit' && $detail->persentase_evaluasi_hasil_usaha == '0') selected @elseif($form == 'Detail' && $detail->persentase_evaluasi_hasil_usaha == '0') selected @endif>0%</option>
                                                    <option value="50" @if($form == 'Edit' && $detail->persentase_evaluasi_hasil_usaha == '50') selected @elseif($form == 'Detail' && $detail->persentase_evaluasi_hasil_usaha == '50') selected @endif>50%</option>
                                                    <option value="100" @if($form == 'Edit' && $detail->persentase_evaluasi_hasil_usaha == '100') selected @elseif($form == 'Detail' && $detail->persentase_evaluasi_hasil_usaha == '100') selected @endif>100%</option>
                                                </select>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <hr>
                                {{-- Laporan LC --}}
                                @if ($user->role == 'Tim Proyek')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="laporan_lc">Laporan LC</label>
                                        <input type="file" class="form-control @error('laporan_lc') is-invalid @enderror" id="laporan_lc" name="laporan_lc" @if($form == 'Detail') disabled @endif>
                                        @error('laporan_lc')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="laporan_lc">Laporan LC</label><br>
                                        @if ($detail->laporan_lc)
                                            <a href="/download-monthly-report-pcp/{{$detail->id}}/laporan_lc" class="btn btn-sm btn-primary">
                                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                File
                                            </a>
                                        @else
                                            Belum Ada File
                                        @endif
                                    </div>
                                @endif
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="status_laporan_lc">Status Laporan LC</label>
                                    <select name="status_laporan_lc" id="status_laporan_lc" class="selectpicker form-control @error('status_laporan_lc') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="Open" @if($form == 'Edit' && $detail->status_laporan_lc == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_lc == 'Open') selected @endif>Open</option>
                                        <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_lc == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_lc == 'Revisi') selected @endif>Revisi</option>
                                        <option value="Close" @if($form == 'Edit' && $detail->status_laporan_lc == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_lc == 'Close') selected @endif>Close</option>
                                    </select>
                                </div>
                                @if ($user->role == 'Head Office')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_laporan_lc">Persentase Laporan LC</label>
                                        <select name="persentase_laporan_lc" id="persentase_laporan_lc" class="selectpicker form-control @error('persentase_laporan_lc') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_lc == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_lc == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_lc == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_lc == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_lc == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_lc == '100') selected @endif>100%</option>
                                        </select>
                                    </div>
                                @endif
                                @if ($user->role == 'Tim Proyek')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="laporan_vendor">Laporan Vendor Performance Index</label>
                                        <input type="file" class="form-control @error('laporan_vendor') is-invalid @enderror" id="laporan_vendor" name="laporan_vendor" @if($form == 'Detail') disabled @endif>
                                        @error('laporan_vendor')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="laporan_vendor">Laporan Vendor Performance Index</label><br>
                                        @if ($detail->laporan_vendor)
                                            <a href="/download-monthly-report-pcp/{{$detail->id}}/laporan_vendor" class="btn btn-sm btn-primary">
                                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                File
                                            </a>
                                        @else
                                            Belum Ada File
                                        @endif
                                    </div>
                                @endif
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="status_laporan_vendor">Status Laporan Vendor Performance Index</label>
                                    <select name="status_laporan_vendor" id="status_laporan_vendor" class="selectpicker form-control @error('status_laporan_vendor') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="Open" @if($form == 'Edit' && $detail->status_laporan_vendor == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_vendor == 'Open') selected @endif>Open</option>
                                        <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_vendor == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_vendor == 'Revisi') selected @endif>Revisi</option>
                                        <option value="Close" @if($form == 'Edit' && $detail->status_laporan_vendor == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_vendor == 'Close') selected @endif>Close</option>
                                    </select>
                                </div>
                                @if ($user->role == 'Head Office')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_laporan_vendor">Persentase Laporan Vendor</label>
                                        <select name="persentase_laporan_vendor" id="persentase_laporan_vendor" class="selectpicker form-control @error('persentase_laporan_vendor') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_vendor == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_vendor == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_vendor == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_vendor == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_vendor == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_vendor == '100') selected @endif>100%</option>
                                        </select>
                                    </div>
                                @endif
                                @if ($user->role == 'Tim Proyek')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="update_inventaris">Update Inventaris Extracomptable Proyek</label>
                                        <input type="file" class="form-control @error('update_inventaris') is-invalid @enderror" id="update_inventaris" name="update_inventaris" @if($form == 'Detail') disabled @endif>
                                        @error('update_inventaris')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="update_inventaris">Update Inventaris Extracomptable Proyek</label><br>
                                        @if ($detail->update_inventaris)
                                            <a href="/download-monthly-report-pcp/{{$detail->id}}/update_inventaris" class="btn btn-sm btn-primary">
                                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                File
                                            </a>
                                        @else
                                            Belum Ada File
                                        @endif
                                    </div>
                                @endif
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="status_update_inventaris">Status Update Inventaris Extracomptable Proyek</label>
                                    <select name="status_update_inventaris" id="status_update_inventaris" class="selectpicker form-control @error('status_update_inventaris') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="Open" @if($form == 'Edit' && $detail->status_update_inventaris == 'Open') selected @elseif($form == 'Detail' && $detail->status_update_inventaris == 'Open') selected @endif>Open</option>
                                        <option value="Revisi" @if($form == 'Edit' && $detail->status_update_inventaris == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_update_inventaris == 'Revisi') selected @endif>Revisi</option>
                                        <option value="Close" @if($form == 'Edit' && $detail->status_update_inventaris == 'Close') selected @elseif($form == 'Detail' && $detail->status_update_inventaris == 'Close') selected @endif>Close</option>
                                    </select>
                                </div>
                                @if ($user->role == 'Head Office')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_update_inventaris">Persentase Update Inventaris</label>
                                        <select name="persentase_update_inventaris" id="persentase_update_inventaris" class="selectpicker form-control @error('persentase_update_inventaris') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_update_inventaris == '0') selected @elseif($form == 'Detail' && $detail->persentase_update_inventaris == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_update_inventaris == '50') selected @elseif($form == 'Detail' && $detail->persentase_update_inventaris == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_update_inventaris == '100') selected @elseif($form == 'Detail' && $detail->persentase_update_inventaris == '100') selected @endif>100%</option>
                                        </select>
                                    </div>
                                @endif
                                @if ($user->role == 'Tim Proyek')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="prognosa_hasil_usaha">Prognosa Hasil Usaha</label>
                                        <input type="file" class="form-control @error('prognosa_hasil_usaha') is-invalid @enderror" id="prognosa_hasil_usaha" name="prognosa_hasil_usaha" @if($form == 'Detail') disabled @endif>
                                        @error('prognosa_hasil_usaha')
                                            <div class="invalid-feedback">
                                            {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                @else
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="prognosa_hasil_usaha">Prognosa Hasil Usaha</label><br>
                                        @if ($detail->prognosa_hasil_usaha)
                                            <a href="/download-monthly-report-pcp/{{$detail->id}}/prognosa_hasil_usaha" class="btn btn-sm btn-primary">
                                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                File
                                            </a>
                                        @else
                                            Belum Ada File
                                        @endif
                                    </div>
                                @endif
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="status_prognosa_hasil_usaha">Status Prognosa Hasil Usaha</label>
                                    <select name="status_prognosa_hasil_usaha" id="status_prognosa_hasil_usaha" class="selectpicker form-control @error('status_prognosa_hasil_usaha') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                        <option value="" selected disabled>-- Pilih --</option>
                                        <option value="Open" @if($form == 'Edit' && $detail->status_prognosa_hasil_usaha == 'Open') selected @elseif($form == 'Detail' && $detail->status_prognosa_hasil_usaha == 'Open') selected @endif>Open</option>
                                        <option value="Revisi" @if($form == 'Edit' && $detail->status_prognosa_hasil_usaha == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_prognosa_hasil_usaha == 'Revisi') selected @endif>Revisi</option>
                                        <option value="Close" @if($form == 'Edit' && $detail->status_prognosa_hasil_usaha == 'Close') selected @elseif($form == 'Detail' && $detail->status_prognosa_hasil_usaha == 'Close') selected @endif>Close</option>
                                    </select>
                                </div>
                                @if ($user->role == 'Head Office')
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_prognosa_hasil_usaha">Persentase Prognosa Hasil Usaha</label>
                                        <select name="persentase_prognosa_hasil_usaha" id="persentase_prognosa_hasil_usaha" class="selectpicker form-control @error('persentase_prognosa_hasil_usaha') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_prognosa_hasil_usaha == '0') selected @elseif($form == 'Detail' && $detail->persentase_prognosa_hasil_usaha == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_prognosa_hasil_usaha == '50') selected @elseif($form == 'Detail' && $detail->persentase_prognosa_hasil_usaha == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_prognosa_hasil_usaha == '100') selected @elseif($form == 'Detail' && $detail->persentase_prognosa_hasil_usaha == '100') selected @endif>100%</option>
                                        </select>
                                    </div>
                                @endif
                                
                                @if ($detail->proyek?->prioritas == 'Prioritas 1')
                                    @if ($user->role == 'Tim Proyek')
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_bulanan_ikn">Laporan Bulanan IKN/PSN</label>
                                            <input type="file" class="form-control @error('laporan_bulanan_ikn') is-invalid @enderror" id="laporan_bulanan_ikn" name="laporan_bulanan_ikn" @if($form == 'Detail') disabled @endif>
                                            @error('laporan_bulanan_ikn')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_bulanan_ikn">Laporan Bulanan IKN/PSN</label><br>
                                            @if ($detail->laporan_bulanan_ikn)
                                                <a href="/download-monthly-report-pcp/{{$detail->id}}/laporan_bulanan_ikn" class="btn btn-sm btn-primary">
                                                    <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                    File
                                                </a>
                                            @else
                                                Belum Ada File
                                            @endif
                                        </div>
                                    @endif
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_laporan_bulanan_ikn">Status Laporan Bulanan IKN/PSN</label>
                                        <select name="status_laporan_bulanan_ikn" id="status_laporan_bulanan_ikn" class="selectpicker form-control @error('status_laporan_bulanan_ikn') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_laporan_bulanan_ikn == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_bulanan_ikn == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_bulanan_ikn == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_bulanan_ikn == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_laporan_bulanan_ikn == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_bulanan_ikn == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
                                    @if ($user->role == 'Head Office')
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="persentase_laporan_bulanan_ikn">Persentase Laporan Bulanan IKN/PSN</label>
                                            <select name="persentase_laporan_bulanan_ikn" id="persentase_laporan_bulanan_ikn" class="selectpicker form-control @error('persentase_laporan_bulanan_ikn') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_bulanan_ikn == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_bulanan_ikn == '0') selected @endif>0%</option>
                                                <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_bulanan_ikn == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_bulanan_ikn == '50') selected @endif>50%</option>
                                                <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_bulanan_ikn == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_bulanan_ikn == '100') selected @endif>100%</option>
                                            </select>
                                        </div>
                                    @endif
                                    @if ($user->role == 'Tim Proyek')
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_upaya_klaim">Laporan Pengupayaan Klaim/Eskalasi</label>
                                            <input type="file" class="form-control @error('laporan_upaya_klaim') is-invalid @enderror" id="laporan_upaya_klaim" name="laporan_upaya_klaim" @if($form == 'Detail') disabled @endif>
                                            @error('laporan_upaya_klaim')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_upaya_klaim">Laporan Pengupayaan Klaim/Eskalasi</label><br>
                                            @if ($detail->laporan_upaya_klaim)
                                                <a href="/download-monthly-report-pcp/{{$detail->id}}/laporan_upaya_klaim" class="btn btn-sm btn-primary">
                                                    <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                    File
                                                </a>
                                            @else
                                                Belum Ada File
                                            @endif
                                        </div>
                                    @endif
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_laporan_upaya_klaim">Status Pengupayaan Klaim/Eskalasi</label>
                                        <select name="status_laporan_upaya_klaim" id="status_laporan_upaya_klaim" class="selectpicker form-control @error('status_laporan_upaya_klaim') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_laporan_upaya_klaim == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_upaya_klaim == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_upaya_klaim == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_upaya_klaim == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_laporan_upaya_klaim == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_upaya_klaim == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
                                    @if ($user->role == 'Head Office')
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="persentase_laporan_upaya_klaim">Persentase Pengupayaan Klaim/Eskalasi</label>
                                            <select name="persentase_laporan_upaya_klaim" id="persentase_laporan_upaya_klaim" class="selectpicker form-control @error('persentase_laporan_upaya_klaim') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_upaya_klaim == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_upaya_klaim == '0') selected @endif>0%</option>
                                                <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_upaya_klaim == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_upaya_klaim == '50') selected @endif>50%</option>
                                                <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_upaya_klaim == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_upaya_klaim == '100') selected @endif>100%</option>
                                            </select>
                                        </div>
                                    @endif
                                    @if ($user->role == 'Tim Proyek')
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_potob">Laporan POTOB & SPI</label>
                                            <input type="file" class="form-control @error('laporan_potob') is-invalid @enderror" id="laporan_potob" name="laporan_potob" @if($form == 'Detail') disabled @endif>
                                            @error('laporan_potob')
                                                <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    @else
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_potob">Laporan POTOB & SPI</label><br>
                                            @if ($detail->laporan_potob)
                                                <a href="/download-monthly-report-pcp/{{$detail->id}}/laporan_potob" class="btn btn-sm btn-primary">
                                                    <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                    File
                                                </a>
                                            @else
                                                Belum Ada File
                                            @endif
                                        </div>
                                    @endif
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_laporan_potob">Status Laporan POTOB & SPI</label>
                                        <select name="status_laporan_potob" id="status_laporan_potob" class="selectpicker form-control @error('status_laporan_potob') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_laporan_potob == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_potob == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_potob == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_potob == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_laporan_potob == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_potob == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
                                    @if ($user->role == 'Head Office')
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="persentase_laporan_potob">Persentase Laporan POTOB & SPI</label>
                                            <select name="persentase_laporan_potob" id="persentase_laporan_potob" class="selectpicker form-control @error('persentase_laporan_potob') is-invalid @enderror"  @if($form == 'Detail') disabled @endif data-live-search="true" required>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_potob == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_potob == '0') selected @endif>0%</option>
                                                <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_potob == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_potob == '50') selected @endif>50%</option>
                                                <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_potob == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_potob == '100') selected @endif>100%</option>
                                            </select>
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-monthly-report-pcp'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection