<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <h1>LOGIN ADMIN</h1>
</head>
<body>

@if (session('error'))
    <p>{{ session('error') }}</p>
@endif

<form method="post" action="{{ route('login.submit') }}">
    @csrf
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>

