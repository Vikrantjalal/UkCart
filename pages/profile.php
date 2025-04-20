<?php
session_start();
include '../includes/db.php';

if (!isset($_SESSION['user_number'])) {
    header("Location: login.php");
    exit();
}

$number = $_SESSION['user_number'];
$success = "";
$error = "";

$stmt = $conn->prepare("SELECT * FROM users WHERE number = ?");
$stmt->bind_param("s", $number);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newPassword = trim($_POST['password']);
    $newAddress = trim($_POST['delivery_address']);

    $updateStmt = $conn->prepare("UPDATE users SET password = ?, delivery_address = ? WHERE number = ?");
    $updateStmt->bind_param("sss", $newPassword, $newAddress, $number);

    if ($updateStmt->execute()) {
        $success = "✅ Profile updated successfully!";
        $user['password'] = $newPassword;
        $user['delivery_address'] = $newAddress;
    } else {
        $error = "❌ Update failed: " . $updateStmt->error;
    }

    $updateStmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #121212;
      color: #ffffff;
    }
    .card {
      background-color: #1e1e1e;
      border: 1px solid #2c2c2c;
      box-shadow: 0 0 10px rgba(255,255,255,0.05);
    }
    .form-control, textarea {
      background-color: #2c2c2c;
      color: #ffffff;
      border: 1px solid #444;
    }
    p{

      color: #ffffff;

    }

    .form-control:focus {
      background-color: #333;
      border-color: #5c9eff;
      box-shadow: none;
      color: #fff;
    }
    .btn-primary {
      background-color: #5c9eff;
      border: none;
    }
    .btn-primary:hover {
      background-color: #3a7be0;
    }
    .btn-danger {
      background-color: #e74c3c;
      border: none;
    }
    .btn-danger:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>

<?php include "../includes/header.php" ?>

<div class="container mt-5">
  <div class="card mx-auto p-4" style="max-width: 600px;">
    <div class="card-body">
      <h3 class="card-title text-center mb-4 text-light">👤 User Profile</h3>

      <?php if ($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>
      <?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>

      <p><strong>📱 Phone:</strong> <?= htmlspecialchars($user['number']) ?></p>
      <p><strong>👤 Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
      <p><strong>📧 Email:</strong> <?= htmlspecialchars($user['email']) ?></p>

      <form method="POST">
        <div class="mb-3">
          <label for="password" class="form-label text-light">🔐 Password</label>
          <input type="text" name="password" id="password" class="form-control" value="<?= htmlspecialchars($user['password']) ?>" required>
        </div>

        <div class="mb-3">
          <label for="delivery_address" class="form-label text-light">🏠 Address</label>
          <textarea name="delivery_address" id="delivery_address" class="form-control" rows="3" required><?= htmlspecialchars($user['delivery_address']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary w-100">💾 Save Changes</button>
      </form>

      <a href="../pages/logout.php" class="btn btn-danger w-100 mt-3">🚪 Logout</a>
    </div>
  </div>
</div>

<?php include "../includes/footer.php" ?>

</body>
</html>
