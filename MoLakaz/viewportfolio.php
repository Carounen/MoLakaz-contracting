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
    .gallery-container {
      position: relative;
      overflow: hidden;
    }

    .gallery-image {
      transition: transform 0.3s ease; /* Add smooth transition effect */
    }

    .gallery-image:hover {
      transform: scale(1.2); /* Increase the scale on hover for a larger zoom effect */
    }

    .image-description {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.7); /* Add a semi-transparent background */
      color: #fff;
      padding: 8px;
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
    <h3>Photo Gallery of portfolio of Works</h3>
    <div class="row">
      <?php
      // Add the select statement to retrieve photos and descriptions from the database
      $stmt = $pdo->prepare('SELECT * FROM portfolio WHERE contractor_id = :coid');
      $stmt->execute(array(':coid' => $_SESSION["coid"]));

      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Replace "width" and "height" with the actual image dimensions in your database
        $imageWidth = 300; // Replace with the actual width of the image
        $imageHeight = 225; // Replace with the actual height of the image

        // Wrap each image in a container for applying the zoom effect
        echo '<div class="col-md-4 gallery-container">';
        echo '<div class="gallery-image">';
        echo '<img src="./upload/' . htmlentities($row["gallery"]) . '" width="' . $imageWidth . '" height="' . $imageHeight . '" />';
        echo '</div>';

        // Display the description on hover
        echo '<div class="image-description">';
        echo htmlentities($row["description"]); // Replace "description" with the actual field name in your database
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
