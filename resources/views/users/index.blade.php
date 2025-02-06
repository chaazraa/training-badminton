<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
            padding: 20px;
            background-color: #f4f4f4; /* Soft background color */
            color: #333; /* Dark text for contrast */
        }

        h1 {
            color: #2c3e50; /* Darker heading color */
            text-align: center; /* Center the heading */
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* Subtle shadow */
            border-radius: 8px; /* Rounded corners for the table */
            overflow: hidden; /* Needed for rounded corners on the table */
        }

        th, td {
            padding: 15px; /* Increased padding */
            text-align: left;
            border-bottom: 1px solid #eee; /* Lighter border */
            background-color: white; /* White background for cells */
        }

        th {
            background-color: #3498db; /* Blue header background */
            color: white;
            font-weight: 600; /* Semi-bold header font */
        }

        tr:hover {
            background-color: #ecf0f1; /* Light hover background */
        }

        a {
            color: #3498db; /* Blue link color */
            text-decoration: none;
            transition: color 0.3s ease; /* Smooth color transition */
        }

        a:hover {
            text-decoration: underline;
            color:rgb(255, 255, 255); /* Darker blue on hover */
        }

        button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px; /* Adjusted padding */
            cursor: pointer;
            border-radius: 4px; /* Rounded corners for buttons */
            transition: background-color 0.3s ease; /* Smooth background transition */
        }

        button:hover {
            background-color: #c0392b;
        }

        .success-message {
            color: #2ecc71; /* Green for success */
            margin-bottom: 10px;
        }

        .create-button {
            display: inline-block;
            margin-top: 10px;
            background-color: #27ae60; /* Green for create button */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .create-button:hover {
            background-color: #219653;
        }
    </style>
</head>
<body>
    <h1>Users List</h1>

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}">Edit</a> |
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('users.create') }}" class="create-button">Create New User</a>
</body>
</html>