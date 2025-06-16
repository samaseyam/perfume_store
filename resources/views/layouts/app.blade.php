<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Perfume Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa; 
        }
        .navbar {
            background-color:rgb(12, 96, 179) !important; 
        }
        .nav-link {
            color: #f1f1f1 !important;
            font-weight: 500;
        }
        .nav-link:hover, .nav-link:focus {
            color: #ffc107 !important; 
            text-decoration: underline;
        }
        .btn-link {
            color: #f1f1f1 !important;
        }
        .btn-link:hover {
            color: #ffc107 !important;
            text-decoration: underline;
        }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark" style="
    background-image: url('/images/navbar-bg.jpg');
    background-size: cover;
    background-position: center;
">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Perfume Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('perfumes.index') }}">Perfumes</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('order_items.index') }}">Order Items</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                @auth
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-link btn btn-link text-white" style="text-decoration: none;">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container d-flex justify-content-center">
    @yield('content')
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
