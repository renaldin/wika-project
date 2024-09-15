@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{$subTitle}}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="@if($form == 'Tambah')/tambah-task @else/edit-task/{{$detail->id_task}}@endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            @csrf
                            <div class="form-group col-md-6">
                                <label class="form-label" for="item_task">Item Task</label>
                                <input type="text" class="form-control @error('item_task') is-invalid @enderror" @if($form == 'Tambah') value="{{old('item_task')}}" @else value="{{$detail->item_task}}" @endif id="item_task" name="item_task" @if($form == 'Detail' || Session()->get('role') == 'Manajemen') disabled @endif placeholder="Masukkan Item Task" required>
                                @error('item_task')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="timeline">Timeline</label>
                                <input type="datetime-local" class="form-control @error('timeline') is-invalid @enderror" @if($form == 'Tambah') value="{{old('timeline')}}" @else value="{{$detail->timeline}}" @endif id="timeline" name="timeline" @if($form == 'Detail' || Session()->get('role') == 'Manajemen') disabled @endif placeholder="Masukkan Timeline" required>
                                @error('timeline')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="status">Status</label>
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" @if($form == 'Detail' || Session()->get('role') == 'Manajemen') disabled @endif required>
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="Start" @if($form == "Tambah" && old("status") == "Start") selected @elseif($form == "Edit" && $detail->status == "Start") selected @elseif($form == "Detail" && $detail->status == "Start") selected @endif>Start</option>
                                    <option value="Working on it" @if($form == "Tambah" && old("status") == "Working on it") selected @elseif($form == "Edit" && $detail->status == "Working on it") selected @elseif($form == "Detail" && $detail->status == "Working on it") selected @endif>Working on it</option>
                                    <option value="Done" @if($form == "Tambah" && old("status") == "Done") selected @elseif($form == "Edit" && $detail->status == "Done") selected @elseif($form == "Detail" && $detail->status == "Done") selected @endif>Done</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="file">File <small class="text-danger text-small">* pdf</small></label>
                                <input type="file" class="form-control @error('file') is-invalid @enderror" id="preview_image" name="file" placeholder="Masukkan file" @if($form == 'Detail' || Session()->get('role') == 'Manajemen') disabled @endif>
                                @error('file')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @if ($form == 'Edit' && Session()->get('role') == 'Manajemen')
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="item_task">Komentar</label>
                                    <textarea class="form-control" name="komentar" id="komentar" cols="15" rows="5" placeholder="Masukkan Komentar">{{$detail->komentar}}</textarea>
                                </div>
                            @endif
                            @if ($form == 'Detail')
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="id_user">Manajemen</label>
                                    <input type="text" class="form-control @error('id_user') is-invalid @enderror" @if($detail->manajemen && $detail->manajemen->nama_user) value="{{$detail->manajemen->nama_user}}" @else value="Belum Ada Komentar" @endif id="id_user" name="id_user" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label" for="item_task">Komentar</label>
                                    <textarea class="form-control" name="komentar" id="komentar" cols="15" rows="5" disabled>@if($detail->komentar){{$detail->komentar}}@else Belum Ada Komentar @endif</textarea>
                                </div>
                            @endif
                            @if ($form != 'Tambah' && $detail->file)
                                <div class="col-md-12">
                                    <iframe src="{{ asset("task/$detail->file") }}" width="100%" height="400" frameborder="0"></iframe>
                                </div>
                            @endif
                        </div>
                        {{-- Component: tombolForm --}}
                        @include('components.tombolForm', ['linkKembali' => '/daftar-task'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection