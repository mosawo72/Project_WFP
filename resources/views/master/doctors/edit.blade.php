@extends('layouts.app')

@section('title', 'Edit Dokter - VitaGuard')
@section('page-title', 'Edit Profil Dokter')

@section('content')
<div class="page-header">
    <h4><i class="fas fa-user-edit me-2" style="color: var(--accent);"></i>Edit Profil Dokter</h4>
    <p>Perbarui data dokter {{ $doctor->user->name }}</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('doctors.update', $doctor) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nama Dokter</label>
                    <input type="text" class="form-control" value="{{ $doctor->user->name }}" disabled>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="specialization" class="form-label fw-semibold">Spesialisasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="specialization" name="specialization" value="{{ old('specialization', $doctor->specialization) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="experience_years" class="form-label fw-semibold">Pengalaman (tahun) <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" id="experience_years" name="experience_years" value="{{ old('experience_years', $doctor->experience_years) }}" required min="0">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="schedule" class="form-label fw-semibold">Jadwal Praktik</label>
                    <input type="text" class="form-control" id="schedule" name="schedule" value="{{ old('schedule', $doctor->schedule) }}">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="bio" class="form-label fw-semibold">Bio / Deskripsi</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3">{{ old('bio', $doctor->bio) }}</textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, var(--secondary), #4f46e5); border: none; border-radius: 8px;">
                    <i class="fas fa-save me-1"></i> Update
                </button>
                <a href="{{ route('doctors.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
