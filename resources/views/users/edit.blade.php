<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #1e3d5b, #0f202b);
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            color: white;
        }

        .form-container {
            background-color: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            width: 400px;
        }

        h1 {
            color: white;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #eee;
        }

        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: white;
            color: #333;
            box-sizing: border-box;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        a {
            display: block;
            margin-top: 15px;
            color: #3498db;
            text-decoration: none;
            text-align: center;
            color: #eee;
        }

        a:hover {
            text-decoration: underline;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Edit User</h1>

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
            <br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
            <br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="">-- Select Role --</option>
                <option value="Participant" {{ old('role', $user->role) == 'Participant' ? 'selected' : '' }}>Participant</option>
                <option value="Coach" {{ old('role', $user->role) == 'Coach' ? 'selected' : '' }}>Coach</option>
            </select>
            @error('role') <span>{{ $message }}</span> @enderror
            <br>

            <button type="submit">Update User</button>
        </form>

        <a href="{{ route('users.index') }}">Back to Users List</a>
    </div>
</body>
</html>
