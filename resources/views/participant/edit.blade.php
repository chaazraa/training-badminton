<!-- resources/views/participant/edit.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta</title>
    <style>
        /* Styling sederhana untuk form */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="datetime-local"], button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit Peserta</h1>

        <form action="{{ route('participant.update', $participant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Nama Peserta</label>
            <input type="text" name="name" id="name" value="{{ $participant->name }}" required>

            <label for="id_peserta">ID Peserta</label>
            <input type="text" name="id_peserta" id="id_peserta" value="{{ $participant->id_peserta }}" required>

            <label for="jadwal">Jadwal</label>
            <input type="datetime-local" name="jadwal" id="jadwal" value="{{ \Carbon\Carbon::parse($participant->jadwal)->format('Y-m-d\TH:i') }}" required>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
