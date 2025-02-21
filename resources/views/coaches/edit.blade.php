<!-- filepath: /d:/project/training-badminton/resources/views/coaches/edit.blade.php -->
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
        <label for="name">Name :</label>
        <input type="text" id="name" name="name" value="{{ $coach->name }}" required><br>

        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo"><br>

        <label for="birth_date">Birth Date :</label>
        <input type="date" id="birth_date" name="birth_date" value="{{ $coach->birth_date }}"><br>

        <label for="birth_place">Birth Place :</label>
        <input type="text" id="birth_place" name="birth_place" value="{{ $coach->birth_place }}"><br>

        <label for="phone">Phone :</label>
        <input type="text" id="phone" name="phone" value="{{ $coach->phone }}"><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" value="{{ $coach->email }}" required><br>

        <label for="address">Address :</label>
        <textarea id="address" name="address">{{ $coach->address }}</textarea><br>

        <label for="experience">Experience :</label>
        <input type="text" id="experience" name="experience" value="{{ $coach->experience }}"><br>

        <button type="submit">Update Coach</button>
    </form>
    <a href="{{ route('coaches.index') }}">Back to Coaches List</a>
</body>
</html>