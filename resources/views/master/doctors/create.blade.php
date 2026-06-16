@extends('layouts.app')

@section('title', 'Tambah Dokter - VitaGuard')
@section('page-title', 'Tambah Profil Dokter')

@section('content')
<div class="page-header">
    <h4><i class="fas fa-user-md me-2" style="color: var(--secondary);"></i>Tambah Profil Dokter</h4>
    <p>Isi form di bawah untuk menambahkan profil dokter baru</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('doctors.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="user_id" class="form-label fw-semibold">User (Dokter) <span class="text-danger">*</span></label>
                    <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                        <option value="">-- Pilih User Dokter --</option>
                        @foreach($dokterUsers as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }} ({{ $user->email }})</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hanya user dengan role "dokter" yang belum punya profil</small>
                    @error('user_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="specialization" class="form-label fw-semibold">Spesialisasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('specialization') is-invalid @enderror" id="specialization" name="specialization" value="{{ old('specialization') }}" required placeholder="contoh: Dokter Umum, Dokter Gigi">
                    @error('specialization')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="experience_years" class="form-label fw-semibold">Pengalaman (tahun) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('experience_years') is-invalid @enderror" id="experience_years" name="experience_years" value="{{ old('experience_years') }}" required min="0">
                    @error('experience_years')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="schedule" class="form-label fw-semibold">Jadwal Praktik</label>
                    <input type="text" class="form-control @error('schedule') is-invalid @enderror" id="schedule" name="schedule" value="{{ old('schedule') }}" placeholder="contoh: Senin-Jumat: 08:00-16:00">
                    @error('schedule')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12 mb-3">
                    <label for="bio" class="form-label fw-semibold">Bio / Deskripsi</label>
                    <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3">{{ old('bio') }}</textarea>
                    @error('bio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, var(--secondary), #4f46e5); border: none; border-radius: 8px;">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('doctors.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
