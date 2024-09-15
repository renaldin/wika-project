@extends('layout.main')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <h4 class="mb-0">{{$subTitle}}</h4>
                </div>
            </div>
        </div>
    </div>
</div>            
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="card-title mb-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="" class="d-flex" id="filterProyekCalendar">
                                <select class="form-control selectpicker" style="height: 38px; margin-top: 10px;" name="keyword" id="keyword" data-live-search="true">
                                    <option value="">--Pilih Proyek--</option>
                                    @foreach ($daftarProyek as $item)
                                        <option value="{{$item->id_proyek}}">{{$item->nama_proyek}}</option>
                                    @endforeach
                                </select>
                                {{-- <button type="submit" class="btn btn-primary ml-2" style="height: 38px; display: flex; justify-content: center; align-items: center;">Filter</button> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>            
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card  ">
                    <div class="card-body">
                        <div id="calendar2" class="calendar-s"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection