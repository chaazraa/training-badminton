<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Details</title>
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
            max-width: 800px;
            margin: 20px;
        }
        h1 {
            color: #1d3557;
            margin-bottom: 25px;
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        h1:after {
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
        .coach-profile {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }
        .coach-photo {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .coach-name {
            font-size: 28px;
            font-weight: 700;
            color: #1d3557;
            margin-bottom: 5px;
        }
        .coach-experience {
            display: inline-block;
            padding: 5px 15px;
            background: linear-gradient(to right, #457b9d, #1d3557);
            color: white;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .detail-card {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            border-left: 4px solid #a8dadc;
        }
        .detail-title {
            color: #457b9d;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .detail-content {
            color: #1d3557;
            font-size: 18px;
            font-weight: 500;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 30px;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            gap: 8px;
        }
        .btn-back {
            background: linear-gradient(to right, #a8dadc, #457b9d);
            color: #1d3557;
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(69, 123, 157, 0.3);
        }
        .btn-edit {
            background: linear-gradient(to right, #ffd166, #fdc500);
            color: #1d3557;
        }
        .btn-edit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 209, 102, 0.3);
        }
        @media (max-width: 768px) {
            .details-grid {
                grid-template-columns: 1fr;
            }
            .action-buttons {
                flex-direction: column;
                align-items: center;
            }
            .btn {
                width: 100%;
                max-width: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Coach Profile</h1>
        
        <div class="coach-profile">
            <img src="{{ asset('/storage/'.$coach->photo) }}" alt="Coach Photo" class="coach-photo">
            <h2 class="coach-name">{{ $coach->name }}</h2>
            <span class="coach-experience">{{ $coach->experience }} years experience</span>
        </div>
        
        <div class="details-grid">
            <div class="detail-card">
                <div class="detail-title">
                    <span>📧</span> Contact Information
                </div>
                <div class="detail-content">
                    <p><strong>Email:</strong> {{ $coach->email }}</p>
                    <p><strong>Phone:</strong> {{ $coach->phone }}</p>
                </div>
            </div>
            
            <div class="detail-card">
                <div class="detail-title">
                    <span>📅</span> Personal Details
                </div>
                <div class="detail-content">
                    <p><strong>Birth Date:</strong> {{ $coach->birth_date }}</p>
                    <p><strong>Birth Place:</strong> {{ $coach->birth_place }}</p>
                </div>
            </div>
            
            <div class="detail-card">
                <div class="detail-title">
                    <span>🏠</span> Address
                </div>
                <div class="detail-content">
                    {{ $coach->address }}
                </div>
            </div>
        </div>
        
        <div class="action-buttons">
            <a href="{{ route('admin.coaches.index') }}" class="btn btn-back">
                <span>⬅️</span> Back to List
            </a>
            <a href="{{ route('admin.coaches.edit', $coach->id) }}" class="btn btn-edit">
                <span>✏️</span> Edit Profile
            </a>
        </div>
    </div>
</body>
</html>