@extends('layout.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12 d-flex justify-content-center">
        <div class="card" style="border: 2px solid #ccc; padding: 20px; display: inline-block;">
            <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQj5GSW_1hWscXuLDzA5_b9cEW-byjwYUxgyfe9LvutnK9_GLgvhPCjg4KtQIaZuQ/embed?start=false&loop=false&delayms=3000"  
                    frameborder="0" 
                    width="1280" 
                    height="749" 
                    allowfullscreen="true" 
                    mozallowfullscreen="true" 
                    webkitallowfullscreen="true"></iframe>
        </div>
    </div>
</div>
@endsection



<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/LOGO INFRA 2 BLUE.ico') }}" type="image/x-icon">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .header {
            background-color: #f5f5f5;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header h1 {
            font-size: 1.5em;
            margin: 0;
            text-align: center;
            flex: 1; /* Membuat h1 mengambil ruang yang tersisa */
             color: #000080; 
        }

        .logo {
            height: 90px;
            margin-right: 20px;
        }

        .profile-menu {
            position: relative; /* Ubah dari absolute ke relative */
            display: inline-block;
        }

        .profile-menu img {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .profile-dropdown {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            overflow: hidden;
            transition: all 0.3s ease;
            width: 250px;
        }

        .profile-dropdown.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }
        
        .profile-dropdown a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        
        .profile-dropdown a:hover {
            background-color: #3498db;
            color: white;
        }
        
        .profile-dropdown .profile-header {
            padding: 15px 20px;
            background-color: #f1f1f1;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .profile-dropdown .profile-header h3 {
            margin: 0;
            font-size: 16px;
            color: #333;
        }
        
        .profile-dropdown .profile-footer {
            padding: 10px 20px;
            background-color: #f9f9f9;
            border-top: 1px solid #e0e0e0;
            text-align: center;
        }
        
        .profile-dropdown .profile-footer a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
       
       .container {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding: 20px;
            color: #fff;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }

        .sidebar h2 {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
            margin-bottom: 10px;
        }

        .sidebar a:hover {
            background-color: #34495e;
            transform: translateX(5px);
        }


        .menu-item {
            width: 100%;
            background: none;
            color: #fff;
            text-align: left;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background 0.3s, transform 0.3s;
            cursor: pointer;
        }

        .menu-item:hover {
            background-color: #34495e;
            transform: translateX(5px);
        }

        .logout {
            background-color: #e74c3c;
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
            cursor: pointer;
            border: none;
            color: #fff;
            width: 80%;
        }

        .logout:hover {
            background-color: #c0392b;
            transform: translateY(-5px);
        }

        .content {
            margin-left: 40px;
            margin-right: 330px;
            padding: 20px;
            flex: 1;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            margin-top: 0;
        }

        .chart {
            width: 100%;
            height: 400px;
            background-color: #ecf0f1;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #95a5a6;
        }

        .footer {
            background-color: #2c3e50;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }

        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); 
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: none;
            border-radius: 10px;
            width: 80%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }

        .modal-title {
            margin: 0;
            line-height: 1.5;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            padding: 1rem;
            border-top: 1px solid #dee2e6;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
    </style>
 <script>
        function loadContent(contentType) {
            const contentDiv = document.querySelector('.content');
            if (contentType === 'overview') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <h3>Overview</h3>
                        <div class="chart">Chart Area</div>
                    </div>
                `;
            } else if (contentType === 'akhlak') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQj5GSW_1hWscXuLDzA5_b9cEW-byjwYUxgyfe9LvutnK9_GLgvhPCjg4KtQIaZuQ/embed?start=true&loop=true&delayms=3000" frameborder="0" width="1280" height="749" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    </div>
                `;
            } else if (contentType === 'default') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <iframe src="https://docs.google.com/presentation/d/e/2PACX-1vQqPZ6uqlZiGiGPeAiQMjmqKkdYkHPZcUNmU1Xds3M1Z_IAfHrR9t6OPAydMr1b2w/embed?start=true&loop=true&delayms=3000" frameborder="0" width="1280" height="749" allowfullscreen="true" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>
                    </div>
                `;
            } else if (contentType === 'dashboard') {
                contentDiv.innerHTML = `
                    <div class="card">
                        <iframe class="trello-embed" src="https://trello.com/b/KVXIYC4t.html" frameborder="0" width="100%" height="600" scrolling="no" allowtransparency="true"></iframe>
                    </div>
                `;
                        }
        }

        function toggleProfileDropdown() {
            const dropdown = document.querySelector('.profile-dropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        function showLogoutModal() {
            document.getElementById('logoutModal').style.display = 'block';
        }

        function closeLogoutModal() {
            document.getElementById('logoutModal').style.display = 'none';
        }

        function editRow(button) {
            // Implement edit functionality here
            alert('Edit functionality not yet implemented.');
        }

        function deleteRow(button) {
            // Implement delete functionality here
            alert('Delete functionality not yet implemented.');
        }

        window.onclick = function(event) {
            if (!event.target.matches('.profile-menu img')) {
                const dropdowns = document.getElementsByClassName("profile-dropdown");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        }
    </script>

</head>

<body onload="loadContent('default')">
    <div class="header">
        <img src="{{ asset('image/Kupu.png') }}" alt="Logo" class="logo">
        <img src="{{ asset('image/INFRA 2.png') }}" alt="Logo" class="logo">
        <h1>TRANSFORMATION SPACE</h1>
        <div class="profile-menu">
            <img src="@if ($user->foto_user === null) {{ asset('foto_user/default1.jpg') }} @else {{ asset('foto_user/' . $user->foto_user) }} @endif" alt="User-Profile" class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded" onclick="toggleProfileDropdown()">
            <div class="profile-dropdown">
                <a href="/profil">Profil</a>
                <a href="/ubah-password">Ubah Password</a>
                 <a href="/logout">Logout</a>
            </div>
        </div>
    </div>
     <div class="container">
        <div class="sidebar">
            <h2>Menu</h2>
            <a onclick="loadContent('default')">Change Leader Program</a>
            <a onclick="loadContent('overview')">Dashboard Change Leader</a>
            <a onclick="loadContent('akhlak')">Panduan Spesifikasi Akhlak</a>
            <a href="/daftar-akhlak">Perilaku Spesifik Akhlak</a>
            <a onclick="showLogoutModal()" class="logout">Logout</a>
        </div>
        <div class="content"></div>
    </div>
   <div id="logoutModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Logout</h5>
                <button type="button" class="btn-close" onclick="closeLogoutModal()">&times;</button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin akan logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="closeLogoutModal()">Batal</button>
                <a href="/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>

    <div class="footer">
        <div class="copyright">
            &copy; 2024 Transformation Space. All rights reserved.
        </div>
    </div>
</body>
</html> -->