<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>➕ Tambah Jadwal Pelatihan</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --purple-light: #a78bfa;
            --purple-dark: #6d28d9;
            --blue-light: #60a5fa;
            --blue-dark: #3b82f6;
            --dark-primary: #1e293b;
            --dark-secondary: #334155;
            --light-text: #f8fafc;
            --error-red: #f87171;
        }

        body {
            background: linear-gradient(135deg, var(--dark-primary), var(--dark-secondary));
            font-family: 'Nunito', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: var(--light-text);
            padding: 30px;
            box-sizing: border-box;
        }

        .form-container {
            background-color: rgba(30, 41, 59, 0.8);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            max-width: 480px;
            width: 100%;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
        }

        h1 {
            text-align: center;
            font-size: 2.2em;
            margin-bottom: 35px;
            color: var(--purple-light);
            font-weight: 700;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        h1::before {
            content: "📅";
            margin-right: 15px;
            font-size: 1.2em;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #cbd5e1;
            font-size: 0.95em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        label::before {
            font-size: 1.1em;
        }

        label[for="tanggal"]::before { content: "📆"; }
        label[for="waktu_mulai"]::before { content: "⏰"; }
        label[for="waktu_selesai"]::before { content: "🕒"; }
        label[for="user_id"]::before { content: "👤"; }
        label[for="coach_id"]::before { content: "🏋️"; }
        label[for="lokasi"]::before { content: "📍"; }
        label[for="keterangan"]::before { content: "📝"; }

        input[type="date"],
        input[type="time"],
        input[type="text"],
        select,
        textarea {
            width: calc(100% - 24px);
            padding: 14px 12px;
            margin-bottom: 25px;
            border: 1px solid rgba(192, 132, 252, 0.3);
            border-radius: 10px;
            background-color: rgba(15, 23, 42, 0.5);
            color: var(--light-text);
            box-sizing: border-box;
            font-size: 16px;
            font-family: 'Nunito', sans-serif;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--purple-light);
            box-shadow: 0 0 0 3px rgba(167, 139, 250, 0.2);
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
            opacity: 0.7;
        }

        input[type="date"],
        input[type="time"],
        select {
            height: 48px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button {
            background: linear-gradient(135deg, var(--purple-light), var(--blue-light));
            color: white;
            padding: 16px 24px;
            border: none;
            border-radius: 50px;
            font-size: 17px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            box-sizing: border-box;
            box-shadow: 0 4px 15px rgba(53, 47, 71, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        button::before {
            content: "💾";
            font-size: 1.2em;
        }

        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(167, 139, 250, 0.4);
        }

        a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s ease;
            gap: 5px;
            width: 100%;
            padding: 10px;
            border-radius: 50px;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        a::before {
            content: "↩️";
            transition: transform 0.3s ease;
        }

        a:hover {
            color: var(--purple-light);
            border-color: var(--purple-light);
        }

        a:hover::before {
            transform: translateX(-5px);
        }

        .text-danger {
            color: var(--error-red);
            font-size: 0.85em;
            margin-top: -20px;
            margin-bottom: 20px;
            display: block;
        }

        select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23a78bfa'%3e%3cpath d='M7 10l5 5 5-5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Tambah Jadwal Baru</h1>

        <form action="{{ route('admin.schedules.store') }}" method="POST">
            @csrf
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" required>

            <label for="waktu_mulai">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" id="waktu_mulai" required>

            <label for="waktu_selesai">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" id="waktu_selesai" required>

            <label for="user_id">User</label>
            <select name="user_id" id="user_id" required>
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="coach_id">Coach</label>
            <select name="coach_id" id="coach_id" required>
                <option value="">Pilih Coach</option>
                @foreach($coaches as $coach)
                    <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                @endforeach
            </select>
            @error('coach_id') <span class="text-danger">{{ $message }}</span> @enderror

            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" required placeholder="Masukkan lokasi">

            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" placeholder="Catatan (opsional)"></textarea>

            <button type="submit">
                <span></span> Simpan
            </button>
        </form>

        <a href="{{ route('admin.schedules.index') }}">
            <span></span> Kembali ke Daftar Jadwal
        </a>
    </div>
</body>
</html>