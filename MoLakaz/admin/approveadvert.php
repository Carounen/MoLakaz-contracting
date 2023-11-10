<?php
require_once "../db/pdo.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <?php include_once("../template/csslinksadmin.php"); ?>
  <!-- <style>
* {
  outline: 1px solid #f00 !important;
}
    </style> -->

<script
      src="https://kit.fontawesome.com/8181027d18.js"
      crossorigin="anonymous"
    ></script>
  
</head>
<body>
  <!-- Navbar -->

  <?php include_once("../template/adminheader.php"); ?>
  <!-- Page Content -->
  <div class="container-fluid mt-5">
<div class="row">

<main class="col-md-7 offset-md-1 py-5">
<div class="row mt-3">
<h3>Advert Listing</h3>

<?php
// Retrieve data from the database by joining the organization and advertisement tables
$stmt = $pdo->query("SELECT o.org_name, a.advert_id, a.name, a.date, a.advert_image, a.status
    FROM organization o
    JOIN advertisement a ON o.org_id = a.org_id WHERE a.status = 0");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $orgName = htmlentities($row['org_name']);
    $advertId = htmlentities($row['advert_id']);
    $name = htmlentities($row['name']);
    $date = htmlentities($row['date']);
    $advertImage = htmlentities($row['advert_image']);
    ?>
 <div class="card">
        <img src="../upload/<?php echo $advertImage; ?>" class="card-img-top" style="max-height: 500px;" alt="advertisement image">

        <div class="card-body">
            <h5 class="card-title"><?php echo $orgName; ?></h5>
            <p class="card-text"><?php echo $name; ?></p>
            <p class="card-text"><?php echo $date; ?></p>

            <form action="../approve_advertisement.php" method="GET">
                <input type="hidden" name="advert_id" value="<?php echo $advertId; ?>">
                <button type="submit" class="btn btn-primary">Approve</button>
            </form>
        </div>
    </div>

<?php
}
?>

</main>
</div>
</div>

  <!-- Footer -->

  <?php include_once("../template/footeradmin.php"); ?>
  <!-- End footer --->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
