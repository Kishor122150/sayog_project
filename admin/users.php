<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/db.php'; ?>

<div class="main">

<h2>All Users</h2>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $stmt = $conn->query("SELECT * FROM users ORDER BY id DESC");
        while ($row = $stmt->fetch()) {
        ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['full_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['role'] ?></td>
            <td><?= $row['account_status'] ?></td>
            <td>
                <a href="block_user.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger">Block</a>
                <a href="activate_user.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Activate</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</div>

<?php include 'includes/footer.php'; ?>