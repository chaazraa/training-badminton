<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            color: #333;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
            background-color: white;
        }

        th {
            background-color: #3498db;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background-color: #ecf0f1;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        .btn-view {
            background-color: #2ecc71; /* Hijau */
        }

        .btn-view:hover {
            background-color: #27ae60;
            transform: scale(1.05);
        }

        .btn-edit {
            background-color: #3498db; /* Biru */
        }

        .btn-edit:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .btn-delete {
            background-color: #e74c3c; /* Merah */
        }

        .btn-delete:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        .form-delete {
            display: inline;
        }

        .create-button {
            display: inline-block;
            margin-top: 10px;
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .create-button:hover {
            background-color: #219653;
        }

        .success-message {
            color: #2ecc71;
            margin-bottom: 10px;
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
                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-view">View</a>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-edit">Edit</a>
                        
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="form-delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('users.create') }}" class="create-button">Create New User</a>
</body>
</html>
