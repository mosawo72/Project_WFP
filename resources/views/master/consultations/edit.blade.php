@extends('layouts.app')

@section('title', 'Edit Konsultasi - VitaGuard')
@section('page-title', 'Edit Konsultasi')

@section('content')
<div class="page-header">
    <h4><i class="fas fa-edit me-2" style="color: #06b6d4;"></i>Edit Konsultasi</h4>
    <p>Perbarui data konsultasi</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('consultations.update', $consultation) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="member_id" class="form-label fw-semibold">Member <span class="text-danger">*</span></label>
                    <select class="form-select" id="member_id" name="member_id" required>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id', $consultation->member_id) == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="doctor_id" class="form-label fw-semibold">Dokter <span class="text-danger">*</span></label>
                    <select class="form-select" id="doctor_id" name="doctor_id" required>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id', $consultation->doctor_id) == $doctor->id ? 'selected' : '' }}>{{ $doctor->user->name }} - {{ $doctor->specialization }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="subject" class="form-label fw-semibold">Subjek Konsultasi <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $consultation->subject) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending" {{ old('status', $consultation->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="active" {{ old('status', $consultation->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ old('status', $consultation->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ old('status', $consultation->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="scheduled_at" class="form-label fw-semibold">Jadwal</label>
                    <input type="datetime-local" class="form-control" id="scheduled_at" name="scheduled_at" value="{{ old('scheduled_at', $consultation->scheduled_at ? $consultation->scheduled_at->format('Y-m-d\TH:i') : '') }}">
                </div>
            </div>
            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #06b6d4, #0891b2); border: none; border-radius: 8px;">
                    <i class="fas fa-save me-1"></i> Update
                </button>
                <a href="{{ route('consultations.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
