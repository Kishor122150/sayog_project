<?php

include 'includes/db.php';

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../auth/login.php");
    exit;
}

$donorId = $_SESSION['user_id'];

$totalDonations = $conn->prepare("
    SELECT COUNT(*) as total
    FROM donations
    WHERE donor_id = :id
");

$totalDonations->bindParam(':id', $donorId);
$totalDonations->execute();

$total = $totalDonations->fetch(PDO::FETCH_ASSOC)['total'];

$completedDonations = $conn->prepare("
    SELECT COUNT(*) as total
    FROM donations
    WHERE donor_id = :id
    AND donation_status = 'completed'
");

$completedDonations->bindParam(':id', $donorId);
$completedDonations->execute();

$completed = $completedDonations->fetch(PDO::FETCH_ASSOC)['total'];

$pendingDonations = $conn->prepare("
    SELECT COUNT(*) as total
    FROM donations
    WHERE donor_id = :id
    AND donation_status = 'pending'
");

$pendingDonations->bindParam(':id', $donorId);
$pendingDonations->execute();

$pending = $pendingDonations->fetch(PDO::FETCH_ASSOC)['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Analytics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body style="background:#eef2f7;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Donation Analytics</h2>

        <a href="dashboard.php" class="btn btn-dark">
            Dashboard
        </a>

    </div>

    <div class="row g-4 mb-5">

        <div class="col-md-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <h5>Total Donations</h5>

                    <h1 class="text-success">
                        <?= $total; ?>
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <h5>Completed</h5>

                    <h1 class="text-primary">
                        <?= $completed; ?>
                    </h1>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card shadow border-0">

                <div class="card-body text-center">

                    <h5>Pending</h5>

                    <h1 class="text-warning">
                        <?= $pending; ?>
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <div class="card shadow border-0">

        <div class="card-body">

            <canvas id="donationChart"></canvas>

        </div>

    </div>

</div>

<script>

const ctx = document.getElementById('donationChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: [
            'Total',
            'Completed',
            'Pending'
        ],

        datasets: [{

            label: 'Donations',

            data: [
                <?= $total; ?>,
                <?= $completed; ?>,
                <?= $pending; ?>
            ],

            borderWidth: 1

        }]
    },

    options: {

        responsive: true,

        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>

</body>
</html>