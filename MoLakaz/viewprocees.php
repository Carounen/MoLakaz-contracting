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
  <div class="container-fluid mt-5">
<div class="row">

<?php
// Define the number of results per page
$resultsPerPage = 3;

// Get the current page number from the query string
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the query
$offset = ($page - 1) * $resultsPerPage;

$stmt = $pdo->prepare('SELECT c.contractor_id, c.firstname, c.email, pr.proceed_id, pr.quotation
                      FROM contractor c
                      JOIN proceed pr ON c.contractor_id = pr.contractor_id
                      WHERE pr.user_id = :cid and pr.status=1
                      LIMIT :offset, :limit');

$stmt->bindValue(':cid', $_SESSION["cid"], PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $resultsPerPage, PDO::PARAM_INT);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Count the total number of rows
$totalRows = $pdo->query('SELECT COUNT(*) FROM contractor c
                          JOIN proceed pr ON c.contractor_id = pr.contractor_id
                          WHERE pr.user_id = ' . $_SESSION["cid"])->fetchColumn();

// Calculate the total number of pages
$totalPages = ceil($totalRows / $resultsPerPage);
?>

<main class="col-md-7 offset-md-1 py-5">
  <div class="row mt-3">
    <h3>Quotation</h3>
    <div class="card-deck mt-3">
      <?php foreach ($rows as $user): ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>Contractor Name:</strong><?php echo htmlentities($user["firstname"]); ?></h5>
            <p class="card-text"><strong>Contractor Email:</strong> <?php echo htmlentities($user["email"]); ?></p>
            <p class="card-text"><strong>Quotation:</strong> <?php echo htmlentities($user["quotation"]); ?></p>
            <a href="payment.php?contractor_id=<?php echo $user['contractor_id']; ?>&proceed_id=<?php echo $user['proceed_id']; ?>&quotation=<?php echo $user['quotation']; ?>" class="btn btn-primary">Do Payment</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    
    <nav aria-label="Page navigation">
      <ul class="pagination mt-3">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
          <li class="page-item<?php if ($i == $page) echo ' active'; ?>">
            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
      </ul>
    </nav>
  </div>
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
