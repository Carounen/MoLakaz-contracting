<?php session_start();
require_once "./db/pdo.php";
// Retrieve data from Query String
$st = '%' . $_GET['stype'] . '%';


//Use prepared statement to help prevent SQL Injection
$stmt = $pdo->prepare("SELECT * FROM contractor WHERE firstname LIKE
:st");
$stmt->execute(
array(
':st' => $st
)
);
$display_str = "";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <div class="course-item">
        <img class="img-fluid" alt="" src="upload/<?php echo htmlentities($row["profile_img"]); ?>" style="max-height: 200px;">
        <div class="course-content">
            <h4><?php echo htmlentities($row["firstname"]) . ' ' . htmlentities($row["lastname"]); ?></h4>
            <p class="price"><strong>Email:</strong> <?php echo htmlentities($row["email"]); ?></p>
            <p><strong>Description:</strong> <?php echo htmlentities($row["description"]); ?></p>
            <div class="card-footer">
                <a href="viewprofilec.php?id=<?php echo $row['contractor_id']; ?>" class="btn btn-primary">View Profile</a>
            </div>
        </div>
    </div> <!-- End Item -->
<?php endwhile; 


// $row3 = $stmt3->fetch(PDO::FETCH_ASSOC);
// if ($row3 === false) {
// $display_str .= ' &nbsp;&nbsp;
// <a class="btn btn-outline-success"
// href="reserve.php?sid=' . $row['stand_type_id'] . '">
// <i class="bx bx-heart"></i>&nbsp;Reserve</a>&nbsp;';
// } elseif ($row3["isPaid"] == 1) {
// $display_str .= ' &nbsp;&nbsp;
// <p class="btn btn-warning text-white">
// <i class="bx bx-heart"></i>&nbsp;Booked</p>&nbsp;';
// } elseif ($row3["isPaid"] == 2) {
// $display_str .= ' &nbsp;&nbsp;
// <p class="btn btn-danger text-white">
// <i class="bx bx-heart"></i>&nbsp;Not available</p>&nbsp;';
// }
// $display_str .= '</div>';
// $display_str .= '
// </div>
// </div>
// </div>
// </div> <!-- End Item-->';

echo $display_str;