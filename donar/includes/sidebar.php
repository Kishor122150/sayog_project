<?php
// includes/sidebar.php
// IMPORTANT: session_start() MUST be at the very top, before ANY output

// Start session first - before any HTML output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$donorName = $_SESSION['donor_name'] ?? 'Rajesh Sharma';
$donorId = $_SESSION['donor_id'] ?? 'DON-2024-001';
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard | Sayog</title>

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #16a34a;
            --primary-dark: #14532d;
            --primary-light: #22c55e;
            --bg: #f3faf4;
            --card: #ffffff;
            --muted: #6b7280;
            --sidebar-width: 280px;
            --sidebar-collapsed: 80px;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: radial-gradient(circle at 10% 10%, rgba(34, 197, 94, 0.12), transparent 30%),
                radial-gradient(circle at 90% 30%, rgba(20, 83, 45, 0.08), transparent 35%),
                var(--bg);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(135deg, #0a2b1a 0%, #0f3d23 100%);
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed);
        }

        .sidebar.collapsed .sidebar-text,
        .sidebar.collapsed .nav-label,
        .sidebar.collapsed .logo-text {
            display: none;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px;
        }

        .sidebar.collapsed .nav-link i {
            margin-right: 0;
            font-size: 1.3rem;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 20px;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo i {
            font-size: 1.8rem;
            color: var(--primary-light);
        }

        .donor-info {
            padding: 15px 20px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 12px;
            margin: 15px;
        }

        .donor-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-item {
            margin: 8px 15px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.2s;
            font-weight: 500;
        }

        .nav-link i {
            font-size: 1.2rem;
            width: 24px;
        }

        .nav-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        .nav-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 15px;
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed);
        }

        .topbar {
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 12px 0;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .toggle-btn {
            background: var(--primary);
            border: none;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .toggle-btn:hover {
            background: var(--primary-dark);
            transform: scale(1.05);
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: 999;
                display: none;
            }

            .mobile-overlay.active {
                display: block;
            }
        }

        @media (min-width: 769px) {
            .mobile-toggle {
                display: none;
            }
        }

        .footer {
            color: #94a3b8;
            padding: 28px 0;
            margin-top: 40px;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }

        /* Page Content Styles */
        .welcome-hero {
            background: linear-gradient(135deg, rgba(22, 163, 74, 0.95), rgba(20, 83, 45, 0.95));
            color: #fff;
            border-radius: 18px;
            padding: 28px;
            position: relative;
            overflow: hidden;
        }

        .welcome-hero::after {
            content: '';
            position: absolute;
            width: 520px;
            height: 520px;
            right: -260px;
            top: -320px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.18), transparent 60%);
            transform: rotate(20deg);
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.96);
            border: 1px solid rgba(22, 163, 74, 0.12);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(22, 163, 74, 0.12);
            color: #14532d;
        }

        .donation-table,
        .donation-form,
        .requests-container {
            background: white;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .badge-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-active {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-completed {
            background: #dcfce7;
            color: #166534;
        }

        .badge-pending {
            background: #fed7aa;
            color: #9a3412;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #16a34a, #14532d);
            border: none;
            color: white;
            padding: 10px 24px;
            border-radius: 8px;
            font-weight: 600;
        }

        .btn-primary-custom:hover {
            filter: brightness(0.98);
            transform: translateY(-2px);
        }

        .request-card {
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 15px;
            transition: all 0.2s;
        }

        .request-card:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .btn-approve,
        .btn-decline {
            padding: 8px 20px;
            border-radius: 8px;
            border: none;
            color: white;
        }

        .btn-approve {
            background: #16a34a;
        }

        .btn-approve:hover {
            background: #14532d;
        }

        .btn-decline {
            background: #ef4444;
        }

        .btn-decline:hover {
            background: #dc2626;
        }

        .form-label {
            font-weight: 600;
            color: #1f2937;
        }
    </style>
</head>

<body>

    <!-- Mobile Overlay -->
    <div class="mobile-overlay" id="mobileOverlay"></div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="../index.php" class="logo">
                <i class="bi bi-hand-heart"></i>
                <span class="logo-text">Say<span style="color: #bef264;">og</span></span>
            </a>
        </div>

        <div class="donor-info">
            <div class="d-flex align-items-center gap-3">
                <div class="donor-avatar">
                    <?php echo strtoupper(substr($donorName, 0, 1)); ?>
                </div>
                <div class="sidebar-text">
                    <div class="fw-bold"><?php echo htmlspecialchars($donorName); ?></div>
                    <small style="opacity: 0.7;"><?php echo htmlspecialchars($donorId); ?></small>
                </div>
            </div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
                    <i class="bi bi-speedometer2"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="donations.php" class="nav-link <?php echo $current_page == 'donations.php' ? 'active' : ''; ?>">
                    <i class="bi bi-box-seam"></i>
                    <span class="sidebar-text">My Donations</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="requests.php" class="nav-link <?php echo $current_page == 'requests.php' ? 'active' : ''; ?>">
                    <i class="bi bi-bell"></i>
                    <span class="sidebar-text">Requests</span>
                    <span class="badge bg-danger ms-auto" style="font-size: 0.7rem;">3</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="history.php" class="nav-link <?php echo $current_page == 'history.php' ? 'active' : ''; ?>">
                    <i class="bi bi-clock-history"></i>
                    <span class="sidebar-text">History</span>
                </a>
            </li>
            <div class="nav-divider"></div>
            <li class="nav-item">
                <a href="profile.php" class="nav-link <?php echo $current_page == 'profile.php' ? 'active' : ''; ?>">
                    <i class="bi bi-person"></i>
                    <span class="sidebar-text">My Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="settings.php" class="nav-link <?php echo $current_page == 'settings.php' ? 'active' : ''; ?>">
                    <i class="bi bi-gear"></i>
                    <span class="sidebar-text">Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="support.php" class="nav-link <?php echo $current_page == 'support.php' ? 'active' : ''; ?>">
                    <i class="bi bi-headset"></i>
                    <span class="sidebar-text">Support</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="?logout=1" class="nav-link text-danger" onclick="return confirm('Are you sure you want to logout?')">
                    <i class="bi bi-box-arrow-right"></i>
                    <span class="sidebar-text">Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content Start -->
    <div class="main-content" id="mainContent">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container-fluid px-4">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">
                        <button class="toggle-btn" id="sidebarToggle">
                            <i class="bi bi-list"></i>
                        </button>
                        <button class="toggle-btn mobile-toggle" id="mobileMenuToggle">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </button>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="../index.php" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid px-4 py-4">