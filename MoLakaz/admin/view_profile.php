<?php
require_once "../db/pdo.php";
require_once '../functions/util.php';

session_start();

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $userId = $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM user WHERE user_id = :userId");
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();

    // Assuming the user_id is unique, so there should be only one record
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Now you have the $user array containing all user information
        // You can display the user information here as needed
        // For example:
        // echo '<h1>User Profile</h1>';
        // echo '<p>Name: ' . htmlentities($user['firstname'] . ' ' . $user['lastname']) . '</p>';
        // echo '<p>Email: ' . htmlentities($user['email']) . '</p>';
        // echo '<p>Description: ' . htmlentities($user['description']) . '</p>';
        // Add other user details you want to display
    } else {
        // Handle the case when the user with the given ID is not found
        echo '<p>User not found.</p>';
    }
} else {
    // Handle the case when no user ID is provided in the URL
    echo '<p>Invalid user ID.</p>';
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
  <?php include_once("../template/csslinks.php"); ?>
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
  <?php include_once("../template/adminheader.php"); ?>
  <main class="col-md-7 offset-md-1 py-5">
    <div class="row mt-3">
        <div class="col-md-4">
            <!-- Display the profile image -->
            <div class="rounded-circle overflow-hidden border border-primary img-container">
                <img src="upload/<?php echo htmlentities($user["profile_image"]); ?>" class="img-fluid profile-img" alt="Profile Image">
            </div>        </div>
        <div class="col-md-8">
            <h3>User Profile</h3>
            <form>
                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" value="<?php echo htmlentities($user["firstname"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" value="<?php echo htmlentities($user["lastname"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo htmlentities($user["email"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="4" readonly><?php echo htmlentities($user["description"]); ?></textarea>
                </div>
                <button type="button" class="btn btn-primary" onclick="goBack()">Back</button>            </form>
        </div>
    </div>
</main>
  <!-- section 1 end-->
  <!-- Footer -->
  <?php include_once("../template/footeradmin.php"); ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function goBack() {
        window.history.back();
    }
</script>
  
</body>
</html>
