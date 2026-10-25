@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <span class="eyebrow">INVENTORY / FORM</span>
        <h1>{{ $item->exists ? 'Edit barang' : 'Barang baru' }}</h1>
        <p class="muted">Isi informasi barang dengan benar.</p>
    </div>

    <a href="{{ route('items.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

@if($categories->isEmpty())
    <div class="alert alert-error">
        Buat setidaknya satu kategori sebelum menambahkan barang.
        <a href="{{ route('categories.create') }}">Buat kategori</a>
    </div>
@endif

<div class="panel form-panel">
    <form
        action="{{ $item->exists
            ? route('items.update', $item)
            : route('items.store') }}"
        method="POST"
    >
        @csrf
        @if($item->exists)
            @method('PUT')
        @endif

        <label for="name">Nama barang <span class="required">*</span></label>
        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $item->name) }}"
            placeholder="Contoh: Keyboard Mechanical"
            required
        >
        @error('name') <small class="field-error">{{ $message }}</small> @enderror

        <label for="category_id">Kategori <span class="required">*</span></label>
        <select id="category_id" name="category_id" required>
            <option value="">Pilih kategori</option>
            @foreach($categories as $category)
                <option
                    value="{{ $category->id }}"
                    @selected((string) old('category_id', $item->category_id) === (string) $category->id)
                >
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <small class="field-error">{{ $message }}</small> @enderror

        <div class="form-grid">
            <div>
                <label for="price">Harga (Rp) <span class="required">*</span></label>
                <input
                    id="price"
                    name="price"
                    type="number"
                    step="0.01"
                    min="0"
                    value="{{ old('price', $item->price) }}"
                    placeholder="150000"
                    required
                >
                @error('price') <small class="field-error">{{ $message }}</small> @enderror
            </div>

            <div>
                <label for="stock">Stok <span class="required">*</span></label>
                <input
                    id="stock"
                    name="stock"
                    type="number"
                    step="1"
                    min="0"
                    value="{{ old('stock', $item->stock ?? 0) }}"
                    placeholder="10"
                    required
                >
                @error('stock') <small class="field-error">{{ $message }}</small> @enderror
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('items.index') }}" class="btn btn-secondary">Batal</a>
            <button
                class="btn btn-primary"
                type="submit"
                @disabled($categories->isEmpty())
            >
                Simpan barang
            </button>
        </div>
    </form>
</div>
@endsection