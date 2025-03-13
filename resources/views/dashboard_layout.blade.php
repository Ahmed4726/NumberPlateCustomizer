<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar .navbar-brand {
            color: #ffffff;
            text-align: center;
            font-size: 1.5em;
            padding: 1rem;
            border-bottom: 1px solid #495057;
        }

        .sidebar .navbar-brand:hover {
            color: #ffffff;
        }

        .sidebar .nav-link {
            color: #ffffff;
        }

        .sidebar .nav-link:hover {
            background-color: #49505717;
        }

        .sidebar .nav-item {
            margin-bottom: 10px;
        }

        .main-content {
            margin-left: 250px; /* Adjust this value based on the width of the sidebar */
            padding: 20px;
        }

        /* Ensure the sidebar is responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }

        /* Sidebar Dropdown */
        .tags-dropdown {
            display: none;
        }
        .tags-dropdown.show {
            display: block;
        }

    </style>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <!-- Sidebar -->
        <div class="sidebar">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'App Name') }}
            </a>

            <!-- Sidebar Navigation -->
            <ul class="nav flex-column">
                <!-- Dashboard Link -->
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                
                <!-- Orders Link -->
                <li class="nav-item">
                    <a class="nav-link" href="/order">
                        <i class="fas fa-box"></i> Orders
                    </a>
                </li>
                
                <!-- Products Link -->
                <li class="nav-item">
                    <a class="nav-link" href="/products">
                        <i class="fas fa-cogs"></i> Products
                    </a>
                </li>
                
                <!-- Customers Link -->
                <li class="nav-item">
                    <a class="nav-link" href="/customers">
                        <i class="fas fa-users"></i> Users
                    </a>
                </li>

                <!-- Reports Link -->
                <li class="nav-item">
                    <a class="nav-link" href="/reports">
                        <i class="fas fa-chart-line"></i> Reports
                    </a>
                </li>

                <!-- Settings Link -->
                <li class="nav-item">
                    <a class="nav-link" href="/settings">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>

                <!-- Logout Button -->
                <li class="nav-item">
                    
                    <form id="logout-form"  action="{{ route('logout') }}" method="POST">
    @csrf
    <a class="nav-link" href="#" onclick="this.closest('form').submit();">
    <i class="fas fa-sign-out-alt"></i>{{ __('Logout') }}
    </a>
</form>

                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" 
                                       aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}" 
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Content Section -->
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript -->
    <script>
        // Add any custom JS here
    </script>
</body>
</html>
