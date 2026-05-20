<?php
// index.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - Food Donation & Redistribution Platform</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            background:#f8fafc;
            overflow-x:hidden;
        }

        :root{
            --primary:#16a34a;
            --secondary:#14532d;
            --light:#f0fdf4;
            --dark:#111827;
            --gray:#6b7280;
        }

        /* Navbar */

        .navbar{
            background:#ffffff;
            padding:15px 0;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .navbar-brand{
            font-size:28px;
            font-weight:700;
            color:var(--primary)!important;
        }

        .navbar-brand span{
            color:#111827;
        }

        .nav-link{
            color:#374151!important;
            font-weight:500;
            margin:0 10px;
            transition:0.3s;
        }

        .nav-link:hover{
            color:var(--primary)!important;
        }

        .btn-main{
            background:var(--primary);
            color:#fff;
            padding:10px 22px;
            border-radius:10px;
            border:none;
            font-weight:600;
            transition:0.3s;
        }

        .btn-main:hover{
            background:var(--secondary);
            color:#fff;
            transform:translateY(-2px);
        }

        /* Hero Section */

        .hero{
            min-height:90vh;
            display:flex;
            align-items:center;
            background:linear-gradient(to right, rgba(22,163,74,0.92), rgba(20,83,45,0.92)),
            url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=1200&auto=format&fit=crop');
            background-size:cover;
            background-position:center;
            color:white;
        }

        .hero h1{
            font-size:60px;
            font-weight:700;
            line-height:1.3;
        }

        .hero p{
            font-size:18px;
            margin-top:20px;
            color:#e5e7eb;
        }

        .hero-btns{
            margin-top:30px;
        }

        .btn-light-custom{
            background:white;
            color:var(--primary);
            padding:12px 25px;
            border-radius:12px;
            font-weight:600;
            text-decoration:none;
            margin-right:10px;
            transition:0.3s;
        }

        .btn-light-custom:hover{
            background:#dcfce7;
            color:var(--secondary);
        }

        .btn-outline-custom{
            border:2px solid white;
            color:white;
            padding:12px 25px;
            border-radius:12px;
            text-decoration:none;
            font-weight:600;
            transition:0.3s;
        }

        .btn-outline-custom:hover{
            background:white;
            color:var(--primary);
        }

        /* Section */

        .section-title{
            text-align:center;
            margin-bottom:60px;
        }

        .section-title h2{
            font-size:40px;
            font-weight:700;
            color:var(--dark);
        }

        .section-title p{
            color:var(--gray);
            margin-top:10px;
        }

        section{
            padding:100px 0;
        }

        /* Features */

        .feature-card{
            background:white;
            border-radius:20px;
            padding:35px;
            transition:0.3s;
            height:100%;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .feature-card:hover{
            transform:translateY(-10px);
        }

        .feature-icon{
            width:70px;
            height:70px;
            background:var(--light);
            color:var(--primary);
            border-radius:18px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:30px;
            margin-bottom:25px;
        }

        .feature-card h4{
            font-weight:600;
            margin-bottom:15px;
        }

        .feature-card p{
            color:var(--gray);
        }

        /* Donation Cards */

        .donation-card{
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
            transition:0.3s;
        }

        .donation-card:hover{
            transform:translateY(-8px);
        }

        .donation-card img{
            width:100%;
            height:240px;
            object-fit:cover;
        }

        .donation-content{
            padding:25px;
        }

        .badge-custom{
            background:#dcfce7;
            color:var(--primary);
            padding:8px 15px;
            border-radius:30px;
            font-size:13px;
            font-weight:600;
        }

        /* Stats */

        .stats{
            background:var(--primary);
            color:white;
        }

        .stat-box{
            text-align:center;
        }

        .stat-box h2{
            font-size:48px;
            font-weight:700;
        }

        .stat-box p{
            font-size:18px;
            color:#dcfce7;
        }

        /* CTA */

        .cta{
            background:linear-gradient(to right, #16a34a, #14532d);
            color:white;
            border-radius:30px;
            padding:70px;
            text-align:center;
        }

        .cta h2{
            font-size:42px;
            font-weight:700;
        }

        .cta p{
            margin-top:15px;
            color:#e5e7eb;
        }

        /* Footer */

        footer{
            background:#111827;
            color:white;
            padding:70px 0 20px;
        }

        .footer-title{
            font-size:24px;
            font-weight:700;
            margin-bottom:20px;
        }

        .footer-links a{
            display:block;
            color:#d1d5db;
            margin-bottom:12px;
            text-decoration:none;
            transition:0.3s;
        }

        .footer-links a:hover{
            color:#4ade80;
        }

        .social-icons a{
            width:40px;
            height:40px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            background:#1f2937;
            color:white;
            margin-right:10px;
            transition:0.3s;
            text-decoration:none;
        }

        .social-icons a:hover{
            background:var(--primary);
        }

        .copyright{
            border-top:1px solid #374151;
            margin-top:50px;
            padding-top:20px;
            text-align:center;
            color:#9ca3af;
        }

        @media(max-width:991px){

            .hero{
                text-align:center;
                padding:100px 0;
            }

            .hero h1{
                font-size:42px;
            }

            .cta{
                padding:40px 20px;
            }

            .cta h2{
                font-size:30px;
            }

        }

    </style>
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">

        <a class="navbar-brand" href="#home">
            Say<span>og</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#donations">Donations</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#ngos">NGOs</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

                <li class="nav-item ms-lg-3">
                    <a href="./auth/register.php" class="btn btn-main">
                        Donate Now
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- Hero Section -->

<section class="hero" id="home">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <h1>
                    Reduce Food Waste <br>
                    Help Needy People
                </h1>

                <p>
                    Sayog is a smart food donation and redistribution platform
                    connecting restaurants, hotels, NGOs, and individuals with
                    people who truly need support.
                </p>

                <div class="hero-btns">

                    <a href="./auth/register.php" class="btn-light-custom">
                        Start Donating
                    </a>

                    <a href="#about" class="btn-outline-custom">
                        Explore More
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Features -->

<section id="about">

    <div class="container">

        <div class="section-title">

            <h2>Why Choose Sayog?</h2>

            <p>
                Smart technology for impactful food donation and redistribution.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-geo-alt"></i>
                    </div>

                    <h4>Location Based Matching</h4>

                    <p>
                        Find nearby NGOs and consumers instantly using GPS and Google Maps integration.
                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-bell"></i>
                    </div>

                    <h4>Real-Time Notifications</h4>

                    <p>
                        Receive instant donation alerts, request updates, and delivery tracking notifications.
                    </p>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="feature-card">

                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>

                    <h4>Secure Verification</h4>

                    <p>
                        OTP verification, admin approval, and secure authentication ensure platform trust.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Donation Section -->

<section class="bg-light" id="donations">

    <div class="container">

        <div class="section-title">

            <h2>Recent Donations</h2>

            <p>
                Explore latest food donations available nearby.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-4">

                <div class="donation-card">

                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1200&auto=format&fit=crop">

                    <div class="donation-content">

                        <span class="badge-custom">
                            Food Donation
                        </span>

                        <h4 class="mt-3">
                            Fresh Meal Package
                        </h4>

                        <p class="text-muted">
                            Donated by Hotel Everest • Kathmandu
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <span>
                                <i class="bi bi-geo-alt-fill text-success"></i>
                                2 KM Away
                            </span>

                            <a href="./auth/register.php" class="btn btn-main btn-sm">
                                Request
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="donation-card">

                    <img src="https://images.unsplash.com/photo-1547592180-85f173990554?q=80&w=1200&auto=format&fit=crop">

                    <div class="donation-content">

                        <span class="badge-custom">
                            NGO Support
                        </span>

                        <h4 class="mt-3">
                            Rice & Vegetables
                        </h4>

                        <p class="text-muted">
                            Donated by FoodCare NGO
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <span>
                                <i class="bi bi-geo-alt-fill text-success"></i>
                                5 KM Away
                            </span>

                            <a href="./auth/register.php" class="btn btn-main btn-sm">
                                Request
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-lg-4">

                <div class="donation-card">

                    <img src="https://images.unsplash.com/photo-1511690743698-d9d85f2fbf38?q=80&w=1200&auto=format&fit=crop">

                    <div class="donation-content">

                        <span class="badge-custom">
                            Restaurant Donation
                        </span>

                        <h4 class="mt-3">
                            Packed Healthy Food
                        </h4>

                        <p class="text-muted">
                            Donated by Green Cafe
                        </p>

                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <span>
                                <i class="bi bi-geo-alt-fill text-success"></i>
                                3 KM Away
                            </span>

                            <a href="./auth/register.php" class="btn btn-main btn-sm">
                                Request
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Stats -->

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

<!-- CTA -->

<section id="contact">

    <div class="container">

        <div class="cta">

            <h2>
                Join The Movement Against Food Waste
            </h2>

            <p>
                Together we can reduce hunger and create a better future.
            </p>

            <a href="./auth/register.php" class="btn-light-custom mt-4 d-inline-block">
                Become a Donor
            </a>

        </div>

    </div>

</section>

<!-- Footer -->

<footer>

    <div class="container">

        <div class="row">

            <div class="col-lg-4 mb-4">

                <div class="footer-title">
                    Sayog
                </div>

                <p class="text-light">
                    Smart food donation and redistribution platform connecting kindness with need.
                </p>

                <div class="social-icons mt-4">

                    <a href="#">
                        <i class="bi bi-facebook"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-instagram"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-twitter-x"></i>
                    </a>

                    <a href="#">
                        <i class="bi bi-linkedin"></i>
                    </a>

                </div>

            </div>

            <div class="col-lg-2 col-md-6 mb-4">

                <div class="footer-title">
                    Links
                </div>

                <div class="footer-links">

                    <a href="#">Home</a>
                    <a href="#">About</a>
                    <a href="#">Donations</a>
                    <a href="#">NGOs</a>

                </div>

            </div>

            <div class="col-lg-3 col-md-6 mb-4">

                <div class="footer-title">
                    Services
                </div>

                <div class="footer-links">

                    <a href="#">Food Donation</a>
                    <a href="#">NGO Support</a>
                    <a href="#">Emergency Help</a>
                    <a href="#">Volunteer Program</a>

                </div>

            </div>

            <div class="col-lg-3 mb-4">

                <div class="footer-title">
                    Contact
                </div>

                <p>Email: support@sayog.com</p>
                <p>Phone: +977 9800000000</p>
                <p>Kathmandu, Nepal</p>

            </div>

        </div>

        <div class="copyright">

            © 2026 Sayog. All Rights Reserved.

        </div>

    </div>

</footer>

<!-- Bootstrap JS -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>