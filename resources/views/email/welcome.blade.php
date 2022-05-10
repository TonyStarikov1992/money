<!doctype html>

<html>
    <head>
        <title>WELCOME!</title>
    </head>

    <body>
        <h1>Hello {{ $user->name }}!</h1>
        <h2>Welcome to ELANNCE!</h2>
        <h2>This is code to confirm your email:</h2>
        <h2>{{ $user->confirm_code }}</h2>
    </body>
</html>
