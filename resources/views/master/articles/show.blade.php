@extends('layouts.app')

@section('title', 'Detail Artikel - VitaGuard')
@section('page-title', 'Detail Artikel')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-newspaper me-2" style="color: var(--accent);"></i>Detail Artikel</h4>
        <p>Informasi lengkap artikel kesehatan</p>
    </div>
    <a href="{{ route('articles.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="mb-3">
            <span class="badge bg-light text-dark border me-2">{{ $article->category }}</span>
            <span class="badge-status badge-{{ $article->status }}">{{ ucfirst($article->status) }}</span>
        </div>
        <h3 class="fw-bold mb-2">{{ $article->title }}</h3>
        <p class="text-muted mb-4"><i class="fas fa-user me-1"></i> {{ $article->user->name }} &nbsp;|&nbsp; <i class="fas fa-calendar me-1"></i> {{ $article->created_at->format('d M Y, H:i') }}</p>
        <hr>
        <div class="mt-3" style="line-height: 1.8;">
            {!! nl2br(e($article->content)) !!}
        </div>
        <hr>
        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('articles.edit', $article) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 8px;">
                    <i class="fas fa-trash me-1"></i> Hapus
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
