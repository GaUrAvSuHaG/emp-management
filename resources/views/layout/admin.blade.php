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
            <p><a href="{{ route('admin.home') }}">Hello, {{ $admin->name }}</a></p>
        </div>
        <div class="nav-links">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('admin.addproj') }}" class="nav-link">Add Project</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.addempform') }}" class="nav-link">Add Employee</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">Logout</a>
                </li>
            </ul>
        </div>

    </nav>
    @yield('content')
</body>
</html>
