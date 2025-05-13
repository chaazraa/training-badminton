<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jadwal Pelatihan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a2463, #3e5c76);
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
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
            max-width: 600px;
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
        .edit-form {
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #457b9d;
            font-weight: 600;
            font-size: 16px;
        }
        input, textarea, select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #a8dadc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #457b9d;
            box-shadow: 0 0 0 3px rgba(69, 123, 157, 0.2);
        }
        textarea {
            min-height: 100px;
            resize: vertical;
        }
        .submit-btn {
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
            width: 100%;
            margin-top: 10px;
        }
        .submit-btn:hover {
            background: linear-gradient(to right, #1d3557, #457b9d);
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(29, 53, 87, 0.3);
        }
        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #457b9d;
            font-weight: 600;
            text-decoration: none;
            gap: 5px;
            transition: all 0.2s ease;
            padding: 10px 15px;
            border-radius: 50px;
            background-color: #f1f9ff;
        }
        .back-link:hover {
            color: #1d3557;
            text-decoration: none;
            background-color: #e1f0ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>✏️ Edit Jadwal Pelatihan</h1>

        <form action="{{ route('schedules.update', $schedule->id) }}" method="POST" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tanggal">📅 Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ $schedule->tanggal }}" required>
            </div>

            <div class="form-group">
                <label for="waktu_mulai">⏰ Waktu Mulai</label>
                <input type="time" id="waktu_mulai" name="waktu_mulai" value="{{ $schedule->waktu_mulai }}" required>
            </div>

            <div class="form-group">
                <label for="waktu_selesai">⏱️ Waktu Selesai</label>
                <input type="time" id="waktu_selesai" name="waktu_selesai" value="{{ $schedule->waktu_selesai }}" required>
            </div>

            <div class="form-group">
                <label for="user_id">👤 User</label>
                <select id="user_id" name="user_id" required>
                    <option value="" disabled selected>Pilih User</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $schedule->user_id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="coach_id">🏋️‍♂️ Coach</label>
                <select id="coach_id" name="coach_id" required>
                    <option value="" disabled selected>Pilih Coach</option>
                    @foreach($coaches as $coach)
                        <option value="{{ $coach->id }}" {{ $coach->id == $schedule->coach_id ? 'selected' : '' }}>
                            {{ $coach->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="lokasi">📍 Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ $schedule->lokasi }}" required>
            </div>

            <div class="form-group">
                <label for="keterangan">📝 Keterangan</label>
                <textarea id="keterangan" name="keterangan" required>{{ $schedule->keterangan }}</textarea>
            </div>

            <button type="submit" class="submit-btn">
                <span>💾</span> Perbarui Jadwal
            </button>
        </form>

        <a href="{{ route('schedules.index') }}" class="back-link">
            <span>🔙</span> Kembali ke Daftar Jadwal
        </a>
    </div>
</body>
</html>