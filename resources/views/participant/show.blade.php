<!-- resources/views/participant/show.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            width: 50%;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .btn-back {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detail Peserta</h1>
    <table>
        <tr>
            <th>Nama Peserta</th>
            <td>{{ $participant->name }}</td>
        </tr>
        <tr>
            <th>ID Peserta</th>
            <td>{{ $participant->id_peserta }}</td>
        </tr>
        <tr>
            <th>Jadwal</th>
            <td>{{ $participant->jadwal }}</td>
        </tr>
    </table>

    <!-- Tombol Kembali -->
    <a href="{{ route('participant.index') }}" class="btn-back">Kembali ke Daftar</a>
</div>

</body>
</html>
 