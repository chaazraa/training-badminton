<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coach</title>
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
            display: flex;
            align-items: center;
            gap: 8px;
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
        input[type="file"] {
            padding: 8px;
        }
        input[type="checkbox"] {
            width: auto;
            margin-right: 8px;
        }
        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: #457b9d;
            box-shadow: 0 0 0 3px rgba(69, 123, 157, 0.2);
        }
        .current-photo {
            max-width: 200px;
            border-radius: 8px;
            margin: 10px 0;
            border: 2px solid #a8dadc;
        }
        .photo-options {
            margin: 10px 0;
            padding: 10px;
            background-color: #f1faee;
            border-radius: 8px;
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
            margin-top: 15px;
            width: 100%;
            padding: 10px;
        }
        .back-link:hover {
            color: #1d3557;
            text-decoration: underline;
        }
        .error-message {
            color: #e63946;
            font-size: 14px;
            margin-top: 5px;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>👨‍🏫 Edit Coach</h1>

        <form action="{{ route('admin.coaches.update', $coach->id) }}" method="POST" enctype="multipart/form-data" class="edit-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">👤 Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $coach->name) }}" required>
                @error('name') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="photo">📷 Photo</label>
                @if($coach->photo)
                    <div class="photo-options">
                        <img src="{{ asset('storage/' . $coach->photo) }}" alt="Current Photo" class="current-photo">
                        <label>
                            <input type="checkbox" name="remove_photo"> Remove current photo
                        </label>
                    </div>
                @endif
                <input type="file" id="photo" name="photo">
                @error('photo') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="email">✉️ Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $coach->email) }}" required>
                @error('email') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="phone">📱 Phone</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone', $coach->phone) }}">
                @error('phone') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="birth_date">🎂 Birth Date</label>
                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date', $coach->birth_date) }}">
                @error('birth_date') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="birth_place">📍 Birth Place</label>
                <input type="text" id="birth_place" name="birth_place" value="{{ old('birth_place', $coach->birth_place) }}">
                @error('birth_place') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="address">🏠 Address</label>
                <textarea id="address" name="address" rows="3">{{ old('address', $coach->address) }}</textarea>
                @error('address') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label for="experience">🏆 Experience</label>
                <input type="text" id="experience" name="experience" value="{{ old('experience', $coach->experience) }}">
                @error('experience') <div class="error-message">{{ $message }}</div> @enderror
            </div>

            <button type="submit" class="submit-btn">
                <span>💾</span> Update Coach
            </button>
        </form>

        <a href="{{ route('admin.coaches.index') }}" class="back-link">
            <span>🔙</span> Back to Coaches List
        </a>
    </div>
</body>
</html>