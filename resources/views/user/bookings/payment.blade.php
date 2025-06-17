<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Pembayaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Midtrans Snap.js --}}
    <script 
        src="https://app.sandbox.midtrans.com/snap/snap.js" 
        data-client-key="{{ config('midtrans.client_key') }}">
    </script>

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
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 500px;
        }
        h1 {
            color: #1d3557;
            margin-bottom: 25px;
            text-align: center;
        }
        .booking-details {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .detail-item {
            margin-bottom: 15px;
        }
        .detail-label {
            color: #457b9d;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .detail-value {
            color: #1d3557;
            font-size: 16px;
            font-weight: 500;
        }
        #pay-button {
            display: block;
            width: 100%;
            padding: 15px;
            background: linear-gradient(to right, #457b9d, #1d3557);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }
        #pay-button:hover {
            transform: translateY(-2px);
        }
        .error {
            color: #e63946;
            background-color: #ffdde1;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>💳 Pembayaran Booking</h1>

        @if(isset($error))
            <div class="error">{{ $error }}</div>
        @endif

        <div class="booking-details">
            <div class="detail-item">
                <div class="detail-label">👤 Nama</div>
                <div class="detail-value">{{ $booking->user->name }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">🏋️ Pelatih</div>
                <div class="detail-value">{{ $booking->coach->name }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">📅 Jadwal</div>
                <div class="detail-value">{{ $booking->schedule->formatted_date ?? $booking->schedule->tanggal }}</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">💰 Harga</div>
                <div class="detail-value">Rp {{ number_format($booking->schedule->harga ?? 50000, 0, ',', '.') }}</div>
            </div>
        </div>

        <button id="pay-button">Bayar Sekarang</button>
    </div>

    <script type="text/javascript">
        document.getElementById('pay-button').addEventListener('click', function () {
            window.snap.pay('{{ $booking->snap_token }}', {
                onSuccess: function(result){
                    alert("Pembayaran berhasil!");
                    window.location.href = "{{ route('user.bookings.index') }}";
                },
                onPending: function(result){
                    alert("Menunggu pembayaran...");
                    window.location.href = "{{ route('user.bookings.index') }}";
                },
                onError: function(result){
                    alert("Pembayaran gagal!");
                },
                onClose: function(){
                    alert('Kamu menutup popup sebelum menyelesaikan pembayaran');
                }
            });
        });
    </script>
</body>
</html>
