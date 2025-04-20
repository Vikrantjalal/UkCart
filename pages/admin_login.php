<?php
session_start();
include '../includes/db.php';

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT * FROM admin WHERE name = ? AND password = ?");
    $stmt->bind_param("ss", $name, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    

    if ($result->num_rows === 1) {
        $_SESSION['admin_name'] = $name;
        header("Location: admin.php");
        exit();
    } else {
        $error = "❌ Invalid admin credentials.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('../images/image1.jpeg'); background-size: cover; background-repeat: no-repeat; background-position: center; height: 100vh;">

<!-- Header -->
<?php include "../includes/admin_header.php" ?>

<div class="container mt-5">
  <div class="card mx-auto" style="max-width: 400px;">
    <div class="card-body">
      <h3 class="card-title text-center mb-4">👨‍💼 Admin Login</h3>

      <?php if ($error): ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST">
        <div class="mb-3">
          <label>Admin Name</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-dark w-100">Login</button>
      </form>

      <p class="text-center mt-3"><a href="../index.php">← Back to Home</a></p>
    </div>
  </div>
</div>

</body>
</html>
