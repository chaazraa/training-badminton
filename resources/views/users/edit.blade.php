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
        <input type="text" id="name" name="name" value="{{ $user->name }}" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $user->email }}" required><br>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="">-- Select Role --</option>
            <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin</option>
            <option value="Participant" {{ $user->role == 'Participant' ? 'selected' : '' }}>Participant</option>
            <option value="Coach" {{ $user->role == 'Coach' ? 'selected' : '' }}>Coach</option>
        </select><br>

        <button type="submit">Update User</button>
    </form>

    <a href="{{ route('users.index') }}">Back to Users List</a>
</body>
</html>
