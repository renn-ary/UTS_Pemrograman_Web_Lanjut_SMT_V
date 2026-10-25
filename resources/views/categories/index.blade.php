@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <span class="eyebrow">MASTER DATA</span>
        <h1>Kategori <span class="highlight">.</span></h1>
        <p class="muted">Kelompokkan barang agar inventaris lebih teratur.</p>
    </div>

    <a class="btn btn-primary" href="{{ route('categories.create') }}">
        + Tambah kategori
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
@endif

<div class="panel">
    <div class="panel-heading">
        <h2>Daftar kategori</h2>
        <span class="pill">{{ $categories->total() }} kategori</span>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Nama kategori</th>
                    <th>Jumlah barang</th>
                    <th>Dibuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->items_count }} barang</td>
                        <td>{{ $category->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="action-group">
                                <a class="btn btn-small btn-secondary"
                                   href="{{ route('categories.edit', $category) }}">
                                    Edit
                                </a>

                                <form action="{{ route('categories.destroy', $category) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus kategori ini?')">
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
                        <td colspan="4" class="empty-state">
                            Belum ada kategori. Tambahkan kategori pertama.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">{{ $categories->links() }}</div>
</div>
@endsection