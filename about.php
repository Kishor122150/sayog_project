<?php
// about.php - About Us Page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - About Us | Food Donation Platform</title>
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
            padding: 10px 22px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-main:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
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

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 36px;
            font-weight: 700;
            color: var(--dark);
        }

        .about-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            height: 100%;
            transition: 0.3s;
        }

        .about-card:hover {
            transform: translateY(-5px);
        }

        .about-icon {
            width: 70px;
            height: 70px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 30px;
            color: var(--primary);
        }

        .value-card {
            text-align: center;
            padding: 30px;
            background: white;
            border-radius: 20px;
            transition: 0.3s;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
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

        @media(max-width:991px) {
            .page-header h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Say<span>og</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="about.php">About</a></li>
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

    <div class="page-header">
        <div class="container">
            <h1>About Sayog</h1>
            <p class="lead">We're on a mission to end hunger and reduce food waste</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=600&auto=format" class="img-fluid rounded-4 shadow" alt="About Us">
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-3">Every day, tons of edible food goes to waste while millions go to bed hungry.</h2>
                    <p class="text-muted">Sayog was founded in 2024 to solve this critical problem. We built a smart platform that bridges the gap between food surplus and food scarcity using technology, transparency, and trust.</p>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 mb-3"><i class="bi bi-check-circle-fill text-success"></i> 100% Verified NGOs</div>
                            <div class="d-flex align-items-center gap-2 mb-3"><i class="bi bi-check-circle-fill text-success"></i> Real-time Tracking</div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex align-items-center gap-2 mb-3"><i class="bi bi-check-circle-fill text-success"></i> Zero Food Waste</div>
                            <div class="d-flex align-items-center gap-2 mb-3"><i class="bi bi-check-circle-fill text-success"></i> 24/7 Support</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="section-title">
                <h2>Our Core Values</h2>
                <p>The principles that guide everything we do</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card">
                        <i class="bi bi-heart-fill text-success fs-1"></i>
                        <h4 class="mt-3">Compassion</h4>
                        <p class="text-muted">We believe in helping those in need with dignity and respect.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <i class="bi bi-shield-check text-success fs-1"></i>
                        <h4 class="mt-3">Integrity</h4>
                        <p class="text-muted">Total transparency in every donation and distribution.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <i class="bi bi-lightbulb text-success fs-1"></i>
                        <h4 class="mt-3">Innovation</h4>
                        <p class="text-muted">Using technology to solve food waste challenges.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-title">Sayog</div>
                    <p class="text-light">Smart food donation and redistribution platform.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <div class="footer-title">Links</div>
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
                        <a href="#">Food Donation</a>
                        <a href="#">NGO Support</a>
                        <a href="#">Emergency Help</a>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="footer-title">Contact</div>
                    <p>Email: support@sayog.com</p>
                    <p>Phone: +977 9800000000</p>
                </div>
            </div>
            <div class="copyright">© 2026 Sayog. All Rights Reserved.</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>