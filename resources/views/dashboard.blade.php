@extends('layouts.app')

@section('title', 'Dashboard - VitaGuard')
@section('page-title', 'Dashboard')

@section('content')
<div class="page-header">
    <h4>Dashboard</h4>
    <p>Selamat datang di VitaGuard Health Service Platform</p>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-md-4 col-lg mb-3">
        <div class="stat-card bg-gradient-primary">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $totalUsers }}</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-icon"><i class="fas fa-users"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg mb-3">
        <div class="stat-card bg-gradient-secondary">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $totalDoctors }}</div>
                    <div class="stat-label">Total Dokter</div>
                </div>
                <div class="stat-icon"><i class="fas fa-user-md"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-lg mb-3">
        <div class="stat-card bg-gradient-warning">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $totalArticles }}</div>
                    <div class="stat-label">Total Artikel</div>
                </div>
                <div class="stat-icon"><i class="fas fa-newspaper"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg mb-3">
        <div class="stat-card bg-gradient-info">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $totalConsultations }}</div>
                    <div class="stat-label">Total Konsultasi</div>
                </div>
                <div class="stat-icon"><i class="fas fa-comments"></i></div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg mb-3">
        <div class="stat-card bg-gradient-danger">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-number">{{ $totalBookings }}</div>
                    <div class="stat-label">Total Booking</div>
                </div>
                <div class="stat-icon"><i class="fas fa-calendar-check"></i></div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats: Pending & Active -->
<div class="row mb-4">
    <div class="col-md-6 mb-3">
        <div class="card border-0" style="border-left: 4px solid #f59e0b !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="width:48px;height:48px;border-radius:10px;background:#fef3c7;display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-clock" style="color:#92400e;font-size:1.2rem;"></i>
                </div>
                <div>
                    <div style="font-size:1.5rem;font-weight:700;color:#0f172a;">{{ $pendingBookings }}</div>
                    <div style="font-size:0.8rem;color:#94a3b8;">Booking Menunggu Konfirmasi</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card border-0" style="border-left: 4px solid #06b6d4 !important;">
            <div class="card-body d-flex align-items-center gap-3">
                <div style="width:48px;height:48px;border-radius:10px;background:#dbeafe;display:flex;align-items:center;justify-content:center;">
                    <i class="fas fa-headset" style="color:#1e40af;font-size:1.2rem;"></i>
                </div>
                <div>
                    <div style="font-size:1.5rem;font-weight:700;color:#0f172a;">{{ $activeConsultations }}</div>
                    <div style="font-size:0.8rem;color:#94a3b8;">Konsultasi Aktif</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Data Tables -->
<div class="row">
    <!-- Recent Bookings -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6><i class="fas fa-calendar-check me-2" style="color:#ef4444;"></i>Booking Terbaru</h6>
                <a href="{{ route('bookings.index') }}" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                @if($recentBookings->isEmpty())
                    <div class="text-center py-4">
                        <p class="text-muted small mb-0">Belum ada data booking</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Dokter</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentBookings as $booking)
                                <tr>
                                    <td>{{ $booking->member->name }}</td>
                                    <td>{{ $booking->doctor->user->name }}</td>
                                    <td>{{ $booking->booking_date->format('d M Y') }}</td>
                                    <td><span class="badge-status badge-{{ $booking->status }}">{{ ucfirst($booking->status) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Recent Consultations -->
    <div class="col-lg-6 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6><i class="fas fa-comments me-2" style="color:#06b6d4;"></i>Konsultasi Terbaru</h6>
                <a href="{{ route('consultations.index') }}" class="btn btn-sm btn-outline-secondary" style="border-radius:6px;">Lihat Semua</a>
            </div>
            <div class="card-body p-0">
                @if($recentConsultations->isEmpty())
                    <div class="text-center py-4">
                        <p class="text-muted small mb-0">Belum ada data konsultasi</p>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Dokter</th>
                                    <th>Subjek</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentConsultations as $consultation)
                                <tr>
                                    <td>{{ $consultation->member->name }}</td>
                                    <td>{{ $consultation->doctor->user->name }}</td>
                                    <td>{{ Str::limit($consultation->subject, 20) }}</td>
                                    <td><span class="badge-status badge-{{ $consultation->status }}">{{ ucfirst($consultation->status) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
