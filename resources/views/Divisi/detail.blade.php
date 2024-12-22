@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">AKHLAK</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama User</label>
                            <input type="text" class="form-control" value="{{$detailAkhlak->nama_user}}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Periode</label>
                            <input type="text" class="form-control" value="{{date('F Y', strtotime($detailAkhlak->periode))}}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                        
                                <a href="/download-monitoring-akhlak/{{$detailAkhlak->id_akhlak}}" target="_blank" class="btn btn-primary mb-4">Download PDF</a>      
               
                        </div>
                    </div>
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
                    <h4 class="card-title">Daftar AKHLAK</h4>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="akhlakTable">
                                <thead>
                                    <tr class="light text-center">
                                        <td>No</td>
                                        <td>Parameter</td>
                                        <td>Aspek Yang Dinilai</td>
                                        <td style="width: 30%; white-space: normal;">Deskripsi</td>
                                        <td>Evidence</td>
                                        <td>Nilai</td>
                                        <td>Aksi</td> <!-- Kolom untuk tombol Edit -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                    $no = 1;
                                    $totalNilai = 0;
                                    @endphp
                                    @foreach ($daftarDetailAkhlak as $item)
                                        @if ($item->id_akhlak == $detailAkhlak->id_akhlak)
                                        @php
                                            $totalNilai += $item->nilai + $item->nilai2 + $item->nilai3; // Menjumlahkan nilai, nilai2, dan nilai3
                                        @endphp
                                            <tr>
                                                <td rowspan="3">{{$no}}</td>
                                                <td rowspan="3" class="text-wrap">{{$item->aspek}}</td>
                                                <td rowspan="3" class="text-wrap">{{$item->parameter}}</td>
                                                <td class="text-wrap position-relative">
                                                    {{$item->deskripsi}}<br>
                                                </td>
                                                <td class="text-center" rowspan="3">
                                                    @if ($item->evidence)
                                                        <a href="{{ asset('/' . $item->evidence) }}" target="_blank" class="btn btn-primary btn-sm">Lihat Dokumen</a>
                                                    @else
                                                        <span>-</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $item->nilai }}</td>
                                                <td rowspan="3" class="text-center">
                                                    <a class="btn btn-sm btn-icon btn-success" href="#" 
                                                       data-bs-toggle="modal" 
                                                       data-bs-target="#editModal" 
                                                       data-id="{{$item->id_detail_akhlak}}" 
                                                       data-deskripsi="{{$item->deskripsi}}" 
                                                       data-deskripsi2="{{$item->deskripsi2}}" 
                                                       data-deskripsi3="{{$item->deskripsi3}}">Edit</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-wrap position-relative">
                                                    {{$item->deskripsi2}}<br>
                                                </td>
                                                <td class="text-wrap position-relative">
                                                    {{$item->nilai2}}<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-wrap position-relative">
                                                    {{$item->deskripsi3}}<br>
                                                </td>
                                                <td class="text-wrap position-relative">
                                                    {{$item->nilai3}}<br>
                                                </td>
                                            </tr>
                                            @php $no++; @endphp
                                        @endif
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="text-center"><strong>Total</strong></td> <!-- Mengubah colspan agar mencakup seluruh kolom -->
                                        <td class="text-center">{{ $totalNilai }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Modal Edit untuk Semua Deskripsi -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Deskripsi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="editForm" action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id_detail_akhlak" id="id_detail_akhlak">
                                                <div class="mb-3">
                                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi2" class="form-label">Deskripsi 2</label>
                                                    <textarea class="form-control" id="deskripsi2" name="deskripsi2"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi3" class="form-label">Deskripsi 3</label>
                                                    <textarea class="form-control" id="deskripsi3" name="deskripsi3"></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="evidence" class="form-label">Upload Evidence</label>
                                                    <input type="file" class="form-control" name="evidence" id="evidence">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Event listener untuk modal
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; // Button that triggered the modal
        const idDetail = button.getAttribute('data-id');
        const deskripsi = button.getAttribute('data-deskripsi');
        const deskripsi2 = button.getAttribute('data-deskripsi2');
        const deskripsi3 = button.getAttribute('data-deskripsi3');

        // Update the modal's content
        const modalBodyInput = editModal.querySelector('.modal-body input#id_detail_akhlak');
        const modalBodyTextarea = editModal.querySelector('.modal-body textarea#deskripsi');
        const modalBodyTextarea2 = editModal.querySelector('.modal-body textarea#deskripsi2');
        const modalBodyTextarea3 = editModal.querySelector('.modal-body textarea#deskripsi3');

        modalBodyInput.value = idDetail;
        modalBodyTextarea.value = deskripsi;
        modalBodyTextarea2.value = deskripsi2;
        modalBodyTextarea3.value = deskripsi3;

        // Update the form action
        const formAction = `/update-detail-akhlak/${idDetail}`;
        document.getElementById('editForm').setAttribute('action', formAction);
    });
</script>

@endsection
