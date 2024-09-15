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
                        <form action="/pilih-proyek" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="id_proyek">Nama Proyek</label>
                                    <select name="id_proyek" id="id_proyek" class="selectpicker form-control @error('id_proyek') is-invalid @enderror" @if($form == 'Detail') disabled @endif required>
                                        @if ($form == 'Tambah')
                                            <option value="" selected disabled>-- Pilih --</option>    
                                        @elseif ($form == 'Edit')
                                            <option value="{{$detail->id_proyek}}">{{$detail->nama_proyek}}</option>
                                        @endif
                                        @foreach($daftarProyek as $item)
                                            <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_proyek')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Ok</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection