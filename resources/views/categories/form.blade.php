@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div>
        <span class="eyebrow">MASTER DATA</span>
        <h1>{{ $category->exists ? 'Edit kategori' : 'Kategori baru' }}</h1>
        <p class="muted">Gunakan nama yang singkat dan mudah dikenali.</p>
    </div>

    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
        ← Kembali
    </a>
</div>

<div class="panel form-panel">
    <form
        action="{{ $category->exists
            ? route('categories.update', $category)
            : route('categories.store') }}"
        method="POST"
    >
        @csrf
        @if($category->exists)
            @method('PUT')
        @endif

        <label for="name">Nama kategori <span class="required">*</span></label>
        <input
            id="name"
            name="name"
            type="text"
            maxlength="255"
            value="{{ old('name', $category->name) }}"
            placeholder="Contoh: Aksesori"
            required
        >
        @error('name')
            <small class="field-error">{{ $message }}</small>
        @enderror

        <div class="form-actions">
            <a class="btn btn-secondary" href="{{ route('categories.index') }}">
                Batal
            </a>
            <button class="btn btn-primary" type="submit">
                Simpan kategori
            </button>
        </div>
    </form>
</div>
@endsection