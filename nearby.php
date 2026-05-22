<?php
// nearby.php - Nearby Donations Page with Same Navbar as Index
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - Nearby Donations | Find Food Near You</title>

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
            padding: 8px 20px;
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

        /* Location Bar */
        .location-bar {
            background: white;
            border-radius: 60px;
            padding: 10px 20px;
            display: inline-flex;
            align-items: center;
            gap: 15px;
            margin-top: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .location-bar i {
            color: var(--primary);
            font-size: 20px;
        }

        .location-bar span {
            color: var(--dark);
            font-weight: 500;
        }

        .location-bar a {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
        }

        /* Filter Section */
        .filter-section {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .filter-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .filter-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .filter-btn {
            background: #f1f5f9;
            border: none;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 500;
            transition: 0.3s;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: var(--primary);
            color: white;
        }

        /* Distance Slider */
        .distance-slider {
            width: 100%;
            margin: 10px 0;
        }

        /* Nearby Cards - EQUAL HEIGHT FIX */
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
            gap: 15px;
        }

        .nearby-card:hover {
            transform: translateX(5px);
            border-color: var(--primary);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
        }

        .card-content {
            flex: 1;
        }

        .badge-custom {
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }

        .badge-food {
            background: #dcfce7;
            color: #16a34a;
        }

        .badge-grocery {
            background: #fef3c7;
            color: #d97706;
        }

        .badge-produce {
            background: #dbeafe;
            color: #2563eb;
        }

        .badge-beverage {
            background: #fce7f3;
            color: #db2777;
        }

        .nearby-card h5 {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .donor-name {
            font-size: 0.8rem;
            color: var(--gray);
            margin-bottom: 8px;
        }

        .expiry-info {
            font-size: 0.75rem;
            color: #ef4444;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .distance-info {
            font-size: 0.75rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 5px;
            margin-top: 8px;
        }

        .quantity-info {
            font-size: 0.8rem;
            color: var(--dark);
            font-weight: 500;
            margin-top: 5px;
        }

        /* Map Container */
        .map-container {
            background: linear-gradient(135deg, #f0fdf4, #e0f2fe);
            border-radius: 20px;
            height: 500px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .map-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        /* Stats Section */
        .stats-row {
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e2e8f0;
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

            .nearby-card {
                flex-direction: column;
                text-align: center;
            }

            .card-content {
                text-align: center;
            }

            .expiry-info,
            .distance-info,
            .quantity-info {
                justify-content: center;
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
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="ngos.php">NGOs</a></li>
                    <li class="nav-item"><a class="nav-link" href="stories.php">Stories</a></li>
                    <li class="nav-item"><a class="nav-link active" href="nearby.php">Nearby</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="faq.php">FAQs</a></li>
                    <!-- DONATE NOW BUTTON - SAME AS INDEX -->
                    <li class="nav-item">
                        <a class="btn-donate-nav" href="./auth/login.php">
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
            <h1>Nearby Donations</h1>
            <p>Find and request food donations in your area</p>
            <div class="location-bar">
                <i class="bi bi-geo-alt-fill"></i>
                <span>Your Location: Kathmandu, Nepal</span>
                <a href="#"><i class="bi bi-pencil"></i> Change</a>
            </div>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <!-- Filter Section -->
            <div class="filter-section">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="filter-title"><i class="bi bi-funnel-fill"></i> Filter by Category</div>
                        <div class="filter-buttons">
                            <button class="filter-btn active" data-filter="all">All</button>
                            <button class="filter-btn" data-filter="food">Food</button>
                            <button class="filter-btn" data-filter="grocery">Groceries</button>
                            <button class="filter-btn" data-filter="produce">Produce</button>
                            <button class="filter-btn" data-filter="beverage">Beverages</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="filter-title"><i class="bi bi-sliders2"></i> Distance (km)</div>
                        <input type="range" class="distance-slider" min="1" max="20" value="10" id="distanceSlider">
                        <span id="distanceValue" class="text-success fw-bold">10 km</span>
                    </div>
                    <div class="col-md-4 text-md-end">
                        <div class="filter-title"><i class="bi bi-sort-down"></i> Sort By</div>
                        <select class="form-select" style="width: auto; display: inline-block; border-radius: 30px;">
                            <option>Distance: Nearest First</option>
                            <option>Expiry: Soonest First</option>
                            <option>Quantity: Largest First</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Donations List -->
                <div class="col-lg-5 mb-4">
                    <h4 class="mb-3">
                        <i class="bi bi-gift-fill text-success"></i>
                        Available Near You
                        <span class="badge bg-success ms-2">7 donations</span>
                    </h4>

                    <!-- Card 1 -->
                    <div class="nearby-card" data-category="food">
                        <div class="card-content">
                            <span class="badge-custom badge-food"><i class="bi bi-egg-fried"></i> Fresh Meals</span>
                            <h5>50 Fresh Meal Packages</h5>
                            <p class="donor-name"><i class="bi bi-building"></i> Hotel Everest • Kathmandu</p>
                            <div class="quantity-info"><i class="bi bi-box"></i> Quantity: 50 meals</div>
                            <div class="expiry-info"><i class="bi bi-clock"></i> Expires in 2 hours</div>
                            <div class="distance-info"><i class="bi bi-geo-alt-fill"></i> 1.2 km away</div>
                        </div>
                        <a href="login.php?redirect=donate.php" class="btn-main">Request <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Card 2 -->
                    <div class="nearby-card" data-category="grocery">
                        <div class="card-content">
                            <span class="badge-custom badge-grocery"><i class="bi bi-basket-fill"></i> Groceries</span>
                            <h5>100 kg Rice & Lentils</h5>
                            <p class="donor-name"><i class="bi bi-shop"></i> Annapurna Mart • Lalitpur</p>
                            <div class="quantity-info"><i class="bi bi-box"></i> Quantity: 100 kg</div>
                            <div class="expiry-info"><i class="bi bi-clock"></i> Expires in 5 hours</div>
                            <div class="distance-info"><i class="bi bi-geo-alt-fill"></i> 3.5 km away</div>
                        </div>
                        <a href="login.php?redirect=donate.php" class="btn-main">Request <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Card 3 -->
                    <div class="nearby-card" data-category="produce">
                        <div class="card-content">
                            <span class="badge-custom badge-produce"><i class="bi bi-apple"></i> Fresh Produce</span>
                            <h5>Fresh Vegetables & Fruits</h5>
                            <p class="donor-name"><i class="bi bi-cafe"></i> Green Cafe • Bhaktapur</p>
                            <div class="quantity-info"><i class="bi bi-box"></i> Quantity: 30 kg</div>
                            <div class="expiry-info"><i class="bi bi-clock"></i> Expires in 3 hours</div>
                            <div class="distance-info"><i class="bi bi-geo-alt-fill"></i> 5.8 km away</div>
                        </div>
                        <a href="login.php?redirect=donate.php" class="btn-main">Request <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Card 4 -->
                    <div class="nearby-card" data-category="food">
                        <div class="card-content">
                            <span class="badge-custom badge-food"><i class="bi bi-cake"></i> Baked Goods</span>
                            <h5>Fresh Bread & Pastries</h5>
                            <p class="donor-name"><i class="bi bi-building"></i> The Bakery Shop • Kathmandu</p>
                            <div class="quantity-info"><i class="bi bi-box"></i> Quantity: 100 pieces</div>
                            <div class="expiry-info"><i class="bi bi-clock text-danger"></i> Expires in 1 hour</div>
                            <div class="distance-info"><i class="bi bi-geo-alt-fill"></i> 0.8 km away</div>
                        </div>
                        <a href="login.php?redirect=donate.php" class="btn-main">Request <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Card 5 -->
                    <div class="nearby-card" data-category="beverage">
                        <div class="card-content">
                            <span class="badge-custom badge-beverage"><i class="bi bi-cup-straw"></i> Beverages</span>
                            <h5>Packaged Juice & Water</h5>
                            <p class="donor-name"><i class="bi bi-building"></i> Refresh Beverages • Kathmandu</p>
                            <div class="quantity-info"><i class="bi bi-box"></i> Quantity: 200 bottles</div>
                            <div class="expiry-info"><i class="bi bi-clock"></i> Expires in 2 days</div>
                            <div class="distance-info"><i class="bi bi-geo-alt-fill"></i> 2.1 km away</div>
                        </div>
                        <a href="login.php?redirect=donate.php" class="btn-main">Request <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <!-- Card 6 - Dairy -->
                    <div class="nearby-card" data-category="food">
                        <div class="card-content">
                            <span class="badge-custom badge-food"><i class="bi bi-cup"></i> Dairy Products</span>
                            <h5>Fresh Milk & Yogurt</h5>
                            <p class="donor-name"><i class="bi bi-building"></i> Himalayan Dairy • Lalitpur</p>
                            <div class="quantity-info"><i class="bi bi-box"></i> Quantity: 50 liters</div>
                            <div class="expiry-info"><i class="bi bi-clock text-danger"></i> Expires in 4 hours</div>
                            <div class="distance-info"><i class="bi bi-geo-alt-fill"></i> 4.3 km away</div>
                        </div>
                        <a href="login.php?redirect=donate.php" class="btn-main">Request <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Map Section -->
                <div class="col-lg-7">
                    <div class="map-container">
                        <div class="map-placeholder">
                            <i class="bi bi-map fs-1 text-muted"></i>
                            <p class="mt-2 text-muted">Interactive Map Loading...</p>
                            <span class="badge bg-success mb-2">📍 Showing 6 donations near you</span>
                            <a href="#" class="btn-outline-main mt-3">View Full Map</a>
                        </div>
                    </div>

                    <!-- Stats Row -->
                    <div class="stats-row">
                        <div class="row text-center">
                            <div class="col-4">
                                <div class="stat-box">
                                    <h3 class="text-success fw-bold">6</h3>
                                    <p class="text-muted small">Active Donations</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-box">
                                    <h3 class="text-success fw-bold">15</h3>
                                    <p class="text-muted small">NGOs Near You</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-box">
                                    <h3 class="text-success fw-bold">500+</h3>
                                    <p class="text-muted small">People Helped</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-5">
                <a href="#" class="btn-outline-main">
                    <i class="bi bi-arrow-repeat"></i> Load More Donations
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

    <!-- Filter and Distance Slider Script -->
    <script>
        // Distance Slider
        const distanceSlider = document.getElementById('distanceSlider');
        const distanceValue = document.getElementById('distanceValue');

        if (distanceSlider) {
            distanceSlider.addEventListener('input', function() {
                distanceValue.textContent = this.value + ' km';
            });
        }

        // Category Filter
        const filterBtns = document.querySelectorAll('.filter-btn');
        const nearbyCards = document.querySelectorAll('.nearby-card');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                // Update active class
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Filter cards
                nearbyCards.forEach(card => {
                    if (filter === 'all' || card.getAttribute('data-category') === filter) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>