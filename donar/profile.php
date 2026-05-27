<?php
// profile.php - Complete Working Version with Session Update
ob_start(); // Start output buffering
session_start();
include 'includes/sidebar.php';

// Check if user is logged in
if (!isset($_SESSION['donor_id'])) {
    header("Location: login.php");
    exit();
}

// Get donor info from session or database
$donorId = $_SESSION['donor_id'] ?? 'DON123';
$donorName = $_SESSION['donor_name'] ?? 'John Doe';
$donorEmail = $_SESSION['donor_email'] ?? 'donor@sayog.com';
$donorPhone = $_SESSION['donor_phone'] ?? '+91 98765 43210';
$donorDob = $_SESSION['donor_dob'] ?? '1985-03-15';
$donorGender = $_SESSION['donor_gender'] ?? 'Male';

// Handle AJAX request for saving profile
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    header('Content-Type: application/json');

    $action = $_POST['action'] ?? '';

    if ($action === 'savePersonal') {
        $newName = trim($_POST['name']);
        $newEmail = trim($_POST['email']);
        $newPhone = trim($_POST['phone']);
        $newDob = $_POST['dob'];
        $newGender = $_POST['gender'];

        // Update session variables
        $_SESSION['donor_name'] = $newName;
        $_SESSION['donor_email'] = $newEmail;
        $_SESSION['donor_phone'] = $newPhone;
        $_SESSION['donor_dob'] = $newDob;
        $_SESSION['donor_gender'] = $newGender;

        echo json_encode(['success' => true, 'message' => 'Profile updated successfully!', 'name' => $newName]);
        exit();
    }

    if ($action === 'saveAddress') {
        $street = trim($_POST['street']);
        $city = trim($_POST['city']);
        $state = trim($_POST['state']);
        $pincode = trim($_POST['pincode']);
        $country = trim($_POST['country']);

        // Save address in session
        $_SESSION['donor_address'] = [
            'street' => $street,
            'city' => $city,
            'state' => $state,
            'pincode' => $pincode,
            'country' => $country
        ];

        echo json_encode(['success' => true, 'message' => 'Address updated successfully!']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Sayog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f5f5;
        }

        .profile-container {
            background: white;
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            max-width: 1200px;
            margin: 20px auto;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid #e2e8f0;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #16a34a, #14532d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 48px;
            font-weight: 700;
            color: white;
            border: 4px solid #bbf7d0;
        }

        .profile-name {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 5px;
        }

        .profile-id {
            color: #6b7280;
            font-size: 14px;
        }

        .info-section {
            background: #f8fafc;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .info-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #16a34a;
            display: inline-block;
        }

        .info-row {
            display: flex;
            margin-bottom: 15px;
            padding: 10px;
            background: white;
            border-radius: 8px;
            align-items: center;
        }

        .info-label {
            width: 140px;
            font-weight: 600;
            color: #4b5563;
        }

        .info-value {
            flex: 1;
            color: #1f2937;
        }

        .edit-btn,
        .save-btn,
        .cancel-btn {
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
        }

        .edit-btn {
            background: #16a34a;
            color: white;
        }

        .edit-btn:hover {
            background: #14532d;
            transform: scale(1.05);
        }

        .save-btn {
            background: #3b82f6;
            color: white;
        }

        .save-btn:hover {
            background: #2563eb;
            transform: scale(1.05);
        }

        .cancel-btn {
            background: #9ca3af;
            color: white;
        }

        .cancel-btn:hover {
            background: #6b7280;
            transform: scale(1.05);
        }

        .edit-field {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
        }

        .edit-field:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.1);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .stat-item {
            background: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #16a34a;
        }

        .stat-label {
            font-size: 12px;
            color: #6b7280;
            margin-top: 5px;
        }

        @media (max-width: 768px) {
            .profile-container {
                padding: 20px;
                margin: 10px;
            }

            .info-row {
                flex-direction: column;
                gap: 8px;
                align-items: flex-start;
            }

            .info-label {
                width: 100%;
            }

            .edit-btn {
                margin-top: 10px;
                margin-left: 0;
            }
        }

        .toast-notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            animation: slideIn 0.3s ease;
        }

        .toast-success {
            background: #16a34a;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .toast-error {
            background: #dc2626;
            color: white;
            padding: 12px 24px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .loading-spinner {
            background: white;
            padding: 30px;
            border-radius: 12px;
            text-align: center;
        }

        .spinner-border {
            width: 50px;
            height: 50px;
            border: 4px solid #f3f3f3;
            border-top: 4px solid #16a34a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 15px;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        button:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .flex-wrap {
            flex-wrap: wrap;
        }

        .gap-2 {
            gap: 10px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .me-2 {
            margin-right: 8px;
        }

        .mt-3 {
            margin-top: 15px;
        }

        .text-end {
            text-align: right;
        }
    </style>
</head>

<body>

    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-avatar" id="profileAvatar">
                <?php echo strtoupper(substr($donorName, 0, 1)); ?>
            </div>
            <div class="profile-name" id="profileName"><?php echo htmlspecialchars($donorName); ?></div>
            <div class="profile-id">Donor ID: <?php echo htmlspecialchars($donorId); ?></div>
            <div class="profile-id">Member since: <?php echo date('F Y'); ?></div>
        </div>

        <!-- Personal Information Section -->
        <div class="info-section">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                <h5 class="info-title"><i class="bi bi-person-badge me-2"></i>Personal Information</h5>
                <button class="edit-btn" id="editPersonalBtn" onclick="toggleEdit('personal')">
                    <i class="bi bi-pencil-square"></i> Edit Profile
                </button>
            </div>

            <div id="personalInfo">
                <div class="info-row">
                    <div class="info-label">Full Name:</div>
                    <div class="info-value" id="displayName"><?php echo htmlspecialchars($donorName); ?></div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="text" class="edit-field" id="editName" value="<?php echo htmlspecialchars($donorName); ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Email Address:</div>
                    <div class="info-value" id="displayEmail"><?php echo htmlspecialchars($donorEmail); ?></div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="email" class="edit-field" id="editEmail" value="<?php echo htmlspecialchars($donorEmail); ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Phone Number:</div>
                    <div class="info-value" id="displayPhone"><?php echo htmlspecialchars($donorPhone); ?></div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="tel" class="edit-field" id="editPhone" value="<?php echo htmlspecialchars($donorPhone); ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Date of Birth:</div>
                    <div class="info-value" id="displayDob">
                        <?php
                        if ($donorDob) {
                            echo date('d F Y', strtotime($donorDob));
                        } else {
                            echo 'Not specified';
                        }
                        ?>
                    </div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="date" class="edit-field" id="editDob" value="<?php echo htmlspecialchars($donorDob); ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Gender:</div>
                    <div class="info-value" id="displayGender"><?php echo htmlspecialchars($donorGender); ?></div>
                    <div class="info-value edit-mode" style="display:none;">
                        <select class="edit-field" id="editGender">
                            <option value="Male" <?php echo $donorGender == 'Male' ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo $donorGender == 'Female' ? 'selected' : ''; ?>>Female</option>
                            <option value="Other" <?php echo $donorGender == 'Other' ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div id="personalEditActions" style="display:none; text-align: right; margin-top: 15px;">
                <button class="save-btn" onclick="savePersonalInfo()"><i class="bi bi-save"></i> Save Changes</button>
                <button class="cancel-btn" onclick="cancelEdit('personal')"><i class="bi bi-x-circle"></i> Cancel</button>
            </div>
        </div>

        <!-- Address Information Section -->
        <div class="info-section">
            <h5 class="info-title"><i class="bi bi-geo-alt me-2"></i>Address Information</h5>
            <div id="addressInfo">
                <div class="info-row">
                    <div class="info-label">Street Address:</div>
                    <div class="info-value" id="displayStreet">
                        <?php echo isset($_SESSION['donor_address']['street']) ? htmlspecialchars($_SESSION['donor_address']['street']) : '123 Main Street, Andheri East'; ?>
                    </div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="text" class="edit-field" id="editStreet" value="<?php echo isset($_SESSION['donor_address']['street']) ? htmlspecialchars($_SESSION['donor_address']['street']) : '123 Main Street, Andheri East'; ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">City:</div>
                    <div class="info-value" id="displayCity">
                        <?php echo isset($_SESSION['donor_address']['city']) ? htmlspecialchars($_SESSION['donor_address']['city']) : 'Mumbai'; ?>
                    </div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="text" class="edit-field" id="editCity" value="<?php echo isset($_SESSION['donor_address']['city']) ? htmlspecialchars($_SESSION['donor_address']['city']) : 'Mumbai'; ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">State:</div>
                    <div class="info-value" id="displayState">
                        <?php echo isset($_SESSION['donor_address']['state']) ? htmlspecialchars($_SESSION['donor_address']['state']) : 'Maharashtra'; ?>
                    </div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="text" class="edit-field" id="editState" value="<?php echo isset($_SESSION['donor_address']['state']) ? htmlspecialchars($_SESSION['donor_address']['state']) : 'Maharashtra'; ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">PIN Code:</div>
                    <div class="info-value" id="DisplayPincode">
                        <?php echo isset($_SESSION['donor_address']['pincode']) ? htmlspecialchars($_SESSION['donor_address']['pincode']) : '400001'; ?>
                    </div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="text" class="edit-field" id="editPincode" value="<?php echo isset($_SESSION['donor_address']['pincode']) ? htmlspecialchars($_SESSION['donor_address']['pincode']) : '400001'; ?>">
                    </div>
                </div>
                <div class="info-row">
                    <div class="info-label">Country:</div>
                    <div class="info-value" id="displayCountry">
                        <?php echo isset($_SESSION['donor_address']['country']) ? htmlspecialchars($_SESSION['donor_address']['country']) : 'India'; ?>
                    </div>
                    <div class="info-value edit-mode" style="display:none;">
                        <input type="text" class="edit-field" id="editCountry" value="<?php echo isset($_SESSION['donor_address']['country']) ? htmlspecialchars($_SESSION['donor_address']['country']) : 'India'; ?>">
                    </div>
                </div>
            </div>
            <div class="text-end mt-3">
                <button class="edit-btn" onclick="toggleEdit('address')">
                    <i class="bi bi-pencil-square"></i> Edit Address
                </button>
            </div>
            <div id="addressEditActions" style="display:none; text-align: right; margin-top: 15px;">
                <button class="save-btn" onclick="saveAddressInfo()"><i class="bi bi-save"></i> Save Changes</button>
                <button class="cancel-btn" onclick="cancelEdit('address')"><i class="bi bi-x-circle"></i> Cancel</button>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="info-section">
            <h5 class="info-title"><i class="bi bi-graph-up me-2"></i>Donation Statistics</h5>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number">48</div>
                    <div class="stat-label">Total Donations</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">156</div>
                    <div class="stat-label">Meals Donated</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">32</div>
                    <div class="stat-label">People Helped</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">12</div>
                    <div class="stat-label">Active Donations</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loading-spinner">
            <div class="spinner-border"></div>
            <div>Saving changes...</div>
        </div>
    </div>

    <script>
        let currentEditMode = null;

        function toggleEdit(section) {
            if (currentEditMode === section) {
                cancelEdit(section);
                return;
            }

            if (currentEditMode) {
                cancelEdit(currentEditMode);
            }

            currentEditMode = section;

            if (section === 'personal') {
                document.querySelectorAll('#personalInfo .info-value').forEach(el => el.style.display = 'none');
                document.querySelectorAll('#personalInfo .edit-mode').forEach(el => el.style.display = 'block');
                document.getElementById('personalEditActions').style.display = 'block';
                document.getElementById('editPersonalBtn').style.display = 'none';
            } else if (section === 'address') {
                document.querySelectorAll('#addressInfo .info-value').forEach(el => el.style.display = 'none');
                document.querySelectorAll('#addressInfo .edit-mode').forEach(el => el.style.display = 'block');
                document.getElementById('addressEditActions').style.display = 'block';
            }
        }

        function cancelEdit(section) {
            if (section === 'personal') {
                document.querySelectorAll('#personalInfo .info-value').forEach(el => el.style.display = 'block');
                document.querySelectorAll('#personalInfo .edit-mode').forEach(el => el.style.display = 'none');
                document.getElementById('personalEditActions').style.display = 'none';
                document.getElementById('editPersonalBtn').style.display = 'block';
            } else if (section === 'address') {
                document.querySelectorAll('#addressInfo .info-value').forEach(el => el.style.display = 'block');
                document.querySelectorAll('#addressInfo .edit-mode').forEach(el => el.style.display = 'none');
                document.getElementById('addressEditActions').style.display = 'none';
            }
            currentEditMode = null;
        }

        function showLoading() {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) overlay.style.display = 'flex';
        }

        function hideLoading() {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) overlay.style.display = 'none';
        }

        function showToast(message, type) {
            const toast = document.createElement('div');
            toast.className = `toast-notification toast-${type}`;
            const icon = type === 'success' ? 'check-circle-fill' : 'exclamation-triangle-fill';
            toast.innerHTML = `<div style="display: flex; align-items: center; gap: 10px;">
                <i class="bi bi-${icon}"></i>
                <span>${message}</span>
            </div>`;
            document.body.appendChild(toast);

            setTimeout(() => {
                if (toast && toast.remove) toast.remove();
            }, 3000);
        }

        function savePersonalInfo() {
            const newName = document.getElementById('editName').value.trim();
            const newEmail = document.getElementById('editEmail').value.trim();
            const newPhone = document.getElementById('editPhone').value.trim();
            const newDob = document.getElementById('editDob').value;
            const newGender = document.getElementById('editGender').value;

            if (!newName || !newEmail || !newPhone) {
                showToast('Please fill all required fields', 'error');
                return;
            }

            if (!newEmail.includes('@')) {
                showToast('Please enter a valid email address', 'error');
                return;
            }

            showLoading();

            // Send AJAX request to save data
            const formData = new FormData();
            formData.append('action', 'savePersonal');
            formData.append('name', newName);
            formData.append('email', newEmail);
            formData.append('phone', newPhone);
            formData.append('dob', newDob);
            formData.append('gender', newGender);

            fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Format DOB for display
                        let formattedDob = newDob;
                        if (newDob) {
                            const date = new Date(newDob);
                            formattedDob = date.toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            });
                        }

                        // Update display values
                        document.getElementById('displayName').innerHTML = newName;
                        document.getElementById('displayEmail').innerHTML = newEmail;
                        document.getElementById('displayPhone').innerHTML = newPhone;
                        document.getElementById('displayDob').innerHTML = formattedDob;
                        document.getElementById('displayGender').innerHTML = newGender;

                        // Update profile header
                        document.getElementById('profileName').innerHTML = newName;
                        document.getElementById('profileAvatar').innerHTML = newName.charAt(0).toUpperCase();

                        showToast(data.message, 'success');
                        cancelEdit('personal');

                        // Optional: Reload page to reflect changes everywhere
                        setTimeout(() => {
                            location.reload();
                        }, 1500);
                    } else {
                        showToast('Error saving profile', 'error');
                    }
                    hideLoading();
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Error saving profile', 'error');
                    hideLoading();
                });
        }

        function saveAddressInfo() {
            const newStreet = document.getElementById('editStreet').value.trim();
            const newCity = document.getElementById('editCity').value.trim();
            const newState = document.getElementById('editState').value.trim();
            const newPincode = document.getElementById('editPincode').value.trim();
            const newCountry = document.getElementById('editCountry').value.trim();

            if (!newStreet || !newCity || !newState || !newPincode || !newCountry) {
                showToast('Please fill all address fields', 'error');
                return;
            }

            showLoading();

            // Send AJAX request to save address
            const formData = new FormData();
            formData.append('action', 'saveAddress');
            formData.append('street', newStreet);
            formData.append('city', newCity);
            formData.append('state', newState);
            formData.append('pincode', newPincode);
            formData.append('country', newCountry);

            fetch(window.location.href, {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update display values
                        document.getElementById('displayStreet').innerHTML = newStreet;
                        document.getElementById('displayCity').innerHTML = newCity;
                        document.getElementById('displayState').innerHTML = newState;
                        document.getElementById('DisplayPincode').innerHTML = newPincode;
                        document.getElementById('displayCountry').innerHTML = newCountry;

                        showToast(data.message, 'success');
                        cancelEdit('address');
                    } else {
                        showToast('Error saving address', 'error');
                    }
                    hideLoading();
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Error saving address', 'error');
                    hideLoading();
                });
        }
    </script>

    <?php include 'includes/footer.php'; ?>
</body>

</html>
<?php ob_end_flush(); ?>