<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventaris Neo')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @auth
        <div class="app-shell">
            <aside class="sidebar">
                <a href="{{ route('dashboard') }}" class="brand">
                    <span class="brand-mark">IN.</span>
                    <span>
                        <strong>Inventaris</strong>
                        <small>NEO MANAGEMENT</small>
                    </span>
                </a>

                <div class="sidebar-label">MENU UTAMA</div>

                <nav class="nav-menu">
                    <a href="{{ route('dashboard') }}"
                       class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <span>▦</span> Dashboard
                    </a>

                    <a href="{{ route('categories.index') }}"
                       class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                        <span>◈</span> Kategori
                    </a>

                    <a href="{{ route('items.index') }}"
                       class="{{ request()->routeIs('items.*') ? 'active' : '' }}">
                        <span>▤</span> Data Barang
                    </a>
                </nav>

                <div class="sidebar-bottom">
                    <span class="status-dot"></span>
                    Sistem inventaris aktif

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-logout btn-full" type="submit">
                            ↗ Keluar
                        </button>
                    </form>
                </div>
            </aside>

            <main class="main-content">
                <header class="topbar">
                    <div>
                        <span class="eyebrow">WORKSPACE / INVENTORY</span>
                        <p class="topbar-title">Inventory Control Center</p>
                    </div>

                    <div class="user-chip">
                        <div class="avatar">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <strong>{{ auth()->user()->name }}</strong>
                            <small>Administrator</small>
                        </div>
                    </div>
                </header>

                <section class="content-area">
                    @yield('content')
                </section>

                <footer class="footer">
                    INVENTARIS NEO · BUILT WITH LARAVEL
                </footer>
            </main>
        </div>
    @else
        @yield('content')
    @endauth
</body>
</html>