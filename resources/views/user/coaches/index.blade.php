<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches List</title>
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
            max-width: 1200px;
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
        .coaches-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        .coach-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            border-left: 5px solid #457b9d;
        }
        .coach-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .coach-header {
            display: flex;
            align-items: center;
            padding: 20px;
            background: linear-gradient(135deg, #f1faee, #a8dadc);
        }
        .coach-photo {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid white;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }
        .coach-name {
            font-size: 20px;
            font-weight: 700;
            color: #1d3557;
            margin-bottom: 5px;
        }
        .coach-experience {
            display: inline-block;
            padding: 3px 10px;
            background-color: #457b9d;
            color: white;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .coach-details {
            padding: 20px;
        }
        .detail-item {
            display: flex;
            margin-bottom: 12px;
        }
        .detail-icon {
            width: 24px;
            color: #457b9d;
            margin-right: 10px;
            text-align: center;
        }
        .detail-label {
            font-weight: 600;
            color: #457b9d;
            min-width: 100px;
        }
        .detail-value {
            color: #1d3557;
            flex-grow: 1;
        }
        .action-links {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding: 15px 20px;
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
        .delete-button {
            background-color: #f8f9fa;
            color: #e63946;
            border: 1px solid #e63946;
        }
        .delete-button:hover {
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
            grid-column: 1 / -1;
        }
        .empty-state:before {
            content: "👤";
            font-size: 40px;
            display: block;
            margin-bottom: 15px;
        }
        @media (max-width: 768px) {
            .coaches-grid {
                grid-template-columns: 1fr;
            }
            .coach-header {
                flex-direction: column;
                text-align: center;
            }
            .coach-photo {
                margin-right: 0;
                margin-bottom: 15px;
            }
            .action-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>👥 Daftar Pelatih</h2>

        <!-- Add Coach Button -->
        {{-- <div style="text-align: center;">
            <a href="{{ route('coaches.create') }}" class="add-button">➕ Tambah Pelatih Baru</a>
        </div> --}}

        <div class="coaches-grid">
            @forelse ($coaches as $coach)
                <div class="coach-card">
                    <div class="coach-header">
                        <img src="{{ asset('/storage/' . $coach->photo) }}" alt="{{ $coach->name }}" class="coach-photo">
                        <div>
                            <div class="coach-name">{{ $coach->name }}</div>
                            <span class="coach-experience">{{ $coach->experience }} tahun pengalaman</span>
                        </div>
                    </div>
                    
                    <div class="coach-details">
                        <div class="detail-item">
                            <div class="detail-icon">📧</div>
                            <div class="detail-label">Email:</div>
                            <div class="detail-value">{{ $coach->email }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">📱</div>
                            <div class="detail-label">Telepon:</div>
                            <div class="detail-value">{{ $coach->phone }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🎂</div>
                            <div class="detail-label">TTL:</div>
                            <div class="detail-value">{{ $coach->birth_place }}, {{ $coach->birth_date }}</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🏠</div>
                            <div class="detail-label">Alamat:</div>
                            <div class="detail-value">{{ $coach->address }}</div>
                        </div>
                    </div>
                    
                    <div class="action-links">
                        <a href="{{ route('user.coaches.show', $coach->id) }}" class="action-button view-button">
                            <span>🔍</span> Detail
                        </a>
                        {{-- <a href="{{ route('coaches.edit', $coach->id) }}" class="action-button edit-button">
                            <span>✏️</span> Edit
                        </a>
                        <form action="{{ route('coaches.destroy', $coach->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Yakin mau hapus pelatih ini?')"
                                    class="action-button delete-button">
                                <span>🗑️</span> Hapus
                            </button>
                        </form> --}}
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    Tidak ada data pelatih yang tersedia
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>