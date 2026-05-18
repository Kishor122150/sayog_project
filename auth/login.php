<?php
// auth/login.php
// Redesigned beautiful login + register page with modern UI/UX

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Sayog | Join the Food Donation Community</title>

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
            overflow-x: hidden;
        }

        /* animated background blobs */
        body::before {
            content: '';
            position: fixed;
            width: 70vmax;
            height: 70vmax;
            background: radial-gradient(circle, rgba(34, 197, 94, 0.2) 0%, rgba(22, 163, 74, 0) 70%);
            border-radius: 50%;
            top: -20vh;
            left: -20vw;
            z-index: 0;
            animation: floatBlob 28s infinite alternate ease-in-out;
        }

        body::after {
            content: '';
            position: fixed;
            width: 60vmax;
            height: 60vmax;
            background: radial-gradient(circle, rgba(6, 78, 59, 0.12) 0%, rgba(6, 78, 59, 0) 70%);
            border-radius: 50%;
            bottom: -20vh;
            right: -20vw;
            z-index: 0;
            animation: floatBlob 32s infinite alternate-reverse ease-in-out;
        }

        @keyframes floatBlob {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(5%, 7%) scale(1.1);
            }
        }

        /* main container */
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .glass-card {
            max-width: 1240px;
            width: 100%;
            background: rgba(255, 255, 255, 0.96);
            backdrop-filter: blur(0px);
            border-radius: 2.5rem;
            overflow: hidden;
            box-shadow: 0 30px 50px -20px rgba(0, 0, 0, 0.25), 0 0 0 1px rgba(255, 255, 255, 0.6);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            box-shadow: 0 40px 60px -20px rgba(0, 0, 0, 0.3);
        }

        /* left side : brand story */
        .brand-side {
            background: linear-gradient(135deg, #0f2b1d 0%, #14532d 100%);
            padding: 2.8rem 2.2rem;
            height: 100%;
            position: relative;
            color: white;
            border-radius: 0 2rem 2rem 0;
        }

        .brand-logo {
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            background: linear-gradient(120deg, #f0fdf4, #bbf7d0);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .brand-side h2 {
            font-weight: 700;
            font-size: 1.9rem;
            line-height: 1.3;
            margin: 0.5rem 0 1rem 0;
        }

        .highlight-green {
            color: #bef264;
            border-bottom: 2px solid #4ade80;
            display: inline-block;
        }

        .trust-features {
            margin-top: 2rem;
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .feature-chip {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(4px);
            padding: 0.8rem 1.2rem;
            border-radius: 1.5rem;
            transition: all 0.2s;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .feature-chip i {
            font-size: 1.6rem;
            width: 2rem;
            color: #bef264;
        }

        .feature-chip span {
            font-weight: 500;
            font-size: 0.95rem;
        }

        .impact-text {
            margin-top: 2rem;
            font-size: 0.85rem;
            opacity: 0.85;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 1.5rem;
        }

        /* right side */
        .form-side {
            padding: 2.2rem 2rem;
            background: white;
        }

        /* modern tabs */
        .modern-tabs {
            display: flex;
            gap: 0.5rem;
            background: #f1f5f9;
            padding: 0.4rem;
            border-radius: 3rem;
            margin-bottom: 2rem;
        }

        .tab-item {
            flex: 1;
            text-align: center;
            padding: 0.7rem 0;
            font-weight: 700;
            border-radius: 2.5rem;
            background: transparent;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 1rem;
            color: #334155;
        }

        .tab-item i {
            margin-right: 8px;
            font-size: 0.9rem;
        }

        .tab-item.active {
            background: white;
            color: #15803d;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
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

        .input-group-icon {
            position: relative;
            margin-bottom: 1.4rem;
        }

        .input-group-icon i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.1rem;
            pointer-events: none;
        }

        .input-group-icon input {
            width: 100%;
            padding: 0.9rem 1rem 0.9rem 2.8rem;
            border: 1.5px solid #e2e8f0;
            border-radius: 1.2rem;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            background: #fefefe;
            transition: all 0.2s;
            outline: none;
        }

        .input-group-icon input:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.2);
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #94a3b8;
            z-index: 3;
            font-size: 1rem;
        }

        .btn-primary-glow {
            background: linear-gradient(95deg, #15803d, #22c55e);
            border: none;
            padding: 0.9rem;
            width: 100%;
            border-radius: 1.5rem;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.2s;
            cursor: pointer;
            margin-top: 0.5rem;
            box-shadow: 0 6px 14px rgba(34, 197, 94, 0.3);
        }

        .btn-primary-glow:hover {
            transform: scale(0.98);
            background: linear-gradient(95deg, #0f6e36, #16a34a);
            box-shadow: 0 4px 10px rgba(34, 197, 94, 0.4);
        }

        .switch-action {
            text-align: center;
            margin-top: 1.6rem;
            font-size: 0.85rem;
        }

        .switch-action a {
            color: #15803d;
            font-weight: 700;
            text-decoration: none;
            border-bottom: 1px dashed #86efac;
        }

        .fine-print {
            font-size: 0.7rem;
            text-align: center;
            color: #6c757d;
            margin-top: 1.8rem;
            border-top: 1px solid #eef2ff;
            padding-top: 1.2rem;
        }

        /* custom alert */
        .custom-alert {
            padding: 0.8rem 1.2rem;
            border-radius: 1.2rem;
            margin-bottom: 1.6rem;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.85rem;
            font-weight: 500;
            backdrop-filter: blur(4px);
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

        /* responsiveness */
        @media (max-width: 900px) {
            .brand-side {
                border-radius: 2rem 2rem 0 0;
            }

            .glass-card {
                border-radius: 1.8rem;
            }

            .form-side {
                padding: 1.8rem;
            }
        }

        @media (max-width: 640px) {
            .brand-side h2 {
                font-size: 1.4rem;
            }

            .feature-chip {
                padding: 0.6rem 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="auth-wrapper">
        <div class="glass-card">
            <div class="row" style="display: flex; flex-wrap: wrap;">
                <!-- left brand area -->
                <div class="col-brand" style="flex: 1.2; min-width: 260px;">
                    <div class="brand-side">
                        <div class="brand-logo">
                            <i class="fas fa-hand-holding-heart"></i> Say<span style="color:#bef264;">og</span>
                        </div>
                        <h2>Donate food.<br>Change <span class="highlight-green">lives</span>.</h2>
                        <p style="opacity: 0.85; line-height: 1.5; margin: 1rem 0 0 0;">Join a community where every meal shared brings hope.</p>

                        <div class="trust-features">
                            <div class="feature-chip">
                                <i class="fas fa-shield-alt"></i>
                                <span>Verified NGOs & donors</span>
                            </div>
                            <div class="feature-chip">
                                <i class="fas fa-location-dot"></i>
                                <span>Smart geolocation matching</span>
                            </div>
                            <div class="feature-chip">
                                <i class="fas fa-bell"></i>
                                <span>Real-time donor alerts</span>
                            </div>
                            <div class="feature-chip">
                                <i class="fas fa-chart-line"></i>
                                <span>Impact tracking dashboard</span>
                            </div>
                        </div>
                        <div class="impact-text">
                            <i class="fas fa-leaf"></i> 2,300+ meals shared • 45+ partner NGOs
                        </div>
                    </div>
                </div>

                <!-- right form area -->
                <div class="col-form" style="flex: 1.8; min-width: 300px;">
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
                                <i class="fas fa-arrow-right-to-bracket"></i> Login
                            </button>
                            <button class="tab-item <?php echo $activeForm === 'registerForm' ? 'active' : ''; ?>" data-target="registerForm">
                                <i class="fas fa-user-plus"></i> Register
                            </button>
                        </div>

                        <!-- LOGIN FORM -->
                        <div class="auth-panel <?php echo $activeForm === 'loginForm' ? 'active' : ''; ?>" id="loginForm">
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="login">
                                <div class="input-group-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Email address" required autocomplete="email">
                                </div>
                                <div class="input-group-icon">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" id="loginPassword" placeholder="Password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('loginPassword')">
                                        <i class="far fa-eye-slash"></i>
                                    </button>
                                </div>
                                <button type="submit" class="btn-primary-glow">
                                    <i class="fas fa-paper-plane"></i> Sign in
                                </button>
                                <div class="switch-action">
                                    <a href="#" onclick="switchTab('registerForm'); return false;">✨ Don't have an account? Create one</a>
                                </div>
                            </form>
                        </div>

                        <!-- REGISTER FORM -->
                        <div class="auth-panel <?php echo $activeForm === 'registerForm' ? 'active' : ''; ?>" id="registerForm">
                            <form method="POST" action="">
                                <input type="hidden" name="action" value="register">
                                <div class="input-group-icon">
                                    <i class="fas fa-user-astronaut"></i>
                                    <input type="text" name="name" placeholder="Full name" required autocomplete="name">
                                </div>
                                <div class="input-group-icon">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Email address" required autocomplete="email">
                                </div>
                                <div class="input-group-icon">
                                    <i class="fas fa-key"></i>
                                    <input type="password" name="password" id="regPassword" placeholder="Create password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('regPassword')">
                                        <i class="far fa-eye-slash"></i>
                                    </button>
                                </div>
                                <div class="input-group-icon">
                                    <i class="fas fa-check-circle"></i>
                                    <input type="password" name="confirm_password" id="confirmPass" placeholder="Confirm password" required>
                                    <button type="button" class="password-toggle" onclick="togglePassword('confirmPass')">
                                        <i class="far fa-eye-slash"></i>
                                    </button>
                                </div>
                                <div id="passMatchHint" style="font-size: 0.7rem; margin-top: -0.6rem; margin-bottom: 0.5rem;"></div>
                                <button type="submit" class="btn-primary-glow">
                                    <i class="fas fa-hand-peace"></i> Join Sayog
                                </button>
                                <div class="switch-action">
                                    <a href="#" onclick="switchTab('loginForm'); return false;">🔐 Already have an account? Sign in</a>
                                </div>
                            </form>
                        </div>

                        <div class="fine-print">
                            <i class="far fa-id-card"></i> Demo preview — no real authentication. Experience the sleek interface.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // tab switching logic
        function switchTab(targetId) {
            // update panels
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

        // universal password toggle
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            if (!field) return;
            const type = field.type === 'password' ? 'text' : 'password';
            field.type = type;
            const toggleBtn = field.parentElement.querySelector('.password-toggle i');
            if (toggleBtn) {
                if (type === 'text') {
                    toggleBtn.classList.remove('fa-eye-slash');
                    toggleBtn.classList.add('fa-eye');
                } else {
                    toggleBtn.classList.remove('fa-eye');
                    toggleBtn.classList.add('fa-eye-slash');
                }
            }
        }

        // real-time password match hint for registration (UX only)
        const regPass = document.getElementById('regPassword');
        const confirmPass = document.getElementById('confirmPass');
        const hintDiv = document.getElementById('passMatchHint');

        function updateMatchHint() {
            if (regPass && confirmPass && hintDiv) {
                const passVal = regPass.value;
                const confirmVal = confirmPass.value;
                if (confirmVal.length === 0) {
                    hintDiv.innerHTML = '';
                    hintDiv.style.color = '';
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

        // preserve active tab on page reload if there was a form error? (already using PHP activeForm)
        // also automatically show any validation on register: additional frontend password match before submit?
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
                // you may also add additional name/email check but backend already does
                return true;
            });
        }

        // tiny UX: initial toggle icon correction
        document.querySelectorAll('.password-toggle').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
            });
        });
    </script>
</body>

</html>