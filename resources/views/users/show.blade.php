<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Management')</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1e3d5b;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        @extends('layouts.app')

@section('title', 'User Details')

@section('content')
<div class="container">
    <h1 class="text-center">User Detail</h1>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Nama: {{ $user->name }}</h4>
            <p class="card-text">Email: {{ $user->email }}</p>
            <p class="card-text">Role: {{ $user->role }}</p>
            <p class="card-text">Gender: {{ $user->gender }}</p>
            <p class="card-text">Alamat: {{ $user->address }}</p>
            <p class="card-text">Tempat Lahir: {{ $user->birth_place }}</p>
            <p class="card-text">Tanggal Lahir: {{ $user->birth_date }}</p>
            <p class="card-text">Pengalaman: {{ $user->experience }}</p>
            
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection

        @yield('content')
    </div>
</body>
</html>
