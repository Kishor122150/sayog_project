<?php

include 'includes/db.php';

if (!isset($_SESSION['logged_in'])) {
    header("Location: ../auth/login.php");
    exit;
}

$userId = $_SESSION['user_id'];

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $full_name = trim($_POST['full_name']);
    $phone = trim($_POST['phone']);
    $city = trim($_POST['city']);
    $address = trim($_POST['address']);

    $update = "
        UPDATE users
        SET
            full_name = :full_name,
            phone = :phone,
            city = :city,
            address = :address
        WHERE id = :id
    ";

    $stmt = $conn->prepare($update);

    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':city', $city);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':id', $userId);

    if($stmt->execute()) {
        $message = "Profile updated successfully.";
    }
}

$query = "SELECT * FROM users WHERE id = :id LIMIT 1";

$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $userId);
$stmt->execute();

$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f4f7fa;">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between mb-4">

                        <h3>My Profile</h3>

                        <a href="dashboard.php" class="btn btn-dark">
                            Dashboard
                        </a>

                    </div>

                    <?php if($message): ?>

                        <div class="alert alert-success">
                            <?= $message; ?>
                        </div>

                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">Full Name</label>

                            <input
                                type="text"
                                name="full_name"
                                class="form-control"
                                value="<?= htmlspecialchars($user['full_name']); ?>"
                                required
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Email</label>

                            <input
                                type="email"
                                class="form-control"
                                value="<?= htmlspecialchars($user['email']); ?>"
                                readonly
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Phone</label>

                            <input
                                type="text"
                                name="phone"
                                class="form-control"
                                value="<?= htmlspecialchars($user['phone']); ?>"
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">City</label>

                            <input
                                type="text"
                                name="city"
                                class="form-control"
                                value="<?= htmlspecialchars($user['city']); ?>"
                            >

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Address</label>

                            <textarea
                                name="address"
                                class="form-control"
                                rows="4"
                            ><?= htmlspecialchars($user['address']); ?></textarea>

                        </div>

                        <button class="btn btn-success">
                            Update Profile
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>