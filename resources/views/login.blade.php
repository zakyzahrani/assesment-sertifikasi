<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="../css/style.css">
        
    </head>
    <body>
<div class="login">
    <h2 class="login-header">Form Login</h2>
        <form class="login-container">
            <p>
                <input type="email" placeholder="Email">
            <p>
                <input type="password" placeholder="Password">
            </p>
            <p>
                <a href="/register">register</a>
            </p>            
            <p>
                <input type="submit" value="Log in">
            </p>
        </form>
        
</div>
</body>
</html>
