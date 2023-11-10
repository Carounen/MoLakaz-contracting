<?php
require_once "../db/pdo.php";
require_once '../functions/util.php';
session_start();
if (!isset($_SESSION['adminid'])) {
  header("Location: ./index.php");
  exit();
}

if (isset($_POST['btnaddevent'])) {
  $msg = validateEventName();

  if (is_string($msg)) {
      $_SESSION['errormsg'] = $msg;
      header("Location: createcategory.php");
      exit();
  }

  $category = $_POST['txtcat'];

  // Check if the category already exists in the database
  $check_sql = "SELECT * FROM category WHERE category = :cat";
  $check_stmt = $pdo->prepare($check_sql);
  $check_stmt->execute(array(':cat' => $category));

  if ($check_stmt->rowCount() > 0) {
      $_SESSION['errormsg'] = "Category already exists.";
      header("Location: createcategory.php");
      exit();
  }

  // If the category does not exist, perform the insertion
  $sql = "INSERT INTO category (category) VALUES (:cat)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':cat' => $category));

  $_SESSION["successmsg"] = "Category added";
  header('Location: createcategory.php');
  exit();
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
  
  
  <main class="col-md-7 offset-md-1 py-5">

<h3> <?php flashMessages(); ?></h3>
<form id="frmadd" class="row" method="post"
enctype="multipart/form-data">
<h2 class="mt-3">Add category</h2>
<div class="col-md-6 pt-5">
<div class="mb-3">
<label for="txtcat" class="form-label">Category</label>
<input type="text" class="form-control" name="txtcat"
id="txtcat" />
</div>
<button type="submit" name="btnaddevent"
class="col-12 btn btn-primary btn-lg mx-auto">
Add category
</button>
<p></p>

</form>
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
