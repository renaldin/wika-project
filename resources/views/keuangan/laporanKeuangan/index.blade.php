@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                <div class="row">
                    <!-- Filter Bulan -->
                    <div class="col-lg-4 mb-3">
                        <form action="{{ route('daftar-laporan-keuangan') }}" method="GET">
                            <div class="input-group">
                                <!-- Input untuk memilih bulan dan tahun -->
                                <input type="month" name="bulan" class="form-control" value="{{ request('bulan') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if ($user->role == 'Tim Proyek')
                        <div class="col-lg-8 mb-1">
                            <a href="/tambah-laporan-keuangan" class="btn btn-primary mb-4">Tambah</a>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="col-lg-12">
                            <div class="alert bg-primary text-white alert-dismissible">
                                <span>{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif
                    @if (session('fail'))
                        <div class="col-lg-12">
                            <div class="alert bg-danger text-white alert-dismissible">
                                <span>{{ session('fail') }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>Nama Proyek</th>
                                <th>Periode</th>
                                <th style="min-width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($daftarLaporanKeuangan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->proyek?->nama_proyek }}</td>
                                    <td>{{ $item->periode }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            @if ($user->role == 'Tim Proyek')
                                                @if (!$item->id_verifikator)
                                                    <button type="button" class="btn btn-sm btn-icon btn-danger btn-delete" 
                                                        data-href="/hapus-laporan-keuangan/{{$item->id}}" 
                                                        data-toggle="tooltip" data-placement="top" title="Hapus">
                                                        <span class="btn-inner">
                                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                                <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                @endif
                                            @endif
                                            <a href="/detail-laporan-keuangan/{{$item->id}}" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" data-placement="top" title="Detail">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M21 12H3M12 21l-9-9 9-9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada laporan keuangan yang tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

