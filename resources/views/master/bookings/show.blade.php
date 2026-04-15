@extends('layouts.app')

@section('title', 'Detail Booking - VitaGuard')
@section('page-title', 'Detail Booking')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-calendar-check me-2" style="color: #ef4444;"></i>Detail Booking</h4>
        <p>Informasi lengkap booking konsultasi</p>
    </div>
    <a href="{{ route('bookings.index') }}" class="btn btn-secondary" style="border-radius: 8px;">
        <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-borderless">
            <tr><th width="180">Member</th><td>{{ $booking->member->name }}</td></tr>
            <tr><th>Dokter</th><td>{{ $booking->doctor->user->name }} <span class="badge bg-light text-dark border">{{ $booking->doctor->specialization }}</span></td></tr>
            <tr><th>Tanggal</th><td>{{ $booking->booking_date->format('d M Y') }}</td></tr>
            <tr><th>Jam</th><td>{{ $booking->booking_time }}</td></tr>
            <tr><th>Status</th><td><span class="badge-status badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td></tr>
            <tr><th>Catatan</th><td>{{ $booking->notes ?? '-' }}</td></tr>
            <tr><th>Dibuat</th><td>{{ $booking->created_at->format('d M Y, H:i') }}</td></tr>
        </table>
        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-warning btn-sm" style="border-radius: 8px;">
                <i class="fas fa-edit me-1"></i> Edit
            </a>
            <form action="{{ route('bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
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
