<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadwal Pelatihan Badminton</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif; /* Font yang lebih modern */
            padding: 30px;
            background-color: #f4f6f8; /* Warna latar belakang yang lebih lembut */
            color: #343a40; /* Warna teks utama yang lebih gelap */
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            box-sizing: border-box; /* Memastikan padding tidak mempengaruhi lebar elemen */
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff; /* Warna utama yang lebih cerah */
        }

        table {
            width: 95%; /* Lebar tabel sedikit lebih lebar */
            max-width: 1200px; /* Batas lebar maksimum tabel */
            border-collapse: collapse;
            background: #fff;
            color: #495057; /* Warna teks tabel */
            border-radius: 12px; /* Sudut tabel yang lebih melengkung */
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1); /* Efek bayangan yang lebih halus */
            table-layout: fixed;
            word-wrap: break-word;
            margin-bottom: 30px; /* Ruang bawah tabel */
        }

        thead {
            background-color: #007bff; /* Warna latar belakang header tabel */
            color: #fff;
        }

        th, td {
            padding: 18px 15px; /* Padding sel yang lebih besar */
            text-align: left;
            border-bottom: 1px solid #e0e0e0; /* Garis pemisah sel yang lebih terang */
            word-wrap: break-word;
            white-space: normal;
        }

        th {
            font-weight: 600;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa; /* Warna latar belakang baris genap yang sedikit berbeda */
        }

        tbody tr:hover {
            background-color: #e9ecef; /* Efek hover yang lebih lembut */
            transition: background-color 0.2s ease-in-out; /* Transisi hover yang halus */
        }

        a, button {
            background-color: #28a745; /* Warna tombol yang lebih menarik */
            color: white;
            padding: 10px 15px; /* Padding tombol yang lebih baik */
            text-decoration: none;
            border: none;
            border-radius: 8px; /* Sudut tombol yang lebih melengkung */
            cursor: pointer;
            font-weight: 500;
            display: inline-block;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover, button:hover {
            background-color: #218838; /* Efek hover tombol yang lebih gelap */
        }

        .success-message {
            color: #198754; /* Warna pesan sukses yang lebih jelas */
            background-color: #d1e7dd; /* Latar belakang pesan sukses */
            border: 1px solid #badbcc; /* Border pesan sukses */
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            gap: 5px; /* Jarak antar tombol aksi */
            align-items: center;
        }

        .action-buttons form {
            margin: 0; /* Menghilangkan margin form agar sejajar dengan link */
        }

        .action-buttons button {
            background-color: #dc3545; /* Warna tombol hapus yang berbeda */
        }

        .action-buttons button:hover {
            background-color: #c82333;
        }

        .create-button {
            background-color: #007bff; /* Warna tombol tambah yang sama dengan header */
            margin-top: 30px;
        }

        .create-button:hover {
            background-color: #0056b3;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Daftar Jadwal Pelatihan Badminton</h1>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Nama Peserta</th>
                <th>Nama Pelatih</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($schedule->tanggal)->isoFormat('D MMMM Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->waktu_selesai)->format('H:i') }}</td>
                    <td>{{ $schedule->user->name}}</td>
                    <td>{{ $schedule->coach->name}}</td>
                    <td>{{ $schedule->lokasi }}</td>
                    <td>{{ $schedule->keterangan }}</td>
                    <td class="action-buttons">
                        <a href="{{ route('schedules.show', $schedule->id) }}">Detail</a>
                        <a href="{{ route('schedules.edit', $schedule->id) }}">Edit</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('schedules.create') }}" class="create-button">Tambah Jadwal Baru</a>
</body>
</html>