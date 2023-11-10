<?php
session_start();
require_once "./db/pdo.php";
require_once './functions/util.php';

$portfolioId = $_GET['portfolio_id'] ?? '';
$contractorId = $_GET['contractor_id'] ?? '';





//Add a name to the button
if (isset($_POST['btnadd'])) {

  
 
  
  
  $description = $_POST['txtcat'];
  $portfolioId = $_POST['portfolio_id'];
  $contractorId = $_POST['contractor_id'];
  
  // Retrieve the user ID from the session
  $userId = $_SESSION["cid"];
  
  // Prepare the SQL statement
  $sql = "INSERT INTO askquotation (description, portfolioid, contractorid,userid) VALUES (:description, :portfolioId, :contractorId,:userId)";

  $stmt = $pdo->prepare($sql);

  // Bind the parameters
  $stmt->bindParam(':userId', $userId);
  $stmt->bindParam(':description', $description);
  $stmt->bindParam(':portfolioId', $portfolioId);
  $stmt->bindParam(':contractorId', $contractorId);
  
  // Execute the statement
  $stmt->execute();
  
  // Redirect to a success page or perform any other actions
  $_SESSION['successmsg'] = 'Quotation asked successfully';
  header('Location: index.php');
  return;
  }




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <?php include_once("./template/csslinks.php"); ?>
  <script src="https://kit.fontawesome.com/8181027d18.js" crossorigin="anonymous"></script>
  <style>
    /* Styles here */
  </style>
</head>
<body>
  <!-- Navbar -->
  <?php include_once("./template/header.php"); ?>

  <br>
  <!-- Page Content -->
  <form id="frmadd" class="row g-3" method="post" enctype="multipart/form-data">
  <h2 class="mt-3">Ask quotation</h2>

  <div class="col-md-6" style="display:none">
    <label for="portfolio_id">Portfolio ID:</label>
    <input type="text" name="portfolio_id" id="portfolio_id" value="<?php echo $portfolioId; ?>" readonly class="form-control">
  </div>

  <div class="col-md-6" style="display:none">
    <label for="contractor_id">Contractor ID:</label>
    <input type="text" name="contractor_id" id="contractor_id" value="<?php echo $contractorId; ?>" readonly class="form-control">
  </div>

  <div class="col-12">
    <label for="txtcat" class="form-label">Description</label>
    <textarea class="form-control" id="txtcat" name="txtcat" rows="4" required="required"></textarea>
  </div>

  <div class="col-12">
    <button type="submit" name="btnadd" class="btn btn-primary btn-lg" required="required">Ask</button>
  </div>
</form>


<br>
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
