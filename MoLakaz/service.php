<?php
require_once "./db/pdo.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <?php include_once("./template/csslinks.php"); ?>
  <script src="https://kit.fontawesome.com/8181027d18.js" crossorigin="anonymous"></script>

  <style>
    .gallery-row {
  justify-content: center; /* Horizontally center the images */
}

.gallery-container {
  margin-bottom: 20px; /* Add some spacing between images */
  overflow: hidden;
  border: 1px solid #ccc; /* Add a border to the container */
  border-radius: 8px; /* Round the corners */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add a subtle shadow effect */
  transition: transform 0.3s ease; /* Add smooth transition effect */
}

.gallery-image img {
  display: block; /* Remove extra spacing below the image */
  width: 100%;
  height: auto; /* Ensure the image proportions are maintained */
}

.gallery-container:hover {
  transform: scale(1.05); /* Enlarge the image on hover for a zoom effect */
}

/* Optional: Add a caption or description below the images */
.gallery-container::after {
  content: attr(data-description);
  display: block;
  text-align: center;
  padding: 8px;
  background-color: rgba(0, 0, 0, 0.8);
  color: #fff;
  font-size: 14px;
}
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php include_once("./template/header.php"); ?>
  
  <!-- Page Content -->
  <main class="col-md-7 offset-md-1 py-5">
  <div class="row mt-3">
    <h3>Services our contractor provide:</h3>
    <div class="row gallery-row">
      <?php
      // Add the select statement to retrieve photos and descriptions from the database, grouped by category
      $stmt = $pdo->query('SELECT * FROM portfolio');
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Replace "width" and "height" with the actual image dimensions in your database
        $imageWidth = 300; // Replace with the actual width of the image
        $imageHeight = 225; // Replace with the actual height of the image

        // Wrap each image in a container for applying the zoom effect
        echo '<div class="col-md-4 gallery-container">';
        echo '<div class="gallery-image">';
        echo '<img src="./upload/' . htmlentities($row["gallery"]) . '" width="' . $imageWidth . '" height="' . $imageHeight . '" alt="Portfolio Image" />';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</main>

  
  <!-- Footer -->
  <?php include_once("./template/footer.php"); ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
