<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();




//Add a name to the button
if (isset($_POST['btnadd'])) {
//     $msg = validateEventName();
$msg2 = validateFileUpPoster();
if (is_string($msg2)) {
$_SESSION['errormsg'] = $msg2;
header("Location: postadvert.php");
return;
}

//add the insert statement (tblstandtype)
$status = 0; // Set the status to 0

$sql = "INSERT INTO advertisement (name, date, advert_image, status, org_id) VALUES (:na, :date, :aim, :sts, :oid)";
$filename = $_FILES['fileposter']['name'];
$stmt = $pdo->prepare($sql);

// Add the parameters for each form field
$stmt->execute(
  array(
    ':na' => $_POST['txtcat'],
    ':date' => $_POST['txtsdt'],
    ':aim' => $filename,
    ':sts' => $status, // Use the variable directly
    ':oid' => $_SESSION["oid"]
  )
);
move_uploaded_file($_FILES["fileposter"]["tmp_name"], "./upload/" . $filename);
//create a session variable “successmsg” to store "Stand added";
$_SESSION['successmsg'] = 'New Avert Added wait for confirmation';
//reload the current page
header('Location: postadvert.php');
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
<h2 class="mt-3">Add Advert</h2>

<div class="mb-3">
  <label for="txtcat" class="form-label">Description</label>
  <textarea class="form-control" id="txtcat" name="txtcat"></textarea>
</div>

  <div class="mb-3">
<label for="fileposter" class="form-label">Upload Picture</label>
<input class="form-control form-control-lg" id="fileposter"
name="fileposter" type="file" />
</div>

<div class="mb-3">
<label for="txtsdt" class="form-label">Start Date &
Time</label>
<input type="datetime-local" class="form-control" id="txtsdt"
name="txtsdt" />
</div>



<div class="mb-3">
  <label class="form-label">Status</label>
  <div class="form-check">
    <input type="hidden" name="txtstatus" value="0" />
    <input class="form-check-input" type="checkbox" id="txtstatus" name="txtstatus" value="1" />
    <label class="form-check-label" for="txtstatus">
      Active
    </label>
  </div>
</div>



<button type="submit" name="btnadd"
class="col-12 btn btn-primary btn-lg mx-auto">
Add
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
