<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Jadwal Pelatihan</title>
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
            --accent-color: #a78bfa;
        }

        body {
            background: linear-gradient(135deg, var(--dark-primary), var(--dark-secondary));
            font-family: 'Nunito', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            color: var(--light-text);
            padding: 30px;
            box-sizing: border-box;
            text-align: center;
        }

        .container {
            background-color: rgba(30, 41, 59, 0.8);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            width: 90%;
            max-width: 600px;
            margin: 20px;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 30px;
            color: var(--accent-color);
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .detail-item {
            margin-bottom: 20px;
            text-align: left;
        }

        .detail-item strong {
            display: inline-block;
            width: 120px;
            font-weight: 600;
            color: #cbd5e1;
        }

        .detail-value {
            color: var(--light-text);
            font-size: 1.1em;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 16px;
            transition: all 0.3s ease;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 50px;
            border: 1px solid rgba(148, 163, 184, 0.3);
        }

        .back-link::before {
            content: "↩️";
            font-size: 1.2em;
            margin-right: 5px;
            transition: transform 0.3s ease;
        }

        .back-link:hover {
            color: var(--accent-color);
            border-color: var(--accent-color);
        }

        .back-link:hover::before {
            transform: translateX(-5px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Jadwal</h1>
        <div class="detail-item">
            <strong>Tanggal:</strong>
            <span class="detail-value">{{ \Carbon\Carbon::parse($schedule->tanggal)->locale('id')->isoFormat('dddd, D MMMM Y') }}</span>
        </div>
        <div class="detail-item">
            <strong>Waktu:</strong>
            <span class="detail-value">{{ $schedule->waktu_mulai }} - {{ $schedule->waktu_selesai }}</span>
        </div>
        <div class="detail-item">
            <strong>ID User:</strong>
            <span class="detail-value">{{ $schedule->user->name }}</span>
        </div>
        <div class="detail-item">
            <strong>ID Coach:</strong>
            <span class="detail-value">{{ $schedule->coach->name }}</span>
        </div>
        <div class="detail-item">
            <strong>Lokasi:</strong>
            <span class="detail-value">{{ $schedule->lokasi }}</span>
        </div>
        <div class="detail-item">
            <strong>Keterangan:</strong>
            <span class="detail-value">{{ $schedule->keterangan ?: '-' }}</span>
        </div>

        <a href="{{ route('admin.schedules.index') }}" class="back-link">
            <span></span> Kembali ke Daftar Jadwal
        </a>
    </div>
</body>
</html>