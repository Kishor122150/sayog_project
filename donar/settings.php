<?php
// settings.php
// NO session_start() here because sidebar.php already has it
include 'includes/sidebar.php';
?>

<style>
    .settings-container {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .settings-section {
        background: #f8fafc;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 25px;
    }

    .settings-title {
        font-size: 18px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #16a34a;
        display: inline-block;
    }

    .setting-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px;
        background: white;
        border-radius: 10px;
        margin-bottom: 12px;
        transition: all 0.2s;
    }

    .setting-item:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .setting-info h6 {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .setting-info p {
        font-size: 13px;
        color: #6b7280;
        margin: 0;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: 0.3s;
        border-radius: 24px;
    }

    .toggle-slider:before {
        position: absolute;
        content: "";
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: 0.3s;
        border-radius: 50%;
    }

    input:checked+.toggle-slider {
        background-color: #16a34a;
    }

    input:checked+.toggle-slider:before {
        transform: translateX(26px);
    }

    .language-select,
    .timezone-select {
        padding: 8px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: white;
        cursor: pointer;
    }

    .danger-zone {
        border: 1px solid #fee2e2;
        background: #fef2f2;
    }

    .danger-btn {
        background: #ef4444;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .danger-btn:hover {
        background: #dc2626;
        transform: scale(1.05);
    }

    .success-btn {
        background: #16a34a;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .success-btn:hover {
        background: #14532d;
        transform: scale(1.05);
    }

    .password-field {
        position: relative;
        display: inline-block;
    }

    .password-input {
        padding: 8px 12px;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        width: 200px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: white;
        margin: 10% auto;
        padding: 25px;
        border-radius: 16px;
        width: 90%;
        max-width: 450px;
        position: relative;
        animation: modalSlideIn 0.3s ease;
    }

    @keyframes modalSlideIn {
        from {
            transform: translateY(-50px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
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

    @media (max-width: 768px) {
        .settings-container {
            padding: 20px;
        }

        .setting-item {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }

        .password-input {
            width: 100%;
        }
    }
</style>

<div class="settings-container">
    <h4 class="mb-4"><i class="bi bi-gear me-2"></i>Account Settings</h4>

    <!-- Notification Settings -->
    <div class="settings-section">
        <h5 class="settings-title"><i class="bi bi-bell me-2"></i>Notification Preferences</h5>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Email Notifications</h6>
                <p>Receive updates about donation requests and status</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" id="emailNotification" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>

        <div class="setting-item">
            <div class="setting-info">
                <h6>SMS Alerts</h6>
                <p>Get SMS alerts for urgent donation requests</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" id="smsNotification">
                <span class="toggle-slider"></span>
            </label>
        </div>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Push Notifications</h6>
                <p>Browser push notifications for new requests</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" id="pushNotification" checked>
                <span class="toggle-slider"></span>
            </label>
        </div>
    </div>

    <!-- Privacy Settings -->
    <div class="settings-section">
        <h5 class="settings-title"><i class="bi bi-shield-lock me-2"></i>Privacy & Security</h5>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Change Password</h6>
                <p>Update your account password</p>
            </div>
            <button class="success-btn" onclick="openChangePasswordModal()">
                <i class="bi bi-key"></i> Change Password
            </button>
        </div>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Two-Factor Authentication</h6>
                <p>Add an extra layer of security to your account</p>
            </div>
            <label class="toggle-switch">
                <input type="checkbox" id="twoFactorAuth">
                <span class="toggle-slider"></span>
            </label>
        </div>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Profile Visibility</h6>
                <p>Control who can see your donor profile</p>
            </div>
            <select class="language-select" id="profileVisibility">
                <option value="public">Public</option>
                <option value="verified" selected>Verified Only</option>
                <option value="private">Private</option>
            </select>
        </div>
    </div>

    <!-- Preference Settings -->
    <div class="settings-section">
        <h5 class="settings-title"><i class="bi bi-globe me-2"></i>Preferences</h5>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Language</h6>
                <p>Choose your preferred language</p>
            </div>
            <select class="language-select" id="language">
                <option value="english" selected>English</option>
                <option value="hindi">हिन्दी (Hindi)</option>
                <option value="marathi">मराठी (Marathi)</option>
                <option value="gujarati">ગુજરાતી (Gujarati)</option>
            </select>
        </div>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Time Zone</h6>
                <p>Set your local time zone</p>
            </div>
            <select class="timezone-select" id="timezone">
                <option value="IST" selected>India Standard Time (IST)</option>
                <option value="EST">Eastern Standard Time (EST)</option>
                <option value="PST">Pacific Standard Time (PST)</option>
                <option value="GMT">Greenwich Mean Time (GMT)</option>
            </select>
        </div>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Date Format</h6>
                <p>Choose how dates are displayed</p>
            </div>
            <select class="language-select" id="dateFormat">
                <option value="DMY" selected>DD/MM/YYYY</option>
                <option value="MDY">MM/DD/YYYY</option>
                <option value="YMD">YYYY/MM/DD</option>
            </select>
        </div>
    </div>

    <!-- Danger Zone -->
    <div class="settings-section danger-zone">
        <h5 class="settings-title" style="border-bottom-color: #ef4444; color: #ef4444;">
            <i class="bi bi-exclamation-triangle me-2"></i>Danger Zone
        </h5>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Deactivate Account</h6>
                <p>Temporarily disable your donor account</p>
            </div>
            <button class="danger-btn" onclick="deactivateAccount()">
                <i class="bi bi-person-x"></i> Deactivate Account
            </button>
        </div>

        <div class="setting-item">
            <div class="setting-info">
                <h6>Delete Account</h6>
                <p>Permanently delete your account and all data</p>
            </div>
            <button class="danger-btn" onclick="deleteAccount()">
                <i class="bi bi-trash"></i> Delete Account
            </button>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0"><i class="bi bi-key me-2"></i>Change Password</h5>
            <span class="close-modal" onclick="closePasswordModal()" style="cursor: pointer; font-size: 24px;">&times;</span>
        </div>
        <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input type="password" class="form-control" id="currentPassword" placeholder="Enter current password">
        </div>
        <div class="mb-3">
            <label class="form-label">New Password</label>
            <input type="password" class="form-control" id="newPassword" placeholder="Enter new password">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm New Password</label>
            <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm new password">
        </div>
        <div class="text-end">
            <button class="btn btn-secondary me-2" onclick="closePasswordModal()">Cancel</button>
            <button class="btn btn-success" onclick="changePassword()">Update Password</button>
        </div>
    </div>
</div>

<script>
    // Save all settings when changed
    document.querySelectorAll('#emailNotification, #smsNotification, #pushNotification, #twoFactorAuth, #profileVisibility, #language, #timezone, #dateFormat').forEach(element => {
        element.addEventListener('change', function() {
            saveSettings();
        });
    });

    function saveSettings() {
        const settings = {
            emailNotifications: document.getElementById('emailNotification').checked,
            smsNotifications: document.getElementById('smsNotification').checked,
            pushNotifications: document.getElementById('pushNotification').checked,
            twoFactorAuth: document.getElementById('twoFactorAuth').checked,
            profileVisibility: document.getElementById('profileVisibility').value,
            language: document.getElementById('language').value,
            timezone: document.getElementById('timezone').value,
            dateFormat: document.getElementById('dateFormat').value
        };

        // Save to localStorage
        localStorage.setItem('donorSettings', JSON.stringify(settings));
        showToast('Settings saved successfully!', 'success');
    }

    function loadSettings() {
        const savedSettings = localStorage.getItem('donorSettings');
        if (savedSettings) {
            const settings = JSON.parse(savedSettings);
            document.getElementById('emailNotification').checked = settings.emailNotifications;
            document.getElementById('smsNotification').checked = settings.smsNotifications;
            document.getElementById('pushNotification').checked = settings.pushNotifications;
            document.getElementById('twoFactorAuth').checked = settings.twoFactorAuth;
            document.getElementById('profileVisibility').value = settings.profileVisibility;
            document.getElementById('language').value = settings.language;
            document.getElementById('timezone').value = settings.timezone;
            document.getElementById('dateFormat').value = settings.dateFormat;
        }
    }

    function openChangePasswordModal() {
        document.getElementById('passwordModal').style.display = 'block';
    }

    function closePasswordModal() {
        document.getElementById('passwordModal').style.display = 'none';
        document.getElementById('currentPassword').value = '';
        document.getElementById('newPassword').value = '';
        document.getElementById('confirmPassword').value = '';
    }

    function changePassword() {
        const currentPwd = document.getElementById('currentPassword').value;
        const newPwd = document.getElementById('newPassword').value;
        const confirmPwd = document.getElementById('confirmPassword').value;

        if (!currentPwd || !newPwd || !confirmPwd) {
            alert('Please fill all fields');
            return;
        }

        if (newPwd !== confirmPwd) {
            alert('New passwords do not match');
            return;
        }

        if (newPwd.length < 6) {
            alert('Password must be at least 6 characters');
            return;
        }

        // Simulate password change
        showToast('Password changed successfully!', 'success');
        closePasswordModal();
    }

    function deactivateAccount() {
        if (confirm('⚠️ Are you sure you want to deactivate your account?\n\nYou can reactivate it later by contacting support.')) {
            showToast('Account deactivated successfully', 'success');
            setTimeout(() => {
                window.location.href = '../index.php';
            }, 2000);
        }
    }

    function deleteAccount() {
        if (confirm('⚠️ DANGER: This action is irreversible!\n\nAre you absolutely sure you want to permanently delete your account and all associated data?')) {
            showToast('Account deletion request submitted. You will receive an email confirmation.', 'success');
        }
    }

    function showToast(message, type) {
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type === 'success' ? 'success' : 'error'}`;
        toast.innerHTML = `<div class="d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill"></i><span>${message}</span></div>`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        const modal = document.getElementById('passwordModal');
        if (event.target === modal) {
            closePasswordModal();
        }
    }

    // Load saved settings
    loadSettings();
</script>

<?php include 'includes/footer.php'; ?>