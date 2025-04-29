<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Booking Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #0066cc, #4c9dff); /* Gradient biru */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-top: 10px;
        }
        select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f8f9fa;
            font-size: 16px;
        }
        select:focus {
            border-color: #007bff;
            background-color: #ffffff;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 12px 20px;
            margin-top: 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .form-group {
            margin-bottom: 20px;
        }
        /* Border radius untuk tombol dan select */
        select, button {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Buat Booking Baru</h2>

        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf

            <!-- Hidden input untuk user_id (mendapatkan id pengguna yang sedang login) -->
            <div class="form-group">
                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            </div>

            <!-- Select dropdown untuk memilih Coach -->
            <div class="form-group">
                <label for="coach_id">Coach:</label>
                <select name="coach_id" id="coach_id" required>
                    <option value="">Pilih Coach</option>
                    @foreach ($coaches as $coach)
                        <option value="{{ $coach->id }}">
                            {{ $coach->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Select dropdown untuk memilih Schedule -->
            <div class="form-group">
                <label for="schedule_id">Schedule:</label>
                <select name="schedule_id" id="schedule_id" required>
                    <option value="">Pilih Schedule</option>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}">
                            {{ $schedule->tanggal }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Booking</button>
            <a href="{{ route('bookings.index') }}" class="back-link" style="display: inline-block; margin-top: 15px; color: #007bff; text-decoration: none;">
                Kembali ke Daftar Booking
            </a>
            
        </form>
    </div>
</body>
</html>
