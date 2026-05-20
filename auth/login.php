<?php
// auth/login.php
// Fully responsive login + register page with Role Selection (Donor, Consumer, Admin)

session_start();

$message = '';
$messageType = 'info';
$activeForm = 'loginForm'; // Default to login form

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        $email = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');
        $role = $_POST['role'] ?? '';

        if ($email === '' || $password === '' || $role === '') {
            $message = 'Please enter email, password and select role.';
            $messageType = 'danger';
        } else {
            $message = 'Login submitted as ' . htmlspecialchars($role) . ' (layout only – no authentication yet).';
            $messageType = 'success';
        }
        $activeForm = 'loginForm';
    }

    if ($action === 'register') {
        $name = trim((string)($_POST['name'] ?? ''));
        $email = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');
        $confirm = (string)($_POST['confirm_password'] ?? '');
        $role = $_POST['role'] ?? '';

        if ($name === '' || $email === '' || $password === '' || $confirm === '' || $role === '') {
            $message = 'Please fill all register fields including role selection.';
            $messageType = 'danger';
            $activeForm = 'registerForm';
        } elseif ($password !== $confirm) {
            $message = 'Password and confirm password do not match.';
            $messageType = 'danger';
            $activeForm = 'registerForm';
        } else {
            $message = 'Registration successful! Please login with your credentials.';
            $messageType = 'success';
            // After successful registration, switch to login form
            $activeForm = 'loginForm';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>Sayog | Join the Food Donation Community - Donor, Consumer, Admin</title>

    <!-- Google Fonts + Font Awesome -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #eef7f0 0%, #d9f0e0 100%);
            min-height: 100vh;
            position: relative;
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* animated background blobs */
        body::before {
            content: '';
            position: fixed;
            width: 100vmax;
            height: 100vmax;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.15) 0%, rgba(22, 163, 74, 0) 70%);
            border-radius: 50%;
            top: -30vh;
            left: -30vw;
            z-index: 0;
            animation: floatBlob 28s infinite alternate ease-in-out;
        }

        body::after {
            content: '';
            position: fixed;
            width: 90vmax;
            height: 90vmax;
            background: radial-gradient(circle, rgba(6, 78, 59, 0.1) 0%, rgba(6, 78, 59, 0) 70%);
            border-radius: 50%;
            bottom: -30vh;
            right: -30vw;
            z-index: 0;
            animation: floatBlob 32s infinite alternate-reverse ease-in-out;
        }

        @keyframes floatBlob {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(3%, 5%) scale(1.05);
            }
        }

        /* main container - mobile first */
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            z-index: 2;
        }

        .glass-card {
            max-width: 500px;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 1.5rem;
            overflow: hidden;
            box-shadow: 0 20px 35px -12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        /* Larger screens */
        @media (min-width: 768px) {
            .glass-card {
                max-width: 1100px;
            }
        }

        /* left side : brand story with image */
        .brand-side {
            background: linear-gradient(135deg, #0a2b1a 0%, #0f3d23 100%);
            padding: 1.5rem;
            position: relative;
            color: white;
        }

        @media (min-width: 768px) {
            .brand-side {
                padding: 2rem;
                border-radius: 0 2rem 2rem 0;
                min-height: 100%;
            }
        }

        .food-image-container {
            width: 100%;
            border-radius: 1rem;
            overflow: hidden;
            margin-bottom: 1rem;
            box-shadow: 0 8px 20px -5px rgba(0, 0, 0, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        .food-image-container img {
            width: 100%;
            height: auto;
            max-height: 180px;
            object-fit: cover;
            display: block;
        }

        @media (min-width: 768px) {
            .food-image-container img {
                max-height: 220px;
            }
        }

        .brand-logo {
            font-size: 1.6rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(120deg, #f0fdf4, #bbf7d0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 0.5rem;
            display: inline-block;
        }

        .brand-side h3 {
            font-weight: 700;
            font-size: 1.3rem;
            line-height: 1.3;
            margin: 0.25rem 0 0.5rem 0;
        }

        @media (min-width: 768px) {
            .brand-side h3 {
                font-size: 1.5rem;
            }
        }

        .highlight-green {
            color: #bef264;
            border-bottom: 2px solid #4ade80;
            display: inline-block;
        }

        .brand-description {
            opacity: 0.85;
            line-height: 1.4;
            margin: 0.5rem 0 1rem 0;
            font-size: 0.8rem;
        }

        @media (min-width: 768px) {
            .brand-description {
                font-size: 0.85rem;
            }
        }

        .trust-features {
            margin-top: 0.8rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 0.6rem;
        }

        @media (min-width: 768px) {
            .trust-features {
                gap: 0.8rem;
            }
        }

        .feature-chip {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(4px);
            padding: 0.5rem 0.8rem;
            border-radius: 1rem;
            transition: all 0.2s;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .feature-chip i {
            font-size: 1rem;
            width: 1.4rem;
            color: #bef264;
        }

        .feature-chip span {
            font-weight: 500;
            font-size: 0.75rem;
        }

        @media (min-width: 768px) {
            .feature-chip span {
                font-size: 0.8rem;
            }
        }

        .impact-text {
            margin-top: 1rem;
            font-size: 0.7rem;
            opacity: 0.85;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 0.8rem;
            text-align: center;
        }

        /* right side */
        .form-side {
            padding: 1.5rem;
            background: white;
        }

        @media (min-width: 768px) {
            .form-side {
                padding: 2rem;
            }
        }

        /* modern tabs */
        .modern-tabs {
            display: flex;
            gap: 0.5rem;
            background: #f1f5f9;
            padding: 0.3rem;
            border-radius: 2rem;
            margin-bottom: 1.5rem;
        }

        .tab-item {
            flex: 1;
            text-align: center;
            padding: 0.6rem 0;
            font-weight: 700;
            border-radius: 2rem;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.85rem;
            color: #334155;
        }

        @media (min-width: 768px) {
            .tab-item {
                padding: 0.7rem 0;
                font-size: 0.95rem;
            }
        }

        .tab-item i {
            margin-right: 6px;
            font-size: 0.85rem;
        }

        .tab-item.active {
            background: white;
            color: #15803d;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /* forms */
        .auth-panel {
            display: none;
            animation: fadeSlide 0.25s ease-out;
        }

        .auth-panel.active {
            display: block;
        }

        @keyframes fadeSlide {
            from {
                opacity: 0;
                transform: translateY(8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Role Selector */
        .role-selector {
            margin-bottom: 1rem;
        }

        .role-label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.5rem;
        }

        .role-options {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .role-option {
            flex: 1;
            min-width: 100px;
            position: relative;
        }

        .role-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            z-index: 2;
        }

        .role-card {
            background: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 1rem;
            padding: 0.8rem 0.5rem;
            text-align: center;
            transition: all 0.2s;
            cursor: pointer;
        }

        .role-option input[type="radio"]:checked+.role-card {
            background: linear-gradient(135deg, #e8f5e9, #c8e6d9);
            border-color: #16a34a;
            box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
        }

        .role-option input[type="radio"]:checked+.role-card i {
            color: #16a34a;
        }

        .role-card i {
            font-size: 1.5rem;
            color: #64748b;
            margin-bottom: 0.3rem;
            display: block;
        }

        .role-card .role-name {
            font-weight: 700;
            font-size: 0.8rem;
            color: #1e293b;
        }

        .role-card .role-desc {
            font-size: 0.65rem;
            color: #64748b;
            margin-top: 0.2rem;
        }

        @media (max-width: 480px) {
            .role-options {
                gap: 0.5rem;
            }

            .role-card {
                padding: 0.6rem 0.3rem;
            }

            .role-card i {
                font-size: 1.2rem;
            }

            .role-card .role-name {
                font-size: 0.7rem;
            }

            .role-card .role-desc {
                font-size: 0.55rem;
            }
        }

        /* Input wrapper */
        .input-wrapper {
            position: relative;
            width: 100%;
            margin-bottom: 1rem;
        }

        .input-icon-left {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 0.9rem;
            z-index: 1;
            pointer-events: none;
        }

        .input-wrapper input {
            width: 100%;
            padding: 0.75rem 3rem 0.75rem 2.5rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 1rem;
            font-size: 0.85rem;
            font-family: 'Inter', sans-serif;
            background: #fefefe;
            transition: all 0.2s;
            outline: none;
        }

        @media (min-width: 768px) {
            .input-wrapper input {
                padding: 0.85rem 3rem 0.85rem 2.8rem;
                font-size: 0.9rem;
            }
        }

        .input-wrapper input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .password-toggle {
            position: absolute;
            right: 0.7rem;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
            color: #94a3b8;
            z-index: 2;
            font-size: 1rem;
            padding: 0.4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #15803d;
        }

        .btn-primary-glow {
            background: linear-gradient(95deg, #15803d, #22c55e);
            border: none;
            padding: 0.75rem;
            width: 100%;
            border-radius: 1.2rem;
            font-weight: 700;
            font-size: 0.9rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
            cursor: pointer;
            margin-top: 0.5rem;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.25);
        }

        @media (min-width: 768px) {
            .btn-primary-glow {
                padding: 0.85rem;
                font-size: 0.95rem;
            }
        }

        .btn-primary-glow:active {
            transform: scale(0.97);
        }

        .switch-action {
            text-align: center;
            margin-top: 1.2rem;
            font-size: 0.75rem;
        }

        @media (min-width: 768px) {
            .switch-action {
                margin-top: 1.4rem;
                font-size: 0.8rem;
            }
        }

        .switch-action a {
            color: #15803d;
            font-weight: 700;
            text-decoration: none;
            border-bottom: 1px dashed #86efac;
        }

        .fine-print {
            font-size: 0.65rem;
            text-align: center;
            color: #6c757d;
            margin-top: 1.2rem;
            border-top: 1px solid #eef2ff;
            padding-top: 0.8rem;
        }

        /* custom alert */
        .custom-alert {
            padding: 0.6rem 0.9rem;
            border-radius: 1rem;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .alert-success {
            background: #e0f2e9;
            border-left: 4px solid #15803d;
            color: #14532d;
        }

        .alert-danger {
            background: #fee9e6;
            border-left: 4px solid #dc2626;
            color: #991b1b;
        }

        .alert-info {
            background: #eef2ff;
            border-left: 4px solid #3b82f6;
            color: #1e3a8a;
        }

        /* Desktop layout - two columns */
        @media (min-width: 768px) {
            .row {
                display: flex;
                flex-wrap: wrap;
            }

            .col-brand {
                flex: 1.2;
                min-width: 280px;
            }

            .col-form {
                flex: 1.8;
                min-width: 320px;
            }
        }

        /* Small mobile adjustments */
        @media (max-width: 480px) {
            .auth-wrapper {
                padding: 0.75rem;
            }

            .form-side {
                padding: 1.2rem;
            }

            .brand-side {
                padding: 1.2rem;
            }

            .brand-side h3 {
                font-size: 1.2rem;
            }

            .trust-features {
                grid-template-columns: 1fr;
                gap: 0.5rem;
            }

            .feature-chip {
                padding: 0.4rem 0.7rem;
            }
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body>
    <div class="auth-wrapper">
        <div class="glass-card">
            <div class="row">
                <!-- left brand area -->
                <div class="col-brand">
                    <div class="brand-side">
                        <div class="food-image-container">
                            <img src="https://images.unsplash.com/photo-1488459716781-31db52582fe9?q=80&w=600&auto=format" alt="Food donation" onerror="this.onerror=null; this.src='https://placehold.co/600x400/e2f0e2/2d6a4f?text=Food+Donation';">
                        </div>

                        <div class="brand-logo">
                            <i class="fas fa-hand-holding-heart"></i> Say<span style="color:#bef264;">og</span>
                        </div>
                        <h3>Donate food.<br>Change <span class="highlight-green">lives</span>.</h3>
                        <p class="brand-description">
                            Join a community where every meal shared brings hope to those in need.
                        </p>

                        <div class="trust-features">
                            <div class="feature-chip">
                                <i class="fas fa-shield-alt"></i>
                                <span>Verified NGOs & donors</span>
                            </div>
                            <div class="feature-chip">
                                <i class="fas fa-location-dot"></i>
                                <span>Smart geolocation</span>
                            </div>
                            <div class="feature-chip">
                                <i class="fas fa-bell"></i>
                                <span>Real-time alerts</span>
                            </div>
                            <div class="feature-chip">
                                <i class="fas fa-chart-line"></i>
                                <span>Impact tracking</span>
                            </div>
                        </div>
                        <div class="impact-text">
                            <i class="fas fa-leaf"></i> 2,300+ meals shared • 45+ NGOs
                        </div>
                    </div>
                </div>

                <!-- right form area -->
                <div class="col-form">
                    <div class="form-side">

                        <!-- dynamic alert -->
                        <?php if ($message !== ''): ?>
                            <div class="custom-alert alert-<?php echo htmlspecialchars($messageType); ?>">
                                <i class="fas <?php echo $messageType === 'success' ? 'fa-check-circle' : ($messageType === 'danger' ? 'fa-exclamation-triangle' : 'fa-info-circle'); ?>"></i>
                                <span><?php echo htmlspecialchars($message); ?></span>
                            </div>
                        <?php endif; ?>

                        <!-- modern tab navigation -->
                        <div class="modern-tabs">
                            <button class="tab-item <?php echo $activeForm === 'loginForm' ? 'active' : ''; ?>" data-target="loginForm">
                                <i class="fas fa-arrow-right-to-bracket"></i> <span class="tab-text">Login</span>
                            </button>
                            <button class="tab-item <?php echo $activeForm === 'registerForm' ? 'active' : ''; ?>" data-target="registerForm">
                                <i class="fas fa-user-plus"></i> <span class="tab-text">Register</span>
                            </button>
                        </div>

                        <!-- LOGIN FORM (Email + Password + Role only) -->
                        <div class="auth-panel <?php echo $activeForm === 'loginForm' ? 'active' : ''; ?>" id="loginForm">
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="login">

                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon-left"></i>
                                    <input type="email" name="email" placeholder="Email address" required autocomplete="email">
                                </div>

                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon-left"></i>
                                    <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('loginPassword', this)">
                                        <i class="far fa-eye-slash"></i>
                                    </button>
                                </div>

                                <!-- Role Selector for Login -->
                                <div class="role-selector">
                                    <label class="role-label"><i class="fas fa-user-tag"></i> Login as</label>
                                    <div class="role-options">
                                        <label class="role-option">
                                            <input type="radio" name="role" value="donor" required>
                                            <div class="role-card">
                                                <i class="fas fa-hand-holding-heart"></i>
                                                <div class="role-name">Donor</div>
                                                <div class="role-desc">Restaurant/Hotel/Individual</div>
                                            </div>
                                        </label>
                                        <label class="role-option">
                                            <input type="radio" name="role" value="consumer">
                                            <div class="role-card">
                                                <i class="fas fa-utensils"></i>
                                                <div class="role-name">Consumer</div>
                                                <div class="role-desc">NGO/Community/Individual</div>
                                            </div>
                                        </label>
                                        <label class="role-option">
                                            <input type="radio" name="role" value="admin">
                                            <div class="role-card">
                                                <i class="fas fa-user-shield"></i>
                                                <div class="role-name">Admin</div>
                                                <div class="role-desc">Platform Manager</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn-primary-glow">
                                    <i class="fas fa-paper-plane"></i> Sign in
                                </button>
                                <div class="switch-action">
                                    <a href="#" onclick="switchTab('registerForm'); return false;">✨ Don't have an account? Register</a>
                                </div>
                            </form>
                        </div>

                        <!-- REGISTER FORM (Full Name, Email, Password, Confirm Password, Role) -->
                        <div class="auth-panel <?php echo $activeForm === 'registerForm' ? 'active' : ''; ?>" id="registerForm">
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="register">

                                <div class="input-wrapper">
                                    <i class="fas fa-user-astronaut input-icon-left"></i>
                                    <input type="text" name="name" placeholder="Full name" required autocomplete="name">
                                </div>

                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon-left"></i>
                                    <input type="email" name="email" placeholder="Email address" required autocomplete="email">
                                </div>

                                <div class="input-wrapper">
                                    <i class="fas fa-key input-icon-left"></i>
                                    <input type="password" name="password" id="regPassword" placeholder="Create password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('regPassword', this)">
                                        <i class="far fa-eye-slash"></i>
                                    </button>
                                </div>

                                <div class="input-wrapper">
                                    <i class="fas fa-check-circle input-icon-left"></i>
                                    <input type="password" name="confirm_password" id="confirmPass" placeholder="Confirm password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('confirmPass', this)">
                                        <i class="far fa-eye-slash"></i>
                                    </button>
                                </div>

                                <div id="passMatchHint" style="font-size: 0.7rem; margin-top: -0.5rem; margin-bottom: 0.5rem; padding-left: 0.5rem;"></div>

                                <!-- Role Selector for Registration -->
                                <div class="role-selector">
                                    <label class="role-label"><i class="fas fa-user-tag"></i> Register as</label>
                                    <div class="role-options">
                                        <label class="role-option">
                                            <input type="radio" name="role" value="donor" required>
                                            <div class="role-card">
                                                <i class="fas fa-hand-holding-heart"></i>
                                                <div class="role-name">Donor</div>
                                                <div class="role-desc">Restaurant/Hotel/Individual</div>
                                            </div>
                                        </label>
                                        <label class="role-option">
                                            <input type="radio" name="role" value="consumer">
                                            <div class="role-card">
                                                <i class="fas fa-utensils"></i>
                                                <div class="role-name">Consumer</div>
                                                <div class="role-desc">NGO/Community/Individual</div>
                                            </div>
                                        </label>
                                        <label class="role-option">
                                            <input type="radio" name="role" value="admin">
                                            <div class="role-card">
                                                <i class="fas fa-user-shield"></i>
                                                <div class="role-name">Admin</div>
                                                <div class="role-desc">Platform Manager</div>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn-primary-glow">
                                    <i class="fas fa-hand-peace"></i> Register
                                </button>
                                <div class="switch-action">
                                    <a href="#" onclick="switchTab('loginForm'); return false;">🔐 Already have an account? Login</a>
                                </div>
                            </form>
                        </div>

                        <div class="fine-print">
                            <i class="far fa-id-card"></i> Demo preview — no real authentication yet
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // tab switching logic
        function switchTab(targetId) {
            document.querySelectorAll('.auth-panel').forEach(panel => panel.classList.remove('active'));
            document.querySelectorAll('.tab-item').forEach(btn => btn.classList.remove('active'));

            const activePanel = document.getElementById(targetId);
            if (activePanel) activePanel.classList.add('active');

            const activeBtn = document.querySelector(`.tab-item[data-target="${targetId}"]`);
            if (activeBtn) activeBtn.classList.add('active');
        }

        // attach tab listeners
        document.querySelectorAll('.tab-item').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const target = btn.getAttribute('data-target');
                if (target) switchTab(target);
            });
        });

        // password toggle function
        function togglePassword(fieldId, buttonElement) {
            const field = document.getElementById(fieldId);
            if (!field) return;

            const icon = buttonElement.querySelector('i');

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            }
        }

        // real-time password match hint
        const regPass = document.getElementById('regPassword');
        const confirmPass = document.getElementById('confirmPass');
        const hintDiv = document.getElementById('passMatchHint');

        function updateMatchHint() {
            if (regPass && confirmPass && hintDiv) {
                const passVal = regPass.value;
                const confirmVal = confirmPass.value;
                if (confirmVal.length === 0) {
                    hintDiv.innerHTML = '';
                } else if (passVal === confirmVal) {
                    hintDiv.innerHTML = '<i class="fas fa-check-circle"></i> Passwords match!';
                    hintDiv.style.color = '#15803d';
                } else {
                    hintDiv.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Passwords do not match';
                    hintDiv.style.color = '#dc2626';
                }
            }
        }

        if (regPass && confirmPass) {
            regPass.addEventListener('input', updateMatchHint);
            confirmPass.addEventListener('input', updateMatchHint);
        }

        // frontend password match before register submit
        const registerFormElem = document.querySelector('#registerForm form');
        if (registerFormElem) {
            registerFormElem.addEventListener('submit', function(e) {
                const pass = document.getElementById('regPassword');
                const confirm = document.getElementById('confirmPass');
                if (pass && confirm && pass.value !== confirm.value) {
                    e.preventDefault();
                    alert('❌ Passwords do not match. Please check before registering.');
                    return false;
                }

                const roleSelected = document.querySelector('#registerForm input[name="role"]:checked');
                if (!roleSelected) {
                    e.preventDefault();
                    alert('❌ Please select a role (Donor, Consumer, or Admin) to register.');
                    return false;
                }
                return true;
            });
        }

        // Login form role check
        const loginFormElem = document.querySelector('#loginForm form');
        if (loginFormElem) {
            loginFormElem.addEventListener('submit', function(e) {
                const roleSelected = document.querySelector('#loginForm input[name="role"]:checked');
                if (!roleSelected) {
                    e.preventDefault();
                    alert('❌ Please select a role (Donor, Consumer, or Admin) to login.');
                    return false;
                }
                return true;
            });
        }

        // Make role cards clickable
        document.querySelectorAll('.role-option').forEach(option => {
            const radio = option.querySelector('input[type="radio"]');
            const card = option.querySelector('.role-card');
            if (card) {
                card.addEventListener('click', () => {
                    radio.checked = true;
                });
            }
        });
    </script>
</body>

</html>
```