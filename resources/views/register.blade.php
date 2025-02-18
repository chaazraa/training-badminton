<!-- resources/views/register.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f5f5f5;
        }
        .form-container {
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            text-align: left;
        }
        h1 {
            font-size: 28px;
            text-align: center;
            color: #4a4a4a;
        }
        label {
            font-weight: bold;
            margin: 10px 0 5px;
        }
        input, select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f7f7f7;
        }
        button {
            width: 100%;
            padding: 14px;
            background-color: #4a4a4a;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Pendaftaran Peserta Pelatihan</h1>

        <form action="{{ route('registrations.store') }}" method="POST">
            @csrf

            <label for="nama">Nama Peserta:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="id_peserta">ID Peserta:</label>
            <input type="text" name="id_peserta" id="id_peserta" required>

            <label for="id_jadwal">Pilih Jadwal:</label>
            <select name="id_jadwal" id="id_jadwal" required>
                @foreach($schedules as $schedule)
                    <option value="{{ $schedule->id }}">{{ $schedule->tanggal }} - {{ $schedule->waktu_mulai }} s/d {{ $schedule->waktu_selesai }}</option>
                @endforeach
            </sele
