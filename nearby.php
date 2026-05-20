<?php
// nearby.php - Nearby Donations Page
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - Nearby Donations | Food Donation Platform</title>
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

        .nearby-card {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            transition: 0.3s;
            border: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .nearby-card:hover {
            transform: translateX(5px);
            border-color: var(--primary);
        }

        .map-placeholder {
            background: #e2e8f0;
            border-radius: 20px;
            height: 500px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f0fdf4, #e0f2fe);
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
                    <li class="nav-item"><a class="nav-link" href="ngos.php">NGOs</a></li>
                    <li class="nav-item"><a class="nav-link" href="stories.php">Stories</a></li>
                    <li class="nav-item"><a class="nav-link active" href="nearby.php">Nearby</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQs</a></li>
                    <li class="nav-item"><a class="nav-link" href="donate.php">Donate Now</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-header">
        <div class="container">
            <h1>Nearby Donations</h1>
            <p class="lead">Find and request food donations in your area</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-4">
                    <h4 class="mb-3">Available Near You <i class="bi bi-geo-alt-fill text-success"></i></h4>
                    <div class="nearby-card">
                        <div>
                            <span class="badge bg-success mb-2">Fresh Meals</span>
                            <h6>50 Fresh Meal Packages</h6>
                            <p class="text-muted small"><i class="bi bi-building"></i> Hotel Everest</p>
                            <span><i class="bi bi-clock text-danger"></i> Expires in 2 hours</span>
                        </div>
                        <a href="#" class="btn btn-main btn-sm mt-2 mt-sm-0">Request <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="nearby-card">
                        <div>
                            <span class="badge bg-warning mb-2">Groceries</span>
                            <h6>100 kg Rice & Lentils</h6>
                            <p class="text-muted small"><i class="bi bi-shop"></i> Annapurna Mart</p>
                            <span><i class="bi bi-clock text-danger"></i> Expires in 5 hours</span>
                        </div>
                        <a href="#" class="btn btn-main btn-sm mt-2 mt-sm-0">Request <i class="bi bi-arrow-right"></i></a>
                    </div>
                    <div class="nearby-card">
                        <div>
                            <span class="badge bg-info mb-2">Fresh Produce</span>
                            <h6>Fresh Vegetables & Fruits</h6>
                            <p class="text-muted small"><i class="bi bi-cafe"></i> Green Cafe</p>
                            <span><i class="bi bi-clock text-danger"></i> Expires in 3 hours</span>
                        </div>
                        <a href="#" class="btn btn-main btn-sm mt-2 mt-sm-0">Request <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="map-placeholder">
                        <div class="text-center">
                            <i class="bi bi-map fs-1 text-muted"></i>
                            <p class="mt-2 text-muted">Interactive Map Loading...</p>
                            <span class="badge bg-success">📍 Showing donations near you</span>
                        </div>
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
                    <p class="text-light">Smart food donation platform.</p>
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