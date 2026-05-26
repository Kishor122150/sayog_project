<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/db.php'; ?>

<?php

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = $_POST['title'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category_id'];
    $type = $_POST['donation_type'];
    $expiry = $_POST['expiry_date'];
    $pickup = $_POST['pickup_address'];
    $city = $_POST['city'];

    $query = "
    INSERT INTO donations
    (
        donor_id,
        category_id,
        title,
        description,
        quantity,
        donation_type,
        expiry_date,
        pickup_address,
        city
    )
    VALUES
    (
        :donor_id,
        :category_id,
        :title,
        :description,
        :quantity,
        :donation_type,
        :expiry_date,
        :pickup_address,
        :city
    )
    ";

    $stmt = $conn->prepare($query);

    $stmt->execute([
        ':donor_id' => $_SESSION['user_id'],
        ':category_id' => $category,
        ':title' => $title,
        ':description' => $description,
        ':quantity' => $quantity,
        ':donation_type' => $type,
        ':expiry_date' => $expiry,
        ':pickup_address' => $pickup,
        ':city' => $city
    ]);

    $message = "Donation Created Successfully!";
}

?>

<div class="main-content">

<h2>Create Donation</h2>

<?php if($message): ?>
<div class="alert alert-success">
    <?= $message ?>
</div>
<?php endif; ?>

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Donation Title</label>
<input type="text" name="title" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control" required>
</div>

<div class="col-md-6 mb-3">
<label>Donation Type</label>

<select name="donation_type" class="form-control">

<option value="food">Food</option>
<option value="goods">Goods</option>
<option value="money">Money</option>
<option value="services">Services</option>

</select>

</div>

<div class="col-md-6 mb-3">
<label>Category</label>

<select name="category_id" class="form-control">

<?php

$cat = $conn->query("SELECT * FROM donation_categories");

while($row = $cat->fetch()) {

echo "<option value='{$row['id']}'>{$row['category_name']}</option>";

}

?>

</select>

</div>

<div class="col-md-6 mb-3">
<label>Expiry Date</label>
<input type="date" name="expiry_date" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>City</label>
<input type="text" name="city" class="form-control">
</div>

<div class="col-md-12 mb-3">
<label>Pickup Address</label>
<textarea name="pickup_address" class="form-control"></textarea>
</div>

<div class="col-md-12 mb-3">
<label>Description</label>
<textarea name="description" class="form-control"></textarea>
</div>

<div class="col-md-12">
<button class="btn btn-success">
Create Donation
</button>
</div>

</div>

</form>

</div>

<?php include 'includes/footer.php'; ?>