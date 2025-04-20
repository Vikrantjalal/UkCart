<?php
include '../includes/db.php';

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = trim($_POST['number']);
    $name = trim($_POST['name']);
    $password = trim($_POST['password']); // Note: hashing still not added
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);

    // Validate phone number input
    if (!is_numeric($number) || strlen($number) < 8 || strlen($number) > 15) {
        $error = "❌ Invalid phone number.";
    } else {
        // Check if number or email already exists
        $check_stmt = $conn->prepare("SELECT * FROM users WHERE number = ? OR email = ?");
        $check_stmt->bind_param("ss", $number, $email);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "❌ User already exists with this phone number or email.";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (number, name, password, email, delivery_address) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("issss", $number, $name, $password, $email, $address);

            if ($stmt->execute()) {
                $success = "✅ Registration successful!";
            } else {
                $error = "❌ Error: " . $stmt->error;
            }
            $stmt->close();
        }
        $check_stmt->close();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>

<!-- Bootstrap CSS and Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Bootstrap JS Bundle (with Popper for dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
    }
    .form-control,
    .form-control:focus {
      background-color:rgba(252, 249, 249, 0.92);
      border: 1px solid #444;
    }
    .form-label {
      color: #ccc;
    }
    .btn-primary {
      background-color: #4da6ff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #1e90ff;
    }
    .alert-success,
    .alert-danger {
      background-color: #222;
      color: #fff;
      border: 1px solid #444;
    }
  </style>
</head>
<body>

<!-- Header Navbar -->
<?php include "../includes/header.php"; ?>

<div class="container my-5">
  <h2 class="mb-4 text-center">📝 User Registration</h2>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
  <?php elseif ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <div class="mb-3">
      <label for="number" class="form-label">📱 Phone Number *</label>
      <input type="text" class="form-control" id="number" name="number" required>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">👤 Full Name *</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">🔒 Password *</label>
      <input type="text" class="form-control" id="password" name="password" required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">📧 Email Address</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">🏠 Address</label>
      <textarea class="form-control" id="address" name="address" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">Register</button>
  </form>
</div>

<!-- Footer -->
<?php include "../includes/footer.php"; ?>

</body>
</html>
