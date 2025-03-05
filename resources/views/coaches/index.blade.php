<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        a {
            display: inline-block;
            text-decoration: none;
            padding: 8px 12px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        img {
            display: block;
            max-width: 100px;
            height: auto;
            border-radius: 8px;
        }
        .actions a, .actions form {
            display: inline-block;
            margin-right: 5px;
        }
        .actions button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .actions button:hover {
            background-color: darkred;
        }
        .create-button {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Coaches List</h1>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Photo</th>
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
            @if ($coaches->isEmpty())
                <tr>
                    <td colspan="9" style="text-align: center;">No coaches available.</td>
                </tr>
            @else
                @foreach ($coaches as $coach)
                    <tr>
                        <td>{{ $coach->name }}</td>
                        <td class="text-center">
                            <img src="{{ asset('/storage/' . $coach->photo) }}" alt="{{ $coach->name }}">
                        </td>
                        <td>{{ $coach->email }}</td>
                        <td>{{ $coach->phone }}</td>
                        <td>{{ $coach->birth_date }}</td>
                        <td>{{ $coach->birth_place }}</td>
                        <td>{{ $coach->address }}</td>
                        <td>{{ $coach->experience }}</td>
                        <td class="actions">
                            <a href="{{ route('coaches.show', $coach->id) }}">View</a>
                            <a href="{{ route('coaches.edit', $coach->id) }}">Edit</a>
                            <form action="{{ route('coaches.destroy', $coach->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    
    <div class="create-button">
        <a href="{{ route('coaches.create') }}">Create New Coach</a>
    </div>
</body>
</html>
