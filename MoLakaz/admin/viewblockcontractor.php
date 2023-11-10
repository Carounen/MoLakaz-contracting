<?php
require_once "../db/pdo.php";
require_once '../functions/util.php';
session_start();
if (!isset($_SESSION['adminid'])) {
  
  header("Location: ./index.php");

}
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
<?php flashMessages(); ?>
<div class="row mt-3">
<h3>Unblock User</h3>
<table class="table table-dark table-hover table-striped w-75">
<thead>
<th>Name</th>
<th>profile image</th>
<th>Action</th>
</thead>
<tbody>
<?php
$stmt = $pdo->query("SELECT * FROM contractor where status = 0");
while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo ("<tr>");
echo "<td>" . htmlentities($rows['firstname']) . "</td>";
echo '<td><img src="../upload/' .
htmlentities($rows['profile_img']) . '" width="50px" /></td>';
//the href should link to update.php
//add a querystring sid in the url referring to the column portfolio_id
echo '<form id="frmdel"
action="unblockcontra.php?sid=' . $rows["contractor_id"] .'" method="post">
<td><button type="submit" name="btndel"
class="col-12 btn btn-outline-success btn-lg mx-auto">
Unblock contractor
</button></td></tr>
</form>';
}
?>
</tbody>
</table>
</div>
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
