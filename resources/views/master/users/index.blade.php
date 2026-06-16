@extends('layouts.app')

@section('title', 'Data Users - VitaGuard')
@section('page-title', 'Master Data Users')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-users me-2" style="color: var(--primary);"></i>Data Users</h4>
        <p>Daftar semua pengguna yang terdaftar di VitaGuard</p>
    </div>
    <a href="{{ route('users.create') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border: none; border-radius: 8px;">
        <i class="fas fa-plus me-1"></i> Tambah User
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6><i class="fas fa-table me-2"></i>Tabel Users</h6>
        <span class="badge bg-primary rounded-pill">{{ $users->total() }} data</span>
    </div>
    <div class="card-body p-0">
        @if($users->isEmpty())
            <div class="text-center py-5">
                <i class="fas fa-users fa-3x text-muted mb-3 d-block"></i>
                <h6 class="text-muted">Belum ada data user</h6>
                <p class="text-muted small">Klik tombol "Tambah User" untuk menambahkan user baru</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table" id="users-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $users->firstItem() + $index }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div style="width:32px;height:32px;font-size:0.7rem;border-radius:50%;background:linear-gradient(135deg,#0d9488,#6366f1);color:white;display:flex;align-items:center;justify-content:center;font-weight:600;">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    <strong>{{ $user->name }}</strong>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span class="badge-role badge-{{ $user->role }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>{{ $user->phone ?? '-' }}</td>
                            <td>{{ Str::limit($user->address, 25) ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-outline-info" title="Detail"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                    @can('delete-permission', Auth::user())
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
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
    @if($users->hasPages())
        <div class="card-footer bg-white d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection
