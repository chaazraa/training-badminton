<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadwal Pelatihan Badminton</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #2c3e50;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #ecf0f1;
        }

        table {
            width: 90%;
            max-width: 1000px;
            border-collapse: collapse;
            background: #fff;
            color: #333;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
            table-layout: fixed;
            word-wrap: break-word;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
            white-space: normal;
        }

        th {
            background-color:rgb(5, 82, 133);
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background-color: #d5e8f5;
        }

        a, button {
            background-color:rgb(106, 119, 148);
            color: white;
            padding: 8px 10px;
            text-decoration: none;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            display: inline-block;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover, button:hover {
            background-color:rgb(82, 98, 134);
        }

        .success-message {
            color:rgb(92, 158, 158);
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Daftar Jadwal Pelatihan</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Id Peserta</th>
                <th>Id Pelatih</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->tanggal }}</td>
                    <td>{{ $schedule->waktu_mulai }} - {{ $schedule->waktu_selesai }}</td>
                    <td>{{ $schedule->id_peserta }}</td>
                    <td>{{ $schedule->id_pelatih }}</td>
                    <td>{{ $schedule->lokasi }}</td>
                    <td>{{ $schedule->keterangan }}</td>
                    <td>
                        <a href="{{ route('schedules.show', $schedule->id) }}">Detail</a> |
                        <a href="{{ route('schedules.edit', $schedule->id) }}">Edit</a> |
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('schedules.create') }}" style="margin-top: 20px;" class="create-button">Tambah Jadwal Baru</a>
</body>
</html>
