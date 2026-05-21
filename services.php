<?php
// services.php - Services Page with Same Navbar as Index
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - Services | Food Donation Platform</title>

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
        }

        :root {
            --primary: #16a34a;
            --primary-dark: #14532d;
            --light: #f0fdf4;
            --dark: #111827;
            --gray: #6b7280;
        }

        /* Navbar - Same as Index */
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

        /* Donate Now button in navbar - SAME AS INDEX */
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

        /* Button Styles */
        .btn-main {
            background: var(--primary);
            color: #fff;
            padding: 10px 25px;
            border-radius: 40px;
            border: none;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-main:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        .btn-outline-main {
            background: transparent;
            color: var(--primary);
            padding: 10px 25px;
            border-radius: 40px;
            border: 2px solid var(--primary);
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-main:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 80px 0;
            text-align: center;
        }

        .page-header h1 {
            font-size: 48px;
            font-weight: 700;
        }

        .page-header p {
            font-size: 18px;
            opacity: 0.9;
        }

        /* Service Cards - EQUAL HEIGHT */
        .service-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            transition: 0.3s;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            text-align: center;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 35px;
            color: var(--primary);
        }

        .service-card h4 {
            font-weight: 700;
            margin-bottom: 12px;
        }

        .service-card p {
            color: var(--gray);
            margin-bottom: 20px;
            flex: 1;
        }

        .service-badge {
            display: inline-block;
            background: var(--light);
            color: var(--primary);
            padding: 6px 15px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 10px;
        }

        /* Process Section */
        .process-section {
            background: var(--light);
            border-radius: 30px;
            padding: 50px;
            margin-top: 60px;
        }

        .process-step {
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 20px;
        }

        /* Pricing Section */
        .pricing-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            height: 100%;
            transition: 0.3s;
            border: 2px solid transparent;
        }

        .pricing-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
        }

        .pricing-card.featured {
            border-color: var(--primary);
            box-shadow: 0 10px 30px rgba(22, 163, 74, 0.15);
        }

        .pricing-price {
            font-size: 36px;
            font-weight: 700;
            color: var(--primary);
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            color: white;
            margin-top: 60px;
        }

        .cta-section h3 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        /* Footer - Same as Index */
        footer {
            background: #111827;
            color: white;
            padding: 70px 0 20px;
            margin-top: 60px;
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
            transform: translateY(-3px);
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
                font-size: 32px;
            }

            .btn-donate-nav {
                margin: 10px 0;
                display: inline-block;
                text-align: center;
            }

            .process-section {
                padding: 30px 20px;
            }

            .cta-section {
                padding: 30px 20px;
            }

            .cta-section h3 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar - SAME AS INDEX -->
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
                    <li class="nav-item"><a class="nav-link active" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="ngos.php">NGOs</a></li>
                    <li class="nav-item"><a class="nav-link" href="stories.php">Stories</a></li>
                    <li class="nav-item"><a class="nav-link" href="nearby.php">Nearby</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQs</a></li>
                    <!-- DONATE NOW BUTTON - SAME AS INDEX -->
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
    <div class="page-header">
        <div class="container">
            <h1>Our Services</h1>
            <p>Comprehensive solutions for food donors, NGOs, and communities</p>
        </div>
    </div>

    <!-- Services Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Service 1 - Restaurant Donation -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-building"></i></div>
                        <h4>Restaurant Donation</h4>
                        <p>Partner with us to donate surplus meals from your restaurant or hotel kitchen daily.</p>
                        <span class="service-badge"><i class="bi bi-truck"></i> Free Pickup</span>
                    </div>
                </div>

                <!-- Service 2 - NGO Partnership -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-people"></i></div>
                        <h4>NGO Partnership</h4>
                        <p>Join our verified NGO network and receive regular food donations for your programs.</p>
                        <span class="service-badge"><i class="bi bi-shield-check"></i> Zero Fees</span>
                    </div>
                </div>

                <!-- Service 3 - Logistics Support -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-truck"></i></div>
                        <h4>Logistics Support</h4>
                        <p>We provide pickup and delivery coordination for seamless food redistribution.</p>
                        <span class="service-badge"><i class="bi bi-geo-alt"></i> Real-time Tracking</span>
                    </div>
                </div>

                <!-- Service 4 - Impact Analytics -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-graph-up"></i></div>
                        <h4>Impact Analytics</h4>
                        <p>Track your donation impact with real-time analytics and reporting dashboard.</p>
                        <span class="service-badge"><i class="bi bi-bar-chart"></i> Monthly Reports</span>
                    </div>
                </div>

                <!-- Service 5 - Verification System -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-shield-check"></i></div>
                        <h4>Verification System</h4>
                        <p>Strict verification for all NGOs and donors ensuring safety and trust.</p>
                        <span class="service-badge"><i class="bi bi-check-circle"></i> 100% Secure</span>
                    </div>
                </div>

                <!-- Service 6 - 24/7 Support -->
                <div class="col-lg-4 col-md-6">
                    <div class="service-card">
                        <div class="service-icon"><i class="bi bi-headset"></i></div>
                        <h4>24/7 Support</h4>
                        <p>Round-the-clock customer support for all platform users and volunteers.</p>
                        <span class="service-badge"><i class="bi bi-chat-dots"></i> Instant Response</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Process Section -->
    <section class="py-5">
        <div class="container">
            <div class="process-section">
                <h2 class="text-center mb-5 fw-bold">How It Works</h2>
                <div class="row">
                    <div class="col-md-3">
                        <div class="process-step">
                            <div class="step-number">1</div>
                            <h5>Sign Up</h5>
                            <p class="text-muted small">Create your account as Donor or NGO</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="process-step">
                            <div class="step-number">2</div>
                            <h5>Post Donation</h5>
                            <p class="text-muted small">List available food items with details</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="process-step">
                            <div class="step-number">3</div>
                            <h5>Match & Pickup</h5>
                            <p class="text-muted small">NGO receives alert and coordinates pickup</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="process-step">
                            <div class="step-number">4</div>
                            <h5>Impact Track</h5>
                            <p class="text-muted small">Track your donation impact in real-time</p>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="login.php?redirect=donate.php" class="btn-main">Get Started Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Plans Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 fw-bold">Simple, Transparent Pricing</h2>
            <p class="text-center text-muted mb-5">100% free for NGOs and Donors. No hidden charges.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h4>Donor</h4>
                        <div class="pricing-price">Free</div>
                        <p class="text-muted">For restaurants, hotels, individuals</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="bi bi-check-circle text-success"></i> Post unlimited donations</li>
                            <li><i class="bi bi-check-circle text-success"></i> Real-time tracking</li>
                            <li><i class="bi bi-check-circle text-success"></i> Impact reports</li>
                            <li><i class="bi bi-check-circle text-success"></i> 24/7 support</li>
                        </ul>
                        <a href="login.php?redirect=register.php" class="btn-outline-main mt-3">Register as Donor</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card featured">
                        <span class="badge bg-success mb-3">Most Popular</span>
                        <h4>NGO Partner</h4>
                        <div class="pricing-price">Free</div>
                        <p class="text-muted">For verified NGOs & communities</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="bi bi-check-circle text-success"></i> Receive food donations</li>
                            <li><i class="bi bi-check-circle text-success"></i> Priority matching</li>
                            <li><i class="bi bi-check-circle text-success"></i> Free logistics support</li>
                            <li><i class="bi bi-check-circle text-success"></i> Dedicated account manager</li>
                        </ul>
                        <a href="login.php?redirect=register.php" class="btn-main mt-3">Register as NGO</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="pricing-card">
                        <h4>Volunteer</h4>
                        <div class="pricing-price">Free</div>
                        <p class="text-muted">For individuals who want to help</p>
                        <ul class="list-unstyled mt-3">
                            <li><i class="bi bi-check-circle text-success"></i> Join delivery network</li>
                            <li><i class="bi bi-check-circle text-success"></i> Flexible hours</li>
                            <li><i class="bi bi-check-circle text-success"></i> Community recognition</li>
                            <li><i class="bi bi-check-circle text-success"></i> Certificate of appreciation</li>
                        </ul>
                        <a href="login.php?redirect=register.php" class="btn-outline-main mt-3">Become Volunteer</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5">
        <div class="container">
            <div class="cta-section">
                <h3><i class="bi bi-question-circle"></i> Need Custom Solutions?</h3>
                <p>We offer tailored programs for large organizations and corporate partners.</p>
                <a href="contact.php" class="btn-outline-main" style="background: white; color: #1e293b; border-color: white;">
                    <i class="bi bi-envelope"></i> Contact Our Team
                </a>
            </div>
        </div>
    </section>

    <!-- Footer - SAME AS INDEX -->
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
                    <div class="footer-title">Contact Info</div>
                    <p><i class="bi bi-envelope"></i> support@sayog.com</p>
                    <p><i class="bi bi-telephone"></i> +977 9800000000</p>
                    <p><i class="bi bi-geo-alt"></i> Kathmandu, Nepal</p>
                </div>
            </div>
            <div class="copyright">© 2026 Sayog. All Rights Reserved.</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>