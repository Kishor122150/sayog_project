<?php
// stories.php - Success Stories Page with Same Navbar as Index
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - Success Stories | Food Donation Platform</title>

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

        /* Stats Counter Section */
        .stats-counter {
            margin-top: -40px;
            margin-bottom: 60px;
        }

        .counter-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .counter-number {
            font-size: 42px;
            font-weight: 700;
            color: var(--primary);
        }

        /* Story Cards - EQUAL HEIGHT */
        .story-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
        }

        .story-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .story-img {
            height: 250px;
            overflow: hidden;
        }

        .story-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: 0.5s;
        }

        .story-card:hover .story-img img {
            transform: scale(1.05);
        }

        .story-content {
            padding: 25px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .quote-icon {
            font-size: 48px;
            color: var(--primary);
            opacity: 0.3;
            margin-bottom: 10px;
        }

        .story-text {
            font-size: 0.95rem;
            line-height: 1.6;
            color: var(--gray);
            margin-bottom: 20px;
            font-style: italic;
        }

        .story-author {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .story-role {
            font-size: 0.75rem;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .rating {
            color: #fbbf24;
            margin-top: auto;
        }

        /* Video Stories Section */
        .video-section {
            background: var(--light);
            border-radius: 30px;
            padding: 50px;
            margin-top: 60px;
        }

        .video-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            transition: 0.3s;
            height: 100%;
        }

        .video-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .video-thumbnail {
            position: relative;
            height: 200px;
            background: #1e293b;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .play-btn {
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            transition: 0.3s;
            cursor: pointer;
        }

        .play-btn:hover {
            transform: scale(1.1);
            background: var(--primary-dark);
        }

        /* Share Your Story CTA */
        .share-story-cta {
            background: linear-gradient(135deg, #1e293b, #0f172a);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            color: white;
            margin-top: 60px;
        }

        .share-story-cta h3 {
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

            .video-section {
                padding: 30px 20px;
            }

            .share-story-cta {
                padding: 30px 20px;
            }

            .share-story-cta h3 {
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
                    <li class="nav-item"><a class="nav-link" href="ngos.php">NGOs</a></li>
                    <li class="nav-item"><a class="nav-link active" href="stories.php">Stories</a></li>
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
            <h1>Success Stories</h1>
            <p>Real impact, real change - from our community</p>
        </div>
    </div>

    <!-- Stats Counter Section -->
    <div class="container stats-counter">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="counter-card">
                    <div class="counter-number">10,000+</div>
                    <p class="text-muted mb-0">Meals Donated</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="counter-card">
                    <div class="counter-number">5,000+</div>
                    <p class="text-muted mb-0">Lives Impacted</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="counter-card">
                    <div class="counter-number">150+</div>
                    <p class="text-muted mb-0">NGO Partners</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="counter-card">
                    <div class="counter-number">98%</div>
                    <p class="text-muted mb-0">Satisfaction Rate</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Written Stories Section -->
    <section class="py-5 pt-0">
        <div class="container">
            <div class="row g-4">
                <!-- Story 1 - FoodCare Nepal -->
                <div class="col-md-4">
                    <div class="story-card">
                        <div class="story-img">
                            <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=400&auto=format" alt="FoodCare Nepal">
                        </div>
                        <div class="story-content">
                            <div class="quote-icon"><i class="bi bi-quote"></i></div>
                            <p class="story-text">"Sayog helped us feed over 500 children daily. The platform is seamless and reliable. Our reach has expanded significantly since joining."</p>
                            <h6 class="story-author">- Ram Sharma</h6>
                            <p class="story-role">Director, FoodCare Nepal</p>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 2 - Green Cafe -->
                <div class="col-md-4">
                    <div class="story-card">
                        <div class="story-img">
                            <img src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?q=80&w=400&auto=format" alt="Green Cafe">
                        </div>
                        <div class="story-content">
                            <div class="quote-icon"><i class="bi bi-quote"></i></div>
                            <p class="story-text">"As a restaurant owner, donating surplus food was never easier. Sayog handles everything from pickup to delivery. Highly recommended!"</p>
                            <h6 class="story-author">- Sita Gurung</h6>
                            <p class="story-role">Owner, Green Cafe</p>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 3 - Regular Donor -->
                <div class="col-md-4">
                    <div class="story-card">
                        <div class="story-img">
                            <img src="https://images.unsplash.com/photo-1469571486292-0ba58a3f068b?q=80&w=400&auto=format" alt="Regular Donor">
                        </div>
                        <div class="story-content">
                            <div class="quote-icon"><i class="bi bi-quote"></i></div>
                            <p class="story-text">"The transparency and tracking features make me confident my donations reach those in need. I've been donating monthly for over a year now."</p>
                            <h6 class="story-author">- John Doe</h6>
                            <p class="story-role">Regular Donor</p>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 4 - Annapurna Foundation -->
                <div class="col-md-4">
                    <div class="story-card">
                        <div class="story-img">
                            <img src="https://images.unsplash.com/photo-1532629345422-7515f3d16bb6?q=80&w=400&auto=format" alt="Annapurna Foundation">
                        </div>
                        <div class="story-content">
                            <div class="quote-icon"><i class="bi bi-quote"></i></div>
                            <p class="story-text">"Sayog has transformed how we receive food donations. The real-time alerts help us respond quickly and serve more families in need."</p>
                            <h6 class="story-author">- Bishnu Adhikari</h6>
                            <p class="story-role">Coordinator, Annapurna Foundation</p>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 5 - Hotel Everest -->
                <div class="col-md-4">
                    <div class="story-card">
                        <div class="story-img">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=400&auto=format" alt="Hotel Everest">
                        </div>
                        <div class="story-content">
                            <div class="quote-icon"><i class="bi bi-quote"></i></div>
                            <p class="story-text">"Partnering with Sayog has reduced our food waste significantly while helping our community. It's a win-win for everyone involved."</p>
                            <h6 class="story-author">- Tek Bahadur</h6>
                            <p class="story-role">Manager, Hotel Everest</p>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Story 6 - Maiti Nepal -->
                <div class="col-md-4">
                    <div class="story-card">
                        <div class="story-img">
                            <img src="https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=400&auto=format" alt="Maiti Nepal">
                        </div>
                        <div class="story-content">
                            <div class="quote-icon"><i class="bi bi-quote"></i></div>
                            <p class="story-text">"The platform is intuitive and easy to use. We've been able to increase our food distribution by 40% since joining Sayog."</p>
                            <h6 class="story-author">- Anuradha Koirala</h6>
                            <p class="story-role">Founder, Maiti Nepal</p>
                            <div class="rating">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Stories Section -->
    <section class="py-5">
        <div class="container">
            <div class="video-section">
                <h2 class="text-center mb-4 fw-bold">Watch Impact Stories</h2>
                <p class="text-center text-muted mb-5">See how Sayog is making a difference in communities</p>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <div class="play-btn">
                                    <i class="bi bi-play-fill"></i>
                                </div>
                            </div>
                            <div class="story-content">
                                <h6>Feeding Hope: A Sayog Story</h6>
                                <p class="text-muted small">Watch how food donations changed lives in Kathmandu</p>
                                <span class="text-success small">Duration: 3:45</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <div class="play-btn">
                                    <i class="bi bi-play-fill"></i>
                                </div>
                            </div>
                            <div class="story-content">
                                <h6>From Restaurant to Community</h6>
                                <p class="text-muted small">How Green Cafe reduces waste and helps others</p>
                                <span class="text-success small">Duration: 2:30</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="video-card">
                            <div class="video-thumbnail">
                                <div class="play-btn">
                                    <i class="bi bi-play-fill"></i>
                                </div>
                            </div>
                            <div class="story-content">
                                <h6>NGO Impact: FoodCare Nepal</h6>
                                <p class="text-muted small">500 children fed daily through Sayog platform</p>
                                <span class="text-success small">Duration: 4:15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Share Your Story CTA -->
    <section class="py-5">
        <div class="container">
            <div class="share-story-cta">
                <h3><i class="bi bi-pencil-square"></i> Have a Story to Share?</h3>
                <p>Your experience can inspire others to join the movement against food waste.</p>
                <a href="contact.php" class="btn-outline-main" style="background: white; color: #1e293b; border-color: white;">
                    <i class="bi bi-envelope"></i> Share Your Story
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