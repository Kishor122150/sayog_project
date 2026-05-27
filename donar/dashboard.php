<?php
// dashboard.php
// NO session_start() here because sidebar.php already has it
include 'includes/sidebar.php';
?>

<!-- Dashboard Content -->
<div class="welcome-hero mb-4">
    <div class="position-relative" style="z-index:1;">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <h1 class="h3 mb-2"><i class="bi bi-hand-heart me-2"></i>Welcome, <?php echo htmlspecialchars($donorName); ?>!</h1>
                <p class="mb-0" style="opacity:0.92;">
                    Your donor dashboard helps you manage food donations, track status, and coordinate deliveries.
                </p>
            </div>
            <div>
                <div class="text-center text-md-end">
                    <small><i class="bi bi-calendar3"></i> <?php echo date('F j, Y'); ?></small>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon"><i class="bi bi-box-seam fs-4"></i></div>
                <div class="h3 mb-0 fw-bold">12</div>
            </div>
            <div class="fw-semibold">Active Donations</div>
            <small class="text-muted">4 awaiting pickup</small>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon"><i class="bi bi-check2-circle fs-4"></i></div>
                <div class="h3 mb-0 fw-bold">48</div>
            </div>
            <div class="fw-semibold">Completed</div>
            <small class="text-muted">Lifetime donations</small>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon"><i class="bi bi-people fs-4"></i></div>
                <div class="h3 mb-0 fw-bold">156</div>
            </div>
            <div class="fw-semibold">Meals Shared</div>
            <small class="text-muted">+23 this month</small>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="stat-icon"><i class="bi bi-bell fs-4"></i></div>
                <div class="h3 mb-0 fw-bold">3</div>
            </div>
            <div class="fw-semibold">New Requests</div>
            <small class="text-muted">Awaiting response</small>
        </div>
    </div>
</div>

<div class="donation-table">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
        <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>Recent Donations</h5>
        <a href="donations.php" class="btn btn-sm btn-outline-success">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Donation ID</th>
                    <th>Food Item</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table>
    </div>
</div>

<?php include 'includes/footer.php'; ?>