
<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require_once "./db/pdo.php";
require_once './functions/util.php';
require_once "./db/emailconfig.php";
session_start();






if (isset($_POST['btnaddevent']))  {
 
  
        // Check if email address already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM organization WHERE email = :em");
    $stmt->execute(array(":em" => $_POST['txtemail']));
    $srow = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($srow === false) {
        // Hash the password
        $check = hash('md5', $_POST['txtpass']);
        
        // Insert the record into the database
        $sql = "insert into organization (org_name,email,password,phone_number) VALUES (:fname, :email, :pass, :pnum)";
    
        $stmt = $pdo->prepare($sql);
        $stmt->execute(
            array(
                ':fname' => $_POST['txtfname'],
               
                ':email' => $_POST['txtemail'],
                ':pass' => $check,
                ':pnum' => $_POST['txtpnum'],
              
            )
        );
        
        // Move the uploaded file to the desired directory
        
        sendoEmail();
        $_SESSION["successmsg"] = "Registered successfully";
        header("refresh:3; url=orglogin.php");
    } else {
        $_SESSION['errormsg'] = "Email already exists!";
        header("Location: orgregis.php");
    }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organisation Registration Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
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
  </nav>
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

        <form class="form-right" method="post" action="./orgregis.php">
            <h2 class="text-uppercase">Register as Organisation</h2>
            <h1>
  
    </h1>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Name</label>
                    
                    <input type="text" name="txtfname" id="txtfname" for="txtfname"  size="40" required="required">
                </div>
               
            </div>
            <div class="mb-3">
                <label>Your Email</label>
                <input type="text" name="txtemail" id="txtemail" for="txtemail"  size="40" required="required">
            </div>
            <div class="mb-3">
                <label>Your Phone Number</label>
                <input type="text" name="txtpnum" id="txtpnum" for="txtpnum" size="40" required="required">
            </div>
            
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <input type="password" name="txtpass" id="txtpass" for="txtpass" size="40" required="required">
                </div>
                
            </div>

            <div class="col-sm-6 mb-3">
                    <label>Current Password</label>
                    <input type="password" name="cpassword" id="cpassword"  size="40" required="required">
                </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox"  name="class1">
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
