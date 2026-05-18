<?php
// auth/login.php
// Single page layout for Login + Register (no database/auth logic yet).

session_start();

$message = '';
$messageType = 'info';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'login') {
        $email = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');

        if ($email === '' || $password === '') {
            $message = 'Please enter both email and password.';
            $messageType = 'danger';
        } else {
            $message = 'Login submitted (layout only – no authentication yet).';
            $messageType = 'success';
        }
    }

    if ($action === 'register') {
        $name = trim((string)($_POST['name'] ?? ''));
        $email = trim((string)($_POST['email'] ?? ''));
        $password = (string)($_POST['password'] ?? '');
        $confirm = (string)($_POST['confirm_password'] ?? '');

        if ($name === '' || $email === '' || $password === '' || $confirm === '') {
            $message = 'Please fill all register fields.';
            $messageType = 'danger';
        } elseif ($password !== $confirm) {
            $message = 'Password and confirm password do not match.';
            $messageType = 'danger';
        } else {
            $message = 'Register submitted (layout only – no database yet).';
            $messageType = 'success';
        }
    }
}

// Decide which tab should be active after POST.
$activeForm = 'loginForm';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $activeForm = ($_POST['action'] ?? '') === 'register' ? 'registerForm' : 'loginForm';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog | Login / Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #16a34a;
            --secondary: #14532d;
            --bg1: #f0fdf4;
            --bg2: #f8fafc;
        }

        body {
            background: radial-gradient(1200px 600px at 10% 0%, var(--bg1), transparent 60%),
                radial-gradient(900px 500px at 90% 10%, #dcfce7, transparent 55%),
                var(--bg2);
        }

        .auth-shell {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 28px 14px;
        }

        .auth-card {
            width: 100%;
            max-width: 1000px;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 14px 40px rgba(16, 24, 40, .12);
            border: 1px solid rgba(16, 24, 40, .08);
            background: #fff;
        }

        .auth-left {
            background: linear-gradient(135deg, rgba(22, 163, 74, .95), rgba(20, 83, 45, .95));
            color: #fff;
            padding: 42px 34px;
            position: relative;
        }

        .auth-left:before {
            content: "";
            position: absolute;
            inset: -50px -80px auto auto;
            width: 260px;
            height: 260px;
            background: rgba(255, 255, 255, .15);
            filter: blur(0px);
            border-radius: 50%;
        }

        .brand {
            font-weight: 900;
            font-size: 30px;
            letter-spacing: -.6px;
            margin-bottom: 14px;
        }

        .brand span {
            color: #d1fae5;
        }

        .auth-left p {
            color: rgba(255, 255, 255, .9);
            margin: 0;
            line-height: 1.7;
        }

        .feature-list {
            margin-top: 26px;
            display: grid;
            gap: 12px;
        }

        .feature-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .18);
            border-radius: 14px;
            padding: 12px 14px;
        }

        .feature-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, .18);
            font-size: 18px;
        }

        .feature-item b {
            display: block;
            font-size: 14px;
        }

        .feature-item small {
            color: rgba(255, 255, 255, .86);
        }

        .auth-right {
            padding: 30px 26px;
        }

        .panel-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 18px;
        }

        .tab-btn {
            flex: 1;
            border: 1px solid rgba(16, 24, 40, .12);
            background: #fff;
            border-radius: 12px;
            padding: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: .2s;
        }

        .tab-btn.active {
            border-color: rgba(22, 163, 74, .35);
            background: rgba(22, 163, 74, .08);
            color: var(--secondary);
        }

        .auth-form {
            display: none;
        }

        .auth-form.active {
            display: block;
        }

        .form-label {
            font-weight: 700;
            color: #111827;
        }

        .btn-main {
            background: linear-gradient(90deg, var(--primary), #22c55e);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 900;
            width: 100%;
            transition: .2s;
        }

        .btn-main:hover {
            transform: translateY(-1px);
            filter: brightness(.97);
        }

        .muted-link {
            color: #6b7280;
            text-decoration: none;
            font-weight: 700;
        }

        .muted-link:hover {
            color: var(--secondary);
        }

        .fineprint {
            font-size: 12.5px;
            color: #6b7280;
            margin-top: 14px;
            text-align: center;
        }

        @media (max-width: 991px) {
            .auth-left {
                padding: 32px 22px;
            }
        }

        @media (max-width: 767px) {
            .auth-shell {
                padding: 16px 10px;
            }

            .auth-left {
                display: none;
            }

            .auth-right {
                padding: 22px 16px;
            }

            .auth-card {
                border-radius: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-shell">
        <div class="auth-card">
            <div class="row g-0">
                <div class="col-lg-5">
                    <div class="auth-left">
                        <div class="brand">Say<span>og</span></div>
                        <p>
                            Donate food. Help people. Secure access for donors and NGOs.
                            <br><br>
                            Switch between <b>Login</b> and <b>Register</b> using the tabs.
                        </p>

                        <div class="feature-list">
                            <div class="feature-item">
                                <div class="feature-icon">✅</div>
                                <div>
                                    <b>Secure Flow</b>
                                    <small>OTP/admin verification later.</small>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">📍</div>
                                <div>
                                    <b>Smart Matching</b>
                                    <small>Location-based requests later.</small>
                                </div>
                            </div>
                            <div class="feature-item">
                                <div class="feature-icon">🔔</div>
                                <div>
                                    <b>Notifications</b>
                                    <small>Real-time updates later.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="auth-right">
                        <?php if ($message !== ''): ?>
                            <div class="alert alert-<?php echo htmlspecialchars($messageType); ?> d-flex align-items-center" role="alert">
                                <span class="me-2" style="font-weight:900;">•</span>
                                <span><?php echo htmlspecialchars($message); ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="panel-tabs">
                            <button class="tab-btn <?php echo $activeForm === 'loginForm' ? 'active' : ''; ?>" type="button" data-target="loginForm">Login</button>
                            <button class="tab-btn <?php echo $activeForm === 'registerForm' ? 'active' : ''; ?>" type="button" data-target="registerForm">Register</button>
                        </div>

                        <!-- LOGIN -->
                        <form class="auth-form <?php echo $activeForm === 'loginForm' ? 'active' : ''; ?>" id="loginForm" method="POST" action="">
                            <input type="hidden" name="action" value="login">

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                            </div>

                            <button type="submit" class="btn-main">Login</button>

                            <div class="mt-3 text-center">
                                <a href="#" class="muted-link" onclick="switchTab('registerForm'); return false;">Create an account</a>
                            </div>
                        </form>

                        <!-- REGISTER -->
                        <form class="auth-form <?php echo $activeForm === 'registerForm' ? 'active' : ''; ?>" id="registerForm" method="POST" action="">
                            <input type="hidden" name="action" value="register">

                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Your name" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="you@example.com" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Create password" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" required>
                            </div>

                            <button type="submit" class="btn-main">Register</button>

                            <div class="mt-3 text-center">
                                <a href="#" class="muted-link" onclick="switchTab('loginForm'); return false;">Already have an account?</a>
                            </div>
                        </form>

                        <div class="fineprint">
                            By continuing, you agree to the platform terms (placeholder).<br>
                            <span style="font-weight:800; color:#8a8f98;">No database/auth logic added yet.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(targetId) {
            document.querySelectorAll('.auth-form').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('active'));

            const form = document.getElementById(targetId);
            const btn = document.querySelector(`.tab-btn[data-target="${targetId}"]`);

            if (form) form.classList.add('active');
            if (btn) btn.classList.add('active');
        }

        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => switchTab(btn.dataset.target));
        });
    </script>

</body>

</html>