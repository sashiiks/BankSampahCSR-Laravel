<!DOCTYPE html>
<html>
<head>
    <title>Admin Register</title>
</head>
<body>
    <h1>Admin Register</h1>
    <form method="POST" action="{{ route('admin.register') }}">
        @csrf
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>
</body>
</html>
