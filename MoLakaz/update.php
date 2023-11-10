<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();
if (isset($_POST['btncancel'])) {
    header('Location: updateportfolio.php');
    return;
    }
    //add code to check if the url contains the token “sid”
    if (!isset( $_GET["sid"] )) {
    $_SESSION['errormsg'] = "Missing portfolio id";
    header('Location: updateportfolio.php');
    return;
    }
    //add code to search tblstandtype by id
    $stmt = $pdo->prepare("select * from portfolio where portfolio_id=:stid");
    //retrieve sid token from url and store in parameter
    $stmt->execute(array(":stid" => $_GET["sid"]));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //check if $row is strictly false
    if ($row===false ) {
    $_SESSION['errormsg'] = 'Incorrect id';
    header('Location: updateportfolio.php');
    return;
    } else {
    $stypename = htmlentities($row['description']);
    $fn = htmlentities($row['gallery']);
    }
    if (isset($_POST['btnupdate']) && isset($_POST['txtportfolio'])) {
    $msg = validateportfolio();
    $msg2 = validateFileUp();
    if (is_string($msg) || is_string($msg2)) {
    $_SESSION['errormsg'] = $msg . " " . $msg2;
    header("Location: update.php?sid=" . $row['portfolio_id']);
    return;
    }
    //add the update statement for all the attributes
    $sql = "update portfolio set description=:st, gallery=:sp where portfolio_id=:stid";
    $filename = $_FILES['filestandpic']['name'];
    $stmt = $pdo->prepare($sql);
    //retrieve the form values and store in the parameters
    $stmt->execute(
    array(
    ':st' => $_POST['txtportfolio'],
    
    ':sp' => $filename,
    ':stid' => $_GET["sid"]
    )
    );
    move_uploaded_file($_FILES["filestandpic"]["tmp_name"], "../upload/" .
    $filename);
    $_SESSION["successmsg"] = "portfolio Updated";
    header('Location: updateportfolio.php');
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
<?php flashMessages(); ?>
<form id="frmadd" class="row" method="post"
enctype="multipart/form-data">
<h2 class="mt-3">Update Portfolio</h2>
<div class="col-md-6 pt-5">
<div class="mb-3">
<label for="txttitle" class="form-label">Description</label>
<input type="text" class="form-control" name="txtportfolio"
id="txtportfolio" value="<?= $stypename ?>" />
</div>
<div class="mb-3">
<label for="filecover" class="form-label">Upload portfolio</label>
<input class="form-control form-control-lg" id="filestandpic"
name="filestandpic" type="file" />
<?php
echo '<p><img id="blah" src="../upload/' . $fn . '"
width="100px" /></p>';
?>
</div>
<button type="submit" name="btnupdate"
class="col-12 btn btn-primary btn-lg mx-auto">
Update portfolio
</button>
<p></p>
<button type="submit" name="btncancel"
class="col-12 btn btn-primary btn-lg mx-auto">
Cancel
</button>
</div>
</form>
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
