<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="VitaGuard - Web-Based Health Service Platform">
    <title>@yield('title', 'VitaGuard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d9488;
            --primary-dark: #0f766e;
            --primary-light: #ccfbf1;
            --secondary: #6366f1;
            --accent: #f59e0b;
            --bg-dark: #0f172a;
            --bg-sidebar: #1e293b;
            --text-light: #94a3b8;
            --border-color: #334155;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f1f5f9;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 260px;
            height: 100vh;
            background: linear-gradient(180deg, var(--bg-dark) 0%, var(--bg-sidebar) 100%);
            padding: 0;
            z-index: 1000;
            overflow-y: auto;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar-brand .brand-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .sidebar-brand h4 {
            color: white;
            font-weight: 700;
            margin: 0;
            font-size: 1.2rem;
        }

        .sidebar-brand small {
            color: var(--text-light);
            font-size: 0.7rem;
            display: block;
        }

        .sidebar-menu {
            padding: 16px 12px;
        }

        .sidebar-menu .menu-label {
            color: var(--text-light);
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            padding: 12px 16px 8px;
        }

        .sidebar-menu .nav-link {
            color: #cbd5e1;
            padding: 10px 16px;
            border-radius: 8px;
            margin-bottom: 2px;
            font-size: 0.875rem;
            font-weight: 400;
            display: flex;
            align-items: center;
            gap: 12px;
            transition: all 0.2s ease;
        }

        .sidebar-menu .nav-link:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
        }

        .sidebar-menu .nav-link.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            font-weight: 500;
        }

        .sidebar-menu .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 0.95rem;
        }

        /* Main content */
        .main-content {
            margin-left: 260px;
            min-height: 100vh;
        }

        /* Top navbar */
        .top-navbar {
            background: white;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e2e8f0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .top-navbar h5 {
            margin: 0;
            font-weight: 600;
            color: var(--bg-dark);
        }

        .top-navbar .breadcrumb {
            margin: 0;
            font-size: 0.8rem;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info .avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 0.85rem;
        }

        /* Content area */
        .content-area {
            padding: 28px 32px;
        }

        /* Card styles */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06), 0 1px 2px rgba(0, 0, 0, 0.04);
            transition: all 0.2s ease;
        }

        .card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #f1f5f9;
            padding: 16px 20px;
            border-radius: 12px 12px 0 0 !important;
        }

        .card-header h6 {
            margin: 0;
            font-weight: 600;
            color: var(--bg-dark);
        }

        .card-body {
            padding: 20px;
        }

        /* Table styles */
        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f8fafc;
            border-bottom: 2px solid #e2e8f0;
            color: #475569;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 16px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 12px 16px;
            vertical-align: middle;
            color: #334155;
            font-size: 0.875rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Badge styles */
        .badge-role {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 500;
        }

        .badge-admin {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-dokter {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-member {
            background: #dcfce7;
            color: #166534;
        }

        .badge-status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.72rem;
            font-weight: 500;
        }

        .badge-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .badge-active, .badge-confirmed {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-completed {
            background: #dcfce7;
            color: #166534;
        }

        .badge-cancelled {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-published {
            background: #dcfce7;
            color: #166534;
        }

        .badge-draft {
            background: #f3f4f6;
            color: #6b7280;
        }

        /* Stats cards */
        .stat-card {
            border-radius: 12px;
            padding: 20px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .stat-card::after {
            content: '';
            position: absolute;
            top: -20px;
            right: -20px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.15);
        }

        .stat-card .stat-icon {
            font-size: 2rem;
            opacity: 0.8;
        }

        .stat-card .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
        }

        .stat-card .stat-label {
            font-size: 0.8rem;
            opacity: 0.85;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #0d9488, #0f766e);
        }

        .bg-gradient-secondary {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
        }

        .bg-gradient-warning {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        .bg-gradient-info {
            background: linear-gradient(135deg, #06b6d4, #0891b2);
        }

        .bg-gradient-danger {
            background: linear-gradient(135deg, #ef4444, #dc2626);
        }

        /* Page title */
        .page-header {
            margin-bottom: 24px;
        }

        .page-header h4 {
            font-weight: 700;
            color: var(--bg-dark);
            margin-bottom: 4px;
        }

        .page-header p {
            color: var(--text-light);
            margin: 0;
            font-size: 0.875rem;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.4s ease-out;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-icon">
                <i class="fas fa-heartbeat"></i>
            </div>
            <div>
                <h4>VitaGuard</h4>
                <small>Health Service Platform</small>
            </div>
        </div>
        <nav class="sidebar-menu">
            <div class="menu-label">Dashboard</div>
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
            </a>

            <div class="menu-label">Master Data</div>
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> Users
            </a>
            <a href="{{ route('doctors.index') }}" class="nav-link {{ request()->routeIs('doctors.*') ? 'active' : '' }}">
                <i class="fas fa-user-md"></i> Dokter
            </a>
            <a href="{{ route('articles.index') }}" class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}">
                <i class="fas fa-newspaper"></i> Artikel
            </a>
            <a href="{{ route('consultations.index') }}" class="nav-link {{ request()->routeIs('consultations.*') ? 'active' : '' }}">
                <i class="fas fa-comments"></i> Konsultasi
            </a>
            <a href="{{ route('bookings.index') }}" class="nav-link {{ request()->routeIs('bookings.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-check"></i> Booking
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Navbar -->
        <header class="top-navbar">
            <div>
                <h5>@yield('page-title', 'Dashboard')</h5>
            </div>
            <div class="user-info">
                <span class="text-muted" style="font-size: 0.85rem;">Admin VitaGuard</span>
                <div class="avatar">A</div>
            </div>
        </header>

        <!-- Content -->
        <div class="content-area fade-in">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 10px; border: none; background: #dcfce7; color: #166534;">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 10px; border: none; background: #fee2e2; color: #991b1b;">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
