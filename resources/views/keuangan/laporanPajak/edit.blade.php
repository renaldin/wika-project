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
                    <h4 class="card-title">Detail Laporan Pajak</h4>
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
                                @if($laporanPajakDetail->contains('status', 2)) <!-- Cek apakah ada status = 2 -->
                                    <th>Komentar</th>
                                @endif
                                <th style="min-width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($laporanPajakDetail as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->dokumen?->dokumen }}</td>
                                    <td>{{ $item->laporan_pajak_sub_details_count ?? 0 }}</td>
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
                                                    <!-- Tombol Verifikasi -->
                                                    <form id="form-verifikasi-{{ $item->id }}" 
                                                          action="{{ url('/verifikasi-detail-laporan-pajak/'.$item->id) }}" 
                                                          method="POST" 
                                                          style="display:inline;">
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

                                                    <!-- Tombol Tolak Verifikasi -->
                                                    <button type="button" class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" title="Tolak Verifikasi"
                                                            onclick="openRejectModal('{{ $item->id }}')">
                                                        <span class="btn-inner">
                                                            <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M18 6L6 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                <path d="M6 6L18 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>
                                                        </span>
                                                    </button>
                                                @else
                                                    <!-- Tombol Buka Verifikasi -->
                                                    <form id="form-buka-verifikasi-{{ $item->id }}" 
                                                          action="{{ url('/bukaverifikasi-detail-laporan-pajak/'.$item->id) }}" 
                                                          method="POST" 
                                                          style="display:inline;">
                                                        @csrf
                                                        <button type="button" class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" title="Buka Verifikasi"
                                                                onclick="confirmVerifikasi('form-buka-verifikasi-{{ $item->id }}', 'Apakah Anda yakin akan buka verifikasi data ini?')">
                                                            <span class="btn-inner">
                                                                <svg width="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M7.67 1.99927H16.34C19.73 1.99927 22 4.37927 22 7.91927V16.0903C22 19.6203 19.73 21.9993 16.34 21.9993H7.67C4.28 21.9993 2 19.6203 2 16.0903V7.91927C2 4.37927 4.28 1.99927 7.67 1.99927Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M15.04 14.9874L8.96002 9.00037" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                    <path d="M15.04 9.01331L8.96002 15.0003" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                    </form>
                                                @endif
                                            @endif
                                            <a href="{{ url('/sub-detail-laporan-pajak/'.$item->id) }}" class="btn btn-sm btn-icon btn-primary" data-toggle="tooltip" title="Edit">
                                                <span class="btn-inner">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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
    document.getElementById('rejectForm').action = '/tolak-verifikasi-detail-laporan-pajak/' + itemId;
    $('#rejectModal').modal('show');
}
</script>
@endsection
