<?php
// donations.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'includes/sidebar.php';
?>

<style>
    .donation-table {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .badge-status {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-active {
        background: #dbeafe;
        color: #1e40af;
    }

    .badge-completed {
        background: #dcfce7;
        color: #166534;
    }

    .badge-pending {
        background: #fed7aa;
        color: #9a3412;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #16a34a, #14532d);
        border: none;
        color: white;
        padding: 8px 20px;
        border-radius: 8px;
    }
</style>

<div class="donation-table">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <h4 class="mb-0"><i class="bi bi-box-seam me-2"></i>My Donations</h4>
        <a href="create-donation.php" class="btn btn-primary-custom">
            <i class="bi bi-plus-circle me-2"></i>Create New Donation
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Donation ID</th>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Pickup Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>