<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
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
        <H1>Admin</H1>

        <a href="{{ route('logout') }}" class="link">Logout</a>
    </div>
    <a href="{{ route('leaveNotices') }}">leaves</a>
    <a href="{{ route('leaveTypes') }}">leave Types</a>
    <a href="{{ route('employeeList') }}">Employees</a>
    <div class="content">
        @yield('content')
    </div>
    <div class="content">
        @yield('options')
    </div>
</body>

</html>
