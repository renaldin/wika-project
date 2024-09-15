@extends('layout.main')

@section('content')

@php
    if (Session()->get('role') == 'Manajemen') {
        $photo = $chat->userDua->foto_user;
        $name = $chat->userDua->nama_user;
        $position = $chat->userDua->jabatan;
        $role = 'Head Office';
    } elseif (Session()->get('role') == 'Head Office') {
        $photo = $chat->userSatu->foto_user;
        $name = $chat->userSatu->nama_user;
        $position = $chat->userSatu->jabatan;
        $role = 'Manajemen';
    }
@endphp

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="new-user-info">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table">
                                <tr>
                                    <td rowspan="3">
                                        <img src="@if($photo == null){{ asset('foto_user/default1.jpg') }}@else{{ asset('foto_user/'.$photo) }}@endif" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                                    </td>
                                    <td width="20px"></td>
                                    <td><strong>{{$role}}</strong> :</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>{{$name}}</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Jabatan : {{$position}}</td>
                                </tr>
                            </table>
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
                <h4 class="card-title">Chat</h4>
            </div>
            <div class="card-body px-4">
                <div class="row mb-3">
                    <div class="col-lg-6 mb-1">
                        <form action="" class="d-flex">
                            <input type="date" class="form-control" name="filterDate" id="filterDate" value="{{$filterDate}}">
                            <button type="submit" class="btn btn-primary ms-2">Filter</button>
                        </form>
                    </div>
                    <div class="col-lg-6 mb-1">
                        <form action="" class="d-flex">
                            <input type="month" class="form-control" name="filterMonth" id="filterMonth" value="{{$filterMonth}}">
                            <button type="submit" class="btn btn-primary ms-2">Filter</button>
                        </form>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert bg-primary text-white alert-dismissible">
                        <span>
                            <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.9846 21.606C11.9846 21.606 19.6566 19.283 19.6566 12.879C19.6566 6.474 19.9346 5.974 19.3196 5.358C18.7036 4.742 12.9906 2.75 11.9846 2.75C10.9786 2.75 5.26557 4.742 4.65057 5.358C4.03457 5.974 4.31257 6.474 4.31257 12.879C4.31257 19.283 11.9846 21.606 11.9846 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M9.38574 11.8746L11.2777 13.7696L15.1757 9.86963" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>                            
                            {{ session('success') }}
                        </span>
                    </div>
                @endif

                @if (session('fail'))
                    <div class="alert bg-danger text-white alert-dismissible">
                        <span>
                            <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9852 21.606C11.9852 21.606 19.6572 19.283 19.6572 12.879C19.6572 6.474 19.9352 5.974 19.3192 5.358C18.7042 4.742 12.9912 2.75 11.9852 2.75C10.9792 2.75 5.26616 4.742 4.65016 5.358C4.03516 5.974 4.31316 6.474 4.31316 12.879C4.31316 19.283 11.9852 21.606 11.9852 21.606Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M13.864 13.8249L10.106 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M10.106 13.8249L13.864 10.0669" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                            {{ session('fail') }}
                        </span>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="comment-area mt-3">
                    <ul class="post-comments p-0 list-inline">
                        @foreach ($detailChat as $item)
                            <li class="mb-3">
                                <div class="d-flex flex-wrap">
                                    <div class="user-img">
                                        <img src="@if($item->user->foto_user == null){{ asset('foto_user/default1.jpg') }}@else{{ asset('foto_user/'.$item->user->foto_user) }}@endif" alt="userimg" class="p-1 bg-soft-primary avatar-60 rounded-circle img-fluid">
                                    </div>
                                    <div class="comment-data-block ms-3">
                                        <h6 class="mb-2">
                                            {{$item->user->nama_user}} - <small>{{date('d F Y | H:i', strtotime($item->created_at))}}</small>
                                            @if ($item->id_user == Session()->get('id_user'))
                                                <span class="btn-inner btn-outline-danger btn-delete" style="cursor: pointer;">
                                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                                        <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path d="M14.2118 12.1893H9.78879" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </span>
                                            @endif
                                        </h6>
                                        <p class="text-muted">{{$item->isi_chat}}</p>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <form action="{{url('/tambah-chat')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_chat" value="{{ $chat->id_chat }}">
                    <textarea name="chat" id="chat" class="form-control" rows="2" placeholder="Ketik Pesan ..."></textarea>
                    <div class="text-end mt-3">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
