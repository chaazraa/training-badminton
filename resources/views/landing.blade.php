<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Badminton | Alviza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(0, 77, 155);
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            text-align: center;
            padding: 50px 20px;
        }
        .hero {
            background: url('https://source.unsplash.com/1600x900/?badminton') no-repeat center center/cover;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            flex-direction: column;
        }
        .hero h1 {
            font-size: 3rem;
            margin: 0;
        }
        .hero p {
            font-size: 1.2rem;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a {
            text-decoration: none;
            margin: 10px;
        }
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .info-section {
            padding: 40px 20px;
            background: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Selamat Datang di Alviza Training Badminton</h1>
        <p>Latihan profesional untuk meningkatkan skill dan performa Anda!</p>
        <div class="buttons">
            <a href="{{ route('login') }}"><button class="btn">Login</button></a>
            <a href="{{ route('register') }}"><button class="btn">Buat Akun</button></a>
        </div>
    </div>
    
    <div class="info-section">
        <h2>Jelajahi Pelatihan Kami</h2>
        <p>Temukan jadwal latihan dan pelatih terbaik untuk mendukung perkembangan Anda.</p>
        <div class="buttons">
            <a href="{{ route('schedules.index') }}"><button class="btn">Lihat Jadwal</button></a>
            <a href="{{ route('coaches.index') }}"><button class="btn">Lihat Pelatih</button></a>
        </div>
    </div>
</body>
</html>