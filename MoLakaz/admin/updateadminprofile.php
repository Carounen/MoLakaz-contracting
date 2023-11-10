<?php session_start();
require_once "../db/pdo.php";
require_once '../functions/util.php';


if (!isset($_SESSION['adminid'])) {
  
    header("Location: ./index.php");
  
  }
//check if the session does not exist
checkUserAuth();


if (isset($_POST['btncancel'])) {
header('Location: indexadmin.php');
return;
}
//add sql to search for user details based on the session id
$stmt = $pdo->prepare("SELECT * from admin where admin_id=:adminid");
$stmt->execute(array(":adminid" => $_SESSION["adminid"]));
$srow = $stmt->fetch(PDO::FETCH_ASSOC);



//update profile

if (isset($_POST['btnupdate'])) {
    if (is_string($msg) || is_string($msg2)) {
    $_SESSION['errormsg'] = "$msg <br/> $msg2";
    header("Location: signup.php");
    return;
    }
    //add sql to check if the chosen email address is not taken up by OTHER
    //USERS
    $stmt2 = $pdo->prepare("SELECT * FROM admin
    where username = :um and admin_id != :adminid");
    $stmt2->execute(
    array(
    ":um" => $_POST['txtusername'],
    ':admin_id' => $_SESSION['adminid']
    )
    );
    
    $srow2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    if ($srow2 === false) {
    //add the sql statement to update the client profile
    $sql = "UPDATE admin set username =:un where admin_id=:adminid";

    $stmt3 = $pdo->prepare($sql);
    $stmt3->execute(
    array(
    ':un' => $_POST['txtusername'],
 
    ':admin_id' => $_SESSION['adminid']
    )
    );
 
    $_SESSION['successmsg'] = "Profile Updated";
    header("Location: updateadminprofile.php");
    return;
   
    } else {
    $_SESSION['errormsg'] = "Email already exists!";
    }
    }

//end of update profile



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title></title>
    <?php include_once("../template/csslinks.php"); ?>
</head>

<body>
<?php include_once("../template/header.php"); ?>
    <main>
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs" data-aos="fade-in">
            <div class="container">
                <h2>Our clients</h2>
                <p>
                    Est dolorum ut non facere possimus quibusdam eligendi voluptatem.
                    Quia id aut similique quia voluptas sit quaerat debitis. Rerum
                    omnis
                    ipsam aperiam consequatur laboriosam nemo harum praesentium.
                </p>
            </div>
        </div>
        <!-- End Breadcrumbs -->
        <!-- ======= Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-md-5 pt-5">
                        <img src="../images/setting.jpg" class="img-fluid h-50" />
                    </div>
                    <div class="col-md-6 pt-5 offset-md-1">
                        <h3><?php flashMessages(); ?></h3>
                        <form id="frmsignup" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="txtusername" class="form-label">First name</label>
                                <input type="text" class="form-control" name="txtusername" id="txtusername"
                                    value="<?= $srow['username'] ?>" />
                            </div>
                          
?>
                          
                            <button type="submit" name="btnupdate" class="col-12 btn btn-success btn-lg mx-auto">
                                Update Profile
                            </button>
                            <p></p>
                            <button type="submit" name="btncancel" class="col-12 btn btn-success btn-lg mx-auto">
                                Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section -->
    </main>
    <?php include_once("../template/footer.php"); ?>

    <script type="text/javascript">
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
$('#blah').attr('src', e.target.result);
}
reader.readAsDataURL(input.files[0]);
}
}
</script>

</body>

</html>