<!-- resources/views/layouts/admin_app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Dashboard - Passen Op Je Dier</title>
</head>
<body>
    <nav class="topnav">
        <section class="topnav__head">
            <a href="{{ route('home') }}" class="topnav__logo">Passen Op Je Dier</a>
        </section>
        <section class="topnav__navbar">
            <a href="{{ route('admin.dashboard') }}" class="topnav__navbar__button">Dashboard</a>
            <a href="{{ route('logout') }}" class="topnav__navbar__button"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Log uit
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </section>
    </nav>
    <main>
        @yield('content')
    </main>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
