<?php
session_start();
require_once "./db/pdo.php";
require_once './functions/util.php';
require_once "./db/emailconfig.php";

$stmt = $pdo->prepare("SELECT firstname,email from user WHERE user_id = :user");

  //retrieve the textbox value
  $stmt->execute(array(":user" => $_SESSION['cid']));
  while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
    // populate the email in the input field
    $email = $rows['email'];
    $user = $rows['firstname'];
}

if (isset($_GET['contractor_id']) && isset($_GET['proceed_id']) && isset($_GET['quotation'])) {
    $contractor_id = $_GET['contractor_id'];
    $proceed_id = $_GET['proceed_id'];
    $quo = $_GET['quotation'];
}
$d = new DateTime('now');
$d->setTimezone(new DateTimeZone('GMT+4'));
//$datetime = $d->format('Y-m-d H:i:s');
$date = $d->format('Y-m-d');
if (isset($_POST['btnadd'])) {
    $date = $_POST['date'];
    $details = $_POST['details'];
    $amount = $_POST['txtamount'];
    $juice = $_POST['txtref'];
    $portfolioId = $_POST['proceed_id'];
    $contractorId = $_POST['contractor_id'];

    // Retrieve the user ID from the session
    $userId = $_SESSION["cid"];

    // Prepare the SQL statement
    $sql = "INSERT INTO payment (date, detail, amount, juiceref, proceed_id, contractor_id, user_id) VALUES (:date, :description, :amount, :ref, :proceedId, :contractorId, :userId)";
    $stmt = $pdo->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':description', $details);
    $stmt->bindParam(':amount', $quo);
    $stmt->bindParam(':ref', $juice);
    $stmt->bindParam(':proceedId', $portfolioId);
    $stmt->bindParam(':contractorId', $contractorId);

    // Execute the statement
    $stmt->execute();
    sendPayEmail();
    // Redirect to a success page or perform any other actions
    $_SESSION['successmsg'] = 'Payment Done';
    header('Location: index.php');
    return;
}

if (isset($_GET['contractor_id']) && isset($_GET['proceed_id'])) {
    $contractor_id = $_GET['contractor_id'];
    $proceed_id = $_GET['proceed_id'];

    // Prepare the update SQL statement
    $updateStatusSql = "UPDATE proceed SET status = 0 WHERE proceed_id = :proceedId";
    $updateStatusStmt = $pdo->prepare($updateStatusSql);
    $updateStatusStmt->bindParam(':proceedId', $proceed_id); // Use $proceed_id here

    // Execute the update statement
    $updateStatusStmt->execute();
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
        #frmadd {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #frmadd h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        #frmadd .form-label {
            font-weight: bold;
        }

        #frmadd .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        #frmadd textarea.form-control {
            resize: vertical; /* Allow vertical resizing of textareas */
        }

        #frmadd .btnadd {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #frmadd .btnadd:hover {
            background-color: #0056b3;
        }
      /* Styles here */
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <?php include_once("./template/header.php");?>
    
    <br>
    <!-- Page Content -->
    <form id="frmadd" class="row g-3" method="post" enctype="multipart/form-data">
    <h2 class="mt-3">Payment</h2>
  
    <input type="hidden" name="contractor_id" value="<?php echo $contractor_id; ?>">
    <input type="hidden" name="proceed_id" value="<?php echo $proceed_id; ?>">
    <div class="col-12">
  <label for="date" class="form-label">Date</label>
  <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
</div>

<div class="mb-3" style="display:none;">
    <label for="email">Your Email</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
</div>

<div class="mb-3" style="display:none;">
    <label for="firstname">username</label>
    <input type="text" name="firstname" id="firstname" value="<?php echo $user; ?>">
</div>
  
    <div class="col-12">
      <label for="details" class="form-label">Details</label>
      <textarea class="form-control" id="details" name="details" rows="4" required="required"></textarea>
    </div>
    <div class="mb-3" style="display:none;">
    <label for="txtamount">Amount</label>
    <input type="readonly" name="txtamount" id="txtamount" value="<?php echo $quo; ?>">
</div>
    <div class="col-12">
      <label for="txtref" class="form-label">Juice ref</label>
      <textarea class="form-control" id="txtref" name="txtref" rows="4" required="required"></textarea>
    </div>
  
    <div class="col-12">
      <button type="submit" name="btnadd" class="btn btn-primary btn-lg" required="required">Make payment</button>
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
  