<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - Home | Food Donation & Redistribution Platform</title>

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

        /* Donate Now button in navbar */
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

        .btn-main {
            background: var(--primary);
            color: #fff;
            padding: 10px 22px;
            border-radius: 10px;
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

        .btn-sm-request {
            background: var(--primary);
            color: white;
            padding: 6px 18px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 13px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            border: none;
        }

        .btn-sm-request:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            color: white;
        }

        .hero {
            min-height: 90vh;
            display: flex;
            align-items: center;
            background: linear-gradient(to right, rgba(22, 163, 74, 0.92), rgba(20, 83, 45, 0.92)),
                url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=1200&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            color: white;
        }

        .hero h1 {
            font-size: 60px;
            font-weight: 700;
            line-height: 1.3;
        }

        .hero p {
            font-size: 18px;
            margin-top: 20px;
            color: #e5e7eb;
        }

        .btn-light-custom {
            background: white;
            color: var(--primary);
            padding: 12px 25px;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            margin-right: 10px;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-light-custom:hover {
            background: #dcfce7;
            color: var(--primary-dark);
        }

        .btn-outline-custom {
            border: 2px solid white;
            color: white;
            padding: 12px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            display: inline-block;
        }

        .btn-outline-custom:hover {
            background: white;
            color: var(--primary);
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 40px;
            font-weight: 700;
            color: var(--dark);
        }

        .section-title p {
            color: var(--gray);
            margin-top: 10px;
        }

        section {
            padding: 100px 0;
        }

        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 35px;
            transition: 0.3s;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            background: var(--light);
            color: var(--primary);
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            margin-bottom: 25px;
        }

        /* ========== DONATION CARDS FIX - EQUAL HEIGHT ========== */
        .donation-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: 0.3s;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .donation-card:hover {
            transform: translateY(-8px);
        }

        .donation-card img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .donation-content {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .badge-custom {
            background: #dcfce7;
            color: var(--primary);
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            width: fit-content;
        }

        .donation-title {
            font-size: 1.2rem;
            font-weight: 700;
            margin-top: 12px;
            margin-bottom: 5px;
            color: var(--dark);
        }

        .donation-meta {
            color: #6c757d;
            font-size: 0.8rem;
            margin-bottom: 15px;
        }

        /* This is the key fix - pushes the footer to bottom */
        .donation-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #e9ecef;
            margin-top: 15px;
        }

        .donation-location {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            color: #6c757d;
        }

        .donation-location i {
            color: var(--primary);
        }

        /* Row equal height fix */
        .row-cards {
            display: flex;
            flex-wrap: wrap;
        }

        .row-cards [class*="col-"] {
            display: flex;
            flex-direction: column;
        }

        .stats {
            background: var(--primary);
            color: white;
        }

        .stat-box {
            text-align: center;
        }

        .stat-box h2 {
            font-size: 48px;
            font-weight: 700;
        }

        .stat-box p {
            font-size: 18px;
            color: #dcfce7;
        }

        .cta {
            background: linear-gradient(to right, #16a34a, #14532d);
            color: white;
            border-radius: 30px;
            padding: 70px;
            text-align: center;
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
            .hero {
                text-align: center;
                padding: 100px 0;
            }

            .hero h1 {
                font-size: 42px;
            }

            .cta {
                padding: 40px 20px;
            }

            .cta h2 {
                font-size: 30px;
            }

            .btn-donate-nav {
                margin: 10px 0;
                display: inline-block;
                text-align: center;
            }
        }

        @media(max-width:768px) {
            .donation-footer {
                flex-direction: column;
                gap: 12px;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar with Donate Now Button -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Say<span>og</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
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

    <!-- Hero Section -->
    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1>Reduce Food Waste <br> Help Needy People</h1>
                    <p>Sayog is a smart food donation and redistribution platform connecting restaurants, hotels, NGOs, and individuals with people who truly need support.</p>
                    <div class="hero-btns">
                        <a href="how-it-works.php" class="btn-light-custom">Start Donating</a>
                        <a href="how-it-works.php" class="btn-outline-custom">Explore More</a>
                    </div>
                    <div class="mt-5 d-flex gap-4">
                        <div><strong class="fs-2">5000+</strong><br><span>Meals Saved</span></div>
                        <div><strong class="fs-2">200+</strong><br><span>NGO Partners</span></div>
                        <div><strong class="fs-2">10000+</strong><br><span>Lives Impacted</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features / About Section -->
    <section id="about">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Sayog?</h2>
                <p>Smart technology for impactful food donation and redistribution.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-geo-alt"></i></div>
                        <h4>Location Based Matching</h4>
                        <p>Find nearby NGO and consumers instantly using GPS and Google Maps integration.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-bell"></i></div>
                        <h4>Real-Time Notifications</h4>
                        <p>Receive instant donation alerts, request updates, and delivery tracking notifications.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-shield-check"></i></div>
                        <h4>Secure Verification</h4>
                        <p>OTP verification, admin approval, and secure authentication ensure platform trust.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Donations Section - EQUAL CARDS FIXED -->
    <section class="bg-light" id="donations">
        <div class="container">
            <div class="section-title">
                <h2>Recent Donations</h2>
                <p>Explore latest food donations available nearby.</p>
            </div>
            <div class="row g-4 row-cards">

                <!-- Card 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="donation-card">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=500&auto=format" alt="Fresh Meal Package">
                        <div class="donation-content">
                            <span class="badge-custom">Food Donation</span>
                            <h4 class="donation-title">Fresh Meal Package</h4>
                            <p class="donation-meta">Donated by Hotel Everest • Kathmandu</p>
                            <div class="donation-footer">
                                <span class="donation-location">
                                    <i class="bi bi-geo-alt-fill"></i> 2 KM Away
                                </span>
                                <a href="login.php?redirect=donate.php" class="btn-sm-request">Request</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="donation-card">
                        <img src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=500&auto=format" alt="Rice & Vegetables">
                        <div class="donation-content">
                            <span class="badge-custom">NGO Support</span>
                            <h4 class="donation-title">Rice & Vegetables</h4>
                            <p class="donation-meta">Donated by FoodCare NGO • Lalitpur</p>
                            <div class="donation-footer">
                                <span class="donation-location">
                                    <i class="bi bi-geo-alt-fill"></i> 5 KM Away
                                </span>
                                <a href="login.php?redirect=donate.php" class="btn-sm-request">Request</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="donation-card">
                        <img src="https://images.unsplash.com/photo-1511690743698-d9d85f2fbf38?q=80&w=500&auto=format" alt="Packed Healthy Food">
                        <div class="donation-content">
                            <span class="badge-custom">Restaurant Donation</span>
                            <h4 class="donation-title">Packed Healthy Food</h4>
                            <p class="donation-meta">Donated by Green Cafe • Bhaktapur</p>
                            <div class="donation-footer">
                                <span class="donation-location">
                                    <i class="bi bi-geo-alt-fill"></i> 3 KM Away
                                </span>
                                <a href="login.php?redirect=donate.php" class="btn-sm-request">Request</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats" id="ngos">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-box">
                        <h2>5K+</h2>
                        <p>Food Donations</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-box">
                        <h2>2K+</h2>
                        <p>Families Helped</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-box">
                        <h2>150+</h2>
                        <p>NGO Partners</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="stat-box">
                        <h2>100%</h2>
                        <p>Verified Donations</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact">
        <div class="container">
            <div class="cta">
                <h2>Join The Movement Against Food Waste</h2>
                <p>Together we can reduce hunger and create a better future.</p>
                <a href="login.php?redirect=donate.php" class="btn-light-custom mt-4 d-inline-block">Become a Donor</a>
            </div>
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