<!-- resources/views/schedule/show.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jadwal Pelatihan</title>
</head>
<body>
    <h1>Detail Jadwal</h1>

    <p><strong>Tanggal:</strong> {{ $schedule->tanggal }}</p>
    <p><strong>Waktu:</strong> {{ $schedule->waktu_mulai }} - {{ $schedule->waktu_selesai }}</p>
    <p><strong>ID Peserta:</strong> {{ $schedule->nama_peserta }}</p>
    <input type="text" name="id_peserta" placeholder="ID Peserta" required>
    <p><strong>ID Pelatih:</strong> {{ $schedule->id_pelatih }}</p> 
    <input type="text" name="id_pelatih" placeholder="ID Pelatih" required>
    <p><strong>Lokasi:</strong> {{ $schedule->lokasi }}</p>
    <p><strong>Keterangan:</strong> {{ $schedule->keterangan }}</p>
    
    <a href="{{ route('schedules.index') }}">Kembali ke Daftar Jadwal</a>
</body>
</html>
