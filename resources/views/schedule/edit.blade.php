<!-- resources/views/schedule/edit.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Pelatihan</title>
</head>
<body>
    <h1>Edit Jadwal</h1>

    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="{{ $schedule->tanggal }}" required><br>

        <label>Waktu Mulai:</label>
        <input type="time" name="waktu_mulai" value="{{ $schedule->waktu_mulai }}" required><br>

        <label>Waktu Selesai:</label>
        <input type="time" name="waktu_selesai" value="{{ $schedule->waktu_selesai }}" required><br>

        <label>Nama Peserta:</label>
        <input type="text" name="id_peserta" value="{{ $schedule->id_peserta }}" required><br>

        <label>ID Pelatih:</label>
        <input type="text" name="id_pelatih" value="{{ $schedule->id_pelatih }}" required><br>

        <label>Lokasi:</label>
        <input type="text" name="lokasi" value="{{ $schedule->lokasi }}" required><br>

        <label>Keterangan:</label>
        <textarea name="keterangan">{{ $schedule->keterangan }}</textarea><br>

        <button type="submit">Perbarui</button>
    </form>

    <a href="{{ route('schedules.index') }}">Kembali ke Daftar Jadwal</a>
</body>
</html>
