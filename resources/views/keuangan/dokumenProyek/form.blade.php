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
                    <form action="@if($form == 'Tambah')/tambah-dokumen-proyek @else/edit-dokumen-akuntansi/{{$detail->id}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="dokumen">Nama Dokumen</label>
                                <input type="text" class="form-control @error('dokumen') is-invalid @enderror" @if($form == 'Tambah') value="{{old('dokumen')}}" @else value="{{$detail->dokumen}}" @endif id="dokumen" name="dokumen" @if($form == 'Detail') disabled @endif placeholder="Masukkan Nama Dokumen" required>
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-dokumen-proyek'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection