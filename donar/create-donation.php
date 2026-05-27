<?php
// create-donation.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'includes/sidebar.php';
?>

<style>
    .donation-form {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
    }

    .form-label {
        font-weight: 600;
        color: #1f2937;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, #16a34a, #14532d);
        border: none;
        padding: 12px 30px;
        font-weight: 600;
        color: white;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        filter: brightness(0.98);
    }
</style>

<div class="donation-form">
    <h4 class="mb-4"><i class="bi bi-plus-circle me-2"></i>Create New Donation</h4>

    <form action="process-donation.php" method="POST">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Food Item *</label>
                <input type="text" class="form-control" name="food_item" placeholder="e.g., Rice, Vegetables, Cooked Food" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Quantity *</label>
                <input type="text" class="form-control" name="quantity" placeholder="e.g., 50 kg, 100 plates" required>
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Describe your donation (ingredients, preparation date, etc.)"></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Pickup Address *</label>
                <input type="text" class="form-control" name="address" placeholder="Full address for pickup" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Pickup Date *</label>
                <input type="date" class="form-control" name="pickup_date" required>
            </div>
            <div class="col-md-3">
                <label class="form-label">Pickup Time *</label>
                <input type="time" class="form-control" name="pickup_time" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Expiry Date *</label>
                <input type="date" class="form-control" name="expiry_date" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Food Category *</label>
                <select class="form-control" name="category" required>
                    <option value="">Select Category</option>
                    <option value="vegetables">Fresh Vegetables</option>
                    <option value="fruits">Fruits</option>
                    <option value="cooked">Cooked Food</option>
                    <option value="packaged">Packaged Food</option>
                    <option value="grains">Grains & Rice</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                    <label class="form-check-label" for="terms">
                        I confirm that the food is safe for consumption and follows quality standards
                    </label>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary-custom">
                    <i class="bi bi-send me-2"></i>Submit Donation
                </button>
                <a href="dashboard.php" class="btn btn-outline-secondary ms-2">Cancel</a>
            </div>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>