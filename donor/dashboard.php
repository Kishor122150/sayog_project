<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="main-content">

<h2>Welcome, <?php echo $_SESSION['full_name']; ?></h2>

<?php

$userId = $_SESSION['user_id'];

$totalDonations = $conn->query("
SELECT COUNT(*) as total
FROM donations
WHERE donor_id = $userId
")->fetch()['total'];

$completed = $conn->query("
SELECT COUNT(*) as total
FROM donations
WHERE donor_id = $userId
AND donation_status='completed'
")->fetch()['total'];

$pending = $conn->query("
SELECT COUNT(*) as total
FROM donations
WHERE donor_id = $userId
AND donation_status='pending'
")->fetch()['total'];

$requests = $conn->query("
SELECT COUNT(*) as total
FROM donation_requests
WHERE donation_id IN (
    SELECT id FROM donations WHERE donor_id = $userId
)
")->fetch()['total'];

?>

<div class="row mt-4">

    <div class="col-md-3">
        <div class="card-box bg1">
            <h3><?= $totalDonations ?></h3>
            <p>Total Donations</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg2">
            <h3><?= $completed ?></h3>
            <p>Completed</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg3">
            <h3><?= $pending ?></h3>
            <p>Pending</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-box bg4">
            <h3><?= $requests ?></h3>
            <p>Total Requests</p>
        </div>
    </div>

</div>

</div>

<?php include 'includes/footer.php'; ?>