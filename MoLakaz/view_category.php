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

    <style>
  body {
    font-family: Arial, sans-serif;
  }

  .container-fluid {
    padding: 30px;
  }

  .table {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .table thead {
    background-color: #333;
    color: #fff;
  }

  .table tbody tr:hover {
    background-color: #f5f5f5;
    cursor: pointer;
  }

  .table td {
    padding: 12px;
  }


  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .fadeIn {
    animation: fadeIn 0.5s ease-in-out;
  }

  /* Hover effect for the table rows */
  @keyframes rowHover {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.1);
    }
    100% {
      transform: scale(1);
    }
  }

  .rowHover:hover {
    animation: rowHover 0.5s ease-in-out;
  }

  body {
    font-family: Arial, sans-serif;
  }

  .container-fluid {
    padding: 30px;
  }

  .card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: box-shadow 0.3s ease;
  }

  .card:hover {
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px);
    cursor: pointer;
  }

  .card-body {
    padding: 15px;
  }

  .card-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }
</style>

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
      <main class="col-md-8 offset-md-2 py-5">
        <div class="row mt-3">
          <h3 class="col-12 mb-4">Category Listing</h3>
          <?php
          //add the select statement to read table tblstandtype
          $stmt = $pdo->query("select * from category");
          while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {
            //add the attribute name
            $categoryId = htmlentities($rows["category_id"]);
            $categoryName = htmlentities($rows["category"]);
          ?>
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $categoryName; ?></h5>
                  <a href="view_page.php?category_id=<?php echo $categoryId; ?>" class="stretched-link"></a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
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
