@extends('layouts.app')

@section('title', 'Tambah Artikel - VitaGuard')
@section('page-title', 'Tambah Artikel')

@section('content')
<div class="page-header">
    <h4><i class="fas fa-plus-circle me-2" style="color: var(--accent);"></i>Tambah Artikel Baru</h4>
    <p>Isi form di bawah untuk menambahkan artikel kesehatan baru</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8 mb-3">
                    <label for="title" class="form-label fw-semibold">Judul Artikel <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="category" class="form-label fw-semibold">Kategori <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}" required placeholder="contoh: Nutrisi, Olahraga">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="user_id" class="form-label fw-semibold">Penulis <span class="text-danger">*</span></label>
                    <select class="form-select" id="user_id" name="user_id" required>
                        <option value="">-- Pilih Penulis --</option>
                        @foreach($admins as $admin)
                            <option value="{{ $admin->id }}" {{ old('user_id') == $admin->id ? 'selected' : '' }}>{{ $admin->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="content" class="form-label fw-semibold">Konten <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="content" name="content" rows="6" required>{{ old('content') }}</textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, var(--accent), #d97706); border: none; border-radius: 8px;">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('articles.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
