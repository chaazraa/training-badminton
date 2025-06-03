<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Detail</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a2463, #3e5c76);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container {
            background-color: #f8f9fa;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
            text-align: center;
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
            font-size: 32px;
            font-weight: 700;
            position: relative;
            display: inline-block;
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
        .detail-card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: left;
        }
        .detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px dashed #a8dadc;
        }
        .detail-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .detail-icon {
            font-size: 24px;
            margin-right: 15px;
            color: #457b9d;
            flex-shrink: 0;
        }
        .detail-content {
            flex-grow: 1;
        }
        .detail-label {
            color: #457b9d;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .detail-value {
            color: #1d3557;
            font-size: 18px;
            font-weight: 500;
        }
        .back-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 25px;
            background: linear-gradient(to right, #457b9d, #1d3557);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            box-shadow: 0 4px 15px rgba(29, 53, 87, 0.3);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            gap: 8px;
        }
        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(29, 53, 87, 0.4);
            background: linear-gradient(to right, #1d3557, #457b9d);
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>🔍 Booking Details</h2>

        <div class="detail-card">
            <div class="detail-item">
                <span class="detail-icon">👤</span>
                <div class="detail-content">
                    <div class="detail-label">User</div>
                    <div class="detail-value">{{ $booking->user->name }}</div>
                </div>
            </div>
            
            <div class="detail-item">
                <span class="detail-icon">🏋️</span>
                <div class="detail-content">
                    <div class="detail-label">Coach</div>
                    <div class="detail-value">{{ $booking->coach->name }}</div>
                </div>
            </div>
            
            <div class="detail-item">
                <span class="detail-icon">📅</span>
                <div class="detail-content">
                    <div class="detail-label">Schedule</div>
                    <div class="detail-value">{{ $booking->schedule->tanggal }} - {{ $booking->schedule->waktu_mulai }} - {{ $booking->schedule->waktu_selesai }}</div>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.bookings.index') }}" class="back-button">
            <span>🔙</span> Back to Booking List
        </a>
    </div>
</body>
</html>