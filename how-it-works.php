<?php
// how-it-works.php - How It Works Page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - How It Works | Food Donation & Redistribution Platform</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f8fafc;
            overflow-x: hidden;
        }

        :root {
            --primary: #16a34a;
            --primary-dark: #14532d;
            --light: #f0fdf4;
            --dark: #111827;
            --gray: #6b7280;
        }

        .navbar {
            background: #ffffff;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary) !important;
        }

        .navbar-brand span {
            color: #111827;
        }

        .nav-link {
            color: #374151 !important;
            font-weight: 500;
            margin: 0 10px;
            transition: 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary) !important;
        }

        .btn-donate-nav {
            background: linear-gradient(135deg, #16a34a, #14532d);
            color: white !important;
            padding: 8px 22px;
            border-radius: 40px;
            font-weight: 600;
            margin-left: 15px;
            transition: 0.3s;
            border: none;
            text-decoration: none;
            display: inline-block;
        }

        .btn-donate-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(22, 163, 74, 0.4);
            color: white !important;
        }

        .page-header {
            background: linear-gradient(135deg, #16a34a, #14532d);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .page-header h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .page-header p {
            font-size: 18px;
            opacity: 0.95;
        }

        .step-card {
            background: white;
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            transition: 0.3s;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: relative;
        }

        .step-card:hover {
            transform: translateY(-10px);
        }

        .step-number {
            width: 60px;
            height: 60px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 25px;
        }

        .step-icon {
            width: 80px;
            height: 80px;
            background: var(--light);
            color: var(--primary);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 25px;
        }

        .step-card h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .step-card p {
            color: var(--gray);
            line-height: 1.6;
        }

        .role-section {
            padding: 80px 0;
            background: #f0fdf4;
        }

        .role-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .role-card:hover {
            transform: translateY(-5px);
        }

        .role-icon {
            width: 70px;
            height: 70px;
            background: var(--primary);
            color: white;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 20px;
        }

        .role-card h3 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .role-list {
            list-style: none;
            padding: 0;
        }

        .role-list li {
            padding: 8px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--gray);
        }

        .role-list li i {
            color: var(--primary);
            font-size: 18px;
        }

        .cta-section {
            background: linear-gradient(135deg, #16a34a, #14532d);
            padding: 80px 0;
            text-align: center;
            color: white;
        }

        .cta-section h2 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .cta-section p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.95;
        }

        .btn-light-custom {
            background: white;
            color: var(--primary);
            padding: 12px 30px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-light-custom:hover {
            background: #dcfce7;
            color: var(--primary-dark);
            transform: translateY(-2px);
        }

        footer {
            background: #111827;
            color: white;
            padding: 70px 0 20px;
        }

        .footer-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .footer-links a {
            display: block;
            color: #d1d5db;
            margin-bottom: 12px;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-links a:hover {
            color: #4ade80;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #1f2937;
            color: white;
            margin-right: 10px;
            transition: 0.3s;
            text-decoration: none;
        }

        .social-icons a:hover {
            background: var(--primary);
        }

        .copyright {
            border-top: 1px solid #374151;
            margin-top: 50px;
            padding-top: 20px;
            text-align: center;
            color: #9ca3af;
        }

        @media(max-width:991px) {
            .page-header h1 {
                font-size: 36px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Say<span>og</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="ngos.php">NGOs</a></li>
                    <li class="nav-item"><a class="nav-link" href="stories.php">Stories</a></li>
                    <li class="nav-item"><a class="nav-link" href="nearby.php">Nearby</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQs</a></li>
                    <li class="nav-item">
                        <a class="btn-donate-nav" href="login.php?redirect=donate.php">
                            <i class="bi bi-heart-fill"></i> Donate Now
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>How It Works</h1>
            <p>Simple, transparent, and impactful - Learn how Sayog connects donors with those in need</p>
        </div>
    </section>

    <!-- Process Steps -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div class="row g-4">
                <!-- Step 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <div class="step-icon">
                            <i class="bi bi-person-plus"></i>
                        </div>
                        <h3>Create Account</h3>
                        <p>Sign up as a Donor, NGO, or Volunteer. Complete your profile with basic information and verification.</p>
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <div class="step-icon">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <h3>List Donation</h3>
                        <p>Share details about available food - type, quantity, expiry date, and pickup location.</p>
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <div class="step-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <h3>Find Match</h3>
                        <p>Our smart system matches your donation with nearby NGOs or individuals in need.</p>
                    </div>
                </div>
                <!-- Step 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <div class="step-icon">
                            <i class="bi bi-truck"></i>
                        </div>
                        <h3>Complete Delivery</h3>
                        <p>Coordinate pickup/delivery and confirm donation completion with OTP verification.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Role Based Sections -->
    <section class="role-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="font-size: 36px; font-weight: 700; color: var(--dark);">How It Works For You</h2>
                <p style="color: var(--gray); margin-top: 10px;">Choose your role and start making a difference</p>
            </div>
            <div class="row g-4">
                <!-- For Donors -->
                <div class="col-lg-4">
                    <div class="role-card">
                        <div class="role-icon">
                            <i class="bi bi-gift"></i>
                        </div>
                        <h3>For Donors</h3>
                        <ul class="role-list">
                            <li><i class="bi bi-check-circle-fill"></i> Register as a Donor</li>
                            <li><i class="bi bi-check-circle-fill"></i> Post food donation details</li>
                            <li><i class="bi bi-check-circle-fill"></i> Receive instant request notifications</li>
                            <li><i class="bi bi-check-circle-fill"></i> Schedule pickup with NGO</li>
                            <li><i class="bi bi-check-circle-fill"></i> Track your donation impact</li>
                            <li><i class="bi bi-check-circle-fill"></i> Earn recognition badges</li>
                        </ul>
                    </div>
                </div>
                <!-- For NGOs -->
                <div class="col-lg-4">
                    <div class="role-card">
                        <div class="role-icon">
                            <i class="bi bi-building"></i>
                        </div>
                        <h3>For NGOs</h3>
                        <ul class="role-list">
                            <li><i class="bi bi-check-circle-fill"></i> Register & Get verified</li>
                            <li><i class="bi bi-check-circle-fill"></i> Browse nearby donations</li>
                            <li><i class="bi bi-check-circle-fill"></i> Request food donations</li>
                            <li><i class="bi bi-check-circle-fill"></i> Coordinate with donors</li>
                            <li><i class="bi bi-check-circle-fill"></i> Update distribution status</li>
                            <li><i class="bi bi-check-circle-fill"></i> Showcase your impact</li>
                        </ul>
                    </div>
                </div>
                <!-- For Volunteers -->
                <div class="col-lg-4">
                    <div class="role-card">
                        <div class="role-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h3>For Volunteers</h3>
                        <ul class="role-list">
                            <li><i class="bi bi-check-circle-fill"></i> Sign up as Volunteer</li>
                            <li><i class="bi bi-check-circle-fill"></i> Find nearby pickup tasks</li>
                            <li><i class="bi bi-check-circle-fill"></i> Help transport donations</li>
                            <li><i class="bi bi-check-circle-fill"></i> Earn volunteer hours</li>
                            <li><i class="bi bi-check-circle-fill"></i> Get certificates</li>
                            <li><i class="bi bi-check-circle-fill"></i> Build community connections</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Highlight -->
    <section style="padding: 80px 0;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="font-size: 36px; font-weight: 700; color: var(--dark);">Key Features</h2>
                <p style="color: var(--gray);">Why Sayog is the trusted food donation platform</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-shield-check" style="font-size: 48px; color: var(--primary);"></i>
                        <h4 class="mt-3 fw-bold">Verified Partners</h4>
                        <p class="text-muted">All NGOs and donors are verified for trust and safety</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-clock-history" style="font-size: 48px; color: var(--primary);"></i>
                        <h4 class="mt-3 fw-bold">Real-Time Tracking</h4>
                        <p class="text-muted">Track your donation from request to delivery</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center">
                        <i class="bi bi-chat-dots" style="font-size: 48px; color: var(--primary);"></i>
                        <h4 class="mt-3 fw-bold">Direct Communication</h4>
                        <p class="text-muted">Chat directly with donors and NGOs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Preview -->
    <section style="padding: 80px 0; background: #f8fafc;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 style="font-size: 36px; font-weight: 700; color: var(--dark);">Common Questions</h2>
                <p style="color: var(--gray);">Quick answers about how Sayog works</p>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h5 class="fw-bold">❓ What type of food can I donate?</h5>
                        <p class="text-muted">You can donate packaged foods, fresh meals, vegetables, fruits, and non-perishable items. All food should be safe for consumption.</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-bold">❓ Is there any cost to donate or receive food?</h5>
                        <p class="text-muted">No! Sayog is completely free for donors, NGOs, and beneficiaries. We believe in connecting kindness without barriers.</p>
                    </div>
                    <div class="mb-4">
                        <h5 class="fw-bold">❓ How is food safety ensured?</h5>
                        <p class="text-muted">All partners are verified, and we follow strict food safety guidelines. Donors must ensure food quality before listing.</p>
                    </div>
                    <div class="text-center mt-4">
                        <a href="faq.php" class="btn-main" style="padding: 12px 30px;">View All FAQs</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to Make a Difference?</h2>
            <p>Join thousands of donors and NGOs fighting food waste and hunger</p>
            <a href="./auth/login.php" class="btn-light-custom">Get Started Today</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-title">Sayog</div>
                    <p class="text-light">Smart food donation and redistribution platform connecting kindness with need.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-title">Quick Links</div>
                    <div class="footer-links">
                        <a href="index.php">Home</a>
                        <a href="about.php">About</a>
                        <a href="services.php">Services</a>
                        <a href="contact.php">Contact</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-title">Services</div>
                    <div class="footer-links">
                        <a href="login.php?redirect=donate.php">Food Donation</a>
                        <a href="ngos.php">NGO Support</a>
                        <a href="login.php?redirect=donate.php">Emergency Help</a>
                        <a href="login.php?redirect=donate.php">Volunteer Program</a>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="footer-title">Contact</div>
                    <p>Email: support@sayog.com</p>
                    <p>Phone: +977 9800000000</p>
                    <p>Kathmandu, Nepal</p>
                </div>
            </div>
            <div class="copyright">© 2026 Sayog. All Rights Reserved.</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>