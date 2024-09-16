@extends('auth.main')

@section('content')
<div class="login-main"> 
    <form class="theme-form" action="/login" method="POST">
        @csrf
      <h4>Hallo Sobat Infra!</h4>
      <p>Selamat Datang di Aplikasi WIDER Infrastructure 2 Division</p>
      @if (Session('success'))
        <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
          {{Session('success')}}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      @if (Session('fail'))
        <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
          {{Session('fail')}}
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      <div class="form-group">
        <label class="col-form-label">NIP</label>
        <input class="form-control" type="text" name="nip" id="nip" required placeholder="Masukkan NIP Anda...">
      </div>
      <div class="form-group">
        <label class="col-form-label">Password </label>
        <div class="form-input position-relative">
          <input class="form-control" type="password" name="login[password]" id="password" required placeholder="Masukkan Password Anda...">
          <div class="show-hide"> <span class="show"></span></div>
        </div>
      </div>
      <div class="form-group mb-0 mt-4">
        <div class="text-center mt-3">
          <button class="btn btn-primary" type="submit">Sign in</button>
        </div>
      </div>
    </form>
</div>
@endsection
