<!-- resources/views/schedule/create.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Pelatihan</title>

    <style>
        /* Perpaduan gradasi abu-abu */
        body {
            background: linear-gradient(135deg, #d3d3d3, #a6a6a6);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            width: 100%;
            text-align: left;
        }

        h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
            color: #4a4a4a;
        }

        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f7f7f7;
        }

        button {
            width: 100%;
            background: #666666;
            color: white;
            padding: 14px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background: #4a4a4a;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #4a4a4a;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Jadwal Baru</h1>

        <form action="{{ route('schedules.store') }}" method="POST">
            @csrf
            <label for="tanggal">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="waktu_mulai">Waktu Mulai:</label>
            <input type="time" name="waktu_mulai" id="waktu_mulai" required>

            <label for="waktu_selesai">Waktu Selesai:</label>
            <input type="time" name="waktu_selesai" id="waktu_selesai" required>

            <label for="id_peserta">ID Peserta:</label>
            <input type="text" name="id_peserta" id="id_peserta" required>

            <label for="id_pelatih">ID Pelatih:</label>
            <input type="text" name="id_pelatih" id="id_pelatih" required>

            <label for="lokasi">Lokasi:</label>
            <input type="text" name="lokasi" id="lokasi" required>

            <label for="keterangan">Keterangan:</label>
            <textarea name="keterangan" id="keterangan" placeholder="Opsional..."></textarea>

            <button type="submit">Simpan</button>
        </form>

        <a href="{{ route('schedules.index') }}">Kembali ke Daftar Jadwal</a>
    </div>
</body>
</html>
