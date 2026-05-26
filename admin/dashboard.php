<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="main">

    <h2>Admin Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['full_name']; ?></p>

<?php
// USERS
$totalUsers = $conn->query("SELECT COUNT(*) as total FROM users")->fetch()['total'];

$totalDonors = $conn->query("SELECT COUNT(*) as total FROM users WHERE role='donor'")->fetch()['total'];

$totalConsumers = $conn->query("SELECT COUNT(*) as total FROM users WHERE role='consumer'")->fetch()['total'];

$totalDonations = $conn->query("SELECT COUNT(*) as total FROM donations")->fetch()['total'];
?>

    <div class="row mt-4">

        <div class="col-md-3">
            <div class="card-box bg-blue">
                <h4><?php echo $totalUsers; ?></h4>
                <p>Total Users</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-green">
                <h4><?php echo $totalDonors; ?></h4>
                <p>Donors</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-orange">
                <h4><?php echo $totalConsumers; ?></h4>
                <p>Consumers</p>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card-box bg-red">
                <h4><?php echo $totalDonations; ?></h4>
                <p>Donations</p>
            </div>
        </div>

    </div>

</div>

<?php include 'includes/footer.php'; ?>