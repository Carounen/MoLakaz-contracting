
<?php
require_once "./db/pdo.php";
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Ensure that the advert_id is provided and is a valid integer
    if (isset($_GET["advert_id"]) && is_numeric($_GET["advert_id"])) {
        $advertId = intval($_GET["advert_id"]);

        // Prepare and execute the UPDATE statement
        try {
            $stmt = $pdo->prepare("UPDATE advertisement SET status = 1 WHERE advert_id = :advertId");
            $stmt->bindParam(':advertId', $advertId, PDO::PARAM_INT);
            $stmt->execute();

            // Redirect back to the page displaying the advertisements
            header("Location: ./admin/approveadvert.php");
            exit();
        } catch (PDOException $e) {
            // Handle any database errors here
            die("Error updating advertisement status: " . $e->getMessage());
        }
    }
}
?>

?>
