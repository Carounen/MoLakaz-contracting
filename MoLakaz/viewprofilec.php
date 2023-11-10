<?php
require_once "./db/pdo.php";
require_once './functions/util.php';

session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $contractorId = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM contractor WHERE contractor_id = :contractorId");
    $stmt->bindValue(':contractorId', $contractorId, PDO::PARAM_INT);
    $stmt->execute();

    // Assuming the user_id is unique, so there should be only one record
    $contractor = $stmt->fetch(PDO::FETCH_ASSOC);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User registration Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="./images/icoo.ico">
  <link rel="stylesheet" href="./template/style2.css">
  <?php include_once("./template/csslinks.php"); ?>
  <script src="https://kit.fontawesome.com/8181027d18.js" crossorigin="anonymous"></script>
  <style>
    /* Custom CSS */
    .img-container {
        width: 200px; /* Adjust the width of the container as needed */
        height: 200px; /* Adjust the height of the container as needed */
        transition: transform 0.3s; /* Add smooth transition on hover */
    }

    .profile-img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* To make sure the image fills the container */
    }

    /* Add rounded corners to the image container */
    .rounded-circle {
        border-radius: 50%;
    }

    /* Add hover effect to the image */
    .img-container:hover {
        transform: scale(1.1); /* Increase the scale slightly on hover */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add a subtle shadow on hover */

        
    }
    .gallery-img {
        width: 100px; /* Adjust the width of the gallery photos as needed */
        height: 100px; /* Adjust the height of the gallery photos as needed */
        object-fit: cover; /* To make sure the image fills the container */
        margin: 5px; /* Add some spacing between the gallery photos */
    }
    .form-group:hover {
        background-color: #f8f9fa; /* Change the background color on hover */
    }

    .form-group:hover input[type="text"],
    .form-group:hover input[type="email"],
    .form-group:hover textarea {
        background-color: #fff; /* Change the input/textarea background color on hover */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Add a subtle shadow on hover */

        
    }
</style>
</head>
<body>
  <!-- Navbar -->
  <?php include_once("./template/header.php"); ?>
  <main class="col-md-7 offset-md-1 py-5">
    <div class="row mt-3">
        <div class="col-md-4">
            <!-- Display the profile image -->
            <div class="rounded-circle overflow-hidden border border-primary img-container">
                <img src="upload/<?php echo htmlentities($contractor["profile_img"]); ?>" class="img-fluid profile-img" alt="Profile Image">
            </div>        </div>
        <div class="col-md-8">
            <h3>Contractor Profile</h3>
            <form>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" value="<?php echo htmlentities($contractor["firstname"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" value="<?php echo htmlentities($contractor["lastname"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo htmlentities($contractor["email"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="4" readonly><?php echo htmlentities($contractor["description"]); ?></textarea>
                </div>

                <?php
                $contractorId = $contractor['contractor_id'];

                // Fetch portfolio details with associated gallery photos for the current contractor using a JOIN statement
                $stmt_portfolio = $pdo->prepare("
                SELECT * FROM portfolio WHERE contractor_id = :contractorId");
                $stmt_portfolio->bindValue(':contractorId', $contractorId, PDO::PARAM_INT);
                $stmt_portfolio->execute();
                $portfolio_items = $stmt_portfolio->fetchAll(PDO::FETCH_ASSOC);

                if ($portfolio_items) {
                    echo '<h4>Portfolio</h4>';
                    foreach ($portfolio_items as $portfolio_item) {
                        echo '<ul>';
                   
                        echo '<li><strong>Description:</strong> ' . htmlentities($portfolio_item['description']) . '</li>';
                        echo '<li>Photos:';
                        
                        if ($portfolio_item['gallery']) {
                            echo '<ul>';
                            echo '<li><img src="upload/' . htmlentities($portfolio_item['gallery']) . '" alt="Gallery Photo" class="gallery-img"></li>';
                            echo '</ul>';
                        } else {
                            echo ' No photos available.';
                        }

                        echo '</li>';
                        echo '</ul>';
                    }
                } else {
                    echo '<p>No portfolio items available.</p>';
                }
                ?>

                <button type="button" class="btn btn-primary" onclick="goBack()">Back</button>            </form>
        </div>
    </div>
</main>
  <!-- section 1 end-->
  <!-- Footer -->
  <?php include_once("./template/footer.php"); ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function goBack() {
        window.history.back();
    }
</script>
  
</body>
</html>
