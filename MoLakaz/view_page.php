<?php
// view_page.php

// Include the database connection and any necessary functions
require_once "./db/pdo.php";
session_start();


if (isset($_GET['category_id'])) {
  $categoryId = $_GET['category_id'];

  // Fetch the category name from the category table using the category ID
  $stmt = $pdo->prepare("SELECT category FROM category WHERE category_id = :category_id");
  $stmt->bindParam(':category_id', $categoryId);
  $stmt->execute();
  $categoryName = $stmt->fetchColumn();

  // Fetch gallery images from the portfolio table for the selected category
  $stmt = $pdo->prepare("SELECT gallery FROM portfolio WHERE category_id = :category_id");
  $stmt->bindParam(':category_id', $categoryId);
  $stmt->execute();
  $galleryImages = $stmt->fetchAll(PDO::FETCH_ASSOC);

  // Display the category name and the gallery images
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $categoryName; ?> Gallery</title>
    
    <?php include_once("./template/csslinks.php"); ?>
  </head>
  <body>
    <!-- Navbar -->
    <?php include_once("./template/header.php"); ?>
    <!-- Page Content -->
    <div class="container-fluid mt-5">
      <div class="row">
        <main class="col-md-8 offset-md-2 py-5">
          <h3 class="text-center mb-4"><?php echo $categoryName; ?> Gallery</h3>
          <div class="row mt-3">
            <?php
            foreach ($galleryImages as $image) {
              echo '<div class="col-md-4 mb-4">';
              echo '<div class="card">';
              echo '<a href="upload/' . htmlentities($image['gallery']) . '" data-lightbox="gallery" data-title="' . htmlentities($image['gallery']) . '">';
              echo '<img src="upload/' . htmlentities($image['gallery']) . '" class="card-img-top" alt="Gallery Image">';
              echo '</a>';
              
              echo '</div>';
              echo '</div>';
            }
            ?>
          </div>
        </main>
      </div>
    </div>

    <!-- Footer -->
    <?php include_once("./template/footer.php"); ?>
    <!-- End footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/lightbox.js"></script>
    <script>
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'clickOutsideToClose': true // Add this line to enable click outside to close
  })
</script>
  </body>
  </html>
<?php
}
?>
