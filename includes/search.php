<?php
session_start();
require_once '../includes/db.php';

// Navbar ke liye current page aur user session set karna
$current_page = basename($_SERVER['SCRIPT_NAME']);
$logged_in = isset($_SESSION['user_number']);
$user_name = $_SESSION['user_name'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Search Results - UkCart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<!-- NAVBAR -->
<?php
include "./header.php"
?>

<!-- 🔎 SEARCH RESULTS SECTION -->
 <style>
  .card-img-top {
  height: 200px;
  object-fit: cover; 
}


 </style>
<?php
if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $searchTerm = htmlspecialchars($_GET['q']);
    $term = "%$searchTerm%";
    $tables = ['food_items', 'fruits', 'pulses', 'clothes', 'jewellery', 'temples', 'handicrafts', 'plants'];
    $unionQueries = [];

    foreach ($tables as $table) {
        $unionQueries[] = "
            SELECT 
                id, product_name, product_description, product_price, product_image, '$table' AS category
            FROM 
                $table 
            WHERE 
                product_name LIKE ? OR product_description LIKE ?
        ";
    }

    $finalQuery = implode(" UNION ALL ", $unionQueries);
    $stmt = $conn->prepare($finalQuery);

    $types = str_repeat("ss", count($tables));
    $params = array_fill(0, count($tables) * 2, $term);
    $stmt->bind_param($types, ...$params);

    $stmt->execute();
    $result = $stmt->get_result();
    ?>

    <div class="container mt-5">
        <h5 class="mb-3">Search Results for: <strong><?= $searchTerm ?></strong></h5>

        <?php if ($result->num_rows > 0): ?>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <?php
                        $category = $row['category'];
                        $imagePath = "../images/$category/" . $row['product_image'];
                    ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= $imagePath ?>" class="card-img-top" alt="<?= $row['product_name'] ?>" onerror="this.src='../images/placeholder.png'">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['product_name'] ?></h5>
                                <p class="card-text"><?= $row['product_description'] ?></p>
                                <p class="card-text text-success fw-bold">₹<?= $row['product_price'] ?></p>
                                <p class="card-text"><small class="text-muted">Category: <?= ucfirst($row['category']) ?></small></p>
                                <!-- 🔘 Buy Now Button triggers modal -->
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#buyModal<?= $row['id'] ?>">Buy Now</button>
                            </div>
                        </div>
                    </div>

                    <!-- 🪟 Bootstrap Modal for Buy Now -->
                    <div class="modal fade modal-height" id="buyModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="buyModalLabel<?= $row['id'] ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="buyModalLabel<?= $row['id'] ?>">Buy <?= $row['product_name'] ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <img src="<?= $imagePath ?>" class="img-fluid mb-2" alt="<?= $row['product_name'] ?>">
                            <p><?= $row['product_description'] ?></p>
                            <h5 class="text-success">Price: ₹<?= $row['product_price'] ?></h5>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="../pages/cart.php" method="POST">
                              <input type="hidden" name="product_name" value="<?= $row['product_name'] ?>">
                              <input type="hidden" name="product_price" value="<?= $row['product_price'] ?>">
                              <input type="hidden" name="product_image" value="<?=$imagePath ?>">
                              <button type="submit" class="btn btn-primary">Buy Now</button>
                            </form>
                          
                          </div>
                        </div>
                      </div>
                    </div>

                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-danger">No results found for "<strong><?= $searchTerm ?></strong>"</p>
        <?php endif; ?>
    </div>
<?php
} else {
    echo "<div class='container mt-4'><p class='text-warning'>Please enter a search term.</p></div>";
}
?>


<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
