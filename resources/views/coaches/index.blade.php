<!-- filepath: /d:/project/training-badminton/resources/views/coaches/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches List</title>
</head>
<body>
    <h1>Coaches List</h1>
    <a href="{{ route('coaches.create') }}">Create New Coach</a>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Birth Date</th>
                <th>Birth Place</th>
                <th>Address</th>
                <th>Experience</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($coaches as $coach)
                <tr>
                    <td>{{ $coach->name }}</td>
                    <td>{{ $coach->email }}</td>
                    <td>{{ $coach->phone }}</td>
                    <td>{{ $coach->birth_date }}</td>
                    <td>{{ $coach->birth_place }}</td>
                    <td>{{ $coach->address }}</td>
                    <td>{{ $coach->experience }}</td>
                    <td>
                        <a href="{{ route('coaches.show', $coach->id) }}">View</a>
                        <a href="{{ route('coaches.edit', $coach->id) }}">Edit</a>
                        <form action="{{ route('coaches.destroy', $coach->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>