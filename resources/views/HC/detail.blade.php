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
                                    <th>Aspek</th>
                                    <th>Parameter</th>
                                    <th>Bobot</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($aspekAkhlakData as $item)
                                    <tr>
                                        <td>{{ $no ++ }}</td>
                                        <td>{{ $item->aspek }}</td>
                                        <td>{{ $item->parameter }}</td>
                                        <td>{{ $item->bobot }}</td>

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
