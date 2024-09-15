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
                    <form action="@if($form == 'Tambah') /tambah-monthly-report-pcp @elseif($form == 'Edit') /edit-monthly-report-pcp/{{$detail->id}} @endif" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label" for="id_proyek">Nama Proyek</label>
                                <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" @if($form == 'Detail' || $form == 'Edit') disabled @endif required>\
                                    <option value="" selected disabled>-- Pilih --</option>
                                    @foreach($daftarProyek as $item)
                                        <option value="{{$item->id_proyek}}" @if($form == 'Edit' && $detail->id_proyek == $item->id_proyek) selected @elseif($form == 'Detail' && $detail->id_proyek == $item->id_proyek) selected @endif>{{$item->nama_proyek}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="bulan_report">Bulan Report</label>
                                <input type="MONTH" class="form-control @error('bulan_report') is-invalid @enderror" id="bulan_report" name="bulan_report" value="@if($form == 'Tambah'){{ old('bulan_report') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->bulan_report}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Bulan Report" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="status_report_pcp">Status</label>
                                <input type="text" class="form-control @error('status_report_pcp') is-invalid @enderror" id="status_report_pcp" name="status_report_pcp" value="@if($form == 'Tambah'){{ old('status_report_pcp') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->status_report_pcp}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Tanggal Input" required>
                            </div>
                            @if ($detail->id_monthly_report != null)
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="tanggal_report">Tanggal Input</label>
                                    <input type="date" class="form-control @error('tanggal_report') is-invalid @enderror" id="tanggal_report" name="tanggal_report" value="@if($form == 'Tambah'){{ old('tanggal_report') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->tanggal_report}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Tanggal Input" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="realisasi_proyek">Realisasi Proyek (%)</label>
                                    <input type="text" class="form-control @error('realisasi_proyek') is-invalid @enderror" id="realisasi_proyek" name="realisasi_proyek" value="@if($form == 'Tambah'){{ old('realisasi_proyek') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->realisasi_proyek}}@endif" @if($form == 'Detail') disabled @endif autofocus placeholder="Masukkan Realisasi Proyek" required>
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
                                    <input type="text" class="form-control @error('kendala_implementasi_bim') is-invalid @enderror" id="kendala_implementasi_bim" name="kendala_implementasi_bim" value="@if($form == 'Tambah'){{ old('kendala_implementasi_bim') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->kendala_implementasi_bim}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Kendala Implementasi Bim" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="engineering_issue_berjalan">Engineering Issue Berjalan</label>
                                    <input type="text" class="form-control @error('engineering_issue_berjalan') is-invalid @enderror" id="engineering_issue_berjalan" name="engineering_issue_berjalan" value="@if($form == 'Tambah'){{ old('engineering_issue_berjalan') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->engineering_issue_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Engineering Issue Berjalan" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="masalah_produksi_berjalan">Masalah Produksi Berjalan</label>
                                    <input type="text" class="form-control @error('masalah_produksi_berjalan') is-invalid @enderror" id="masalah_produksi_berjalan" name="masalah_produksi_berjalan" value="@if($form == 'Tambah'){{ old('masalah_produksi_berjalan') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->masalah_produksi_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Masalah Produksi Berjalan" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="konsep_lean_construction_berjalan">Konsep Lean Construction Berjalan</label>
                                    <input type="text" class="form-control @error('konsep_lean_construction_berjalan') is-invalid @enderror" id="konsep_lean_construction_berjalan" name="konsep_lean_construction_berjalan" value="@if($form == 'Tambah'){{ old('konsep_lean_construction_berjalan') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->konsep_lean_construction_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Konsep Lean Construction Berjalan" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="feedback_untuk_perusahaan">Feedback Untuk Perusahaan</label>
                                    <input type="text" class="form-control @error('feedback_untuk_perusahaan') is-invalid @enderror" id="feedback_untuk_perusahaan" name="feedback_untuk_perusahaan" value="@if($form == 'Tambah'){{ old('feedback_untuk_perusahaan') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->feedback_untuk_perusahaan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Feedback Untuk Perusahaan" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="evidence_link">Evidence Link</label>
                                    <input type="text" class="form-control @error('evidence_link') is-invalid @enderror" id="evidence_link" name="evidence_link" value="@if($form == 'Tambah'){{ old('evidence_link') }}@elseif($form == 'Edit' || $form == 'Detail'){{$detail->monthlyReportEng?->evidence_link}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Evidence Link" required>
                                </div>
                            @endif<hr>
                            
                            {{-- Evaluasi Hasil Usaha --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label"><strong>Evaluasi Hasil Usaha</strong></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="narasi_evaluasi_hasil_usaha">Narasi</label>
                                        <textarea class="form-control" name="narasi_evaluasi_hasil_usaha" id="narasi_evaluasi_hasil_usaha" cols="15" rows="5" readonly>{{$detail->narasi_evaluasi_hasil_usaha}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_evaluasi_hasil_usaha">Status</label>
                                        <select name="status_evaluasi_hasil_usaha" id="status_evaluasi_hasil_usaha" class="selectpicker form-control @error('status_evaluasi_hasil_usaha') is-invalid @enderror"  @if($user->role == 'Tim Proyek') disabled @endif data-live-search="true" @if($user->role == 'Head Office') required @endif disabled>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_evaluasi_hasil_usaha == 'Open') selected @elseif($form == 'Detail' && $detail->status_evaluasi_hasil_usaha == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_evaluasi_hasil_usaha == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_evaluasi_hasil_usaha == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_evaluasi_hasil_usaha == 'Close') selected @elseif($form == 'Detail' && $detail->status_evaluasi_hasil_usaha == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
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
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-evaluasi-hasil-usaha">
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                            PIC
                                        </button>
                                        {{-- <a href="{{$detail->link_evaluasi_hasil_usaha}}" target="_blank" class="btn btn-sm btn-primary">Link</a> --}}
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_evaluasi_hasil_usaha">Persentase</label>
                                        <select name="persentase_evaluasi_hasil_usaha" id="persentase_evaluasi_hasil_usaha" class="selectpicker form-control @error('persentase_evaluasi_hasil_usaha') is-invalid @enderror"  disabled data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_evaluasi_hasil_usaha == '0') selected @elseif($form == 'Detail' && $detail->persentase_evaluasi_hasil_usaha == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_evaluasi_hasil_usaha == '50') selected @elseif($form == 'Detail' && $detail->persentase_evaluasi_hasil_usaha == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_evaluasi_hasil_usaha == '100') selected @elseif($form == 'Detail' && $detail->persentase_evaluasi_hasil_usaha == '100') selected @endif>100%</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="komentar_evaluasi_hasil_usaha">Komentar</label>
                                        <textarea class="form-control" name="komentar_evaluasi_hasil_usaha" id="komentar_evaluasi_hasil_usaha" cols="15" rows="5" readonly>{{$detail->komentar_evaluasi_hasil_usaha}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <hr>
                            {{-- Laporan LC --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label"><strong>Laporan LC</strong></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="narasi_laporan_lc">Narasi</label>
                                        <textarea class="form-control" name="narasi_laporan_lc" id="narasi_laporan_lc" cols="15" rows="5" readonly>{{$detail->narasi_laporan_lc}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_laporan_lc">Status</label>
                                        <select name="status_laporan_lc" id="status_laporan_lc" class="selectpicker form-control @error('status_laporan_lc') is-invalid @enderror" disabled data-live-search="true" @if($user->role == 'Head Office') required @endif>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_laporan_lc == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_lc == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_lc == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_lc == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_laporan_lc == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_lc == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="laporan_lc">Checklist</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="laporan_lc" type="checkbox" id="laporan_lc" @if($detail->laporan_lc == 'Ya') checked @endif disabled>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-laporan-pic">
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                            PIC
                                        </button>
                                        <a href="{{$detail->link_laporan_lc}}" target="_blank" class="btn btn-sm btn-primary">Link</a>
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_laporan_lc">Persentase</label>
                                        <select name="persentase_laporan_lc" id="persentase_laporan_lc" class="selectpicker form-control @error('persentase_laporan_lc') is-invalid @enderror"  disabled data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_lc == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_lc == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_lc == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_lc == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_lc == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_lc == '100') selected @endif>100%</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="komentar_laporan_lc">Komentar</label>
                                        <textarea class="form-control" name="komentar_laporan_lc" id="komentar_laporan_lc" cols="15" rows="5" readonly>{{$detail->komentar_laporan_lc}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            {{-- Laporan Vendor Performance Index --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label"><strong>Laporan Vendor Performance Index</strong></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="narasi_laporan_vendor">Narasi</label>
                                        <textarea class="form-control" name="narasi_laporan_vendor" id="narasi_laporan_vendor" cols="15" rows="5" readonly>{{$detail->narasi_laporan_vendor}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_laporan_vendor">Status</label>
                                        <select name="status_laporan_vendor" id="status_laporan_vendor" class="selectpicker form-control @error('status_laporan_vendor') is-invalid @enderror" disabled data-live-search="true" @if($user->role == 'Head Office') required @endif>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_laporan_vendor == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_vendor == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_vendor == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_vendor == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_laporan_vendor == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_vendor == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="laporan_vendor">File</label><br>
                                        @if ($detail->laporan_vendor)
                                            <a href="/download-monthly-report-pcp/{{$detail->id}}/laporan_vendor" class="btn btn-sm btn-primary">
                                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                File
                                            </a>
                                        @else
                                            Belum Ada File
                                        @endif
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-laporan-vendor">
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                            PIC
                                        </button>
                                        {{-- <a href="{{$detail->link_laporan_vendor}}" target="_blank" class="btn btn-sm btn-primary">Link</a> --}}
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_laporan_vendor">Persentase</label>
                                        <select name="persentase_laporan_vendor" id="persentase_laporan_vendor" class="selectpicker form-control @error('persentase_laporan_vendor') is-invalid @enderror" disabled data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_vendor == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_vendor == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_vendor == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_vendor == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_vendor == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_vendor == '100') selected @endif>100%</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="komentar_laporan_vendor">Komentar</label>
                                        <textarea class="form-control" name="komentar_laporan_vendor" id="komentar_laporan_vendor" cols="15" rows="5" readonly>{{$detail->komentar_laporan_vendor}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            {{-- Update Inventaris Extracomptable Proyek --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label"><strong>Update Inventaris Extracomptable Proyek</strong></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="narasi_update_inventaris">Narasi</label>
                                        <textarea class="form-control" name="narasi_update_inventaris" id="narasi_update_inventaris" cols="15" rows="5" readonly>{{$detail->narasi_update_inventaris}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_update_inventaris">Status</label>
                                        <select name="status_update_inventaris" id="status_update_inventaris" class="selectpicker form-control @error('status_update_inventaris') is-invalid @enderror" disabled data-live-search="true" @if($user->role == 'Head Office') required @endif>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_update_inventaris == 'Open') selected @elseif($form == 'Detail' && $detail->status_update_inventaris == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_update_inventaris == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_update_inventaris == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_update_inventaris == 'Close') selected @elseif($form == 'Detail' && $detail->status_update_inventaris == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="update_inventaris">File</label><br>
                                        @if ($detail->update_inventaris)
                                            <a href="/download-monthly-report-pcp/{{$detail->id}}/update_inventaris" class="btn btn-sm btn-primary">
                                                <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                File
                                            </a>
                                        @else
                                            Belum Ada File
                                        @endif
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-update-inventaris">
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                            PIC
                                        </button>
                                        {{-- <a href="{{$detail->link_update_inventaris}}" target="_blank" class="btn btn-sm btn-primary">Link</a> --}}
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_update_inventaris">Persentase</label>
                                        <select name="persentase_update_inventaris" id="persentase_update_inventaris" class="selectpicker form-control @error('persentase_update_inventaris') is-invalid @enderror" disabled data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_update_inventaris == '0') selected @elseif($form == 'Detail' && $detail->persentase_update_inventaris == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_update_inventaris == '50') selected @elseif($form == 'Detail' && $detail->persentase_update_inventaris == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_update_inventaris == '100') selected @elseif($form == 'Detail' && $detail->persentase_update_inventaris == '100') selected @endif>100%</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="komentar_update_inventaris">Komentar</label>
                                        <textarea class="form-control" name="komentar_update_inventaris" id="komentar_update_inventaris" cols="15" rows="5" readonly>{{$detail->komentar_update_inventaris}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            {{-- Prognosa Hasil Usaha --}}
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-label"><strong>Prognosa Hasil Usaha</strong></label>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="narasi_prognosa_hasil_usaha">Narasi</label>
                                        <textarea class="form-control" name="narasi_prognosa_hasil_usaha" id="narasi_prognosa_hasil_usaha" cols="15" rows="5" readonly>{{$detail->narasi_prognosa_hasil_usaha}}</textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="status_prognosa_hasil_usaha">Status</label>
                                        <select name="status_prognosa_hasil_usaha" id="status_prognosa_hasil_usaha" class="selectpicker form-control @error('status_prognosa_hasil_usaha') is-invalid @enderror" disabled data-live-search="true" @if($user->role == 'Head Office') required @endif>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="Open" @if($form == 'Edit' && $detail->status_prognosa_hasil_usaha == 'Open') selected @elseif($form == 'Detail' && $detail->status_prognosa_hasil_usaha == 'Open') selected @endif>Open</option>
                                            <option value="Revisi" @if($form == 'Edit' && $detail->status_prognosa_hasil_usaha == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_prognosa_hasil_usaha == 'Revisi') selected @endif>Revisi</option>
                                            <option value="Close" @if($form == 'Edit' && $detail->status_prognosa_hasil_usaha == 'Close') selected @elseif($form == 'Detail' && $detail->status_prognosa_hasil_usaha == 'Close') selected @endif>Close</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="prognosa_hasil_usaha">Checklist</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" name="prognosa_hasil_usaha" type="checkbox" id="prognosa_hasil_usaha" @if($detail->prognosa_hasil_usaha == 'Ya') checked @endif disabled>
                                        </div>
                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-prognosa-hasil-usaha">
                                            <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                            PIC
                                        </button>
                                        <a href="{{$detail->link_prognosa_hasil_usaha}}" target="_blank" class="btn btn-sm btn-primary">Link</a>
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label class="form-label" for="persentase_prognosa_hasil_usaha">Persentase</label>
                                        <select name="persentase_prognosa_hasil_usaha" id="persentase_prognosa_hasil_usaha" class="selectpicker form-control @error('persentase_prognosa_hasil_usaha') is-invalid @enderror" disabled data-live-search="true" required>
                                            <option value="" selected disabled>-- Pilih --</option>
                                            <option value="0" @if($form == 'Edit' && $detail->persentase_prognosa_hasil_usaha == '0') selected @elseif($form == 'Detail' && $detail->persentase_prognosa_hasil_usaha == '0') selected @endif>0%</option>
                                            <option value="50" @if($form == 'Edit' && $detail->persentase_prognosa_hasil_usaha == '50') selected @elseif($form == 'Detail' && $detail->persentase_prognosa_hasil_usaha == '50') selected @endif>50%</option>
                                            <option value="100" @if($form == 'Edit' && $detail->persentase_prognosa_hasil_usaha == '100') selected @elseif($form == 'Detail' && $detail->persentase_prognosa_hasil_usaha == '100') selected @endif>100%</option>
                                        </select>
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="komentar_prognosa_hasil_usaha">Komentar</label>
                                        <textarea class="form-control" name="komentar_prognosa_hasil_usaha" id="komentar_prognosa_hasil_usaha" cols="15" rows="5" readonly>{{$detail->komentar_prognosa_hasil_usaha}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            @if ($detail->proyek?->prioritas == 'Prioritas 1')
                                <hr>
                                {{-- Laporan Bulanan IKN/PSN --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label"><strong>Laporan Bulanan IKN/PSN</strong></label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_bulanan_ikn">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_bulanan_ikn" id="narasi_laporan_bulanan_ikn" cols="15" rows="5" readonly>{{$detail->narasi_laporan_bulanan_ikn}}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="status_laporan_bulanan_ikn">Status</label>
                                            <select name="status_laporan_bulanan_ikn" id="status_laporan_bulanan_ikn" class="selectpicker form-control @error('status_laporan_bulanan_ikn') is-invalid @enderror" disabled data-live-search="true" @if($user->role == 'Head Office') required @endif>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="Open" @if($form == 'Edit' && $detail->status_laporan_bulanan_ikn == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_bulanan_ikn == 'Open') selected @endif>Open</option>
                                                <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_bulanan_ikn == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_bulanan_ikn == 'Revisi') selected @endif>Revisi</option>
                                                <option value="Close" @if($form == 'Edit' && $detail->status_laporan_bulanan_ikn == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_bulanan_ikn == 'Close') selected @endif>Close</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_bulanan_ikn">File</label><br>
                                            @if ($detail->laporan_bulanan_ikn)
                                                <a href="/download-monthly-report-pcp/{{$detail->id}}/laporan_bulanan_ikn" class="btn btn-sm btn-primary">
                                                    <svg class="icon-32" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M7.38948 8.98403H6.45648C4.42148 8.98403 2.77148 10.634 2.77148 12.669V17.544C2.77148 19.578 4.42148 21.228 6.45648 21.228H17.5865C19.6215 21.228 21.2715 19.578 21.2715 17.544V12.659C21.2715 10.63 19.6265 8.98403 17.5975 8.98403L16.6545 8.98403" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M12.0215 2.19044V14.2314" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.10645 5.1189L12.0214 2.1909L14.9374 5.1189" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                    File
                                                </a>
                                            @else
                                                Belum Ada File
                                            @endif
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-laporan-bulanan-ikn">
                                                <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                PIC
                                            </button>
                                            {{-- <a href="{{$detail->link_laporan_bulanan_ikn}}" target="_blank" class="btn btn-sm btn-primary">Link</a> --}}
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                            <label class="form-label" for="persentase_laporan_bulanan_ikn">Persentase</label>
                                            <select name="persentase_laporan_bulanan_ikn" id="persentase_laporan_bulanan_ikn" class="selectpicker form-control @error('persentase_laporan_bulanan_ikn') is-invalid @enderror" disabled data-live-search="true" required>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_bulanan_ikn == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_bulanan_ikn == '0') selected @endif>0%</option>
                                                <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_bulanan_ikn == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_bulanan_ikn == '50') selected @endif>50%</option>
                                                <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_bulanan_ikn == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_bulanan_ikn == '100') selected @endif>100%</option>
                                            </select>
                                        </div> --}}
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="komentar_laporan_bulanan_ikn">Komentar</label>
                                            <textarea class="form-control" name="komentar_laporan_bulanan_ikn" id="komentar_laporan_bulanan_ikn" cols="15" rows="5" readonly>{{$detail->komentar_laporan_bulanan_ikn}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Laporan Pengupayaan Klaim/Eskalasi --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label"><strong>Laporan Pengupayaan Klaim/Eskalasi</strong></label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_upaya_klaim">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_upaya_klaim" id="narasi_laporan_upaya_klaim" cols="15" rows="5" readonly>{{$detail->narasi_laporan_upaya_klaim}}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="status_laporan_upaya_klaim">Status Pengupayaan Klaim/Eskalasi</label>
                                            <select name="status_laporan_upaya_klaim" id="status_laporan_upaya_klaim" class="selectpicker form-control @error('status_laporan_upaya_klaim') is-invalid @enderror" disabled data-live-search="true" @if($user->role == 'Head Office') required @endif>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="Open" @if($form == 'Edit' && $detail->status_laporan_upaya_klaim == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_upaya_klaim == 'Open') selected @endif>Open</option>
                                                <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_upaya_klaim == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_upaya_klaim == 'Revisi') selected @endif>Revisi</option>
                                                <option value="Close" @if($form == 'Edit' && $detail->status_laporan_upaya_klaim == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_upaya_klaim == 'Close') selected @endif>Close</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_upaya_klaim">Checklist</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="laporan_upaya_klaim" type="checkbox" id="laporan_upaya_klaim" @if($detail->laporan_upaya_klaim == 'Ya') checked @endif disabled>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-laporan-upaya-klaim">
                                                <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                PIC
                                            </button>
                                            <a href="{{$detail->link_laporan_upaya_klaim}}" target="_blank" class="btn btn-sm btn-primary">Link</a>
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                            <label class="form-label" for="persentase_laporan_upaya_klaim">Persentase</label>
                                            <select name="persentase_laporan_upaya_klaim" id="persentase_laporan_upaya_klaim" class="selectpicker form-control @error('persentase_laporan_upaya_klaim') is-invalid @enderror" disabled data-live-search="true" required>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_upaya_klaim == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_upaya_klaim == '0') selected @endif>0%</option>
                                                <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_upaya_klaim == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_upaya_klaim == '50') selected @endif>50%</option>
                                                <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_upaya_klaim == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_upaya_klaim == '100') selected @endif>100%</option>
                                            </select>
                                        </div> --}}
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="komentar_laporan_upaya_klaim">Komentar</label>
                                            <textarea class="form-control" name="komentar_laporan_upaya_klaim" id="komentar_laporan_upaya_klaim" cols="15" rows="5" readonly>{{$detail->komentar_laporan_upaya_klaim}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Laporan POTOB & SPI --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label"><strong>Laporan POTOB & SPI</strong></label>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-label" for="narasi_laporan_potob">Narasi</label>
                                            <textarea class="form-control" name="narasi_laporan_potob" id="narasi_laporan_potob" cols="15" rows="5" readonly>{{$detail->narasi_laporan_potob}}</textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="status_laporan_potob">Status</label>
                                            <select name="status_laporan_potob" id="status_laporan_potob" class="selectpicker form-control @error('status_laporan_potob') is-invalid @enderror" disabled data-live-search="true" @if($user->role == 'Head Office') required @endif>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="Open" @if($form == 'Edit' && $detail->status_laporan_potob == 'Open') selected @elseif($form == 'Detail' && $detail->status_laporan_potob == 'Open') selected @endif>Open</option>
                                                <option value="Revisi" @if($form == 'Edit' && $detail->status_laporan_potob == 'Revisi') selected @elseif($form == 'Detail' && $detail->status_laporan_potob == 'Revisi') selected @endif>Revisi</option>
                                                <option value="Close" @if($form == 'Edit' && $detail->status_laporan_potob == 'Close') selected @elseif($form == 'Detail' && $detail->status_laporan_potob == 'Close') selected @endif>Close</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="laporan_potob">Checklist</label>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="laporan_potob" type="checkbox" id="laporan_potob" @if($detail->laporan_potob == 'Ya') checked @endif disabled>
                                            </div>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#pic-laporan-potob">
                                                <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                                                PIC
                                            </button>
                                            <a href="{{$detail->link_laporan_potob}}" target="_blank" class="btn btn-sm btn-primary">Link</a>
                                        </div>
                                        {{-- <div class="form-group col-md-6">
                                            <label class="form-label" for="persentase_laporan_potob">Persentase</label>
                                            <select name="persentase_laporan_potob" id="persentase_laporan_potob" class="selectpicker form-control @error('persentase_laporan_potob') is-invalid @enderror" disabled data-live-search="true" required>
                                                <option value="" selected disabled>-- Pilih --</option>
                                                <option value="0" @if($form == 'Edit' && $detail->persentase_laporan_potob == '0') selected @elseif($form == 'Detail' && $detail->persentase_laporan_potob == '0') selected @endif>0%</option>
                                                <option value="50" @if($form == 'Edit' && $detail->persentase_laporan_potob == '50') selected @elseif($form == 'Detail' && $detail->persentase_laporan_potob == '50') selected @endif>50%</option>
                                                <option value="100" @if($form == 'Edit' && $detail->persentase_laporan_potob == '100') selected @elseif($form == 'Detail' && $detail->persentase_laporan_potob == '100') selected @endif>100%</option>
                                            </select>
                                        </div> --}}
                                        <div class="form-group col-md-6">
                                            <label class="form-label" for="komentar_laporan_potob">Komentar</label>
                                            <textarea class="form-control" name="komentar_laporan_potob" id="komentar_laporan_potob" cols="15" rows="5" readonly>{{$detail->komentar_laporan_potob}}</textarea>
                                        </div>
                                    </div>
                                </div>
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

<div class="modal fade" id="pic-laporan-potob" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Laporan POTOB & SPI</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Laporan Potob & SPI')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pic-laporan-upaya-klaim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Laporan Pengupayaan Klaim/Eskalasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Laporan Upaya Klaim')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pic-laporan-bulanan-ikn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Laporan Bulanan IKN/PSN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Laporan Bulanan IKN')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pic-prognosa-hasil-usaha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Prognosa Hasil Usaha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Prognosa Hasil Usaha')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pic-update-inventaris" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Update Inventaris Extracomptable Proyek</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Update Inventaris')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pic-laporan-vendor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Laporan Vendor Performance Index</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Laporan Vendor')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pic-laporan-pic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Laporan LC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Laporan LC')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pic-evaluasi-hasil-usaha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">PIC Evaluasi Hasil Usaha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>PIC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($picMonthlyReport as $item)
                                @if ($item->jenis_dokumen == 'Evaluasi Hasil Usaha')
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->pic?->nama_user }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
    </div>
</div>

@endsection