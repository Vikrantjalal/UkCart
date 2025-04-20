<?php
session_start();
include '../includes/db.php';

// Admin login check
if (!isset($_SESSION['admin_name'])) {
    header("Location: admin_login.php");
    exit();
}

// Toggle order status securely and stay on same page
if (isset($_GET['toggle_id'])) {
    $order_id = $_GET['toggle_id'];

    $stmt = $conn->prepare("UPDATE orders SET is_accepted = NOT is_accepted WHERE order_id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->close();

    // Reload same page without toggle_id in URL
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}

// Fetch data
$today = date('Y-m-d');

$sql_today = "SELECT * FROM orders WHERE order_date = '$today'";
$result_today = mysqli_query($conn, $sql_today);
$totalToday = mysqli_num_rows($result_today);

$sql_all = "SELECT * FROM orders ORDER BY order_date DESC";
$result_all = mysqli_query($conn, $sql_all);
$totalAll = mysqli_num_rows($result_all);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #121212;
      color: #e0e0e0;
    }
    .table td {
      color: #000000;
    }
    .table th {
      background-color: #1f1f1f;
      color: #e0e0e0;
    }
    .order-image {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 5px;
    }
    .accepted {
      background-color: #1e4422 !important;
    }
    .summary-box {
      background: #1e1e1e;
      border: 1px solid #333;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.5);
      margin-bottom: 30px;
    }
    .btn-success {
      background-color: #28a745;
    }
    .btn-danger {
      background-color: #dc3545;
    }
    a.btn:hover {
      opacity: 0.85;
    }
    .section-title {
      margin-top: 40px;
      color: #ffffff;
    }
  </style>
</head>
<body>

<?php include "../includes/admin_header.php"; ?>

<div class="container py-5">
  <h2 class="mb-4">🛒 Admin Order Panel</h2>

  <!-- Summary -->
  <div class="row">
    <div class="col-md-6">
      <div class="summary-box">
        <h5>📦 Today's Orders:</h5>
        <p class="fw-bold fs-4 text-success"><?= $totalToday ?></p>
      </div>
    </div>
    <div class="col-md-6">
      <div class="summary-box">
        <h5>🗂️ All Orders:</h5>
        <p class="fw-bold fs-4 text-primary"><?= $totalAll ?></p>
      </div>
    </div>
  </div>

  <!-- Today's Orders -->
  <h4 class="section-title">📅 Today's Orders (<?= $today ?>)</h4>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Order ID</th>
          <th>Date</th>
          <th>User Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
          <th>Product</th>
          <th>Image</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; while ($row = mysqli_fetch_assoc($result_today)) { ?>
        <tr class="<?= $row['is_accepted'] ? 'accepted' : '' ?>">
          <td><?= $i++ ?></td>
          <td><?= $row['order_id'] ?></td>
          <td><?= $row['order_date'] ?></td>
          <td><?= $row['user_name'] ?></td>
          <td><?= $row['user_number'] ?></td>
          <td><?= $row['user_email'] ?></td>
          <td><?= $row['delivery_address'] ?></td>
          <td><?= $row['product_name'] ?></td>
          <td>
            <img src="<?= $row['product_image'] ?: 'no-image.jpg' ?>" class="order-image" alt="Product">
          </td>
          <td><?= $row['is_accepted'] ? '✅ Accepted' : '⏳ Pending' ?></td>
          <td>
            <a href="?toggle_id=<?= $row['order_id'] ?>" class="btn btn-sm <?= $row['is_accepted'] ? 'btn-danger' : 'btn-success' ?>">
              <?= $row['is_accepted'] ? 'Undo Accept' : 'Accept' ?>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <!-- All Orders -->
  <h4 class="section-title">📋 All Orders</h4>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Order ID</th>
          <th>Date</th>
          <th>User Name</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Address</th>
          <th>Product</th>
          <th>Image</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $j = 1; while ($row = mysqli_fetch_assoc($result_all)) { ?>
        <tr class="<?= $row['is_accepted'] ? 'accepted' : '' ?>">
          <td><?= $j++ ?></td>
          <td><?= $row['order_id'] ?></td>
          <td><?= $row['order_date'] ?></td>
          <td><?= $row['user_name'] ?></td>
          <td><?= $row['user_number'] ?></td>
          <td><?= $row['user_email'] ?></td>
          <td><?= $row['delivery_address'] ?></td>
          <td><?= $row['product_name'] ?></td>
          <td>
            <img src="<?= $row['product_image'] ?: 'no-image.jpg' ?>" class="order-image" alt="Product">
          </td>
          <td><?= $row['is_accepted'] ? '✅ Accepted' : '⏳ Pending' ?></td>
          <td>
            <a href="?toggle_id=<?= $row['order_id'] ?>" class="btn btn-sm <?= $row['is_accepted'] ? 'btn-danger' : 'btn-success' ?>">
              <?= $row['is_accepted'] ? 'Undo Accept' : 'Accept' ?>
            </a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</body>
</html>
