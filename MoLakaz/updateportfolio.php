<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <?php include_once("./template/csslinks.php"); ?>
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

  <?php include_once("./template/header.php"); ?>
  <!-- Page Content -->
  
  <div class="container-fluid mt-5">
<div class="row">

<main class="col-md-7 offset-md-1 py-5">
<?php flashMessages(); ?>
<div class="row mt-3">
<h3>Update Portfolio</h3>
<table class="table table-dark table-hover table-striped w-75">
<thead>
<th>Description</th>
<th>gallery</th>
<th>date</th>
</thead>
<tbody>
<?php
   $stmt = $pdo->prepare('SELECT * FROM portfolio WHERE contractor_id = :coid');
   $stmt->execute(array(':coid' => $_SESSION["coid"]));
   
while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo ("<tr>");
echo "<td>" . htmlentities($rows['description']) . "</td>";
echo '<td><img src="../upload/' .
htmlentities($rows['gallery']) . '" width="50px" /></td>';
//the href should link to update.php
//add a querystring sid in the url referring to the column portfolio_id
echo ('<td><a class="btn btn-outline-warning"
href="update.php?sid=' . $rows["portfolio_id"] . '">Update</a> </td> ');
echo ("</tr>");
}
?>
</tbody>
</table>
</div>
</main>
</div>
</div>

  <!-- Footer -->

  <?php include_once("./template/footer.php"); ?>
  <!-- End footer --->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
