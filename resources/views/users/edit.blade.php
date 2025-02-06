<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
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
</body>
</html>
