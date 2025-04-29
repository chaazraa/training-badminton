<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Pelatihan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1E3A5F;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            text-align: center;
        }
        .container {
            background: #2C5F8A;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            width: 90%;
            max-width: 600px;
            text-align: left;
        }
        h1 {
            text-align: center;
            color: #E1EAF2;
        }
        label, input, textarea, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        input, textarea {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4A90E2;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #357ABD;
        }
        a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #4A90E2;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #357ABD;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Jadwal</h1>
        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="{{ $schedule->tanggal }}" required>

            <label for="waktu_mulai">Waktu Mulai</label>
            <input type="time" id="waktu_mulai" name="waktu_mulai" value="{{ $schedule->waktu_mulai }}" required>

            <label for="waktu_selesai">Waktu Selesai</label>
            <input type="time" id="waktu_selesai" name="waktu_selesai" value="{{ $schedule->waktu_selesai }}" required>

            <label for="user_id">User</label> <!-- Ganti id_peserta menjadi user_id -->
            <input type="text" id="user_id" name="user_id" value="{{ $schedule->user_id }}" required>

            <label for="coach_id">Coach</label> <!-- Ganti id_pelatih menjadi coach_id -->
            <input type="text" id="coach_id" name="coach_id" value="{{ $schedule->coach_id }}" required>

            <label for="lokasi">Lokasi</label>
            <input type="text" id="lokasi" name="lokasi" value="{{ $schedule->lokasi }}" required>

            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" required>{{ $schedule->keterangan }}</textarea>

            <button type="submit">Perbarui</button>
        </form>
        <a href="{{ route('schedules.index') }}">Kembali ke Daftar Jadwal</a>
    </div>
</body>
</html>
