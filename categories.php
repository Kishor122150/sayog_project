<?php
// categories.php - Donation Categories Page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - Donation Categories | Food Donation Platform</title>
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

        .category-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: 0.3s;
            height: 100%;
            border: 1px solid #e2e8f0;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            border-color: var(--primary);
        }

        .category-icon {
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
        }

        .copyright {
            border-top: 1px solid #374151;
            margin-top: 50px;
            padding-top: 20px;
            text-align: center;
            color: #9ca3af;
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
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="categories.php">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="ngos.php">NGOs</a></li>
                    <li class="nav-item"><a class="nav-link" href="stories.php">Stories</a></li>
                    <li class="nav-item"><a class="nav-link" href="nearby.php">Nearby</a></li>
                    <li class="nav-item"><a class="nav-link" href="how-it-works.php">How It Works</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="donate.php">Donate Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1>Donation Categories</h1>
            <p class="lead">Choose what you'd like to donate - every contribution matters</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-egg-fried"></i></div>
                        <h5>Fresh Meals</h5>
                        <p class="text-muted">Cooked & packaged meals</p>
                        <span class="badge bg-success">Most Needed</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-cup-straw"></i></div>
                        <h5>Groceries</h5>
                        <p class="text-muted">Rice, lentils, oil, spices</p>
                        <span class="badge bg-warning">High Demand</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-apple"></i></div>
                        <h5>Fresh Produce</h5>
                        <p class="text-muted">Fruits & vegetables</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-cake"></i></div>
                        <h5>Bakery Items</h5>
                        <p class="text-muted">Bread, pastries, cakes</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-droplet"></i></div>
                        <h5>Beverages</h5>
                        <p class="text-muted">Water, juice, milk</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-box-seam"></i></div>
                        <h5>Packaged Food</h5>
                        <p class="text-muted">Snacks, noodles, cereals</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-baby"></i></div>
                        <h5>Baby Food</h5>
                        <p class="text-muted">Formula, purees, cereals</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-heart"></i></div>
                        <h5>Special Diet</h5>
                        <p class="text-muted">Gluten-free, organic</p>
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
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="footer-title">Services</div>
                    <div class="footer-links">
                        <a href="#">Food Donation</a>
                        <a href="#">NGO Support</a>
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