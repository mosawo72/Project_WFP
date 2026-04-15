@extends('layouts.app')

@section('title', 'Detail Konsultasi - VitaGuard')
@section('page-title', 'Detail Konsultasi')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-comments me-2" style="color: #06b6d4;"></i>Detail Konsultasi</h4>
        <p>Informasi lengkap konsultasi</p>
    </div>
    <a href="{{ route('consultations.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-borderless">
            <tr><th width="180">Member</th><td>{{ $consultation->member->name }}</td></tr>
            <tr><th>Dokter</th><td>{{ $consultation->doctor->user->name }} <span class="badge bg-light text-dark border">{{ $consultation->doctor->specialization }}</span></td></tr>
            <tr><th>Subjek</th><td>{{ $consultation->subject }}</td></tr>
            <tr><th>Status</th><td><span class="badge-status badge-{{ $consultation->status }}">{{ ucfirst($consultation->status) }}</span></td></tr>
            <tr><th>Jadwal</th><td>{{ $consultation->scheduled_at ? $consultation->scheduled_at->format('d M Y, H:i') . ' WIB' : '-' }}</td></tr>
            <tr><th>Dibuat</th><td>{{ $consultation->created_at->format('d M Y, H:i') }}</td></tr>
        </table>
        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('consultations.edit', $consultation) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="{{ route('consultations.destroy', $consultation) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
