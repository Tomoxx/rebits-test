<!-- layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rebits Laravel Test App')</title>
</head>
<body>
    <header>
        <h1>Rebits' Basic Vehicle Maintenance System</h1>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/user">Users</a></li>
                <li><a href="/vehicle">Vehicles</a></li>
                <li><a href="/vehiclehistory">Vehicles Ownership History</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        @yield('content')
    </div>
</body>
</html>
