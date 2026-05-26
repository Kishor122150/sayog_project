<?php

include 'includes/db.php';

if (!isset($_SESSION['logged_in']) || $_SESSION['role'] !== 'donor') {
    header("Location: ../auth/login.php");
    exit;
}

$donorId = $_SESSION['user_id'];

$query = "
    SELECT
        donation_requests.id,
        donations.title,
        users.full_name,
        users.email,
        donation_requests.request_message,
        donation_requests.request_status,
        donation_requests.created_at
    FROM donation_requests

    INNER JOIN donations
        ON donation_requests.donation_id = donations.id

    INNER JOIN users
        ON donation_requests.consumer_id = users.id

    WHERE donations.donor_id = :donor_id

    ORDER BY donation_requests.id DESC
";

$stmt = $conn->prepare($query);
$stmt->bindParam(':donor_id', $donorId);
$stmt->execute();

$requests = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Donation Requests</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f7fb;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Donation Requests</h2>

        <a href="dashboard.php" class="btn btn-dark">
            Dashboard
        </a>
    </div>

    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-success">

                        <tr>
                            <th>ID</th>
                            <th>Donation</th>
                            <th>Consumer</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php if(count($requests) > 0): ?>

                        <?php foreach($requests as $row): ?>

                            <tr>

                                <td><?= $row['id']; ?></td>

                                <td>
                                    <?= htmlspecialchars($row['title']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['full_name']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['email']); ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($row['request_message']); ?>
                                </td>

                                <td>

                                    <?php
                                        $status = $row['request_status'];

                                        $badge = 'secondary';

                                        if($status == 'approved') {
                                            $badge = 'success';
                                        }

                                        if($status == 'pending') {
                                            $badge = 'warning';
                                        }

                                        if($status == 'rejected') {
                                            $badge = 'danger';
                                        }
                                    ?>

                                    <span class="badge bg-<?= $badge; ?>">
                                        <?= ucfirst($status); ?>
                                    </span>

                                </td>

                                <td>
                                    <?= date('d M Y', strtotime($row['created_at'])); ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="7" class="text-center">
                                No requests found.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</body>
</html>