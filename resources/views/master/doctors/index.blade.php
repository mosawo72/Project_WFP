@extends('layouts.app')

@section('title', 'Data Dokter - VitaGuard')
@section('page-title', 'Master Data Dokter')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-user-md me-2" style="color: var(--secondary);"></i>Data Dokter</h4>
        <p>Daftar dokter yang tersedia di VitaGuard</p>
    </div>
    <a href="{{ route('doctors.create') }}" class="btn btn-primary" style="background: linear-gradient(135deg, var(--secondary), #4f46e5); border: none; border-radius: 8px;">
        <i class="fas fa-plus me-1"></i> Tambah Dokter
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6><i class="fas fa-table me-2"></i>Tabel Dokter</h6>
        <span class="badge bg-primary rounded-pill">{{ $doctors->count() }} data</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table" id="doctors-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Pengalaman</th>
                        <th>Jadwal Praktik</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $index => $doctor)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div style="width:32px;height:32px;font-size:0.7rem;border-radius:50%;background:linear-gradient(135deg,#6366f1,#4f46e5);color:white;display:flex;align-items:center;justify-content:center;font-weight:600;">
                                    {{ strtoupper(substr($doctor->user->name, 0, 1)) }}
                                </div>
                                <strong>{{ $doctor->user->name }}</strong>
                            </div>
                        </td>
                        <td><span class="badge bg-light text-dark border">{{ $doctor->specialization }}</span></td>
                        <td>{{ $doctor->experience_years }} tahun</td>
                        <td><small class="text-muted">{{ $doctor->schedule }}</small></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('doctors.show', $doctor) }}" class="btn btn-sm btn-outline-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus profil dokter ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
