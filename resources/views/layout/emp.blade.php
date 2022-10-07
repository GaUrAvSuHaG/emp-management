<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <title>EMS</title>
</head>

<body>
    <nav>
        <div class="nav-banner">
            @if(Session::has('emp'))

            <p>Hello, {{ App\Models\User::find(Session::get('emp'))->name }}</p>
            @endif
        </div>
        <div class="nav-links">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('emp.logout') }}" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>

    </nav>

    @yield('content')
</body>

</html>
