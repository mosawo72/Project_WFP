@extends('layouts.app')

@section('title', 'Tambah Booking - VitaGuard')
@section('page-title', 'Tambah Booking')

@section('content')
<div class="page-header">
    <h4><i class="fas fa-plus-circle me-2" style="color: #ef4444;"></i>Tambah Booking Baru</h4>
    <p>Isi form di bawah untuk membuat booking konsultasi baru</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="member_id" class="form-label fw-semibold">Member <span class="text-danger">*</span></label>
                    <select class="form-select" id="member_id" name="member_id" required>
                        <option value="">-- Pilih Member --</option>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="doctor_id" class="form-label fw-semibold">Dokter <span class="text-danger">*</span></label>
                    <select class="form-select" id="doctor_id" name="doctor_id" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>{{ $doctor->user->name }} - {{ $doctor->specialization }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="booking_date" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ old('booking_date') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="booking_time" class="form-label fw-semibold">Jam <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" id="booking_time" name="booking_time" value="{{ old('booking_time') }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="notes" class="form-label fw-semibold">Catatan</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #ef4444, #dc2626); border: none; border-radius: 8px;">
                    <i class="fas fa-save me-1"></i> Simpan
                </button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
