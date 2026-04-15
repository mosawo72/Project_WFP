@extends('layouts.app')

@section('title', 'Edit Booking - VitaGuard')
@section('page-title', 'Edit Booking')

@section('content')
<div class="page-header">
    <h4><i class="fas fa-edit me-2" style="color: #ef4444;"></i>Edit Booking</h4>
    <p>Perbarui data booking konsultasi</p>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('bookings.update', $booking) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="member_id" class="form-label fw-semibold">Member <span class="text-danger">*</span></label>
                    <select class="form-select" id="member_id" name="member_id" required>
                        @foreach($members as $member)
                            <option value="{{ $member->id }}" {{ old('member_id', $booking->member_id) == $member->id ? 'selected' : '' }}>{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="doctor_id" class="form-label fw-semibold">Dokter <span class="text-danger">*</span></label>
                    <select class="form-select" id="doctor_id" name="doctor_id" required>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id', $booking->doctor_id) == $doctor->id ? 'selected' : '' }}>{{ $doctor->user->name }} - {{ $doctor->specialization }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="booking_date" class="form-label fw-semibold">Tanggal <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="booking_date" name="booking_date" value="{{ old('booking_date', $booking->booking_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="booking_time" class="form-label fw-semibold">Jam <span class="text-danger">*</span></label>
                    <input type="time" class="form-control" id="booking_time" name="booking_time" value="{{ old('booking_time', $booking->booking_time) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="status" class="form-label fw-semibold">Status <span class="text-danger">*</span></label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="notes" class="form-label fw-semibold">Catatan</label>
                    <textarea class="form-control" id="notes" name="notes" rows="3">{{ old('notes', $booking->notes) }}</textarea>
                </div>
            </div>
            <div class="d-flex gap-2 mt-2">
                <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #ef4444, #dc2626); border: none; border-radius: 8px;">
                    <i class="fas fa-save me-1"></i> Update
                </button>
                <a href="{{ route('bookings.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
