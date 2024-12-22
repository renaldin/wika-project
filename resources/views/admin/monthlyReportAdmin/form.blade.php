@extends('layout.main')

@section('content')
<form action="@if($form == 'Edit') /edit-monthly-report-admin/{{$detail->id_monthly_report}} @endif" method="POST">
    @csrf
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
                            <div class="form-group col-md-12">
                                <label class="form-label" for="id_proyek">Nama Proyek</label>
                                <input type="hidden" name="id_proyek" value="{{$detail->id_proyek}}">
                                <input type="text" class="form-control" value="{{$detail->nama_proyek}}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label">Implementasi Bim</label>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="dua_d" id="dua_d" @if($detail->dua_d == 1) checked @endif>
                                    <label class="form-check-label" for="dua_d">
                                        2D
                                    </label>
                                </div>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="tiga_d" id="tiga_d" @if($detail->tiga_d == 1) checked @endif>
                                    <label class="form-check-label" for="tiga_d">
                                        3D
                                    </label>
                                </div>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="empat_d" id="empat_d" @if($detail->empat_d == 1) checked @endif>
                                    <label class="form-check-label" for="empat_d">
                                        4D
                                    </label>
                                </div>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="lima_d" id="lima_d" @if($detail->lima_d == 1) checked @endif>
                                    <label class="form-check-label" for="lima_d">
                                        5D
                                    </label>
                                </div>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" name="cde" id="cde" @if($detail->cde == 1) checked @endif>
                                    <label class="form-check-label" for="cde">
                                        CDE
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tanggal_report">Tanggal Input</label>
                                <input type="date" class="form-control @error('tanggal_report') is-invalid @enderror" id="tanggal_report" name="tanggal_report" value="@if($form == 'Tambah'){{ old('tanggal_report') }}@elseif($form == 'Edit'){{$detail->tanggal_report}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Tanggal Input" required>
                                @error('tanggal_report')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="realisasi_proyek">Realisasi Proyek (%)</label>
                                <input type="number" class="form-control @error('realisasi_proyek') is-invalid @enderror" id="realisasi_proyek" name="realisasi_proyek" value="@if($form == 'Tambah'){{ old('realisasi_proyek') }}@elseif($form == 'Edit'){{$detail->realisasi_proyek}}@endif" @if($form == 'Detail') disabled @endif autofocus placeholder="Masukkan Realisasi Proyek" required>
                                @error('realisasi_proyek')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="bulan_report">Bulan Report</label>
                                <input type="MONTH" class="form-control @error('bulan_report') is-invalid @enderror" id="bulan_report" name="bulan_report" value="@if($form == 'Tambah'){{ old('bulan_report') }}@elseif($form == 'Edit'){{$detail->bulan_report}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Bulan Report" required>
                                @error('bulan_report')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="EIR">EIR (%)</label>
                                <input type="number" class="form-control @error('EIR') is-invalid @enderror" id="EIR" name="EIR" 
                                    value="@if($form == 'Tambah'){{ old('EIR') }}@elseif($form == 'Edit'){{$detail->EIR}}@endif" 
                                    @if($form == 'Detail') disabled @endif
                                    placeholder="Masukkan EIR" 
                                    step="0.01" required>
                                @error('EIR')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="BEP">BEP (%)</label>
                                <input type="number" class="form-control @error('BEP') is-invalid @enderror" id="BEP" name="BEP" 
                                    value="@if($form == 'Tambah'){{ old('BEP') }}@elseif($form == 'Edit'){{$detail->BEP}}@endif" 
                                    @if($form == 'Detail') disabled @endif
                                    placeholder="Masukkan BEP" 
                                    step="0.01" required>
                                @error('BEP')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="produksi_bim">Produksi BIM (%)</label>
                                <input type="number" class="form-control @error('produksi_bim') is-invalid @enderror" id="produksi_bim" name="produksi_bim" 
                                    value="@if($form == 'Tambah'){{ old('produksi_bim') }}@elseif($form == 'Edit'){{$detail->produksi_bim}}@endif" 
                                    @if($form == 'Detail') disabled @endif
                                    placeholder="Masukkan Produksi BIM" 
                                    step="0.01" required>
                                @error('produksi_bim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="monitoring_evaluasi">Monitoring Evaluasi (%)</label>
                                <input type="number" class="form-control @error('monitoring_evaluasi') is-invalid @enderror" id="monitoring_evaluasi" name="monitoring_evaluasi" 
                                    value="@if($form == 'Tambah'){{ old('monitoring_evaluasi') }}@elseif($form == 'Edit'){{$detail->monitoring_evaluasi}}@endif" 
                                    @if($form == 'Detail') disabled @endif
                                    placeholder="Masukkan Monitoring Evaluasi" 
                                    step="0.01" required>
                                @error('monitoring_evaluasi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tigad">3D (%)</label>
                                <input type="number" class="form-control @error('tigad') is-invalid @enderror" id="tigad" name="tigad" 
                                    value="@if($form == 'Tambah'){{ old('tigad') }}@elseif($form == 'Edit'){{$detail->tigad}}@endif" 
                                    @if($form == 'Detail') disabled @endif
                                    placeholder="Masukkan 3D" 
                                    step="0.01" required>
                                @error('tigad')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="empatd">4D (%)</label>
                                <input type="number" class="form-control @error('empatd') is-invalid @enderror" id="empatd" name="empatd" 
                                    value="@if($form == 'Tambah'){{ old('empatd') }}@elseif($form == 'Edit'){{$detail->empatd}}@endif" 
                                    @if($form == 'Detail') disabled @endif
                                    placeholder="Masukkan 4D" 
                                    step="0.01" required>
                                @error('empatd')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="limad">5D (%)</label>
                                <input type="number" class="form-control @error('limad') is-invalid @enderror" id="limad" name="limad" 
                                    value="@if($form == 'Tambah'){{ old('limad') }}@elseif($form == 'Edit'){{$detail->limad}}@endif" 
                                    @if($form == 'Detail') disabled @endif
                                    placeholder="Masukkan 5D" 
                                    step="0.01" required>
                                @error('produksi_bim')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="kendala_implementasi_bim">Kendala Implementasi Bim</label>
                                <input type="text" class="form-control @error('kendala_implementasi_bim') is-invalid @enderror" id="kendala_implementasi_bim" name="kendala_implementasi_bim" value="@if($form == 'Tambah'){{ old('kendala_implementasi_bim') }}@elseif($form == 'Edit'){{$detail->kendala_implementasi_bim}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Kendala Implementasi Bim" required>
                                @error('kendala_implementasi_bim')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="engineering_issue_berjalan">Engineering Issue Berjalan</label>
                                <input type="text" class="form-control @error('engineering_issue_berjalan') is-invalid @enderror" id="engineering_issue_berjalan" name="engineering_issue_berjalan" value="@if($form == 'Tambah'){{ old('engineering_issue_berjalan') }}@elseif($form == 'Edit'){{$detail->engineering_issue_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Engineering Issue Berjalan" required>
                                @error('engineering_issue_berjalan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="masalah_produksi_berjalan">Masalah Produksi Berjalan</label>
                                <input type="text" class="form-control @error('masalah_produksi_berjalan') is-invalid @enderror" id="masalah_produksi_berjalan" name="masalah_produksi_berjalan" value="@if($form == 'Tambah'){{ old('masalah_produksi_berjalan') }}@elseif($form == 'Edit'){{$detail->masalah_produksi_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Masalah Produksi Berjalan" required>
                                @error('masalah_produksi_berjalan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="konsep_lean_construction_berjalan">Konsep Lean Construction Berjalan</label>
                                <input type="text" class="form-control @error('konsep_lean_construction_berjalan') is-invalid @enderror" id="konsep_lean_construction_berjalan" name="konsep_lean_construction_berjalan" value="@if($form == 'Tambah'){{ old('konsep_lean_construction_berjalan') }}@elseif($form == 'Edit'){{$detail->konsep_lean_construction_berjalan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Konsep Lean Construction Berjalan" required>
                                @error('konsep_lean_construction_berjalan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="feedback_untuk_perusahaan">Feedback Untuk Perusahaan</label>
                                <input type="text" class="form-control @error('feedback_untuk_perusahaan') is-invalid @enderror" id="feedback_untuk_perusahaan" name="feedback_untuk_perusahaan" value="@if($form == 'Tambah'){{ old('feedback_untuk_perusahaan') }}@elseif($form == 'Edit'){{$detail->feedback_untuk_perusahaan}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Feedback Untuk Perusahaan" required>
                                @error('feedback_untuk_perusahaan')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="evidence_link">Evidence Link</label>
                                <input type="text" class="form-control @error('evidence_link') is-invalid @enderror" id="evidence_link" name="evidence_link" value="@if($form == 'Tambah'){{ old('evidence_link') }}@elseif($form == 'Edit'){{$detail->evidence_link}}@endif"  @if($form == 'Detail') disabled @endif placeholder="Masukkan Evidence Link" required>
                                @error('evidence_link')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-monthly-report-admin'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection