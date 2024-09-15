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
                    <form action="" method="POST">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="pengguna">Pengguna</label>
                                <input type="text" class="form-control" value="{{ $detail->user->nama_user}}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="role">Role</label>
                                <input type="text" class="form-control" value="{{ $detail->user->role}}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="jabatan">Jabatan</label>
                                <input type="text" class="form-control" value="{{ $detail->user->jabatan}}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="aktivitas">Aktivitas</label>
                                <textarea class="form-control" cols="15" rows="5" disabled>{{ $detail->activity}}</textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="fitur">Fitur</label>
                                <input type="text" class="form-control" value="{{ $detail->feature}}" disabled>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="waktu">Waktu</label>
                                <input type="text" class="form-control" value="{{ $detail->created_at}}" disabled>
                            </div>
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-log'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection