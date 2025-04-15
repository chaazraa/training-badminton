<!-- resources/views/schedule/show.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jadwal Pelatihan</title>
    <style>
        /* Styling body dengan gradasi biru tua ke biru muda */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #2c3e50, #3498db); /* Gradasi biru tua ke biru muda */
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
        }

        /* Styling untuk judul */
        h1 {
            color:  #2c3e50; /* Warna putih agar kontras dengan latar belakang */
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        /* Styling container untuk detail jadwal */
        .container {
            background: rgba(255, 255, 255, 0.9); /* Transparansi untuk kotak */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 600px;
            margin: 20px;
        }

        /* Styling untuk setiap paragraf */
        p {
            margin: 15px 0;
            font-size: 1.1rem;
            text-align: left; /* Agar teks lebih rapi dan sesuai dengan input */
        }

        /* Styling untuk input field */
        input {
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            width: 100%;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        /* Gaya input ketika dipilih */
        input[type="text"]:focus {
            outline: none;
            border-color: #2980b9;
        }

        /* Styling untuk link */
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #2980b9; /* Biru tua */
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #1c5f76; /* Biru lebih gelap saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Jadwal</h1>
        <p><strong>Tanggal :</strong> {{ $schedule->tanggal }}</p>
        <p><strong>Waktu :</strong> {{ $schedule->waktu_mulai }} - {{ $schedule->waktu_selesai }}</p>
        <p><strong>ID Peserta :</strong> {{ $schedule->id_peserta }}</p>
        <p><strong>ID Pelatih :</strong> {{ $schedule->id_pelatih }}</p> 
        <p><strong>Lokasi :</strong> {{ $schedule->lokasi }}</p>
        <p><strong>Keterangan :</strong> {{ $schedule->keterangan }}</p>

        <a href="{{ route('schedules.index') }}">Kembali ke Daftar Jadwal</a>
    </div>
</body>
</html>
