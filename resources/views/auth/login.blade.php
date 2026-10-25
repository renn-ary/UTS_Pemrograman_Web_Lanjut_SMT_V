@extends('layouts.app')

@section('content')
<div class="login-shell">
    <section class="login-card">
        <span class="eyebrow">INVENTARIS / PORTAL</span>
        <div class="brand-mark">IN.</div>

        <h1>Masuk ke<br>ruang stokmu.</h1>
        <p class="muted">
            Kelola barang, kategori, dan persediaan dalam satu tempat.
        </p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <label for="email">Email</label>
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="admin@inventaris.test"
                autocomplete="username"
                required
                autofocus
            >

            <label for="password">Password</label>
            <input
                id="password"
                type="password"
                name="password"
                placeholder="Masukkan password"
                autocomplete="current-password"
                required
            >

            <label class="remember-row">
                <input type="checkbox" name="remember" value="1">
                Ingat saya
            </label>

            <button class="btn btn-primary btn-full" type="submit">
                Masuk ke dashboard →
            </button>
        </form>

        <p class="tiny-note">
            INVENTARIS NEO · MANAGEMENT SYSTEM
        </p>
    </section>
</div>
@endsection