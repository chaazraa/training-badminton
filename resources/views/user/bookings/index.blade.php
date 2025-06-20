<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0a2463, #3e5c76);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .container {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 900px;
            margin: 40px 0;
        }
        h2 {
            color: #1d3557;
            margin-bottom: 25px;
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        h2:after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #457b9d, #a8dadc);
            border-radius: 2px;
        }
        .add-button {
            display: inline-block;
            padding: 12px 25px;
            margin-bottom: 30px;
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
        }
        .add-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(29, 53, 87, 0.4);
            background: linear-gradient(to right, #1d3557, #457b9d);
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 12px;
            background-color: white;
            border-left: 5px solid #457b9d;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }
        li:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }
        .booking-info {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 15px;
        }
        .info-item {
            display: flex;
            flex-direction: column;
        }
        .info-label {
            color: #457b9d;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }        .info-value {
            color: #1d3557;
            font-size: 16px;
            font-weight: 500;
        }
        .payment-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }
        .payment-status.pending {
            background-color: #ffd166;
            color: #805e00;
        }
        .payment-status.paid {
            background-color: #95d5b2;
            color: #1b4332;
        }
        .payment-status.cancelled {
            background-color: #ef476f;
            color: white;
        }
        .payment-status.failed {
            background-color: #e63946;
            color: white;
        }
        .action-links {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            padding-top: 15px;
            border-top: 1px dashed #a8dadc;
        }
        .action-button {
            padding: 8px 15px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .view-button {
            background-color: #a8dadc;
            color: #1d3557;
        }
        .view-button:hover {
            background-color: #8ecae6;
        }
        .edit-button {
            background-color: #ffd166;
            color: #1d3557;
        }
        .edit-button:hover {
            background-color: #fdc500;
        }
        .cancel-button {
            background-color: #f8f9fa;
            color: #e63946;
            border: 1px solid #e63946;
        }
        .cancel-button:hover {
            background-color: #e63946;
            color: white;
        }
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #1d3557;
            background-color: #f1faee;
            border-radius: 12px;
            font-size: 18px;
        }
        .empty-state:before {
            content: "📋";
            font-size: 40px;
            display: block;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>📋 Daftar Booking</h2>

        <!-- Add Booking Button -->
        <div style="text-align: center;">
            <a href="{{ route('user.bookings.create') }}" class="add-button">➕ Tambah Booking Baru</a>
        </div>

        <ul>
            @forelse ($bookings as $booking)
                <li>
                    <div class="booking-info">
                        <div class="info-item">
                            <span class="info-label">👤 User</span>
                            <span class="info-value">{{ optional($booking->user)->name ?? 'User tidak tersedia' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">🏋️ Coach</span>
                            <span class="info-value">{{ optional($booking->coach)->name ?? 'Pelatih belum ditentukan' }}</span>
                        </div>                        <div class="info-item">
                            <span class="info-label">📅 Schedule</span>
                            <span class="info-value">{{ optional($booking->schedule)->tanggal ?? 'Jadwal belum ditentukan' }}</span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">💰 Payment Status</span>
                            <span class="info-value">
                                <span class="payment-status {{ $booking->payment_status }}">
                                    {{ ucfirst($booking->payment_status ?? 'pending') }}
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="action-links">
                        <!-- View Button -->
                        <a href="{{ route('user.bookings.show', $booking) }}" class="action-button view-button">
                            <span>🔍</span> Detail
                        </a>

                        <!-- Edit Button -->
                        <a href="{{ route('user.bookings.edit', $booking) }}" class="action-button edit-button">
                            <span>✏️</span> Edit
                        </a>

                        <!-- Delete Form -->
                        <form action="{{ route('user.bookings.destroy', $booking) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin mau hapus booking ini?')"
                                    class="action-button cancel-button">
                                <span>🗑️</span> Cancel
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <div class="empty-state">
                    Tidak ada data booking yang tersedia
                </div>
            @endforelse
        </ul>
    </div>
</body>
</html>
