@extends('layout.main')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Daftar Proyek</h2>
    <div style="color: white;">
        ...
    </div>

    <div class="row">
        @foreach ($daftarProyek as $item)
        <div class="col-xxl-4 col-lg-6 box-col-6"> 
            <div class="project-box b-light1-primary">
                <h5 class="f-w-500">{{ $item->nama_proyek }}</h5>
                <div class="d-flex">
                    <img class="img-20 me-1 rounded-circle" src="{{ asset($item->client_image) }}" alt="" title="">
                    <div class="flex-grow-1">
                        <p>{{ $item->kode_spk }}, {{ $item->tanggal }}</p>
                    </div>
                </div>
                <p>{{ $item->tipe_konstruksi }}</p>
                <div class="row details"> 
                    <div class="col-6"><span>Prioritas</span></div>
                    <div class="col-6 font-primary">{{ $item->prioritas }}</div>
                    <div class="col-6"><span>Deskripsi</span></div>
                    <div class="col-6 font-primary">{{ $item->deskripsi_proyek}}</div>
                    <div class="col-6"><span>Status</span></div>
                    <div class="col-6 font-primary">{{ $item->status }}</div>
                </div>
                
                <div class="project-status mt-4">
                <a href="/daftar-proyek-user/{{$item->id_proyek}}" class="btn btn-sm btn-icon btn-primary mt-2" data-toggle="tooltip" data-placement="top" title="Tim Proyek" data-original-title="Tim Proyek">
                    <span class="btn-inner">
                        <svg class="icon-32" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                   
                            <path d="M17.8877 10.8967C19.2827 10.7007 20.3567 9.50473 20.3597 8.05573C20.3597 6.62773 19.3187 5.44373 17.9537 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                   
                            <path d="M19.7285 14.2505C21.0795 14.4525 22.0225 14.9255 22.0225 15.9005C22.0225 16.5715 21.5785 17.0075 20.8605 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                   
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8867 14.6638C8.67273 14.6638 5.92773 15.1508 5.92773 17.0958C5.92773 19.0398 8.65573 19.5408 11.8867 19.5408C15.1007 19.5408 17.8447 19.0588 17.8447 17.1128C17.8447 15.1668 15.1177 14.6638 11.8867 14.6638Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                   
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8869 11.888C13.9959 11.888 15.7059 10.179 15.7059 8.069C15.7059 5.96 13.9959 4.25 11.8869 4.25C9.7779 4.25 8.0679 5.96 8.0679 8.069C8.0599 10.171 9.7569 11.881 11.8589 11.888H11.8869Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                   
                            <path d="M5.88509 10.8967C4.48909 10.7007 3.41609 9.50473 3.41309 8.05573C3.41309 6.62773 4.45409 5.44373 5.81909 5.21973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                   
                            <path d="M4.044 14.2505C2.693 14.4525 1.75 14.9255 1.75 15.9005C1.75 16.5715 2.194 17.0075 2.912 17.2815" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                
                        </svg>                                                          
                    </span>
                </a>
                    <div class="d-flex mb-0">
                        <p style="font-size: 1.5rem; font-weight: bold;">{{ $item->realisasi }}%</p>
                    </div>
                    <div class="progress" style="height: 15px; border-radius: 10px;">
                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{ $item->realisasi }}%; height: 100%; border-radius: 10px;" aria-valuenow="{{ $item->realisasi }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="product-action">
                    <a href="/engineering/detail-proyek/{{$item->id_proyek}}"> 
                        <i class="icofont icofont-eye-alt text-info"></i>
                    </a>
                    <a href="/engineering/edit-proyek/{{$item->id_proyek}}"> 
                        <i class="icofont icofont-edit text-success"></i>
                    </a>
                    <a href="#" class="btn-confirm" data-title="Hapus" data-button-color="btn-primary" data-href="/engineering/hapus-proyek/{{$item->id_proyek}}" data-content="Apakah Anda yakin akan hapus data ini ?"> 
                        <i class="icofont icofont-trash text-danger"></i>
                    </a>
                </div>
                
                <!-- Tambahkan tombol Tim Proyek di sini -->
                
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
