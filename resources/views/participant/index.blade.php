<!-- resources/views/participant/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peserta</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Daftar Peserta</h1>

    <!-- Menampilkan pesan sukses -->
    @if(session('success'))
        <div style="color: green; font-weight: bold; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Peserta</th>
                <th>ID Peserta</th>
                <th>Jadwal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($participants as $participant)
                <tr>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->id_peserta }}</td>
                    <td>{{ $participant->jadwal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
