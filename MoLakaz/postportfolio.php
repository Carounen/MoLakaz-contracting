<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();


$stmt = $pdo->query("SELECT * FROM category");
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Add a name to the button
if (isset($_POST['btnadd'])) {
//     $msg = validateEventName();
$msg2 = validateFileUpPoster();
if (is_string($msg) || is_string($msg2)) {
$_SESSION['errormsg'] = $msg . " " . $msg2;
header("Location: postportfolio.php");
return;
}


//add the insert statement (tblstandtype)
$sql = "INSERT INTO portfolio (description, gallery, date, status, contractor_id, category_id) VALUES (:des, :gal, :date, :sts, :coid, :catid)";
$filename = $_FILES['fileposter']['name'];
$stmt = $pdo->prepare($sql);

// Add the parameters for each form field
$stmt->execute(
  array(
    ':des' => $_POST['txtdes'],
    ':gal' => $filename,
    ':date' => $_POST['txtsdt'],
    ':sts' => $_POST['txtstatus'],
    ':coid' => $_SESSION["coid"],
    ':catid' => $_POST['txtcat'] // assuming the category ID is obtained from the form field 'txtcat'
  )
);
move_uploaded_file($_FILES["fileposter"]["tmp_name"], "./upload/" . $filename);
//create a session variable “successmsg” to store "Stand added";
$_SESSION['successmsg'] = 'New portfolio Added';
//reload the current page
header('Location: postportfolio.php');
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
<h2 class="mt-3">Add Portfolio</h2>

<div class="mb-3">
  <label for="txtdes" class="form-label">Description</label>
  <textarea class="form-control" id="txtdes" name="txtdes"></textarea>
</div>

  <div class="mb-3">
<label for="fileposter" class="form-label">Upload work
Picture</label>
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
        <label for="txtcat" class="form-label">Category</label>
        <select class="form-select" id="txtcat" name="txtcat">
          <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category']; ?></option>
          <?php endforeach; ?>
        </select>
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
Add portfolio
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
