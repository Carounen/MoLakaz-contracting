<?php
require_once "./db/pdo.php";
require_once './functions/util.php';
require_once "./db/emailconfig.php";
session_start();

$fn = $_POST["txtfname"] ?? '';
$ln = $_POST["txtlname"] ?? '';
$em = $_POST["txtemail"] ?? '';

$add = $_POST["txtaddress"] ?? '';
$pnum = $_POST["txtpnum"] ?? '';
$pass = $_POST["txtpass"] ?? '';

if (isset($_POST['btnaddevent'])) {
    $msg = validateFirstName();
    $msg2 = validateEmptyField($_POST["txtlname"], "Last name");
    $msg3 = validateEmptyField($_POST["txtaddress"], "Address");
    $msg5 = validateEmptyField($_POST["txtemail"], "Email Address");
    $msg6 = validateEmptyField($_POST["txtpass"], "Password");
    $msg7 = validateNumericField($_POST["txtpnum"], "Mobile Number");
    $msg8 = validateFileProfilePic();

    if (is_string($msg) || is_string($msg2) || is_string($msg3)|| is_string($msg5) || is_string($msg6) || is_string($msg7) || is_string($msg8)) {
        $_SESSION['errormsg'] = $msg . " " . $msg2 . " " . $msg3. " " . $msg5. " " . $msg6. " " .$msg7. " " .$msg8;
        header("Location: userregis.php");
        return;
    }

    // Check if email address already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :em");
    $stmt->execute(array(":em" => $_POST['txtemail']));
    $srow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($srow === false) {
        // Hash the password
        $check = hash('md5', $_POST['txtpass']);
        
        // Insert the record into the database
        $sql = "INSERT INTO user (firstname, lastname, email, password, phone_number, profile_image, address) VALUES (:fname, :lname, :email, :pass, :pnum, :filen, :addr)";
        $filename = $_FILES['profilepic']['name'];
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            array(
                ':fname' => $_POST['txtfname'],
                ':lname' => $_POST['txtlname'],
                ':email' => $_POST['txtemail'],
                ':pass' => $check,
                ':pnum' => $_POST['txtpnum'],
                ':filen' => $filename,
                ':addr' => $_POST['txtaddress']
            )
        );
        
        // Move the uploaded file to the desired directory
        move_uploaded_file($_FILES["profilepic"]["tmp_name"], "upload/" . $filename);
        sendEmail();
        
        $_SESSION["successmsg"] = "Registered successfully";
        header("refresh:3; url=login.php");
    } else {
        $_SESSION['errormsg'] = "Email already exists!";
        header("Location: userregis.php");
    }
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
  <?php include_once("./template/csslinks.php"); ?>
  <script src="https://kit.fontawesome.com/8181027d18.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navbar -->
  <?php include_once("./template/header.php"); ?>
  <br>

  <!-- Page Content -->
  <h3><?php flashMessages(); ?></h3>
  <div class="wrapper">
    <div class="form-left">
      <h2 class="text-uppercase">information</h2>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et molestie ac feugiat sed. Diam volutpat commodo.
      </p>
      <p class="text">
        <span>Sub Head:</span>
        Vitae auctor eu augudsf ut. Malesuada nunc vel risus commodo viverra. Praesent elementum facilisis leo vel.
      </p>
      <div class="form-field">
        <a class="account" href="login.php">Have an Account?</a>
      </div>
    </div>
    <h6 id="message-container"></h6>
    <form class="form-right" method="post" action="./userregis.php" enctype="multipart/form-data">
      <h2 class="text-uppercase">Register as a User</h2>
      <div class="row">
        <div class="col-sm-6 mb-3">
          <label for="txtfname">First Name</label>
          <input type="text" name="txtfname" id="txtfname" value="<?=$fn?>" required="required">
        </div>
        <div class="col-sm-6 mb-3">
          <label for="txtlname">Last Name</label>
          <input type="text" name="txtlname" id="txtlname" value="<?=$ln?>" required="required">
        </div>
      </div>
      <div class="mb-3">
        <label for="txtemail">Your Email</label>
        <input type="text" name="txtemail" id="txtemail" value="<?=$em?>" required="required">
      </div>
      <div class="mb-3">
        <label for="txtpnum">Your Phone Number</label>
        <input type="text" name="txtpnum" id="txtpnum" value="<?=$pnum?>" maxlength="8" required="required">
      </div>
      <div class="mb-3">
        <label for="txtaddress">Address</label>
        <input type="text" name="txtaddress" id="txtaddress" value="<?=$add?>" required="required">
      </div>
      <div class="form-outline mb-4">
        <label for="profilepic" style="color:white;" class="form-label">Choose a profile Picture</label>
        <input class="form-control" name="profilepic" type="file" id="profilepic" onchange="preview()">
        <button onclick="clearImage()" class="btn btn-primary mt-3">Clear</button>
      </div>
      <div class="row">
        <div class="col-sm-6 mb-3">
          <label for="txtpass">Password</label>
          <input type="password" name="txtpass" id="txtpass" value="<?=$pass?>" required="required">
        </div>
      </div>
      <div class="col-sm-6 mb-3">
        <label>Current Password</label>
        <input type="password" name="cpassword" id="inp01" size="40">
      </div>
      <div class="mb-3">
        <label class="option">I agree to the <a href="#">Terms and Conditions</a>
          <input type="checkbox" checked>
          <span class="checkmark"></span>
        </label>
      </div>
      <div class="form-field">
        <input type="submit" value="Register" class="register" name="btnaddevent">
      </div>
    </form>
  </div>

  <!-- section 1 end-->
  <!-- Footer -->
  <?php include_once("./template/footer.php"); ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function preview() {
      frame.src = URL.createObjectURL(event.target.files[0]);
    }
    function clearImage() {
      document.getElementById('profilepic').value = null;
      frame.src = "";
    }
  </script>
</body>
</html>
