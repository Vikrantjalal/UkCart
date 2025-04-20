<section>
<?php
$current_page = basename($_SERVER['SCRIPT_NAME']);
$logged_in = isset($_SESSION['user_number']);
$user_name = $_SESSION['user_name'] ?? 'User';
?>

<!-- Bootstrap Icons  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="../logo.jpg" alt="ukCart Logo" class="rounded shadow-sm me-2" style="height: 45px; width: auto;">
      <span class="fw-bold fs-5">UkCart</span>
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <!-- Left nav links -->
      <ul class="navbar-nav ms-auto gap-2">

        <!-- Home -->
        <li class="nav-item">
          <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'index.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="../index.php">Home</a>
        </li>

        <!-- Product Dropdown -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn btn-sm rounded-pill px-3 py-1 
            <?= $current_page == 'shop.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" 
            href="#" role="button" data-bs-toggle="dropdown">
            Products
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../pages/shop.php#food_items">Food Items</a></li>
            <li><a class="dropdown-item" href="../pages/shop.php#fruits">Fruits</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#pulses">Pulses</a></li>
            <li><a class="dropdown-item" href="../pages/shop.php#clothes">Clothes</a></li>
            <li><a class="dropdown-item" href="../pages/shop.php#jewellery">Jewelleries</a></li>
            <li><a class="dropdown-item" href="../pages/shop.php#temples">Mandir Parsaad</a></li>
            <li><a class="dropdown-item" href="../pages/shop.php#handicrafts">Handicrafts</a></li>
            <li><a class="dropdown-item" href="../pages/shop.php#plants">Plants</a></li>
        </ul>
        </li>


        <!-- Shop -->
        <li class="nav-item">
        <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'shop.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="../pages/shop.php">Shop</a>
        </li>
        <!-- Right Side: Admin Login / Logout -->
        <ul class="navbar-nav ms-auto gap-2">
        <?php if ($logged_in): ?>
            <!-- ✅ Admin Logout Button -->
            <li class="nav-item">
            <a class="btn btn-outline-danger btn-sm rounded-pill px-3 py-1" href="../pages/logout.php">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
            </li>
        <?php else: ?>
            <!-- ✅ Admin Login Button -->
            <li class="nav-item">
            <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'login.php' ? 'btn-light text-dark' : 'btn-outline-light' ?>" href="../pages/login.php">
                <i class="bi bi-box-arrow-in-right"></i> Admin Login
            </a>
            </li>
        <?php endif; ?>
        </ul>

    </div>
  </div>
</nav>


</section>