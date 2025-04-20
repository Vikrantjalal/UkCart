<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user_number'])) {
  echo '<script>
    document.addEventListener("DOMContentLoaded", function () {
      const loginForceModal = new bootstrap.Modal(document.getElementById("loginForceModal"), {
        backdrop: "static",
        keyboard: false
      });
      loginForceModal.show();
    });
  </script>';
  header("Location: login.php");
  exit;
}

$user_number = $_SESSION['user_number'];
$user_name = $_SESSION['user_name'] ?? '';
$user_email = $_SESSION['user_email'] ?? '';
$delivery_address = $_SESSION['delivery_address'] ?? '';

if (empty($user_email) || empty($delivery_address)) {
  $user_result = mysqli_query($conn, "SELECT * FROM users WHERE number = '$user_number' LIMIT 1");
  if ($user_row = mysqli_fetch_assoc($user_result)) {
    $user_name = $user_row['name'];
    $user_email = $user_row['email'];
    $delivery_address = $user_row['delivery_address'];

    $_SESSION['user_name'] = $user_name;
    $_SESSION['user_email'] = $user_email;
    $_SESSION['delivery_address'] = $delivery_address;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'])) {
  $_SESSION['cart'][] = [
    'name' => $_POST['product_name'],
    'price' => $_POST['product_price'],
    'image' => $_POST['product_image']
  ];
}

if (isset($_GET['remove'])) {
  $index = $_GET['remove'];
  unset($_SESSION['cart'][$index]);
  $_SESSION['cart'] = array_values($_SESSION['cart']);
  header("Location: cart.php");
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_now'])) {
  $order_date = date('Y-m-d');

  foreach ($_SESSION['cart'] as $item) {
    $product_name = mysqli_real_escape_string($conn, $item['name']);
    $product_price = mysqli_real_escape_string($conn, $item['price']);
    $product_image = mysqli_real_escape_string($conn, $item['image']);

    $insert = "INSERT INTO orders 
      (user_name, user_number, user_email, delivery_address, product_name, product_price, product_image, order_date, is_accepted)
      VALUES 
      ('$user_name', '$user_number', '$user_email', '$delivery_address', '$product_name', '$product_price', '$product_image', '$order_date', 0)";
    mysqli_query($conn, $insert);
  }

  $_SESSION['cart'] = [];
  header("Location: order_history.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cart - Dark Mode</title>
  <link rel="icon" href="logo.jpg" type="image/jpeg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
    }
    .card, .modal-content {
      background-color: #1e1e1e;
      color: #ffffff;
    }
    .btn-info {
      background-color: #0dcaf0;
      border: none;
    }
    .btn-info:hover {
      background-color: #31d2f2;
    }
    .card-header {
      background-color: #212529;
    }
    a {
      color: #0dcaf0;
    }
    a:hover {
      color: #31d2f2;
    }
  </style>
</head>
<body>

<!-- Force Login Modal -->
<div class="modal fade" id="loginForceModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Access Denied</h5>
      </div>
      <div class="modal-body">You must be logged in to view your cart.</div>
      <div class="modal-footer justify-content-center">
        <a href="./login.php" class="btn btn-danger">Login Now</a>
      </div>
    </div>
  </div>
</div>

<!-- Navbar -->
<?php include "../includes/header.php" ?>

<!-- Cart Section -->
<div class="container py-5">

  <h2 class="mb-4 text-center">🛒 My Cart</h2>
  <div class="row">
    <div class="col-md-8">
      <?php if (!empty($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $index => $item): ?>
          <div class="card mb-3 border-secondary">
            <div class="row g-0 align-items-center">
              <div class="col-3">
                <img src="<?= htmlspecialchars($item['image']) ?>" class="img-fluid rounded-start m-2 " style="height: 100px; object-fit: cover;">
              </div>
              <div class="col-6">
                <div class="card-body">
                  <h6 class="card-title"><?= htmlspecialchars($item['name']) ?></h6>
                  <p class="card-text mb-1">₹<?= htmlspecialchars($item['price']) ?></p>
                </div>
              </div>
              <div class="col-3 text-end pe-3">
                <a href="?remove=<?= $index ?>" class="btn btn-sm btn-outline-danger">Remove</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-center">Cart is empty.</p>
      <?php endif; ?>
      <a href="shop.php" class="btn btn-info text-black fw-semibold mt-3">Add more Items</a>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-secondary">
        <div class="card-header bg-info text-black fw-bold">Order Summary</div>
        <div class="card-body">
          <?php
            $total = 0;
            if (!empty($_SESSION['cart'])):
              foreach ($_SESSION['cart'] as $item):
                $total += $item['price'];
          ?>
            <div class="d-flex justify-content-between">
              <span><?= htmlspecialchars($item['name']) ?></span>
              <span>₹<?= htmlspecialchars($item['price']) ?></span>
            </div>
          <?php endforeach; ?>
            <hr>
            <div class="mb-2">
              <p>Name: <?= htmlspecialchars($user_name) ?></p> 
              <p>Phone: <?= htmlspecialchars($user_number) ?></p> 
              <p>Delivery Address: <?= nl2br(htmlspecialchars($delivery_address)) ?></p> 
            </div>
            <hr>
            <div class="d-flex justify-content-between fw-bold">
              <span>Total</span>
              <span>₹<?= $total ?></span>
            </div>
            <form method="POST" class="mt-3">
              <button type="submit" name="buy_now" class="btn btn-success w-100">Buy Now</button>
            </form>
          <?php else: ?>
            <p>No items to summarize.</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- Footer -->
<?php include "../includes/footer.php" ?>

</body>
</html>
