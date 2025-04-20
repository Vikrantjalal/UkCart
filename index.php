<?php
session_start();
include './includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UkCart</title>
    <link rel="icon" href="logo.jpg" type="image/jpeg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <link href="./css_files/index.css" rel="stylesheet">
    <link href="./css_files/fixed-button.css" rel="stylesheet">    

</head>
<body>


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
      <img src="logo.jpg" alt="ukCart Logo" class="rounded shadow-sm me-2" style="height: 45px; width: auto;">
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
          <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'index.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="./index.php">Home</a>
        </li>

        <!-- Product Dropdown -->
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle btn btn-sm rounded-pill px-3 py-1 
            <?= $current_page == 'shop.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" 
            href="#" role="button" data-bs-toggle="dropdown">
            Products
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./pages/shop.php#food_items">Food Items</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#fruits">Fruits</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#pulses">Pulses</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#clothes">Clothes</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#jewellery">Jewelleries</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#temples">Mandir Parsaad</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#handicrafts">Handicrafts</a></li>
            <li><a class="dropdown-item" href="./pages/shop.php#plants">Plants</a></li>
        </ul>
        </li>


        <!-- Shop -->
        <li class="nav-item">
        <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'shop.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="./pages/shop.php">Shop</a>
        </li>

      <!-- Cart (only if logged in) -->
      <?php if ($logged_in): ?>
        <li class="nav-item">
          <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'cart.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="./pages/cart.php">Cart</a>
        </li>
      <?php endif; ?>

        <!-- My Order (only if logged in) -->
        <?php if ($logged_in): ?>
      <li class="nav-item">
          <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'order_history.php' ? 'btn-primary text-white' : 'btn-outline-primary' ?>" href="./pages/order_history.php">My Orders</a>
      </li>
      <?php endif; ?>



      </ul>

      <!-- Search Bar -->
      <form class="d-none d-lg-flex mx-auto w-25" role="search" method="get" action="./includes/search.php">
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
              <li><a class="dropdown-item <?= $current_page == 'profile.php' ? 'active fw-bold' : '' ?>" href="./pages/profile.php">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="./pages/logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link btn btn-sm rounded-pill px-3 py-1 <?= $current_page == 'login.php' ? 'btn-light text-dark' : 'btn-outline-light' ?>" href="./pages/login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-sm btn-info rounded-pill px-4 fw-bold" href="./pages/registration.php">Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- /* Vertical Social Media Bar */ -->
<style>
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

<div class="social-bar">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <a href="https://www.instagram.com" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a>
  <a href="https://wa.me/919999999999" target="_blank" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
  <a href="https://www.facebook.com" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a>
</div>
</section>



<!-- Traning product carousel -->
<section>

<?php
$sql = "SELECT * FROM tranding_products";
$result = mysqli_query($conn, $sql);
$products = [];

while ($row = mysqli_fetch_assoc($result)) {
  $products[] = $row;
}
?>
<style>


.carousel-container {
  overflow: hidden;
  background: #1e1e1e;
  position: relative;
  border-bottom: 2px solid #2d2d2d;
}

.carousel-track {
  display: flex;
  animation: scroll 25s linear infinite;
  padding: 20px 0;
}

.product-card {
  flex-shrink: 0;
  width: 220px;
  margin-right: 20px;
  background: #222;
  border: 1px solid #333;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
  border-radius: 10px;
  overflow: hidden;
  transition: transform 0.3s;
}

.product-card:hover {
  transform: translateY(-5px);
}

.product-card img {
  width: 100%;
  height: 150px;
  object-fit: cover;
}

.product-card .card-body {
  padding: 12px;
  text-align: center;
}

.product-card .card-body h6 {
  color: #fff;
  font-size: 1rem;
  margin: 0;
}

@keyframes scroll {
  0% { transform: translateX(0); }
  100% { transform: translateX(-50%); }
}

.category-nav {
  background-color: #1a1a1a;
  border-top: 2px solid #333;
  border-bottom: 2px solid #333;
  padding: 10px 0;
}

.category-nav a {
  color: #00d4ff;
  border-color: #00d4ff;
  transition: all 0.3s ease;
}

.category-nav a:hover {
  background-color: #00d4ff;
  color: #000;
}
</style>

<!-- Trending Carousel -->
<div class="carousel-container">
  <div class="carousel-track">
    <?php
    $allProducts = array_merge($products, $products); // for infinite scroll illusion
    foreach ($allProducts as $row):
    ?>
      <div class="product-card">
        <img src="./images/trending_products/<?= $row['product_image'] ?>" alt="<?= $row['product_name'] ?>">
        <div class="card-body">
          <h6><?= $row['product_name'] ?></h6>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

</section>

<style>
.multi-carousel-img-wrapper {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  width: 48%;
}

.multi-carousel-img {
  height: 350px;
  width: 100%;
  object-fit: cover;
  display: block;
  border-radius: 10px;
}

.multi-carousel-caption-center {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0, 0, 0, 0.5);
  padding: 15px 20px;
  border-radius: 10px;
  color: #fff;
  text-align: center;
  max-width: 90%;
}

.multi-carousel-slide-row {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 30px;
  padding: 30px 20px;
  flex-wrap: nowrap; /* Prevent wrap */
}

.carousel-inner{
  height:50vh;
}
</style>

<div id="multiCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-pause="false">
  <div class="carousel-inner">
    <?php
    $carouselImages = [
      ["src" => "./images/carousel/food.jpg", "title" => "Delicious Food", "desc" => "Pahadi flavors curated for you"],
      ["src" => "./images/carousel/fruits.jpg", "title" => "Fresh Fruits", "desc" => "Straight from Uttarakhand"],
      ["src" => "./images/carousel/pulses.jpg", "title" => "Organic Pulses", "desc" => "Wholesome and chemical-free"],
      ["src" => "./images/carousel/clothes.webp", "title" => "Traditional Clothes", "desc" => "Feel the culture of Uttarakhand"],
      ["src" => "./images/carousel/jewelleries.png", "title" => "Ethnic Jewelleries", "desc" => "Handcrafted ornaments"],
      ["src" => "./images/carousel/parsad.jpg", "title" => "Mandir Parsaad", "desc" => "Divine blessings in every bite"],
      ["src" => "./images/carousel/handicrafts.jpeg", "title" => "Beautiful Handicrafts", "desc" => "Art by local artisans"],
      ["src" => "./images/carousel/plants.webp", "title" => "Green Plants", "desc" => "Bring freshness home"],
    ];

    $chunks = array_chunk($carouselImages, 2); // 2 images per slide
    foreach ($chunks as $index => $slide):
    ?>
      <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
        <div class="multi-carousel-slide-row">
          <?php foreach ($slide as $item): ?>
            <div class="multi-carousel-img-wrapper">
              <img src="<?= $item['src'] ?>" class="multi-carousel-img" alt="<?= $item['title'] ?>">
              <div class="multi-carousel-caption-center">
                <h5><?= $item['title'] ?></h5>
                <p><?= $item['desc'] ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <button class="carousel-control-prev" type="button" data-bs-target="#multiCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#multiCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>


<!-- Trending Products Section -->
<section >
<script>
  function addToCart(name, price, image) {
    const product = {
      name: name,
      price: price,
      image: image
    };
    localStorage.setItem('cartProduct', JSON.stringify(product));
  }
</script>

<?php
$sql = "SELECT * FROM tranding_products";
$result = mysqli_query($conn, $sql);
?>


<div class="container py-5">
  <h2 class="mb-4 text-center">Trending Products</h2>
  <div class="row g-4">
    <?php while ($row = mysqli_fetch_assoc($result)) {
      $modalId = 'trendingModal' . $row['id'];
    ?>
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card h-100 shadow" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>" style="cursor: pointer;">
          <img src="./images/trending_products/<?= $row['product_image'] ?>" class="card-img-top" alt="<?= $row['product_name'] ?>" style="height: 200px; object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title"><?= $row['product_name'] ?></h5>
            <p class="text-success fw-bold">₹<?= $row['product_price'] ?></p>
            <p class="card-text" style="font-size: 0.9rem;"><?= $row['product_description'] ?></p>
            <button class="btn btn-sm btn-primary">Buy Now</button>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><?= $row['product_name'] ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
              <img src="./images/trending_products/<?= $row['product_image'] ?>" alt="<?= $row['product_name'] ?>" class="img-fluid mb-3" style="max-height: 400px; object-fit: contain;">
              <p class="text-success fw-bold fs-4">₹<?= $row['product_price'] ?></p>
              <p><?= $row['product_description'] ?></p>

              <form action="./pages/cart.php" method="POST">
                <input type="hidden" name="product_name" value="<?= $row['product_name'] ?>">
                <input type="hidden" name="product_price" value="<?= $row['product_price'] ?>">
                <input type="hidden" name="product_image" value="../images/trending_products/<?= $row['product_image'] ?>">
                <button type="submit" class="btn btn-primary">Buy Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>
  </div>
</div>
</section>


<!-- Product Grid -->
<section class="container-fluid py-5 bg-dark">

  <div class="container py-5">
    <h2 class="mb-4 text-center text-white">Featured Products</h2>
    <div class="row g-4">

      <!-- Plants -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products1.webp" class="card-img-top" alt="Plants">
          <div class="card-body">
            <p class="card-text">Fresh and vibrant indoor plants to purify your home and bring natural beauty.</p>
          </div>
        </div>
      </div>

      <!-- Food Items -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products2.jpg" class="card-img-top" alt="Food Items">
          <div class="card-body">
            <p class="card-text">Tasty and organic hill food delicacies, straight from traditional kitchens.</p>
          </div>
        </div>
      </div>

      <!-- Fruits -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products3.jpg" class="card-img-top" alt="Fruits">
          <div class="card-body">
            <p class="card-text">Fresh, juicy, and handpicked seasonal fruits loaded with nutrition.</p>
          </div>
        </div>
      </div>

      <!-- Handicrafts -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products4.jpg" class="card-img-top" alt="Handicrafts">
          <div class="card-body">
            <p class="card-text">Authentic handmade crafts that reflect the rich culture of our artisans.</p>
          </div>
        </div>
      </div>

      <!-- Jewellery -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products5.jpg" class="card-img-top" alt="Jewellery">
          <div class="card-body">
            <p class="card-text">Elegant ethnic jewellery to elevate your traditional look with grace.</p>
          </div>
        </div>
      </div>

      <!-- Mandir Prasad -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products6.jpg" class="card-img-top" alt="Mandir Prasad">
          <div class="card-body">
            <p class="card-text">Holy prasad directly from temple kitchens, prepared with purity and love.</p>
          </div>
        </div>
      </div>

      <!-- Pulses -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products7.jpg" class="card-img-top" alt="Pulses">
          <div class="card-body">
            <p class="card-text">Wholesome and chemical-free pulses for a healthy and balanced diet.</p>
          </div>
        </div>
      </div>

      <!-- Clothes -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="./images/products-category/products8.webp" class="card-img-top" alt="Handmade Clothes">
          <div class="card-body">
            <p class="card-text">Comfortable and eco-friendly clothes crafted by skilled local hands.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

</section>




<!-- About Section -->
<section class="py-5 bg-light" id="about">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- Image Section -->
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="logo.jpg" alt="ukCart - Uttarakhand Products" class="img-fluid rounded shadow">
      </div>

      <!-- Text Section -->
      <div class="col-md-6">
        <h2 class="mb-3">About <span class="text-primary">ukCart</span></h2>
        <p>
          <strong>ukCart</strong> is your one-stop destination for authentic products from the heart of Uttarakhand.
          We bring you a handpicked collection of organic foods, traditional handicrafts, handmade products, and much more—crafted with love by local artisans and farmers.
        </p>
        <p>
          Our mission is to empower local communities, promote sustainable shopping, and deliver the rich heritage of the hills right to your doorstep. Whether you're in the city or abroad, ukCart bridges the gap between tradition and convenience.
        </p>
        <a href="#products" class="btn btn-primary mt-3">Explore Our Products</a>
      </div>

    </div>
  </div>
</section>



<!-- Footer -->
<?php include "./includes/footer.php" ?>

</body>
</html>
