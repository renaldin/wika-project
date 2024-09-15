@extends('layout.main')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">Monitoring Perilaku Akhlak</div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table id="user-list-table" class="table table-striped" role="grid">
                            <thead>
                                <tr class="light">
                                    <th>No</th>
                                    <th>Nama Pengguna</th>
                                    <th>Periode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($daftarAkhlak as $index => $akhlak)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $akhlak->nama_user }}</td>
                                        <td>{{ $akhlak->periode }}</td>
                                        <td>
                                            <a href="{{ route('hc.detail', ['id_akhlak' => $akhlak->id_akhlak]) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
