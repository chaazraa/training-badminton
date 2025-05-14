<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
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
        h2 {
            color: #1d3557;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            position: relative;
        }
        h2:after {
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
        select, input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #a8dadc;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }
        select:focus, input:focus {
            outline: none;
            border-color: #457b9d;
            box-shadow: 0 0 0 3px rgba(69, 123, 157, 0.2);
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
        }
        .back-link:hover {
            color: #1d3557;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>✏️ Edit Booking</h2>

        <form method="POST" action="{{ route('user.bookings.update', $booking->id) }}" class="edit-form">
            @csrf
            @method('PUT')

            <!-- Hidden user_id -->
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">

            <!-- Coach Selection -->
            <div class="form-group">
                <label for="coach_id">🏋️‍♂️ Coach</label>
                <select name="coach_id" id="coach_id" required>
                    <option value="" disabled {{ !$booking->coach_id ? 'selected' : '' }}>Select Coach</option>
                    @foreach ($coaches as $coach)
                        <option value="{{ $coach->id }}" {{ $booking->coach_id == $coach->id ? 'selected' : '' }}>
                            {{ $coach->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Schedule Selection -->
            <div class="form-group">
                <label for="schedule_id">📅 Schedule</label>
                <select name="schedule_id" id="schedule_id" required>
                    <option value="" disabled {{ !$booking->schedule_id ? 'selected' : '' }}>Select Schedule</option>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}" {{ $booking->schedule_id == $schedule->id ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::parse($schedule->tanggal)->format('d M Y') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="submit-btn">
                <span>💾</span> Update Booking
            </button>
        </form>

        <a href="{{ route('user.bookings.index') }}" class="back-link">
            <span>🔙</span> Back to Booking List
        </a>
    </div>
</body>
</html>
