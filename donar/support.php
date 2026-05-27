<?php
// support.php
// NO session_start() here because sidebar.php already has it
include 'includes/sidebar.php';
?>

<style>
    .support-container {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .support-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .support-header h2 {
        color: #1f2937;
        margin-bottom: 10px;
    }

    .support-header p {
        color: #6b7280;
    }

    .contact-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 40px;
    }

    .contact-card {
        background: linear-gradient(135deg, #f0fdf4, #dcfce7);
        padding: 25px;
        border-radius: 16px;
        text-align: center;
        transition: all 0.3s;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .contact-icon {
        width: 60px;
        height: 60px;
        background: #16a34a;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
    }

    .contact-icon i {
        font-size: 28px;
        color: white;
    }

    .contact-card h5 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .contact-card p {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 15px;
    }

    .contact-link {
        color: #16a34a;
        text-decoration: none;
        font-weight: 600;
    }

    .contact-link:hover {
        text-decoration: underline;
    }

    .faq-section {
        background: #f8fafc;
        border-radius: 16px;
        padding: 25px;
        margin-bottom: 30px;
    }

    .faq-item {
        background: white;
        border-radius: 10px;
        margin-bottom: 15px;
        overflow: hidden;
    }

    .faq-question {
        padding: 15px 20px;
        background: white;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        transition: all 0.2s;
    }

    .faq-question:hover {
        background: #f0fdf4;
    }

    .faq-answer {
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
        color: #6b7280;
        line-height: 1.6;
    }

    .faq-item.active .faq-answer {
        padding: 0 20px 15px 20px;
        max-height: 200px;
    }

    .faq-icon {
        transition: transform 0.3s;
    }

    .faq-item.active .faq-icon {
        transform: rotate(180deg);
    }

    .ticket-form {
        background: #f8fafc;
        border-radius: 16px;
        padding: 25px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 10px 15px;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
    }

    .form-control:focus {
        outline: none;
        border-color: #16a34a;
        box-shadow: 0 0 0 2px rgba(22, 163, 74, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .submit-btn {
        background: linear-gradient(135deg, #16a34a, #14532d);
        color: white;
        border: none;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.3);
    }

    .ticket-list {
        margin-top: 30px;
    }

    .ticket-item {
        background: white;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 12px;
        border-left: 4px solid #16a34a;
    }

    .ticket-status {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .status-open {
        background: #dbeafe;
        color: #1e40af;
    }

    .status-resolved {
        background: #dcfce7;
        color: #166534;
    }

    .status-pending {
        background: #fed7aa;
        color: #9a3412;
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
        .support-container {
            padding: 20px;
        }

        .contact-cards {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="support-container">
    <div class="support-header">
        <h2><i class="bi bi-headset me-2"></i>How can we help you?</h2>
        <p>We're here to assist you with any questions or concerns about your donations</p>
    </div>

    <!-- Contact Cards -->
    <div class="contact-cards">
        <div class="contact-card">
            <div class="contact-icon">
                <i class="bi bi-envelope"></i>
            </div>
            <h5>Email Support</h5>
            <p>Get response within 24 hours</p>
            <a href="mailto:support@sayog.com" class="contact-link">support@sayog.com</a>
        </div>

        <div class="contact-card">
            <div class="contact-icon">
                <i class="bi bi-telephone"></i>
            </div>
            <h5>Phone Support</h5>
            <p>Mon-Fri, 9 AM - 6 PM</p>
            <a href="tel:+919876543210" class="contact-link">+91 98765 43210</a>
        </div>

        <div class="contact-card">
            <div class="contact-icon">
                <i class="bi bi-whatsapp"></i>
            </div>
            <h5>WhatsApp</h5>
            <p>Quick chat support</p>
            <a href="https://wa.me/919876543210" class="contact-link" target="_blank">Chat on WhatsApp</a>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section">
        <h5 class="mb-3"><i class="bi bi-question-circle me-2"></i>Frequently Asked Questions</h5>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span>How do I create a new donation?</span>
                <i class="bi bi-chevron-down faq-icon"></i>
            </div>
            <div class="faq-answer">
                To create a new donation, click on "Create Donation" in the sidebar menu. Fill in the food item details, quantity, pickup address, and expiry date. Once submitted, your donation will be visible to nearby NGOs and consumers who can request it.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span>How do I track my donation?</span>
                <i class="bi bi-chevron-down faq-icon"></i>
            </div>
            <div class="faq-answer">
                You can track your donation status from the "My Donations" page. Each donation shows its current status (Active, Pending, Completed, or Expired). Click on "Track" to see detailed information about who requested it and delivery updates.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span>What happens when someone requests my donation?</span>
                <i class="bi bi-chevron-down faq-icon"></i>
            </div>
            <div class="faq-answer">
                When a donor or NGO requests your donation, you'll receive a notification. You can review the request and choose to approve or decline it. Once approved, the requester will be notified and arrangements for pickup will be made.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span>How do I cancel a donation?</span>
                <i class="bi bi-chevron-down faq-icon"></i>
            </div>
            <div class="faq-answer">
                You can cancel a donation from the "My Donations" page as long as it hasn't been picked up yet. Click on the "Cancel" button next to the donation. Once cancelled, the donation will no longer be visible to potential requesters.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-question" onclick="toggleFaq(this)">
                <span>How do I update my profile information?</span>
                <i class="bi bi-chevron-down faq-icon"></i>
            </div>
            <div class="faq-answer">
                Go to "My Profile" from the sidebar. Click on "Edit Profile" to update your personal information, contact details, and address. Don't forget to save your changes after editing.
            </div>
        </div>
    </div>

    <!-- Support Ticket Form -->
    <div class="ticket-form">
        <h5 class="mb-3"><i class="bi bi-ticket me-2"></i>Submit a Support Ticket</h5>

        <form id="supportForm">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Subject *</label>
                        <input type="text" class="form-control" id="subject" required placeholder="Brief description of your issue">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">Category *</label>
                        <select class="form-control" id="category" required>
                            <option value="">Select category</option>
                            <option value="donation">Donation Related</option>
                            <option value="account">Account Issue</option>
                            <option value="payment">Payment/Receipt</option>
                            <option value="technical">Technical Problem</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Message *</label>
                        <textarea class="form-control" id="message" required placeholder="Please describe your issue in detail..."></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label class="form-label">Attachments (Optional)</label>
                        <input type="file" class="form-control" id="attachment" accept="image/*,.pdf">
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="submit-btn">
                        <i class="bi bi-send me-2"></i>Submit Ticket
                    </button>
                </div>
            </div>
        </form>

        <!-- Recent Tickets -->
        <div class="ticket-list">
            <h6 class="mb-3"><i class="bi bi-clock-history me-2"></i>Recent Support Tickets</h6>
            <div id="ticketsList">
                <div class="ticket-item">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div>
                            <strong>#TKT-001</strong> - Donation pickup issue
                            <div><small class="text-muted">Submitted on Mar 10, 2024</small></div>
                        </div>
                        <span class="ticket-status status-resolved">Resolved</span>
                    </div>
                </div>
                <div class="ticket-item">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                        <div>
                            <strong>#TKT-002</strong> - Account verification
                            <div><small class="text-muted">Submitted on Mar 5, 2024</small></div>
                        </div>
                        <span class="ticket-status status-open">Open</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let ticketCounter = 2;

    function toggleFaq(element) {
        const faqItem = element.closest('.faq-item');
        faqItem.classList.toggle('active');
    }

    document.getElementById('supportForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const subject = document.getElementById('subject').value;
        const category = document.getElementById('category').value;
        const message = document.getElementById('message').value;

        if (!subject || !category || !message) {
            alert('Please fill all required fields');
            return;
        }

        ticketCounter++;
        const ticketNumber = String(ticketCounter).padStart(3, '0');
        const ticketsList = document.getElementById('ticketsList');

        const newTicket = document.createElement('div');
        newTicket.className = 'ticket-item';
        newTicket.innerHTML = `
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                <div>
                    <strong>#TKT-00${ticketNumber}</strong> - ${subject}
                    <div><small class="text-muted">Submitted on ${new Date().toLocaleDateString()}</small></div>
                </div>
                <span class="ticket-status status-pending">Pending</span>
            </div>
        `;

        ticketsList.insertBefore(newTicket, ticketsList.firstChild);

        // Clear form
        document.getElementById('subject').value = '';
        document.getElementById('category').value = '';
        document.getElementById('message').value = '';
        document.getElementById('attachment').value = '';

        showToast('Support ticket submitted successfully! We\'ll get back to you soon.', 'success');
    });

    function showToast(message, type) {
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type === 'success' ? 'success' : 'error'}`;
        toast.innerHTML = `<div class="d-flex align-items-center gap-2"><i class="bi bi-check-circle-fill"></i><span>${message}</span></div>`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }
</script>

<?php include 'includes/footer.php'; ?>