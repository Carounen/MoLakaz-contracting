<?php
require_once './functions/util.php';
session_start();

$em = $_POST["email"] ?? '';
$pw = $_POST["password"] ?? '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['dopost'])) {
        $msg1 = validateEmptyField($_POST["email"], "Email");
        $msg2 = validatelengthField($_POST["password"], "Password");
 
if (is_string($msg1) || is_string($msg2)) {
$error_message = $msg1 . " " . $msg2;
} else {
$success_message = "All good";

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
        <form class="back" method="post" action="./loginorg.php" onsubmit="return remem()">
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
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg" value="<?=$em?>"
              placeholder="Enter a valid email address" />
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg" value="<?=$pw?>"
              placeholder="Enter password" />
            <label class="form-label" for="form3Example4">Password</label>
          </div>
          <<button type="button" id="btnUnhide" class="btn btn-outline-primary btn-sm mt-2" onclick="togglePasswordVisibility()">
  Unhide
</button>
          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mt-3">
<input class="form-check-input" type="checkbox" value="" id="chkrem">
<label class="form-check-label" for="chkrem">
Remember Me
</label>
</div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
          <input type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;" name="dopost" value="Submit" />
            
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
  <script src="../js/mylib.js"></script>
  <script>
    // Add animation to the messages
    const messageContainer = document.getElementById('message-container');
    const messages = messageContainer.getElementsByTagName('p');
    
    for (let i = 0; i < messages.length; i++) {
        const message = messages[i];
        message.classList.add('animated-message');
    }
</script>
<script>
  function togglePasswordVisibility() {
    var passwordInput = document.getElementById('txtpass');
    var unhideButton = document.getElementById('btnUnhide');

    if (passwordInput.type === 'password') {
      // If the password is hidden, unhide it
      passwordInput.type = 'text';
      unhideButton.textContent = 'Hide';
    } else {
      // If the password is visible, hide it
      passwordInput.type = 'password';
      unhideButton.textContent = 'Unhide';
    }
  }
</script>
</body>
</html>
