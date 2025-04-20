<?php
session_start();
include '../includes/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $number = trim($_POST['number']);
    $password = trim($_POST['password']); // no password_verify

    $stmt = $conn->prepare("SELECT * FROM users WHERE number = ? AND password = ?");
    $stmt->bind_param("ss", $number, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_number'] = $user['number'];
        header("Location: profile.php");
        exit();
    } else {
        $error = "❌ Invalid credentials.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>

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
    .card {
      background-color: #1e1e1e;
      border: 1px solid #333;
    }
    .form-control,
    .form-control:focus {
      background-color:rgba(255, 255, 255, 0.78);
      border: 1px solid #555;
    }
    .form-label {
      color: #cccccc;
    }
    .btn-primary {
      background-color: #4da6ff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #1e90ff;
    }
    .alert-danger {
      background-color: #222;
      color: #fff;
      border: 1px solid #444;
    }
    a {
      color: #4da6ff;
    }
    a:hover {
      color: #1e90ff;
    }
  </style>
</head>
<body>

<!-- Header Navbar -->
<?php include "../includes/header.php"; ?>

<div class="container my-5">
  <div class="card mx-auto" style="max-width: 400px;">
    <div class="card-body">
      <h3 class="card-title text-center mb-4 text-light">🔐 User Login</h3>

      <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>

      <form method="POST">
        <div class="mb-3">
          <label class="form-label">📱 Phone Number</label>
          <input type="text" name="number" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">🔒 Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</div>

<!-- Footer -->
<?php include "../includes/footer.php"; ?>

</body>
</html>
