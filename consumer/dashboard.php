<?php

session_start();

if (
    !isset($_SESSION['logged_in']) ||
    $_SESSION['role'] !== 'consumer'
) {
    header("Location: ../auth/login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Consumer Dashboard</title>
</head>
<body>

<h1>Welcome Consumer</h1>

<p>
    Hello,
    <?php echo htmlspecialchars($_SESSION['full_name']); ?>
</p>

<a href="../logout.php">Logout</a>

</body>
</html>