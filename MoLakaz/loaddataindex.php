<?php session_start();
require_once "./db/pdo.php";
// Retrieve data from Query String
$st = '%' . $_GET['stype'] . '%';


//Use prepared statement to help prevent SQL Injection
$stmt = $pdo->prepare("SELECT p.description, p.date, p.gallery, c.firstname, c.email, c.contractor_id, p.portfolio_id
FROM portfolio p
JOIN contractor c ON p.contractor_id = c.contractor_id
WHERE p.description LIKE :st");
$stmt->execute(
array(
':st' => $st
)
);
$display_str = "";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
    $description = htmlentities($row['description']);
    $date = htmlentities($row['date']);
    $photo = htmlentities($row['gallery']);
    $contractorName = htmlentities($row['firstname']);
    $contractorlName = htmlentities($row['email']);
    $contractorId = htmlentities($row['contractor_id']);
    $portfolioId = htmlentities($row['portfolio_id']);
  ?>

<div class="card">
        <img src="./upload/<?php echo $photo; ?>" class="card-img-top" style="max-height: 500px;" alt="work image">

           <div class="card-body">
                <h5 class="card-title">Contractor name:<?php echo $contractorName; ?></h5>
                <h5 class="card-title">Contractor Email:<?php echo $contractorlName; ?></h5>
                <p class="card-text"><?php echo $description; ?></p>
                <?php
// Check if session cid does not exist
if (!isset($_SESSION['cid'])) {
  ?>
  <form action="userregis.php" method="POST">
    <button type="submit" class="button" style="vertical-align: middle"><span>Ask quotation</span></button>
  </form>
  <?php
} else {
  ?>
 <form action="askquotation.php" method="GET">
      <input type="hidden" name="portfolio_id" value="<?php echo $portfolioId; ?>">
      <input type="hidden" name="contractor_id" value="<?php echo $contractorId; ?>">
      <button type="submit" class="button" style="vertical-align: middle"><span>Ask quotation</span></button>
    </form>

  <?php
}
?>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated <?php echo $date; ?></small>
            </div>
        </div>

  
</div>
  <?php endwhile; 




echo $display_str;