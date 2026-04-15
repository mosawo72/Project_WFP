@extends('layouts.app')

@section('title', 'Detail Dokter - VitaGuard')
@section('page-title', 'Detail Dokter')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-user-md me-2" style="color: var(--secondary);"></i>Detail Dokter</h4>
        <p>Informasi lengkap profil dokter</p>
    </div>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 text-center mb-3">
                <div style="width:80px;height:80px;font-size:2rem;border-radius:50%;background:linear-gradient(135deg,#6366f1,#4f46e5);color:white;display:flex;align-items:center;justify-content:center;font-weight:700;margin:0 auto;">
                    {{ strtoupper(substr($doctor->user->name, 0, 1)) }}
                </div>
            </div>
            <div class="col-md-10">
                <table class="table table-borderless">
                    <tr><th width="180">Nama</th><td>{{ $doctor->user->name }}</td></tr>
                    <tr><th>Email</th><td>{{ $doctor->user->email }}</td></tr>
                    <tr><th>Spesialisasi</th><td><span class="badge bg-light text-dark border">{{ $doctor->specialization }}</span></td></tr>
                    <tr><th>Pengalaman</th><td>{{ $doctor->experience_years }} tahun</td></tr>
                    <tr><th>Jadwal Praktik</th><td>{{ $doctor->schedule ?? '-' }}</td></tr>
                    <tr><th>Bio</th><td>{{ $doctor->bio ?? '-' }}</td></tr>
                </table>
                <div class="d-flex gap-2 mt-2">
                    <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                        <i class="fas fa-edit me-1"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
