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
  $stmt = $pdo->query("SELECT COUNT(*) AS count FROM portfolio");
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $totalRecords = $row['count'];
  $recordsPerPage = 3;
  $totalPages = ceil($totalRecords / $recordsPerPage);
  $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
  $offset = ($currentPage - 1) * $recordsPerPage;

  $stmt = $pdo->prepare("SELECT * FROM portfolio LIMIT :offset, :recordsPerPage");
  $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
  $stmt->bindValue(':recordsPerPage', $recordsPerPage, PDO::PARAM_INT);
  $stmt->execute();
  $portfolios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section id="stands" class="courses">
<div class="container" data-aos="fade-up">
<div class="row bg-light" data-aos="zoom-in" data-aos-
delay="100">
<div class="d-flex justify-content-center">
<form name='frmsearchstand'>
<div class="row">
<div class="col">search by name:
<input type='text' class="form-control"
onkeyup='ajaxCall()' id='description' placeholder="Name" />
</div>
</div>
</form>
</div>
</div>
</div>
</section>
<section id="courses" class="courses">
<div class="container" data-aos="fade-up">
<div id="searchresult" class="row" data-aos="zoom-in" data-aos-delay="100">
<main class="col-md-7 offset-md-1 py-5">
    <div id="searchresult" class="row mt-3">
        <h3>Work Provided Listing</h3>
        <div class="card-deck mt-3">
            <?php foreach ($portfolios as $portfolio): ?>
                <div class="card">
                    <img src="upload/<?php echo htmlentities($portfolio["gallery"]); ?>" class="card-img-top" style="max-height: 500px;" alt="Profile Image">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlentities($portfolio["description"]); ?></h5>
                        <p class="card-text"><strong>date:</strong> <?php echo htmlentities($portfolio["date"]); ?></p>
                    </div>
             
<div class="card-footer">
    <a href="viewwork.php?id=<?php echo $portfolio['portfolio_id']; ?>" class="btn btn-primary">View Profile</a>
</div>

                </div>
            <?php endforeach; ?>
        </div>
        <nav class="mt-3">
            <ul class="pagination justify-content-center">
              
                <?php
  // Previous page link
  $prevPage = $currentPage - 1;
  if ($prevPage > 0) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . $prevPage . '">Previous</a></li>';
  }

  // Pages link
  for ($i = 1; $i <= $totalPages; $i++) {
    echo '<li class="page-item ' . ($currentPage == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
  }

  // Next page link
  $nextPage = $currentPage + 1;
  if ($nextPage <= $totalPages) {
    echo '<li class="page-item"><a class="page-link" href="?page=' . $nextPage . '">Next</a></li>';
  }
?>

            </ul>
        </nav>
    </div>
</main>
</div>
</div>
</section>


  <!-- Footer -->

  <?php include_once("./template/footer.php"); ?>
  <!-- End footer --->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  <script language="javascript" type="text/javascript">
function ajaxCall() {
// Get the values from user and pass it to server script
var st = document.getElementById('description').value;

var queryString = "?stype=" + st;

$.get("loaddataw.php" + queryString, successFn);
}
function successFn(result) {
$('#searchresult').html(result);
}
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</body>
</html>
