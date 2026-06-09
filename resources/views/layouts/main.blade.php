<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Inventaris</title>
    <!-- Memanggil CSS Bootstrap 5 melalui CDN agar tampilan rapi secara otomatis -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- BAGIAN ATAS: NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Inventory App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('product*') ? 'active' : '' }}"
                            href="{{ route('product') }}">
                            Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                            href="{{ route('categories.index') }}">Category</a>
                    </li>
                    <li class="nav-item ms-3 ps-3 border-start">
                        <span class="navbar-text text-light me-2">
                            Halo, <strong>{{ Auth::user()->name }}</strong>
                        </span>
                        <span class="badge {{ Auth::user()->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                            {{ Auth::user()->role }}
                        </span>
                    </li>
                    <li class="nav-item ms-2">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-light text-decoration-none">
                                Logout
                            </button>
                        </form>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- BAGIAN TENGAH: KONTEN DINAMIS -->
    <!-- Elemen <main> inilah yang menjadi wadah utama dari form/tabel yang nanti kita buat -->
    <main class="container my-5 flex-grow-1">
        @yield('content')
    </main>
    <!-- BAGIAN BAWAH: FOOTER -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} Aplikasi Inventaris. Hak Cipta Dilindungi.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS (Optional but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>