<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Jadwal Pelatihan Badminton</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a2463, #3e5c76);
            margin: 0;
            padding: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }

        .container {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 1200px;
            position: relative;
            overflow: hidden;
        }

        .container:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(to right, #457b9d, #a8dadc);
        }

        h1 {
            color: #1d3557;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            position: relative;
        }

        h1:after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(to right, #457b9d, #a8dadc);
            border-radius: 2px;
        }

        .success-message {
            color: #198754;
            background-color: #d1e7dd;
            border: 1px solid #badbcc;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            width: 100%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }

        thead {
            background: linear-gradient(to right, #457b9d, #1d3557);
            color: #fff;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }

        th {
            font-weight: 600;
            color: #fff;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e9f7fe;
            transition: background-color 0.2s ease;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            gap: 5px;
        }

        .btn-detail {
            background-color: #17a2b8;
            color: white;
            border: none;
        }

        .btn-detail:hover {
            background-color: #138496;
            transform: translateY(-2px);
        }

        .btn-edit {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-edit:hover {
            background-color: #e0a800;
            transform: translateY(-2px);
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background-color: #c82333;
            transform: translateY(-2px);
        }

        .create-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 25px;
            background: linear-gradient(to right, #457b9d, #1d3557);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            gap: 8px;
            transition: all 0.3s ease;
            text-decoration: none;
            margin-top: 20px;
        }

        .create-button:hover {
            background: linear-gradient(to right, #1d3557, #457b9d);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(29, 53, 87, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📅 Daftar Jadwal Pelatihan Badminton</h1>

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
                        <td>{{ $schedule->user->name }}</td>
                        <td>{{ $schedule->coach->name }}</td>
                        <td>{{ $schedule->lokasi }}</td>
                        <td>{{ $schedule->keterangan }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('admin.schedules.show', $schedule->id) }}" class="btn btn-detail">
                                <span>🔍</span> Detail
                            </a>
                            <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="btn btn-edit">
                                <span>✏️</span> Edit
                            </a>
                            <form action="{{ route('admin.schedules.destroy', $schedule->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                    <span>🗑️</span> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('admin.schedules.create') }}" class="create-button">
            <span>➕</span> Tambah Jadwal Baru
        </a>
    </div>
</body>
</html>