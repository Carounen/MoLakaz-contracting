<?php
require_once "./db/pdo.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <?php include_once("./template/csslinks.php"); ?>
  <script src="https://kit.fontawesome.com/8181027d18.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Navbar -->
  <?php include_once("./template/header.php"); ?>
  
  <!-- Page Content -->
  <main class="col-md-7 offset-md-1 py-5">
    <div class="row mt-3">
      <h3>Requests of Works</h3>
      <div class="row">
      <?php
$stmt = $pdo->prepare('SELECT p.gallery, a.askid, a.description AS ask_description, u.firstname, a.userid
                      FROM portfolio p
                      JOIN askquotation a ON p.portfolio_id = a.portfolioid
                      JOIN user u ON a.userid = u.user_id
                      WHERE contractorid = :coid AND a.status = 1');
$stmt->execute(array(':coid' => $_SESSION["coid"]));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


        
        <?php foreach ($rows as $row): ?>
          
<div class="card">
    <img src="./upload/<?php echo htmlentities($row['gallery']); ?>" class="card-img-top" style="max-height: 500px;" alt="work image">
    <div class="card-body">
      <h5 class="card-text">Description of user: <?php echo htmlentities($row['ask_description']); ?></h5>
      <p class="card-title">Client Name: <?php echo htmlentities($row['firstname']); ?></p>
    </div>
    
    <form action="proceed.php" method="GET">
  <input type="hidden" name="askquotation_id" value="<?php echo htmlspecialchars($row['askid']); ?>">
  <input type="hidden" name="userid" value="<?php echo htmlspecialchars($row['userid']); ?>">
  <input type="hidden" name="contractorid" value="<?php echo htmlspecialchars($_SESSION['coid']); ?>">
  <button type="submit" class="button" style="vertical-align: middle">
    <span>Proceed</span>
  </button>
</form>

  </div>


<?php endforeach; ?>



  </main>
  
  <!-- Footer -->
  <?php include_once("./template/footer.php"); ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
