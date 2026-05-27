<?php
// requests.php
// NO session_start() here because sidebar.php already has it
include 'includes/sidebar.php';
?>

<style>
    .requests-container {
        background: white;
        border-radius: 16px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .request-card {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 15px;
        transition: all 0.2s;
    }

    .request-card:hover {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .btn-approve {
        background: #16a34a;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-approve:hover {
        background: #14532d;
        transform: scale(1.05);
    }

    .btn-decline {
        background: #ef4444;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-decline:hover {
        background: #dc2626;
        transform: scale(1.05);
    }

    .badge-status {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }

    .badge-pending {
        background: #fed7aa;
        color: #9a3412;
    }

    .badge-approved {
        background: #dcfce7;
        color: #166534;
    }

    .badge-declined {
        background: #fee2e2;
        color: #991b1b;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }

    .status-message {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 8px;
        font-weight: 500;
    }

    .status-approved-msg {
        background: #dcfce7;
        color: #166534;
    }

    .status-declined-msg {
        background: #fee2e2;
        color: #991b1b;
    }

    /* Toast notification */
    .toast-notification {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
        animation: slideIn 0.3s ease;
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

    .toast-success {
        background: #16a34a;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .toast-error {
        background: #ef4444;
        color: white;
        padding: 12px 24px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
</style>

<div class="requests-container">
    <h4 class="mb-4"><i class="bi bi-bell me-2"></i>Donation Requests</h4>

    <div class="alert alert-info" id="requestsAlert">
        <i class="bi bi-info-circle me-2"></i>
        You have <strong id="pendingCount">3</strong> pending requests from nearby NGOs and consumers
    </div>

    <!-- Request 1 -->
    <div class="request-card" data-id="1">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 50px; height: 50px; background: #dbeafe; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-building fs-4" style="color: #1e40af;"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Annapurna Foundation</h6>
                        <small class="text-muted">NGO • 2.5 km away</small><br>
                        <small><strong>Requested:</strong> 25 kg Rice</small>
                        <small><br><strong>Message:</strong> Need for community kitchen</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <span class="badge-status badge-pending" id="status1">Pending</span>
            </div>
            <div class="col-md-3">
                <div class="action-buttons" id="actions1">
                    <button class="btn-approve" onclick="approveRequest(1)">
                        <i class="bi bi-check-lg"></i> Approve
                    </button>
                    <button class="btn-decline" onclick="declineRequest(1)">
                        <i class="bi bi-x-lg"></i> Decline
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Request 2 -->
    <div class="request-card" data-id="2">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 50px; height: 50px; background: #fef3c7; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-person fs-4" style="color: #d97706;"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Rajesh Kumar (Local Community)</h6>
                        <small class="text-muted">Consumer • 1.8 km away</small><br>
                        <small><strong>Requested:</strong> 10 Cooked Meals</small>
                        <small><br><strong>Message:</strong> For family of 5</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <span class="badge-status badge-pending" id="status2">Pending</span>
            </div>
            <div class="col-md-3">
                <div class="action-buttons" id="actions2">
                    <button class="btn-approve" onclick="approveRequest(2)">
                        <i class="bi bi-check-lg"></i> Approve
                    </button>
                    <button class="btn-decline" onclick="declineRequest(2)">
                        <i class="bi bi-x-lg"></i> Decline
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Request 3 -->
    <div class="request-card" data-id="3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="d-flex align-items-center gap-3">
                    <div style="width: 50px; height: 50px; background: #e0e7ff; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-tree fs-4" style="color: #4338ca;"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Green Earth Mission</h6>
                        <small class="text-muted">NGO • 3.2 km away</small><br>
                        <small><strong>Requested:</strong> Fresh Vegetables (30 kg)</small>
                        <small><br><strong>Message:</strong> For weekly distribution</small>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <span class="badge-status badge-pending" id="status3">Pending</span>
            </div>
            <div class="col-md-3">
                <div class="action-buttons" id="actions3">
                    <button class="btn-approve" onclick="approveRequest(3)">
                        <i class="bi bi-check-lg"></i> Approve
                    </button>
                    <button class="btn-decline" onclick="declineRequest(3)">
                        <i class="bi bi-x-lg"></i> Decline
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let pendingCount = 3;

    function updatePendingCount() {
        const countElement = document.getElementById('pendingCount');
        if (countElement) {
            countElement.textContent = pendingCount;
        }

        // Update sidebar badge
        const sidebarBadge = document.querySelector('.badge.bg-danger');
        if (sidebarBadge) {
            if (pendingCount > 0) {
                sidebarBadge.textContent = pendingCount;
                sidebarBadge.style.display = 'inline-block';
            } else {
                sidebarBadge.style.display = 'none';
            }
        }

        // Update alert message
        const alertDiv = document.getElementById('requestsAlert');
        if (pendingCount === 0) {
            alertDiv.innerHTML = '<i class="bi bi-check-circle-fill me-2"></i> No pending requests! All requests have been processed.';
            alertDiv.className = 'alert alert-success';
        }
    }

    function approveRequest(requestId) {
        if (confirm('✅ Approve this donation request?\n\nThe requester will be notified immediately.')) {
            // Update status badge
            const statusSpan = document.getElementById(`status${requestId}`);
            if (statusSpan) {
                statusSpan.innerHTML = 'Approved';
                statusSpan.className = 'badge-status badge-approved';
            }

            // Replace buttons with status message
            const actionsDiv = document.getElementById(`actions${requestId}`);
            if (actionsDiv) {
                actionsDiv.innerHTML = '<span class="status-message status-approved-msg"><i class="bi bi-check-circle-fill me-1"></i> Request Approved</span>';
            }

            // Decrease pending count
            pendingCount--;
            updatePendingCount();

            // Show success toast
            showToast('Request approved successfully!', 'success');
        }
    }

    function declineRequest(requestId) {
        if (confirm('❌ Decline this donation request?\n\nYou can always create a new donation later.')) {
            // Update status badge
            const statusSpan = document.getElementById(`status${requestId}`);
            if (statusSpan) {
                statusSpan.innerHTML = 'Declined';
                statusSpan.className = 'badge-status badge-declined';
            }

            // Replace buttons with status message
            const actionsDiv = document.getElementById(`actions${requestId}`);
            if (actionsDiv) {
                actionsDiv.innerHTML = '<span class="status-message status-declined-msg"><i class="bi bi-x-circle-fill me-1"></i> Request Declined</span>';
            }

            // Decrease pending count
            pendingCount--;
            updatePendingCount();

            // Show error toast
            showToast('Request declined', 'error');
        }
    }

    function showToast(message, type) {
        // Remove existing toasts
        const existingToasts = document.querySelectorAll('.toast-notification');
        existingToasts.forEach(toast => toast.remove());

        // Create new toast
        const toast = document.createElement('div');
        toast.className = `toast-notification toast-${type === 'success' ? 'success' : 'error'}`;
        toast.innerHTML = `
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-${type === 'success' ? 'check-circle-fill' : 'x-circle-fill'}"></i>
                <span>${message}</span>
            </div>
        `;
        document.body.appendChild(toast);

        // Auto remove after 3 seconds
        setTimeout(() => {
            toast.style.animation = 'slideOut 0.3s ease';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Add slideOut animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideOut {
            from {
                transform: translateX(0);
                opacity: 1;
            }
            to {
                transform: translateX(100%);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
</script>

<?php include 'includes/footer.php'; ?>