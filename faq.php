<?php
// faq.php - FAQs Page with Same Navbar as Index
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayog - FAQs | Food Donation Platform</title>

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

        /* Search Box */
        .search-box {
            max-width: 600px;
            margin: 0 auto 40px;
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

        /* Category Tabs */
        .category-tabs {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 12px;
            margin-bottom: 40px;
        }

        .category-btn {
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

        .category-btn:hover,
        .category-btn.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* Accordion Styles */
        .accordion-item {
            border: none;
            margin-bottom: 16px;
            border-radius: 16px !important;
            overflow: hidden;
            border: 1px solid #e2e8f0;
            background: white;
        }

        .accordion-button {
            font-weight: 600;
            padding: 20px 24px;
            background: white;
            font-size: 16px;
            color: var(--dark);
        }

        .accordion-button:focus {
            box-shadow: none;
            border-color: var(--primary);
        }

        .accordion-button:not(.collapsed) {
            background: var(--light);
            color: var(--primary);
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%2316a34a'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .accordion-body {
            padding: 20px 24px;
            color: var(--gray);
            line-height: 1.6;
        }

        /* Still Have Questions Section */
        .still-questions {
            background: var(--light);
            border-radius: 30px;
            padding: 50px;
            text-align: center;
            margin-top: 60px;
        }

        .still-questions h3 {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .still-questions p {
            color: var(--gray);
            margin-bottom: 25px;
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

            .still-questions {
                padding: 30px 20px;
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
                    <li class="nav-item"><a class="nav-link" href="nearby.php">Nearby</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" href="faq.php">FAQs</a></li>
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
            <h1>Frequently Asked Questions</h1>
            <p>Find answers to common questions about Sayog</p>
        </div>
    </div>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">

            <!-- Search Box -->
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" id="faqSearch" placeholder="Search your question...">
            </div>

            <!-- Category Tabs -->
            <div class="category-tabs">
                <button class="category-btn active" data-category="all">All Questions</button>
                <button class="category-btn" data-category="general">General</button>
                <button class="category-btn" data-category="donation">Donation</button>
                <button class="category-btn" data-category="ngos">NGOs</button>
                <button class="category-btn" data-category="account">Account</button>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">

                        <!-- General Questions -->
                        <div class="accordion-item" data-category="general">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <i class="bi bi-question-circle me-2" style="color: var(--primary);"></i> What is Sayog?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Sayog is a smart food donation and redistribution platform that connects food donors (restaurants, hotels, caterers, and individuals) with verified NGOs and communities in need. Our mission is to reduce food waste and fight hunger through technology.
                                </div>
                            </div>
                        </div>

                        <!-- Donation Questions -->
                        <div class="accordion-item" data-category="donation">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    <i class="bi bi-gift-fill me-2" style="color: var(--primary);"></i> How do I donate food?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Simply <a href="login.php?redirect=donate.php" class="text-success">create an account</a> as a donor, post your available food items with details (quantity, location, expiry), and our system will automatically match you with the nearest verified NGO who will coordinate pickup within 30 minutes.
                                </div>
                            </div>
                        </div>

                        <!-- General Questions -->
                        <div class="accordion-item" data-category="general">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    <i class="bi bi-currency-dollar me-2" style="color: var(--primary);"></i> Is there any cost to use Sayog?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    No! Sayog is completely <strong class="text-success">free</strong> for NGOs, donors, and consumers. We believe in making food donation accessible to everyone. There are no hidden fees or subscription charges.
                                </div>
                            </div>
                        </div>

                        <!-- NGO Questions -->
                        <div class="accordion-item" data-category="ngos">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    <i class="bi bi-building me-2" style="color: var(--primary);"></i> How are NGOs verified?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We verify all NGOs through a rigorous process including:
                                    <ul class="mt-2">
                                        <li>Government registration certificate verification</li>
                                        <li>Physical address confirmation</li>
                                        <li>Background check of key members</li>
                                        <li>Site visit by our team (for major cities)</li>
                                    </ul>
                                    This ensures that your donations reach legitimate organizations.
                                </div>
                            </div>
                        </div>

                        <!-- Account Questions -->
                        <div class="accordion-item" data-category="account">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    <i class="bi bi-person-check me-2" style="color: var(--primary);"></i> How do I create an account?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Click on the <strong>"Donate Now"</strong> button in the top right corner, then select "Register". Fill in your details (name, email, phone, password), choose your role (Donor, NGO, or Consumer), and submit. You'll receive a verification email to activate your account.
                                </div>
                            </div>
                        </div>

                        <!-- Donation Questions -->
                        <div class="accordion-item" data-category="donation">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                                    <i class="bi bi-truck me-2" style="color: var(--primary);"></i> Can I track my donation?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! Once you make a donation, you'll receive:
                                    <ul class="mt-2">
                                        <li><i class="bi bi-check-circle text-success"></i> Real-time SMS/Email notifications</li>
                                        <li><i class="bi bi-map"></i> Live tracking of pickup and delivery</li>
                                        <li><i class="bi bi-graph-up"></i> Monthly impact reports showing how many people you've helped</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- General Questions -->
                        <div class="accordion-item" data-category="general">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                                    <i class="bi bi-shield-check me-2" style="color: var(--primary);"></i> What types of food can I donate?
                                </button>
                            </h2>
                            <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    You can donate:
                                    <ul class="mt-2">
                                        <li><strong>Cooked food</strong> - Freshly prepared meals (within 4 hours)</li>
                                        <li><strong>Raw vegetables & fruits</strong> - Fresh produce</li>
                                        <li><strong>Packaged food</strong> - Sealed, unexpired items</li>
                                        <li><strong>Dry ration</strong> - Rice, dal, flour, oil, etc.</li>
                                    </ul>
                                    Please ensure all food is hygienic and safe for consumption.
                                </div>
                            </div>
                        </div>

                        <!-- NGO Questions -->
                        <div class="accordion-item" data-category="ngos">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                                    <i class="bi bi-hand-index-thumb me-2" style="color: var(--primary);"></i> How can my NGO partner with Sayog?
                                </button>
                            </h2>
                            <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Register as an "NGO Partner" on our platform, submit your organization documents for verification, and once approved, you can start receiving food donation requests from donors in your area. Contact us at <strong>ngos@sayog.com</strong> for priority onboarding.
                                </div>
                            </div>
                        </div>

                        <!-- Account Questions -->
                        <div class="accordion-item" data-category="account">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                                    <i class="bi bi-key me-2" style="color: var(--primary);"></i> I forgot my password. What should I do?
                                </button>
                            </h2>
                            <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    On the login page, click the <strong>"Forgot Password?"</strong> link. Enter your registered email address, and we'll send you a password reset link. Click the link to create a new password and regain access to your account.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Still Have Questions Section -->
            <div class="still-questions">
                <h3>Still have questions?</h3>
                <p>Can't find the answer you're looking for? Please contact our support team.</p>
                <a href="contact.php" class="btn-donate-nav" style="display: inline-block;">
                    <i class="bi bi-envelope"></i> Contact Support
                </a>
                <a href="mailto:support@sayog.com" class="btn-donate-nav" style="display: inline-block; border: 2px solid var(--primary); color: var(--primary); margin-left: 10px;">
                    <i class="bi bi-envelope-fill"></i> support@sayog.com
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

    <!-- FAQ Search and Filter Script -->
    <script>
        // Search functionality
        const searchInput = document.getElementById('faqSearch');
        const accordionItems = document.querySelectorAll('.accordion-item');

        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();

            accordionItems.forEach(item => {
                const question = item.querySelector('.accordion-button').innerText.toLowerCase();
                const answer = item.querySelector('.accordion-body').innerText.toLowerCase();

                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Category filter
        const categoryBtns = document.querySelectorAll('.category-btn');

        categoryBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const category = this.getAttribute('data-category');

                // Update active class
                categoryBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Filter accordion items
                accordionItems.forEach(item => {
                    if (category === 'all' || item.getAttribute('data-category') === category) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>

</html>