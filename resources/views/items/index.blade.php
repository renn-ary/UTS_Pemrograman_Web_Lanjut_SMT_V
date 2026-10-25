@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <span class="eyebrow">INVENTORY / MASTER DATA</span>
        <h1>Daftar <span class="highlight">barang.</span></h1>
        <p class="muted">Pantau harga, stok, dan kategori barang.</p>
    </div>

    <a href="{{ route('items.create') }}" class="btn btn-primary">
        + Tambah barang
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

<div class="panel">
    <form class="search-bar" action="{{ route('items.index') }}" method="GET">
        <input
            type="search"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama barang atau kategori..."
        >
        <button class="btn btn-primary" type="submit">Cari</button>
        @if(request('search'))
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Reset</a>
        @endif
    </form>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td><span class="pill">{{ $item->category->name }}</span></td>
                        <td>Rp {{ number_format((float) $item->price, 0, ',', '.') }}</td>
                        <td>
                            <span class="stock-badge {{ $item->stock < 5 ? 'stock-low' : '' }}">
                                {{ $item->stock }} unit
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a class="btn btn-small btn-secondary"
                                   href="{{ route('items.edit', $item) }}">
                                    Edit
                                </a>

                                <form action="{{ route('items.destroy', $item) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-small btn-danger" type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            Data barang tidak ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">{{ $items->links() }}</div>
</div>
@endsection