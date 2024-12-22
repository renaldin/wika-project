@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="/tambah-laporan-qa" method="POST">
                        @csrf
                        <div class="form-group col-md-12">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" data-live-search="true" required>
                                <option value="" selected disabled>-- Pilih --</option>
                                @foreach($daftarProyek as $item)
                                    <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="form-label" for="periode">Periode (Bulan dan Tahun)</label>
                            <input type="month" name="periode" id="periode" class="form-control @error('periode') is-invalid @enderror" required>
                            @error('periode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('fail'))
                        <div class="alert alert-danger">
                            {{ session('fail') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
