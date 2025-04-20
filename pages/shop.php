<?php
session_start();
include '../includes/db.php';

// Reusable function to render product sections
function renderProductSection($conn, $tableName, $sectionTitle, $sectionId) {
  $sql = "SELECT * FROM $tableName";
  $result = mysqli_query($conn, $sql);

  if (!$result) {
    echo "<p class='text-danger'>Error fetching data from $tableName table</p>";
    return;
  }
  ?>
  <div id="<?= $sectionId ?>" class="container py-5">
    <h2 class="mb-4 text-center"><?= $sectionTitle ?></h2>
    <div class="row g-4">
      <?php while ($row = mysqli_fetch_assoc($result)) {
        // Make modalId unique using table name + id
        $modalId = 'modal_' . $tableName . '_' . $row['id'];
      ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="card h-100 shadow" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#<?= $modalId ?>">
            <img src="../images/<?= $tableName ?>/<?= $row['product_image'] ?>" class="card-img-top" alt="<?= $row['product_name'] ?>" style="height: 200px; object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title"><?= $row['product_name'] ?></h5>
              <p class="text-success fw-bold">₹<?= $row['product_price'] ?></p>
              <p class="card-text" style="font-size: 0.9rem;"><?= $row['product_description'] ?></p>
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
                <img src="../images/<?= $tableName ?>/<?= $row['product_image'] ?>" alt="<?= $row['product_name'] ?>" class="img-fluid mb-3" style="max-height: 400px; object-fit: contain;">
                <p class="text-success fw-bold fs-4">₹<?= $row['product_price'] ?></p>
                <p><?= $row['product_description'] ?></p>

                <form action="../pages/cart.php" method="POST">
                  <input type="hidden" name="product_name" value="<?= $row['product_name'] ?>">
                  <input type="hidden" name="product_price" value="<?= $row['product_price'] ?>">
                  <input type="hidden" name="product_image" value="../images/<?= $tableName ?>/<?= $row['product_image'] ?>">
                  <button type="submit" class="btn btn-primary">Buy Now</button>
                </form>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>
<?php } ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shop</title>
  <link rel="icon" href="../logo.jpg" type="image/jpeg" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <link href="./css_files/index.css" rel="stylesheet" />
  <style>
    html { scroll-behavior: smooth; }
    .card{
      transition: transform 0.4s ease;
    }

    .card:hover {
      transform: scale(1.05);
    }

  </style>

</head>
<body>

<!-- Header Navbar -->
<?php
include "../includes/header.php"
?>



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
        <img src="../images/trending_products/<?= $row['product_image'] ?>" alt="<?= $row['product_name'] ?>">
        <div class="card-body">
          <h6><?= $row['product_name'] ?></h6>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- Sub Navbar with Search and Categories -->
<nav class="navbar navbar-dark category-nav">
  <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap">
    <div class="d-flex flex-wrap gap-2 justify-content-center w-100">
      <a href="#Food Items" class="btn btn-outline-info btn-sm">Food Items</a>
      <a href="#Fruits" class="btn btn-outline-info btn-sm">Fruits</a>
      <a href="#Pulses" class="btn btn-outline-info btn-sm">Pulses</a>
      <a href="#Clothes" class="btn btn-outline-info btn-sm">Clothes</a>
      <a href="#Jewelleries" class="btn btn-outline-info btn-sm">Jewelleries</a>
      <a href="#Mandir Parsaad" class="btn btn-outline-info btn-sm">Mandir Parsaad</a>
      <a href="#Handicrafts" class="btn btn-outline-info btn-sm">Handicrafts</a>
      <a href="#Plants" class="btn btn-outline-info btn-sm">Plants</a>
    </div>
  </div>
</nav>





<!-- Product Sections -->
<?php
renderProductSection($conn, 'food_items', 'Food Items', 'Food Items');
renderProductSection($conn, 'fruits', 'Fruits', 'Fruits');
renderProductSection($conn, 'pulses', 'Pulses', 'Pulses');
renderProductSection($conn, 'clothes', 'Clothes', 'Clothes');
renderProductSection($conn, 'jewellery', 'Jewelleries', 'Jewelleries');
renderProductSection($conn, 'temples', 'Mandir Parsaad', 'Mandir Parsaad');
renderProductSection($conn, 'handicrafts', 'Handicrafts', 'Handicrafts');
renderProductSection($conn, 'plants', 'Plants', 'Plants');
?>

<!-- Footer -->
<?php include "../includes/footer.php" ?>

</body>
</html>
