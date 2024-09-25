@extends('layout.main')

@section('content')
<div class="container-fluid">
    <h2 class="mt-4">Daftar Proyek</h2>
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
                <div class="customers">
                    <ul>
                        @foreach($item->users as $user)
                            <li class="d-inline-block">
                                <img class="img-30 rounded-circle" src="{{ asset('foto_user/'.$user->foto_user) }}" alt="{{ $user->nama_user }}" title="{{ $user->nama_user }}">
                            </li>
                        @endforeach
                        <li class="d-inline-block ms-2">
                            <p class="f-12">+{{ max(0, $item->users->count() - 3) }} More</p>
                        </li>
                    </ul>
                </div>
                <div class="project-status mt-4">
                    <div class="d-flex mb-0">
                        <p>{{ $item->realisasi }}%</p>
                        <div class="flex-grow-1 text-end"><span>Done</span></div>
                    </div>
                    <div class="progress" style="height: 5px">
                        <div class="progress-bar-animated bg-primary progress-bar-striped" role="progressbar" style="width: {{ $item->realisasi }}%" aria-valuenow="{{ $item->realisasi }}" aria-valuemin="0" aria-valuemax="100"></div>
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
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
