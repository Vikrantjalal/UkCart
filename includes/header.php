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
    <a class="navbar-brand d-flex align-items-center" href="../index.php">
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
            <li><a class="dropdown-item" href="../pages/shop.php#pulses">Pulses</a></li>
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

        <!-- Cart (only if logged in) -->
            <?php if ($logged_in): ?>
            <li class="nav-item">
                <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'cart.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="../pages/cart.php">Cart</a>
            </li>
            <?php endif; ?>


        <!-- My Order (only if logged in) -->
            <?php if ($logged_in): ?>
            <li class="nav-item">
                <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'order_history.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="../pages/order_history.php">My Orders</a>
            </li>
            <?php endif; ?>


      </ul>

      
      <!-- Search Bar -->
      <form class="d-none d-lg-flex mx-auto w-25" role="search" method="get" action="../includes/search.php">
        <input class="form-control form-control-sm rounded-pill px-3" type="search" placeholder="Search products..." name="q">
      </form>

      <!-- Right Side: Profile / Login -->
      <ul class="navbar-nav ms-auto gap-2">
        <?php if ($logged_in): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle fs-4 text-white me-2"></i>
              <span class="text-white"><?= htmlspecialchars($user_name) ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item <?= $current_page == 'profile.php' ? 'active fw-bold' : '' ?>" href="../pages/profile.php">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="../pages/logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'login.php' ? 'btn-light text-dark' : 'btn-outline-light' ?>" href="../pages/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-sm btn-info rounded-pill px-4 fw-bold" href="../pages/registration.php">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Vertical Social Media Bar -->
<div class="social-bar">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <a href="https://www.instagram.com" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
  <a href="https://wa.me/919999999999" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
  <a href="https://www.facebook.com" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
</div>

<style>
  /* Vertical Social Media Bar */
.social-bar {
    position: fixed;
    top: 50%;
    right: 0; /* Change to 'right: 0;' if you want it on right */
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    z-index: 999;
  }
  
  .social-bar a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    margin: 5px 0;
    color: white;
    font-size: 20px;
    border-radius: 8px 0px 0px 8px;
    text-decoration: none;
    transition: all 0.3s ease;
  }
  
  /* Specific colors for each platform */
  .social-bar a.instagram {
    background-color: #E1306C;
  }
  .social-bar a.whatsapp {
    background-color: #25D366;
  }
  .social-bar a.facebook {
    background-color: #3b5998;
  }
  
  /* Hover effect */
  .social-bar a:hover {
    padding-left: 10px;
    opacity: 0.85;
  }

  
</style>