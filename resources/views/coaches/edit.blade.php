<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coach</title>
</head>
<body>
    <h1>Edit Coach</h1>

    <form action="{{ route('coaches.update', $coach->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ $coach->name }}" required><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ $coach->email }}" required><br>

        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $coach->phone }}" required><br>

        <label>Address:</label>
        <textarea name="address" required>{{ $coach->address }}</textarea><br>

        <button type="submit">Update Coach</button>
    </form>

    <a href="{{ route('coaches.index') }}">Back to List</a>
</body>
</html>
