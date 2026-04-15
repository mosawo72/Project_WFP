@extends('layouts.app')

@section('title', 'Data Booking - VitaGuard')
@section('page-title', 'Master Data Booking')

@section('content')
<div class="page-header d-flex justify-content-between align-items-start">
    <div>
        <h4><i class="fas fa-calendar-check me-2" style="color: #ef4444;"></i>Data Booking Konsultasi</h4>
        <p>Daftar booking konsultasi di VitaGuard</p>
    </div>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary" style="background: linear-gradient(135deg, #ef4444, #dc2626); border: none; border-radius: 8px;">
        <i class="fas fa-plus me-1"></i> Tambah Booking
    </a>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h6><i class="fas fa-table me-2"></i>Tabel Booking</h6>
        <span class="badge bg-primary rounded-pill">{{ $bookings->count() }} data</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table" id="bookings-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Member</th>
                        <th>Dokter</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->member->name }}</td>
                        <td>
                            <strong>{{ $booking->doctor->user->name }}</strong>
                            <br><small class="text-muted">{{ $booking->doctor->specialization }}</small>
                        </td>
                        <td>{{ $booking->booking_date->format('d M Y') }}</td>
                        <td>{{ $booking->booking_time }}</td>
                        <td><span class="badge-status badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td>
                        <td>{{ Str::limit($booking->notes, 25) ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="{{ route('bookings.show', $booking) }}" class="btn btn-sm btn-outline-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-sm btn-outline-warning" title="Edit"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus booking ini?')">
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
