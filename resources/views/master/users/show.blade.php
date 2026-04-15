@extends('layouts.app')

@section('title', 'Detail User - VitaGuard')
@section('page-title', 'Detail User')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-user me-2" style="color: var(--secondary);"></i>Detail User</h4>
        <p>Informasi lengkap pengguna</p>
    </div>
    <a href="{{ route('users.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 text-center mb-3">
                <div style="width:80px;height:80px;font-size:2rem;border-radius:50%;background:linear-gradient(135deg,#0d9488,#6366f1);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;margin:0 auto;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
            </div>
            <div class="col-md-10">
                <table class="table table-borderless">
                    <tr><th width="180">Nama</th><td>{{ $user->name }}</td></tr>
                    <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                    <tr><th>Role</th><td><span class="badge-role badge-{{ $user->role }}">{{ ucfirst($user->role) }}</span></td></tr>
                    <tr><th>Telepon</th><td>{{ $user->phone ?? '-' }}</td></tr>
                    <tr><th>Alamat</th><td>{{ $user->address ?? '-' }}</td></tr>
                    <tr><th>Terdaftar</th><td>{{ $user->created_at->format('d M Y, H:i') }}</td></tr>
                    <tr><th>Terakhir Update</th><td>{{ $user->updated_at->format('d M Y, H:i') }}</td></tr>
                </table>
                <div class="d-flex gap-2 mt-2">
                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 8px;">
                            <i class="fas fa-trash me-1"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
