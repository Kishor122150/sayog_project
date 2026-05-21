<?php
// ngos.php - NGOs List Page with Same Navbar as Index
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - NGO Partners | Food Donation Platform</title>

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

        /* Search & Filter Section */
        .search-section {
            margin-bottom: 40px;
        }

        .search-box {
            max-width: 500px;
            margin: 0 auto;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border: 2px solid #e2e8f0;
            border-radius: 50px;
            font-size: 16px;
            transition: 0.3s;
            background: white;
        }

        .search-box input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 18px;
            color: var(--gray);
        }

        /* Filter Tabs */
        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin: 30px 0;
        }

        .filter-tab {
            background: white;
            border: 2px solid #e2e8f0;
            padding: 8px 24px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 14px;
            color: var(--dark);
            transition: 0.3s;
            cursor: pointer;
        }

        .filter-tab:hover,
        .filter-tab.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* NGO Cards - EQUAL HEIGHT */
        .ngo-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            text-align: center;
            transition: 0.3s;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .ngo-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .ngo-logo {
            width: 80px;
            height: 80px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 40px;
            color: var(--primary);
        }

        .ngo-card h5 {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .ngo-location {
            font-size: 0.8rem;
            color: var(--gray);
            margin-bottom: 10px;
        }

        .verified-badge {
            background: #dcfce7;
            color: #16a34a;
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 15px;
        }

        .ngo-stats {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 15px 0;
            padding-top: 10px;
            border-top: 1px solid #e2e8f0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.1rem;
        }

        .stat-label {
            font-size: 0.7rem;
            color: var(--gray);
        }

        .ngo-description {
            font-size: 0.8rem;
            color: var(--gray);
            margin: 10px 0;
            flex: 1;
        }

        .card-footer-btn {
            margin-top: 15px;
        }

        /* Stats Section */
        .stats-section {
            background: var(--light);
            border-radius: 30px;
            padding: 50px;
            margin-top: 60px;
            text-align: center;
        }

        .stats-section h3 {
            font-size: 36px;
            font-weight: 700;
            color: var(--primary);
        }

        /* Become NGO CTA */
        .become-ngo-cta {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            color: white;
            margin-top: 60px;
        }

        .become-ngo-cta h3 {
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

            .stats-section {
                padding: 30px 20px;
            }

            .become-ngo-cta {
                padding: 30px 20px;
            }

            .become-ngo-cta h3 {
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
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link active" href="ngos.php">NGOs</a></li>
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
            <h1>Our NGO Partners</h1>
            <p>Trusted organizations working to fight hunger across Nepal</p>
        </div>
    </div>

    <section class="py-5">
        <div class="container">

            <!-- Search Box -->
            <div class="search-section">
                <div class="search-box">
                    <i class="bi bi-search"></i>
                    <input type="text" id="ngoSearch" placeholder="Search NGOs by name or location...">
                </div>

                <!-- Filter Tabs -->
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">All NGOs</button>
                    <button class="filter-tab" data-filter="kathmandu">Kathmandu</button>
                    <button class="filter-tab" data-filter="lalitpur">Lalitpur</button>
                    <button class="filter-tab" data-filter="bhaktapur">Bhaktapur</button>
                    <button class="filter-tab" data-filter="national">National</button>
                </div>
            </div>

            <!-- NGOs Grid -->
            <div class="row g-4" id="ngosGrid">

                <!-- NGO Card 1 - FoodCare Nepal -->
                <div class="col-lg-3 col-md-6" data-location="kathmandu">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-heart-fill text-danger"></i></div>
                        <h5>FoodCare Nepal</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> Kathmandu</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">Dedicated to providing nutritious meals to underprivileged communities across Kathmandu Valley.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">5000+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">10+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

                <!-- NGO Card 2 - Annapurna Foundation -->
                <div class="col-lg-3 col-md-6" data-location="lalitpur">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-tree-fill text-success"></i></div>
                        <h5>Annapurna Foundation</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> Lalitpur</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">Working towards food security and sustainable nutrition programs in rural and urban areas.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">3000+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">8+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

                <!-- NGO Card 3 - Rotary Club -->
                <div class="col-lg-3 col-md-6" data-location="bhaktapur">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-people-fill text-primary"></i></div>
                        <h5>Rotary Club</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> Bhaktapur</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">Global network serving local communities through food drives and hunger relief programs.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">2000+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">15+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

                <!-- NGO Card 4 - World Food Program -->
                <div class="col-lg-3 col-md-6" data-location="national">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-globe2 text-info"></i></div>
                        <h5>World Food Program</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> Nepal Chapter</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">UN agency fighting hunger worldwide, serving vulnerable communities across Nepal.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">10000+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">20+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

                <!-- NGO Card 5 - Sarathi Nepal -->
                <div class="col-lg-3 col-md-6" data-location="kathmandu">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-brightness-high-fill text-warning"></i></div>
                        <h5>Sarathi Nepal</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> Kathmandu</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">Community-based organization providing food and shelter to street children and elderly.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">2500+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">12+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

                <!-- NGO Card 6 - Maiti Nepal -->
                <div class="col-lg-3 col-md-6" data-location="national">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-flower1 text-danger"></i></div>
                        <h5>Maiti Nepal</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> National</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">Supporting vulnerable women and children with food, shelter, and rehabilitation.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">4000+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">25+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

                <!-- NGO Card 7 - Sahayeta Foundation -->
                <div class="col-lg-3 col-md-6" data-location="lalitpur">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-hand-index-thumb-fill text-primary"></i></div>
                        <h5>Sahayeta Foundation</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> Lalitpur</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">Emergency food relief and long-term nutrition programs for disaster-affected families.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">3500+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">7+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

                <!-- NGO Card 8 - Help Nepal Network -->
                <div class="col-lg-3 col-md-6" data-location="national">
                    <div class="ngo-card">
                        <div class="ngo-logo"><i class="bi bi-people-fill text-info"></i></div>
                        <h5>Help Nepal Network</h5>
                        <p class="ngo-location"><i class="bi bi-geo-alt"></i> National</p>
                        <span class="verified-badge"><i class="bi bi-check-circle-fill"></i> Verified</span>
                        <p class="ngo-description">Connecting donors with communities in need across all 7 provinces of Nepal.</p>
                        <div class="ngo-stats">
                            <div class="stat-item">
                                <div class="stat-number">6000+</div>
                                <div class="stat-label">Meals/Month</div>
                            </div>
                            <div class="stat-item">
                                <div class="stat-number">18+</div>
                                <div class="stat-label">Years</div>
                            </div>
                        </div>
                        <div class="card-footer-btn">
                            <a href="login.php?redirect=donate.php" class="btn-main" style="padding: 8px 20px; font-size: 13px;">Donate Here</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Stats Section -->
            <div class="stats-section">
                <div class="row">
                    <div class="col-md-4">
                        <h3><i class="bi bi-building"></i> 150+</h3>
                        <p>NGO Partners</p>
                    </div>
                    <div class="col-md-4">
                        <h3><i class="bi bi-people"></i> 50,000+</h3>
                        <p>Lives Impacted</p>
                    </div>
                    <div class="col-md-4">
                        <h3><i class="bi bi-check-circle"></i> 100%</h3>
                        <p>Verified NGOs</p>
                    </div>
                </div>
            </div>

            <!-- Become NGO CTA -->
            <div class="become-ngo-cta">
                <h3><i class="bi bi-building-add"></i> Are you an NGO?</h3>
                <p>Join our network of trusted partners and receive food donations easily.</p>
                <a href="login.php?redirect=register.php" class="btn-outline-main" style="background: white; color: #1e293b; border-color: white;">
                    <i class="bi bi-pencil-square"></i> Register Your NGO
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

    <!-- Search and Filter Script -->
    <script>
        // Search functionality
        const searchInput = document.getElementById('ngoSearch');
        const ngoCards = document.querySelectorAll('#ngosGrid .col-lg-3');

        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();

            ngoCards.forEach(card => {
                const cardText = card.innerText.toLowerCase();
                if (cardText.includes(searchTerm)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Filter tabs
        const filterTabs = document.querySelectorAll('.filter-tab');

        filterTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');

                // Update active class
                filterTabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                // Filter cards
                ngoCards.forEach(card => {
                    const location = card.getAttribute('data-location');
                    if (filter === 'all' || location === filter) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>