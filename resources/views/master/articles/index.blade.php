@extends('layouts.app')

@section('title', 'Data Artikel - VitaGuard')
@section('page-title', 'Master Data Artikel')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-newspaper me-2" style="color: var(--accent);"></i>Data Artikel Kesehatan</h4>
        <p>Daftar artikel kesehatan di VitaGuard</p>
    </div>
    <a href="{{ route('articles.create') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--accent), #d97706); border: none; border-radius: 8px;">
        <i class="fas fa-plus me-1"></i> Tambah Artikel
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6><i class="fas fa-table me-2"></i>Tabel Artikel</h6>
        <span class="badge bg-primary rounded-pill">{{ $articles->total() }} data</span>
    </div>
    <div class="card-body p-0">
        @if($articles->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3 d-block"></i>
                <h6 class="text-muted">Belum ada data artikel</h6>
                <p class="text-muted small">Klik tombol "Tambah Artikel" untuk menambahkan artikel baru</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" id="articles-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $index => $article)
                        <tr>
                            <td>{{ $articles->firstItem() + $index }}</td>
                            <td><strong>{{ Str::limit($article->title, 35) }}</strong></td>
                            <td><span class="badge bg-light text-dark border">{{ $article->category }}</span></td>
                            <td>{{ $article->user->name }}</td>
                            <td><span class="badge-status badge-{{ $article->status }}">{{ ucfirst($article->status) }}</span></td>
                            <td>{{ $article->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('articles.show', $article) }}" class="btn btn-sm btn-outline-info" title="Detail"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('articles.edit', $article) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    @can('delete-permission', Auth::user())
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                    </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    @if($articles->hasPages())
        <div class="card-footer bg-white d-flex justify-content-center">
            {{ $articles->links() }}
        </div>
    @endif
</div>
@endsection
