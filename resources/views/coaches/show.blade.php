<!-- resources/views/coaches/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Details</title>
</head>
<body>
    <h1>Coach Details</h1>

    <p><strong>Name:</strong> {{ $coach->name }}</p>
    <p><strong>Email:</strong> {{ $coach->email }}</p>
    <p><strong>Phone:</strong> {{ $coach->phone }}</p>
    <p><strong>Address:</strong> {{ $coach->address }}</p>
    <p><strong>Schedule Date:</strong> {{ $coach->date }}</p>
    <p><strong>Schedule Time:</strong> {{ $coach->time }}</p>

    <a href="{{ route('coaches.index') }}">Back to Coaches List</a>
</body>
</html>
