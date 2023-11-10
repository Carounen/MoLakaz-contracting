<?php session_start();
require_once "./db/pdo.php";
require_once './functions/util.php';



if (isset($_SESSION["oid"])) {
  header("Location: index.php");
  }


  if (isset($_POST['btnlogin']) && isset($_POST["txtemail"]) &&
  isset($_POST["txtpass"])) {
  // delete any previously defined session variable
  unset($_SESSION["email"]);
  $msg = validateEmail();
  $msg2 = validatePass();
  
  if (is_string($msg) || is_string($msg2)) {
  $_SESSION['errormsg'] = "$msg <br/> $msg2";
  header('Location: login.php');
  return;
  } else {
  //encrypt password
  $check = hash('md5', $_POST['txtpass']);
  //add a where clause to check whether there is a matching email and password
  $stmt = $pdo->prepare('SELECT org_id, org_name FROM organization WHERE email = :em AND password = :pw AND status = 1');
  $stmt->execute(array(':em' => $_POST['txtemail'], ':pw' => $check));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($row !== false) {
  $_SESSION["successmsg"] = "Logged in.";
  //create two more session variables fn and cid
  $_SESSION["fn"] = $row["org_name"];
  $_SESSION["oid"] = $row["org_id"];
  //to store the first name and client_id
  //redirect user to updateprofile
  header("Location: index.php");
  //send error messages to apache log file
  ("Login successful for " . $_POST['txtemail']);
  return;
  } else {
  $_SESSION["errormsg"] = "Incorrect credentials, please try again!";
  header('Location: orglogin.php');
  //send error messages to apache log file
  error_log("Login failed " . $_POST['txtemail'] . " $check");
  return;
  }
  }
  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

  <?php include_once("./template/csslinks.php"); ?>
  <script
      src="https://kit.fontawesome.com/8181027d18.js"
      crossorigin="anonymous"
    ></script>
  <style>
    .error-message {
        color: red;
      
    }

    .success-message {
        color: green;
       
    }
    
    .animated-message {
        animation-name: fade;
        animation-duration: 2s;
        animation-fill-mode: forwards;
    }
    
    @keyframes fade {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
</head>
<body>
  <!-- Navbar -->
  <?php include_once("./template/header.php"); ?>

<br>
  <!-- Page Content -->
  
  <section class="vh-100">
    <br>
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./images/log.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
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
<form id="frmlogin" method="post" enctype="multipart/form-data">
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
            <i class="fab fa-facebook"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="txtemail" name="txtemail" class="form-control form-control-lg" 
              placeholder="Enter a valid email address" />
            <label class="form-label" for="txtemail">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="txtpass" name="txtpass" class="form-control form-control-lg" 
              placeholder="Enter password" />
            <label class="form-label" for="txtpass">Password</label>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
          <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="btnlogin" value="Submit" />
            
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
 
</section>
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
