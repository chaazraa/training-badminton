<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coach</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        img {
            display: block;
            max-width: 100%;
            height: auto;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Coach</h1>
        <form action="{{ route('coaches.update', $coach->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $coach->name) }}" required>
            @error('name')<span style="color: red;">{{ $message }}</span>@enderror

            <label for="photo">Photo:</label>
            @if($coach->photo)
                <img src="{{ asset('storage/' . $coach->photo) }}" alt="Current Photo">
                <label>
                    <input type="checkbox" name="remove_photo"> Remove current photo
                </label>
            @endif
            <input type="file" id="photo" name="photo">
            @error('photo')<span style="color: red;">{{ $message }}</span>@enderror

            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="{{ $coach->phone }}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $coach->email) }}" required>
            @error('email')<span style="color: red;">{{ $message }}</span>@enderror

            <label for="birth_date">Birth Date:</label>
            <input type="date" id="birth_date" name="birth_date" value="{{ $coach->birth_date }}">

            <label for="birth_place">Birth Place:</label>
            <input type="text" id="birth_place" name="birth_place" value="{{ $coach->birth_place }}">

            <label for="address">Address:</label>
            <textarea id="address" name="address">{{ $coach->address }}</textarea>

            <label for="experience">Experience:</label>
            <input type="text" id="experience" name="experience" value="{{ $coach->experience }}">

            <button type="submit">Update Coach</button>
        </form>
        <a href="{{ route('coaches.index') }}" class="back-link">Back to Coaches List</a>
    </div>
</body>
</html>
