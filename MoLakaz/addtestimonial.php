<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();
checkUserAuth();

$stmt = $pdo->query("SELECT * FROM category");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Add a name to the button
if (isset($_POST['btnadd'])) {
//     $msg = validateEventName();



$status = 0;
//add the insert statement (tblstandtype)
$sql = "INSERT INTO testimonial (testimonial, date, rating, status, user_id) VALUES (:tes, :date, :rat, :sts, :cid)";

$stmt = $pdo->prepare($sql);

// Add the parameters for each form field
$stmt->execute(
  array(
    ':tes' => $_POST['txtcat'],

    ':date' => $_POST['txtsdt'],
    ':sts' => $status,
    ':cid' => $_SESSION["cid"],
    ':rat' => $_POST['txtrat'] // assuming the category ID is obtained from the form field 'txtcat'
  )
);

//create a session variable “successmsg” to store "Stand added";
$_SESSION['successmsg'] = 'New Testimonial Added, waiting for admin to approve';
//reload the current page
header('Location: addtestimonial.php');
return;
}
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
  
  <main class="col-md-7 offset-md-1 py-5">
<h3><?php flashMessages();  ?> </h3>
<form id="frmadd" class="row" method="post"
enctype="multipart/form-data">
<h2 class="mt-3">Add Testimonial</h2>

<div class="mb-3">
  <label for="txtcat" class="form-label">Testimonial</label>
  <textarea class="form-control" id="txtcat" name="txtcat"></textarea>
</div>


<div class="mb-3">
<label for="txtsdt" class="form-label">Date</label>
<input type="datetime-local" class="form-control" id="txtsdt"
name="txtsdt" />
</div>

<div class="mb-3">
  <label for="txtrat" class="form-label">Rating</label>
  <textarea class="form-control" id="txtrat" name="txtrat"></textarea>
</div>


<div class="mb-3">
  <label class="form-label">Status</label>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="txtstatus" name="txtstatus" />
    <label class="form-check-label" for="txtstatus">
      Active
    </label>
  </div>
</div>



<button type="submit" name="btnadd"
class="col-12 btn btn-primary btn-lg mx-auto">
Add Testimonial
</button>
</form>
</main>


  <!-- Footer -->

  <?php include_once("./template/footer.php"); ?>
  <!-- End footer --->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
