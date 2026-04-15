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
@endsection
