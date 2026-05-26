<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="main-content">

<h2>My Donations</h2>

<table class="table table-bordered mt-4">

<thead>
<tr>
<th>Title</th>
<th>Type</th>
<th>Quantity</th>
<th>Status</th>
<th>Date</th>
</tr>
</thead>

<tbody>

<?php

$userId = $_SESSION['user_id'];

$stmt = $conn->query("
SELECT *
FROM donations
WHERE donor_id = $userId
ORDER BY id DESC
");

while($row = $stmt->fetch()) {

?>

<tr>

<td><?= $row['title'] ?></td>
<td><?= $row['donation_type'] ?></td>
<td><?= $row['quantity'] ?></td>
<td><?= $row['donation_status'] ?></td>
<td><?= $row['created_at'] ?></td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

<?php include 'includes/footer.php'; ?>