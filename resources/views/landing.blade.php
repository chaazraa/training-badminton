<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
</head>
<body>
    <h1>Welcome to Our Website</h1>
    <p>Here you can find tutorials and resources to help you get started.</p>
    <p>To access the full features, please log in or create an account.</p>

    <a href="{{ route('login') }}">
        <button>Login</button>
    </a>
    <a href="{{ route('register') }}">
        <button>Create Account</button>
    </a>
</body>
</html>
