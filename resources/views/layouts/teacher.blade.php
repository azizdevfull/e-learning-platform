<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">Teacher Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.categories.index') }}">Kategoriyalar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.courses.index') }}">Kurslar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.tests.index') }}">Testlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.questions.index') }}">Savollar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.answers.index') }}">Javoblar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.statistics.index') }}">Statistikalar</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Content -->
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>