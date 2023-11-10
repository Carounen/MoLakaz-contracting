<?php
session_start();
require_once "./db/pdo.php";
require_once './functions/util.php';

// Check if the user is logged in
if (!isset($_SESSION["cid"])) {
    // Redirect to the login page or any other appropriate page
    header('Location: login.php');
    exit;
}

$userId = $_SESSION["cid"];
?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $categoryName; ?> Gallery</title>
    
    <?php include_once("./template/csslinks.php"); ?>
  </head>
  <body>
    <!-- Navbar -->
    <?php include_once("./template/header.php"); ?>
    <!-- Page Content -->
    <div class="container">
    <h2 class="mt-3">Payment Records</h2>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Details</th>
                        <th>Amount</th>
                        <th>Juice ref</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Prepare the SQL statement
                    $sql = "SELECT date, detail, amount, juiceref FROM payment WHERE user_id = :userId";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':userId', $userId);

                    // Execute the statement
                    $stmt->execute();

                    // Fetch all payment records for the user
                    $payments = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    // Display each payment record in a table row
                    foreach ($payments as $payment) {
                        echo '<tr>';
                        echo '<td>' . $payment['date'] . '</td>';
                        echo '<td>' . $payment['detail'] . '</td>';
                        echo '<td>' . $payment['amount'] . '</td>';
                        echo '<td>' . $payment['juiceref'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!-- Footer -->
    <?php include_once("./template/footer.php"); ?>
    <!-- End footer -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/lightbox.js"></script>
    <script>
  lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'clickOutsideToClose': true // Add this line to enable click outside to close
  })
</script>
  </body>
  </html>