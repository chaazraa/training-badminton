<!-- filepath: /d:/project/training-badminton/resources/views/coaches/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coach</title>
</head>
<body>
    <h1>Create Coach</h1>
    <form action="{{ route('coaches.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Name :</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="photo">Photo :</label>
        <input type="file" id="photo" name="photo"><br>

        <label for="birth_date">Birth Date :</label>
        <input type="date" id="birth_date" name="birth_date"><br>

        <label for="birth_place">Birth Place :</label>
        <input type="text" id="birth_place" name="birth_place"><br>

        <label for="phone">Phone :</label>
        <input type="text" id="phone" name="phone"><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="address">Address :</label>
        <textarea id="address" name="address"></textarea><br>

        <label for="experience">Experience :</label>
        <input type="text" id="experience" name="experience"><br>

        <button type="submit">Create Coach</button>
    </form>
    <a href="{{ route('coaches.index') }}">Back to Coaches List</a>
</body>
</html>