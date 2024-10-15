@extends('auth.main')

@section('content')
<div class="login-main" style="
    position: absolute; /* Menggunakan posisi absolut untuk menutupi seluruh layar */
    top: 0; 
    left: 0; 
    right: 0; 
    bottom: 0; 
    display: flex; 
    justify-content: center; 
    align-items: center; 
    margin: 0; /* Menghilangkan margin */
    padding: 0; /* Menghilangkan padding */
    background-image: url('image/cover.jpeg'); /* Ganti path ini dengan path yang benar */
    background-size: cover; /* Mengatur gambar agar memenuhi area */
    background-position: center; /* Memusatkan gambar */
    background-repeat: no-repeat; /* Menghindari pengulangan gambar */
    width: 100%; /* Memastikan lebar 100% */
">
    <form class="theme-form" action="/login" method="POST" style="
        background: rgba(255, 255, 255, 0.6); 
        padding: 30px; 
        border-radius: 25px; 
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        z-index: 1; /* Pastikan form ditampilkan di atas gambar */
    ">
        @csrf
        <p class="text-center mx-auto my-0" style="color: black">Hallo Sobat Infra,</p> 
        <p class="text-center" style="color: black">Selamat Datang di Aplikasi WIDER
            <br>Infrastructure 2 Division
        </p>
        <div class="form-group">
            <label for="nip">NIP</label>
            <input class="form-control" type="text" name="nip" id="nip" required placeholder="Masukkan NIP Anda..." style="background-color: white; color: black;">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="login[password]" id="password" required placeholder="Masukkan Password Anda..." style="background-color: white; color: black;">
        </div>
        <div class="form-group mb-0 mt-4">
            <div class="text-center mt-3">
                <button class="btn btn-primary" type="submit">Sign in</button>
            </div>
        </div>
    </form>
</div>
@endsection
