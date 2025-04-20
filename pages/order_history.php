<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user_number'])) {
  header("Location: login.php");
  exit;
}

$user_number = $_SESSION['user_number'];

// Cancel request
if (isset($_GET['cancel']) && is_numeric($_GET['cancel'])) {
  $order_id = intval($_GET['cancel']);
  $cancel_query = "DELETE FROM orders WHERE order_id = '$order_id' AND user_number = '$user_number'";
  mysqli_query($conn, $cancel_query);
  header("Location: order_history.php?cancelled=1");
  exit;
}

$query = "SELECT * FROM orders WHERE user_number = '$user_number' ORDER BY order_id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
  body {
    background-color: #121212;
    color: #ffffff;
  }
  .card.custom-card {
    background-color: #fdfdfd;
    border: none;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    border-radius: 15px;
  }
  .product-image {
    width: 100%;
    object-fit: cover;
    border-radius: 15px 0 0 15px;
  }
  .order-details p {
    margin-bottom: 5px;
    font-size: 0.95rem;
  }
  .order-details strong {
    color: #333;
  }
  .badge {
    font-size: 0.8rem;
    padding: 6px 12px;
  }
</style>

<body>

<!-- Navbar -->
<?php include "../includes/header.php" ?>

<div class="container py-5">
  <h2 class="mb-3 text-center">📦 My Orders</h2>
  <p class="text-warning text-center mb-4">Note: You can only cancel orders within 1 day of ordering.</p>

  <?php if (isset($_GET['cancelled'])): ?>
    <div class="alert alert-success text-center">Order cancelled successfully!</div>
  <?php endif; ?>

  <?php if (mysqli_num_rows($result) > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <?php
        $order_date = strtotime($row['order_date']);
        $now = time();
        $diff_in_seconds = $now - $order_date;
        $can_cancel = $diff_in_seconds <= 86400; // 1 day = 86400 seconds
      ?>
<div class="card custom-card mb-4">
  <div class="row g-0">
    <div class="col-md-3 d-flex align-items-center justify-content-center p-2">
      <img src="<?= $row['product_image'] ?>" class="product-image" alt="Product Image">
    </div>
    <div class="col-md-6">
      <div class="card-body order-details">
      <h4>Order Details</h4>
      <hr>
        <h6 class="card-title text-dark"><?= $row['product_name'] ?></h6>
        <p>Price: ₹<?= $row['product_price'] ?></strong></p>
        <p>Ordered on: <?= $row['order_date'] ?></p>
        <p>Delivered To: <?= $row['delivery_address'] ?></p>
        <p>Contact: <?= $row['user_number'] ?></p>
        <p>Name:</strong> <?= $row['user_name'] ?? 'N/A' ?></p> <!-- Optional: Make sure user_name is available -->
      </div>
    </div>
    <div class="col-md-3 d-flex flex-column align-items-center justify-content-center p-3">
      <?php if ($can_cancel): ?>
        <a href="?cancel=<?= $row['order_id'] ?>" class="btn btn-danger btn-sm mb-2" onclick="return confirm('Are you sure you want to cancel this order?')">Cancel Order</a>
      <?php else: ?>
        <span class="badge bg-secondary mb-2">❌ Cannot Cancel</span>
      <?php endif; ?>
      <span class="badge bg-success mt-5">✅Order Successfully</span>
    </div>
  </div>
</div>

    <?php endwhile; ?>
  <?php else: ?>
    <p class="text-center">No orders found.</p>
  <?php endif; ?>
</div>

<!-- Footer -->
<?php include "../includes/footer.php" ?>

</body>
</html>
