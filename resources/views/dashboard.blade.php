@extends('layouts.app')

@section('title', 'Dashboard — Inventaris Neo')

@section('content')
<div class="welcome-banner">
    <div>
        <span class="eyebrow">OVERVIEW / {{ now()->format('d M Y') }}</span>
        <h1>Stok terkendali.<br>Bisnis lebih pasti.</h1>
        <p>Pantau persediaan toko komputer dari satu dashboard.</p>
        <a href="{{ route('items.index') }}" class="btn btn-dark">
            Lihat semua barang →
        </a>
    </div>
    <div class="banner-decoration">STOCK<br>MATTERS<span>.</span></div>
</div>

<div class="stats-grid">
    <article class="stat-card stat-yellow">
        <span class="stat-icon">◈</span>
        <p>Total kategori</p>
        <h2>{{ number_format($categoryCount) }}</h2>
        <span class="stat-caption">Kelompok inventaris</span>
    </article>

    <article class="stat-card stat-blue">
        <span class="stat-icon">▤</span>
        <p>Jenis barang</p>
        <h2>{{ number_format($itemCount) }}</h2>
        <span class="stat-caption">Produk terdaftar</span>
    </article>

    <article class="stat-card stat-pink">
        <span class="stat-icon">▥</span>
        <p>Total stok</p>
        <h2>{{ number_format($totalStock) }}</h2>
        <span class="stat-caption">Unit tersedia</span>
    </article>

    <article class="stat-card stat-white">
        <span class="stat-icon">Rp</span>
        <p>Nilai persediaan</p>
        <h2 class="stat-money">
            Rp {{ number_format((float) $totalValue, 0, ',', '.') }}
        </h2>
        <span class="stat-caption">Estimasi harga × stok</span>
    </article>
</div>

<div class="section-heading">
    <div>
        <span class="eyebrow">RECENT ACTIVITY</span>
        <h2>Barang terbaru</h2>
    </div>
    <a href="{{ route('items.index') }}" class="text-link">Lihat semua →</a>
</div>

<div class="panel">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nama barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latestItems as $item)
                    <tr>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td><span class="pill">{{ $item->category->name }}</span></td>
                        <td>Rp {{ number_format((float) $item->price, 0, ',', '.') }}</td>
                        <td>
                            <span class="stock-badge {{ $item->stock < 5 ? 'stock-low' : '' }}">
                                {{ $item->stock }} unit
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-state">
                            Belum ada barang. Isi data melalui menu Data Barang.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection