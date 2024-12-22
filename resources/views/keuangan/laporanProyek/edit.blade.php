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
                    <h4 class="card-title">Detail Laporan Proyek</h4>
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
                                @if($laporanProyekDetail->contains('status', 2)) <!-- Cek apakah ada status = 2 -->
                                    <th>Komentar</th>
                                @endif
                                <th style="min-width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($laporanProyekDetail as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->dokumen?->dokumen }}</td>
                                    <td>{{ $item->laporan_proyek_sub_details_count ?? 0 }}</td>
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
                                            <!-- Tombol Verifikasi -->
                                            @if ($item->status == 0 && $user->role == 'Head Office')
                                                <form id="form-verifikasi-{{ $item->id }}" 
                                                    action="{{ url('/verifikasi-detail-laporan-proyek/'.$item->id) }}" 
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-icon btn-success" data-toggle="tooltip" title="Verifikasi"
                                                            onclick="confirmVerifikasi('form-verifikasi-{{ $item->id }}', 'Apakah Anda yakin akan verifikasi data ini?')">
                                                        <span class="btn-inner">
                                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M8 12l4 4 8-8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Tombol Tolak Verifikasi -->
                                            @if ($item->status == 0 && $user->role == 'Head Office')
                                                <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" title="Tolak Verifikasi"
                                                        onclick="openRejectModal('{{ $item->id }}')">
                                                    <span class="btn-inner">
                                                        <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </span>
                                                </button>
                                            @endif

                                            <!-- Tombol Buka Verifikasi -->
                                            @if (($item->status == 1 || $item->status == 2) && $user->role == 'Head Office')
                                                <form id="form-buka-verifikasi-{{ $item->id }}" 
                                                      action="{{ url('/bukaverifikasi-detail-laporan-proyek/'.$item->id) }}" 
                                                      method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="Buka Verifikasi"
                                                            onclick="confirmVerifikasi('form-buka-verifikasi-{{ $item->id }}', 'Apakah Anda yakin akan membuka verifikasi data ini?')">
                                                        <span class="btn-inner">
                                                            <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M15.04 14.9874L8.96002 9.00037" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M15.04 9.01331L8.96002 15.0003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                </form>
                                            @endif

                                            <!-- Tombol Edit/Detail -->
                                            <a href="/sub-detail-laporan-proyek/{{ $item->id }}" 
                                                class="btn btn-sm btn-icon btn-primary" 
                                                data-toggle="tooltip" title="{{ $item->status == 1 ? 'Detail' : 'Edit' }}">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.5 3.5l5 5-13.5 13.5H2v-5.5L15.5 3.5z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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

<!-- Modal Tolak Verifikasi -->
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
    document.getElementById('rejectForm').action = '/tolak-verifikasi-detail-laporan-proyek/' + itemId;
    $('#rejectModal').modal('show');
}
</script>
@endsection
