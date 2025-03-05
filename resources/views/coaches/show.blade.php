<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coach Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            text-align: center;
        }
        h1 {
            color: #007bff;
        }
        img {
            width: 150px;
            height: auto;
            border-radius: 10px;
            margin-top: 10px;
        }
        .details {
            text-align: left;
            margin-top: 15px;
        }
        .details p {
            margin: 8px 0;
        }
        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Coach Details</h1>
        <img src="{{ asset('/storage/'.$coach->photo) }}" alt="Coach Photo">
        <div class="details">
            <p><strong>Name:</strong> {{ $coach->name }}</p>
            <p><strong>Email:</strong> {{ $coach->email }}</p>
            <p><strong>Phone:</strong> {{ $coach->phone }}</p>
            <p><strong>Birth Date:</strong> {{ $coach->birth_date }}</p>
            <p><strong>Birth Place:</strong> {{ $coach->birth_place }}</p>
            <p><strong>Address:</strong> {{ $coach->address }}</p>
            <p><strong>Experience:</strong> {{ $coach->experience }}</p>
        </div>
        <a href="{{ route('coaches.index') }}" class="btn">Back to Coaches List</a>
    </div>
</body>
</html>
