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
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Nama Proyek</label>
                            <input type="text" class="form-control" value="{{ $detail->proyek?->nama_proyek }}" readonly>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Detail Laporan Akuntansi</h4>
                </div>
            </div>
            <div class="card-body px-4" style="margin-bottom: -50px;">
                <div class="row">
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
                    <table id="user-list-table" class="table table-striped" role="grid">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>Dokumen</th>
                                <th>Jumlah File</th>
                                <th>Status</th>
                                @if($laporanAkuntansiDetail->contains('status', 2)) <!-- Cek apakah ada status = 2 -->
                                    <th>Komentar</th>
                                @endif
                                <th style="min-width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporanAkuntansiDetail as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->dokumen?->dokumen }}</td>
                                    <td>{{ $item->laporan_akuntansi_sub_details_count ?? 0 }}</td>
                                    <td>
                                        @if($item->status == 0)
                                            <span class="badge bg-danger">Belum Diverifikasi</span>
                                        @elseif($item->status == 1)
                                            <span class="badge bg-success">Sudah Diverifikasi</span>
                                        @elseif($item->status == 2)
                                            <span class="badge bg-warning">Verifikasi Ditolak</span>
                                        @endif
                                    </td>
                                    @if($item->status == 2) <!-- Tampilkan kolom komentar hanya jika status = 2 -->
                                        <td>
                                            @if($item->komentar)
                                                {{ $item->komentar }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    @endif
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            @if ($user->role == 'Head Office')
                                                @if($item->status == 0)
                                                    <!-- Tombol untuk verifikasi -->
                                                    <form id="form-verifikasi-{{ $item->id }}" 
                                                          action="{{ url('/verifikasi-detail-laporan-akuntansi/'.$item->id) }}" 
                                                          method="POST" 
                                                          style="display:inline;">
                                                        @csrf
                                                        <button type="button" class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" title="Verifikasi"
                                                                onclick="confirmVerifikasi('form-verifikasi-{{ $item->id }}', 'Apakah Anda yakin akan verifikasi data ini?')">
                                                            <span class="btn-inner">
                                                                <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M8.43994 12.0002L10.8139 14.3732L15.5599 9.6272" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </form>

                                                    <!-- Tombol untuk tolak verifikasi -->
                                                    <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" title="Tolak Verifikasi"
                                                            onclick="openRejectModal('{{ $item->id }}')">
                                                        <span class="btn-inner">
                                                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                @else
                                                    <!-- Tombol untuk buka verifikasi -->
                                                    <form id="form-buka-verifikasi-{{ $item->id }}" 
                                                          action="{{ url('/bukaverifikasi-detail-laporan-akuntansi/'.$item->id) }}" 
                                                          method="POST" 
                                                          style="display:inline;">
                                                        @csrf
                                                        <button type="button" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="Buka Verifikasi"
                                                                onclick="confirmVerifikasi('form-buka-verifikasi-{{ $item->id }}', 'Apakah Anda yakin akan buka verifikasi data ini?')">
                                                            <span class="btn-inner">
                                                                <svg class="icon-25" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M15.04 14.9874L8.96002 9.00037" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M15.04 9.01331L8.96002 15.0003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <a href="{{ url('/sub-detail-laporan-akuntansi/' . $item->id) }}" class="btn btn-sm btn-icon btn-info" data-toggle="tooltip" title="Edit">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.6652 2.5L21.5 8.335L15.6652 14.1698L9.83049 8.335L15.6652 2.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M21.5 8.335L21.5 15.835L8.5 15.835" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M2 15.5H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
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

<!-- Modal untuk Komentar Penolakan -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" id="rejectForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="rejectModalLabel">Tolak Verifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="rejectComment" class="form-label">Komentar</label>
                    <textarea class="form-control" name="comment" id="rejectComment" required></textarea>
                    <input type="hidden" id="rejectItemId" name="item_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function confirmVerifikasi(formId, message) {
    if (confirm(message)) {
        document.getElementById(formId).submit();
    }
}

function openRejectModal(itemId) {
    document.getElementById('rejectItemId').value = itemId;
    document.getElementById('rejectForm').action = '/tolak-verifikasi-detail-laporan-akuntansi/' + itemId;
    $('#rejectModal').modal('show');
}
</script>
@endsection
