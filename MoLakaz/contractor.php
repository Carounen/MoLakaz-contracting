
<?php

require_once "./db/pdo.php";
require_once './functions/util.php';
require_once "./db/emailconfig.php";
session_start();


$fn = $_POST["txtfname"] ?? '';
$ln = $_POST["txtlname"] ?? '';
$em = $_POST["txtcemail"] ?? '';

$add = $_POST["txtaddress"] ?? '';
$pnum = $_POST["txtpnum"] ?? '';
$pass = $_POST["txtcpassword"] ?? '';


if (isset($_POST['btnaddevent'])) {


    $msg = validateFirstName();
    $msg2 = validateEmptyField($_POST["txtlname"], "Last name");
    $msg3 = validateEmptyField($_POST["txtaddress"], "Address");
    $msg5 = validateEmptyField($_POST["txtcemail"], "Email Address");
    $msg6 = validateEmptyField($_POST["txtcpassword"], "Password");
    $msg7 = validateNumericField($_POST["txtpnum"], "Mobile Number");
    $msg8 = validateFileProfilePic();

    if (is_string($msg) || is_string($msg2) || is_string($msg3)|| is_string($msg5) || is_string($msg6) || is_string($msg7) || is_string($msg8)) {
        $_SESSION['errormsg'] = $msg . " " . $msg2 . " " . $msg3. " " . $msg5. " " . $msg6. " " .$msg7. " " .$msg8;
        header("Location: userregis.php");
        return;
    }
// Check if email address already exists in the database
$stmt = $pdo->prepare("SELECT * FROM contractor WHERE email = :em");
$stmt->execute(array(":em" => $_POST['txtcemail']));
$srow = $stmt->fetch(PDO::FETCH_ASSOC);

if ($srow === false) {
    // Hash the password
    $check = ($_POST['txtcpassword']);

//add the insert statement
$sql = "insert into contractor (firstname,lastname,email,password,phonenumber,work_rating, profile_img,description, address) 
VALUES (:fname,:lname,:email,:pass,:pnum,:rate,:pimg,:descr,:addr)";
$filename = $_FILES['profilepic']['name'];
$stmt = $pdo->prepare($sql);
//add codes to retrieve the form values
$stmt->execute(
array(
':fname' => $_POST['txtfname'],
':lname' => $_POST['txtlname'],
':email' => $_POST['txtcemail'],
':pass' => $check,
':pnum' => $_POST['txtpnum'],
':rate' => $_POST['txtrate'],
':pimg' => $filename,
':descr' => $_POST['txtdesc'],
':addr' => $_POST['txtaddress']

)
);
move_uploaded_file($_FILES["profilepic"]["tmp_name"], "upload/" . $filename);
sendcEmail(); 
$_SESSION["successmsg"] = "Registered successfully";
header("refresh:3; url=logincontrac.php");
} else {
$_SESSION['errormsg'] = "Email already exists!";
header("Location: contractor.php");
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>contracto registration Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="./images/icoo.ico">
 <link rel="stylesheet" href="./template/style2.css">
 <?php include_once("./template/csslinks.php"); ?>
<script
      src="https://kit.fontawesome.com/8181027d18.js"
      crossorigin="anonymous"
    ></script>
 
</head>
<body>
  <!-- Navbar -->
  <?php include_once("./template/header.php"); ?>
<br>
  <!-- Page Content -->
  <h3> <?php flashMessages(); ?></h3>
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
                <input type="submit" class="account" href="login.php" value="Have an Account?">
            </div>
        </div>
        <h6 id="message-container">
    <?php
    // Flash pattern
    if (isset($error_message)) {
        echo '<p class="error-message">' . $error_message . '</p>';
        unset($error_message);
    }
    if (isset($success_message)) {
        echo '<p class="success-message">' . $success_message . '</p>';
        unset($success_message);
    }
    ?>
</h6>
        <form class="form-right" method="post" action="./contractor.php" enctype="multipart/form-data">
            <h2 class="text-uppercase">Register as Contractor</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="txtfname">First Name</label>
                    <input type="text" name="txtfname" id="txtfname"  value="<?=$fn?>" required="required">
                </div>
               
            </div>
            <div class="col-sm-6 mb-3">
                    <label for="txtlname">Last Name</label>
                    <input type="text" name="txtlname" id="txtlname"  value="<?=$ln?>" required="required">
                </div>
            <div class="mb-3">
                <label for="txtcemail">Your Email</label>
                <input type="text" name="txtcemail" id="txtcemail"  value="<?=$em?>" required="required">
            </div>
            <div class="mb-3">
                <label for="txtpnum">Your Phone Number</label>
                <input type="text" name="txtpnum" id="txtpnum" value="<?=$pnum?>" maxlength="8" required="required">
            </div>
            <div class="mb-3">
                <label for="txtaddress">Address</label>
                <input type="text" name="txtaddress" id="txtaddress"  size="40">
            </div>

            <div class="mb-3">
                <label for="txtrate">Rate yourself</label>
                <input type="text" name="txtrate" id="txtrate"  size="40">
            </div>
           
            <div class="mb-3">
                <label for="txtdesc">Description</label>
                <input type="text" name="txtdesc" id="txtdesc"  size="40">
            </div>

            <div class="form-outline mb-4">
        <label for="profilepic" style="color:white;" class="form-label">Choose a profile Picture</label>
        <input class="form-control" name="profilepic" type="file" id="profilepic" onchange="preview()">
        <button onclick="clearImage()" class="btn btn-primary mt-3">Clear</button>
      </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="txtcpassword">Password</label>
                    <input type="password" name="txtcpassword" id="txtcpassword" value="<?=$pass?>" required="required">
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
    
    // Add animation to the messages
    const messageContainer = document.getElementById('message-container');
    const messages = messageContainer.getElementsByTagName('p');
    
    for (let i = 0; i < messages.length; i++) {
        const message = messages[i];
        message.classList.add('animated-message');
    }
</script>
</body>
</html>
