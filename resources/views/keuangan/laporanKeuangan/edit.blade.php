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
                        <div class="form-group col-md-6">
                            <label class="form-label" for="id_proyek">Periode</label>
                            <input type="text" class="form-control" value="{{ $detail->periode }}" readonly>
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
                    <h4 class="card-title">Detail Laporan Keuangan</h4>
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
                                @if($laporanKeuanganDetail->contains('status', 2)) <!-- Cek apakah ada status = 2 -->
                                    <th>Komentar</th>
                                @endif
                                <th style="min-width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($laporanKeuanganDetail as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->dokumen?->dokumen }}</td>
                                    <td>{{ $item->laporan_keuangan_sub_details_count ?? 0 }}</td>
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
                                                    <!-- Form Verifikasi -->
                                                    <form id="form-verifikasi-{{ $item->id }}" 
                                                          action="{{ url('/verifikasi-detail-laporan-keuangan/'.$item->id) }}" 
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

                                                    <!-- Form Tolak Verifikasi -->
                                                    <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" title="Tolak Verifikasi"
                                                            onclick="openRejectModal('{{ $item->id }}')">
                                                        <span class="btn-inner">
                                                            <svg class="icon-20" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                @else
                                                    <!-- Tombol untuk buka verifikasi jika sudah diverifikasi atau ditolak -->
                                                    <form id="form-buka-verifikasi-{{ $item->id }}" 
                                                          action="{{ url('/bukaverifikasi-detail-laporan-keuangan/'.$item->id) }}" 
                                                          method="POST" 
                                                          style="display:inline;">
                                                        @csrf
                                                        <button type="button" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="Buka Verifikasi"
                                                                onclick="confirmVerifikasi('form-buka-verifikasi-{{ $item->id }}', 'Apakah Anda yakin akan buka verifikasi data ini?')">
                                                            <span class="btn-inner">
                                                                <svg class="icon-25" width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M15.04 14.9874L8.96002 9.00037" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M15.04 9.01331L8.96002 15.0003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <a href="{{ url('/sub-detail-laporan-keuangan/'.$item->id) }}" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="Edit">
                                                <span class="btn-inner">
                                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0205 3.83349L7.67547 9.17849C6.97347 9.88049 6.41947 11.0425 6.27947 11.9825L6.01647 13.7555C5.74347 15.5355 6.96447 16.7495 8.74147 16.4745L10.5145 16.2115C11.4545 16.0715 12.6155 15.5175 13.3185 14.8145L18.6635 9.46949C20.1295 8.00349 20.6735 6.23549 18.6635 4.22449C16.6535 2.21449 14.8855 2.75949 13.0205 3.83349Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M11.6948 5.05762C12.1578 7.02862 13.9638 8.44762 15.9278 8.01562" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M5.92969 19.7646H17.9997" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
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

<!-- Modal Tolak Verifikasi dengan Komentar -->
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
    document.getElementById('rejectForm').action = '/tolak-verifikasi-detail-laporan-keuangan/' + itemId;
    $('#rejectModal').modal('show');
}
</script>
@endsection
