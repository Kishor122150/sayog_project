<?php
// how-it-works.php - How It Works Page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - How It Works | Food Donation Platform</title>
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

        .btn-main {
            background: var(--primary);
            color: #fff;
            padding: 12px 30px;
            border-radius: 50px;
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

        .page-header .lead {
            font-size: 18px;
            opacity: 0.9;
        }

        .step-card {
            text-align: center;
            padding: 35px 25px;
            background: white;
            border-radius: 24px;
            height: 100%;
            transition: 0.3s;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .step-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .step-number {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            font-weight: 800;
            margin: 0 auto 25px;
            box-shadow: 0 8px 20px rgba(22, 163, 74, 0.3);
        }

        .step-card h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .step-card p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.6;
        }

        .info-section {
            background: white;
            border-radius: 30px;
            padding: 50px;
            margin-top: 60px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .info-icon {
            width: 60px;
            height: 60px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: var(--primary);
        }

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
            transform: translateX(5px);
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

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 32px;
            }

            .step-card {
                padding: 25px 20px;
            }

            .step-number {
                width: 60px;
                height: 60px;
                font-size: 24px;
            }

            .info-section {
                padding: 30px 20px;
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
                    <li class="nav-item"><a class="nav-link" href="donate.php">Donate Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1>How It Works</h1>
            <p class="lead">Just 4 simple steps to make a difference in someone's life</p>
        </div>
    </div>

    <!-- Steps Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h4>Create Account</h4>
                        <p class="text-muted">Sign up as a donor (restaurant, hotel, caterer) or as an NGO. Complete verification with your documents.</p>
                        <small class="text-success"><i class="bi bi-clock"></i> Takes 2 minutes</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h4>Post Donation</h4>
                        <p class="text-muted">List available food items with quantity, expiry time, and pickup location. Add photos for transparency.</p>
                        <small class="text-success"><i class="bi bi-camera"></i> Add photos</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h4>Instant Match</h4>
                        <p class="text-muted">Our AI system matches your donation with the nearest verified NGO. They accept and schedule pickup.</p>
                        <small class="text-success"><i class="bi bi-geo-alt"></i> Nearest match</small>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <h4>Track Impact</h4>
                        <p class="text-muted">Receive real-time updates, photos of delivery, and monthly impact reports showing lives you've touched.</p>
                        <small class="text-success"><i class="bi bi-heart"></i> See impact</small>
                    </div>
                </div>
            </div>

            <!-- Additional Info Section -->
            <div class="info-section">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h3 class="mb-3">Ready to make a difference?</h3>
                        <p class="text-muted mb-0">Join thousands of donors and NGOs who are already using Sayog to reduce food waste and feed those in need. Every meal shared brings hope to someone.</p>
                    </div>
                    <div class="col-md-4 text-center text-md-end mt-3 mt-md-0">
                        <a href="donate.php" class="btn-main">Get Started Now <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section (Optional) -->
    <section class="py-5 bg-light">
        <div class="container text-center">
            <h3 class="mb-4">Watch How Sayog Works</h3>
            <div class="ratio ratio-16x9" style="max-width: 800px; margin: 0 auto; border-radius: 20px; overflow: hidden;">
                <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=0" title="How Sayog Works" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-title">Sayog</div>
                    <p class="text-light">Smart food donation platform connecting kindness with need.</p>
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
                        <a href="donate.php">Food Donation</a>
                        <a href="ngos.php">NGO Support</a>
                        <a href="#">Emergency Help</a>
                        <a href="#">Volunteer Program</a>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="footer-title">Contact</div>
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