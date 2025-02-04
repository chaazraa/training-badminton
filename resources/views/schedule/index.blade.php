<!-- resources/views/schedule/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule List</title>
</head>
<body>
    <h1>Schedule List</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schedules as $schedule)
                <tr>
                    <td>{{ $schedule->name }}</td>
                    <td>{{ $schedule->start_time }}</td>
                    <td>{{ $schedule->end_time }}</td>
                    <td>{{ $schedule->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
