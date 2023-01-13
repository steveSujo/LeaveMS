<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Nunito';
            margin: 10rem;
        }
    </style>
</head>

<body>
    <div class="card">
        <H1>Employee</H1>
        <a href="{{ route('logout') }}" class="link">Logout</a>
    </div>
    @yield('details')
    <div class="card">
        @yield('content')
    </div>
    <div class="card">
        @yield('options')
    </div>
</body>

</html>
