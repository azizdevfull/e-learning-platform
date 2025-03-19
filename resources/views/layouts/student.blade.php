<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('student.dashboard') }}">Student Dashboard</a>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.courses.index') }}">Barcha Kurslar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('student.logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Chiqish
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>