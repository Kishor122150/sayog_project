-- =========================================================
-- 🌱 JIBON SAHAYOG FINAL DATABASE SCHEMA
-- Smart Donation & Redistribution Platform
-- Database: jibon_sayoog_final
-- Technology: Core PHP + MySQL
-- =========================================================

CREATE DATABASE jibon_sayoog_final;

USE jibon_sayoog_final;

-- =========================================================
-- USERS TABLE
-- =========================================================

CREATE TABLE users (

    id INT PRIMARY KEY AUTO_INCREMENT,

    role ENUM(
        'admin',
        'donor',
        'consumer'
    ) NOT NULL,

    full_name VARCHAR(150) NOT NULL,

    email VARCHAR(150) UNIQUE NOT NULL,

    phone VARCHAR(20) UNIQUE,

    password VARCHAR(255) NOT NULL,

    profile_image VARCHAR(255) DEFAULT NULL,

    gender ENUM(
        'male',
        'female',
        'other'
    ) DEFAULT NULL,

    date_of_birth DATE DEFAULT NULL,

    address TEXT,

    city VARCHAR(100),

    state VARCHAR(100),

    country VARCHAR(100),

    zip_code VARCHAR(20),

    latitude DECIMAL(10,8),

    longitude DECIMAL(11,8),

    identity_document VARCHAR(255),

    identity_number VARCHAR(100),

    email_verified TINYINT(1) DEFAULT 0,

    otp_verified TINYINT(1) DEFAULT 0,

    admin_approved TINYINT(1) DEFAULT 0,

    account_status ENUM(
        'pending',
        'active',
        'blocked',
        'inactive'
    ) DEFAULT 'pending',

    remember_token VARCHAR(255),

    last_login DATETIME NULL,

    login_attempts INT DEFAULT 0,

    last_attempt DATETIME NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP

);

-- =========================================================
-- DONOR PROFILES
-- =========================================================

CREATE TABLE donor_profiles (

    id INT PRIMARY KEY AUTO_INCREMENT,

    user_id INT NOT NULL,

    donor_type ENUM(
        'hotel',
        'restaurant',
        'ngo',
        'individual',
        'organization'
    ) NOT NULL,

    organization_name VARCHAR(255),

    pan_number VARCHAR(100),

    website VARCHAR(255),

    description TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE

);

-- =========================================================
-- CONSUMER PROFILES
-- =========================================================

CREATE TABLE consumer_profiles (

    id INT PRIMARY KEY AUTO_INCREMENT,

    user_id INT NOT NULL,

    consumer_type ENUM(
        'poor_individual',
        'ngo',
        'shelter_home',
        'organization'
    ) NOT NULL,

    need_category VARCHAR(255),

    family_members INT DEFAULT 0,

    monthly_income DECIMAL(10,2),

    verification_document VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE

);

-- =========================================================
-- NGO TABLE
-- =========================================================

CREATE TABLE ngos (

    id INT PRIMARY KEY AUTO_INCREMENT,

    user_id INT NOT NULL,

    ngo_name VARCHAR(255),

    registration_number VARCHAR(100),

    description TEXT,

    logo VARCHAR(255),

    document_file VARCHAR(255),

    verification_status ENUM(
        'pending',
        'verified',
        'rejected'
    ) DEFAULT 'pending',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE

);

-- =========================================================
-- DONATION CATEGORIES
-- =========================================================

CREATE TABLE donation_categories (

    id INT PRIMARY KEY AUTO_INCREMENT,

    category_name VARCHAR(100) NOT NULL,

    category_icon VARCHAR(255),

    category_description TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- DONATIONS TABLE
-- =========================================================

CREATE TABLE donations (

    id INT PRIMARY KEY AUTO_INCREMENT,

    donor_id INT NOT NULL,

    category_id INT NOT NULL,

    title VARCHAR(255) NOT NULL,

    slug VARCHAR(255),

    description TEXT,

    quantity VARCHAR(100),

    donation_type ENUM(
        'food',
        'goods',
        'money',
        'services'
    ) NOT NULL,

    expiry_date DATE,

    pickup_address TEXT,

    city VARCHAR(100),

    latitude DECIMAL(10,8),

    longitude DECIMAL(11,8),

    available_from DATETIME,

    available_to DATETIME,

    pickup_instructions TEXT,

    qr_code VARCHAR(255),

    featured TINYINT(1) DEFAULT 0,

    donation_status ENUM(
        'pending',
        'requested',
        'approved',
        'pickup_started',
        'in_transit',
        'delivered',
        'completed',
        'cancelled'
    ) DEFAULT 'pending',

    views INT DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (donor_id)
    REFERENCES users(id)
    ON DELETE CASCADE,

    FOREIGN KEY (category_id)
    REFERENCES donation_categories(id)
    ON DELETE CASCADE

);

-- =========================================================
-- DONATION IMAGES
-- =========================================================

CREATE TABLE donation_images (

    id INT PRIMARY KEY AUTO_INCREMENT,

    donation_id INT NOT NULL,

    image_path VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (donation_id)
    REFERENCES donations(id)
    ON DELETE CASCADE

);

-- =========================================================
-- DONATION VIDEOS
-- =========================================================

CREATE TABLE donation_videos (

    id INT PRIMARY KEY AUTO_INCREMENT,

    donation_id INT NOT NULL,

    video_path VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (donation_id)
    REFERENCES donations(id)
    ON DELETE CASCADE

);

-- =========================================================
-- DONATION REQUESTS
-- =========================================================

CREATE TABLE donation_requests (

    id INT PRIMARY KEY AUTO_INCREMENT,

    donation_id INT NOT NULL,

    consumer_id INT NOT NULL,

    request_message TEXT,

    request_status ENUM(
        'pending',
        'approved',
        'rejected',
        'completed'
    ) DEFAULT 'pending',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (donation_id)
    REFERENCES donations(id)
    ON DELETE CASCADE,

    FOREIGN KEY (consumer_id)
    REFERENCES users(id)
    ON DELETE CASCADE

);

-- =========================================================
-- TRACKING STATUS
-- =========================================================

CREATE TABLE tracking_status (

    id INT PRIMARY KEY AUTO_INCREMENT,

    donation_id INT NOT NULL,

    donor_id INT NOT NULL,

    consumer_id INT NOT NULL,

    current_status VARCHAR(100),

    tracking_message TEXT,

    latitude DECIMAL(10,8),

    longitude DECIMAL(11,8),

    proof_image VARCHAR(255),

    signature_file VARCHAR(255),

    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (donation_id)
    REFERENCES donations(id)
    ON DELETE CASCADE

);

-- =========================================================
-- NOTIFICATIONS
-- =========================================================

CREATE TABLE notifications (

    id INT PRIMARY KEY AUTO_INCREMENT,

    user_id INT NOT NULL,

    title VARCHAR(255),

    message TEXT,

    notification_type VARCHAR(100),

    is_read TINYINT(1) DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
    REFERENCES users(id)
    ON DELETE CASCADE

);

-- =========================================================
-- CHATS
-- =========================================================

CREATE TABLE chats (

    id INT PRIMARY KEY AUTO_INCREMENT,

    donor_id INT NOT NULL,

    consumer_id INT NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- MESSAGES
-- =========================================================

CREATE TABLE messages (

    id INT PRIMARY KEY AUTO_INCREMENT,

    chat_id INT NOT NULL,

    sender_id INT NOT NULL,

    message TEXT,

    file_attachment VARCHAR(255),

    is_read TINYINT(1) DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (chat_id)
    REFERENCES chats(id)
    ON DELETE CASCADE

);

-- =========================================================
-- RATINGS
-- =========================================================

CREATE TABLE ratings (

    id INT PRIMARY KEY AUTO_INCREMENT,

    donation_id INT NOT NULL,

    donor_id INT NOT NULL,

    consumer_id INT NOT NULL,

    rating INT CHECK(rating BETWEEN 1 AND 5),

    review TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- REPORTS
-- =========================================================

CREATE TABLE reports (

    id INT PRIMARY KEY AUTO_INCREMENT,

    reported_by INT NOT NULL,

    reported_user INT NOT NULL,

    reason TEXT,

    report_status ENUM(
        'pending',
        'resolved',
        'rejected'
    ) DEFAULT 'pending',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- OTP VERIFICATIONS
-- =========================================================

CREATE TABLE otp_verifications (

    id INT PRIMARY KEY AUTO_INCREMENT,

    user_id INT NOT NULL,

    otp_code VARCHAR(10),

    expires_at DATETIME,

    verified TINYINT(1) DEFAULT 0,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- ANALYTICS
-- =========================================================

CREATE TABLE analytics (

    id INT PRIMARY KEY AUTO_INCREMENT,

    total_users INT DEFAULT 0,

    total_donations INT DEFAULT 0,

    total_completed INT DEFAULT 0,

    total_ngos INT DEFAULT 0,

    total_food_saved DECIMAL(10,2),

    total_money_donated DECIMAL(12,2),

    generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- SETTINGS
-- =========================================================

CREATE TABLE settings (

    id INT PRIMARY KEY AUTO_INCREMENT,

    setting_key VARCHAR(100),

    setting_value TEXT

);

-- =========================================================
-- ADMIN LOGS
-- =========================================================

CREATE TABLE admin_logs (

    id INT PRIMARY KEY AUTO_INCREMENT,

    admin_id INT NOT NULL,

    action TEXT,

    ip_address VARCHAR(100),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- SUCCESS STORIES
-- Dynamic frontend success stories section
-- =========================================================

CREATE TABLE success_stories (

    id INT PRIMARY KEY AUTO_INCREMENT,

    title VARCHAR(255),

    description TEXT,

    image VARCHAR(255),

    author_name VARCHAR(150),

    location VARCHAR(150),

    status ENUM(
        'active',
        'inactive'
    ) DEFAULT 'active',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- FAQS
-- Dynamic frontend FAQ section
-- =========================================================

CREATE TABLE faqs (

    id INT PRIMARY KEY AUTO_INCREMENT,

    question VARCHAR(255),

    answer TEXT,

    status ENUM(
        'active',
        'inactive'
    ) DEFAULT 'active',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- CONTACT MESSAGES
-- =========================================================

CREATE TABLE contact_messages (

    id INT PRIMARY KEY AUTO_INCREMENT,

    full_name VARCHAR(150),

    email VARCHAR(150),

    subject VARCHAR(255),

    message TEXT,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- SERVICES
-- Dynamic frontend services section
-- =========================================================

CREATE TABLE services (

    id INT PRIMARY KEY AUTO_INCREMENT,

    title VARCHAR(255),

    description TEXT,

    icon VARCHAR(255),

    status ENUM(
        'active',
        'inactive'
    ) DEFAULT 'active',

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- HOW IT WORKS
-- =========================================================

CREATE TABLE how_it_works (

    id INT PRIMARY KEY AUTO_INCREMENT,

    step_number INT,

    title VARCHAR(255),

    description TEXT,

    icon VARCHAR(255),

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);

-- =========================================================
-- WEBSITE SETTINGS
-- =========================================================

CREATE TABLE website_settings (

    id INT PRIMARY KEY AUTO_INCREMENT,

    site_name VARCHAR(255),

    site_logo VARCHAR(255),

    site_email VARCHAR(255),

    site_phone VARCHAR(100),

    site_address TEXT,

    facebook_link VARCHAR(255),

    instagram_link VARCHAR(255),

    twitter_link VARCHAR(255),

    linkedin_link VARCHAR(255),

    footer_description TEXT

);

-- =========================================================
-- BANNERS / HERO SECTION
-- =========================================================

CREATE TABLE banners (

    id INT PRIMARY KEY AUTO_INCREMENT,

    title VARCHAR(255),

    subtitle TEXT,

    image VARCHAR(255),

    button_text VARCHAR(100),

    button_link VARCHAR(255),

    status ENUM(
        'active',
        'inactive'
    ) DEFAULT 'active'

);

-- =========================================================
-- INDEXES
-- =========================================================

CREATE INDEX idx_users_email
ON users(email);

CREATE INDEX idx_users_role
ON users(role);

CREATE INDEX idx_donations_status
ON donations(donation_status);

CREATE INDEX idx_notifications_user
ON notifications(user_id);

CREATE INDEX idx_requests_status
ON donation_requests(request_status);

CREATE INDEX idx_donation_category
ON donations(category_id);

CREATE INDEX idx_donation_location
ON donations(latitude, longitude);