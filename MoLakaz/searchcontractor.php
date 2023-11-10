<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();

if (isset($_POST['btncancel'])) {
    header('Location: searchcontractor.php');
    return;
    }
    
    if (isset($_POST['txtcat'])) {
    //call the validateEventName function
    $msg = validateEventName() ;
    if (is_string($msg)) {
    $_SESSION['errormsg'] = $msg;
    header("Location: searchcontractor.php");
    return;
    }
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
  <div class="container-fluid mt-5">
<div class="row">

<main class="col-md-7 offset-md-1 py-5">
    <?php flashMessages(); ?>
<div class="row">
<div class="col-md-6 border border-2">
<form id="frmsearchstand" method="post" enctype="multipart/form-
data">
<h2 class="mt-3">Search Contractor</h2>
<div class="mb-3">
<label for="txttitle" class="form-label">Name</label>
<input type="text" class="form-control" name="txtcat"
id="txtcat" />
</div>

<button type="submit" name="btnsearch" class="col-12 btn btn-
primary btn-lg mx-auto">
Search contractor
</button>
<p></p>
<button type="submit" name="btncancel" class="col-12 btn btn-
primary btn-lg mx-auto">
Cancel
</button>
</form>
</div>
<div class="col-md-5 offset-md-1 border border-2">
<h3 class="mt-3">Contractor Listing</h3>
<table class="table table-dark table-hover table-striped w-100">
<thead>
<th>category</th>

</thead>
<tbody>

<?php
//verify if the textbox has not been set
if (!isset($_POST["txtcat"] )) {
//add the sql to read the table tblstandtype
$stmt = $pdo->query("select * from contractor");
} else {

//add the sql to search the table by standtype
$stmt = $pdo->prepare("select * from contractor where firstname = :stname ");
//retrieve the textbox value
$stmt->execute(array(":stname" => $_POST["txtcat"]));
}
while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
echo ("<tr>");
//add the attribute names
echo "<td>" . htmlentities($rows["firstname"]) . "</td>";

echo ("</tr>");
}
?>

</tbody>
</table>
</div>
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
