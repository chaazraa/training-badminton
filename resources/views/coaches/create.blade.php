<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coach</title>
</head>
<body>
    <h1>Create New Coach</h1>

    <form action="{{ route('coaches.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Phone:</label>
        <input type="text" name="phone" required><br>

        <label>Address:</label>
        <textarea name="address" required></textarea><br>

        <label>Date:</label>
        <input type="date" name="date" required><br>

        <label>Time:</label>
        <input type="time" name="time" required><br>

        <button type="submit">Save Coach</button>
    </form>

    <a href="{{ route('coaches.index') }}">Back to List</a>
</body>
</html>
