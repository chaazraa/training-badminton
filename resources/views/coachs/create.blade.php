<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
</head>
<body>
    <h1>Create New User</h1>

    <form action="{{ route('coachs.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="">-- Select Role --</option>
            <option value="Admin">Admin</option>
            <option value="Participant">Participant</option>
            <option value="Coach">Coach</option>
        </select><br>

        <button type="submit">Create User</button>
    </form>

    <a href="{{ route('coachs.index') }}">Back to coachs List</a>
</body>
</html>
