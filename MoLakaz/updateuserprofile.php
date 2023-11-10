<?php session_start();
require_once "./db/pdo.php";
require_once './functions/util.php';



//check if the session does not exist
checkUserAuth();


if (isset($_POST['btncancel'])) {
header('Location: index.php');
return;
}
//add sql to search for user details based on the session id
$stmt = $pdo->prepare("SELECT * from user where user_id=:cid");
$stmt->execute(array(":cid" => $_SESSION["cid"]));
$srow = $stmt->fetch(PDO::FETCH_ASSOC);

$pic = htmlentities($srow['profile_image']);

//update profile

if (isset($_POST['btnupdate'])) {
    if (is_string($msg) || is_string($msg2)) {
    $_SESSION['errormsg'] = "$msg <br/> $msg2";
    header("Location: signup.php");
    return;
    }
    //add sql to check if the chosen email address is not taken up by OTHER
    //USERS
    $stmt2 = $pdo->prepare("SELECT * FROM user
    where email = :em and user_id != :cid");
    $stmt2->execute(
    array(
    ":em" => $_POST['email'],
    ':cid' => $_SESSION['cid']
    )
    );
    
    $srow2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    if ($srow2 === false) {
    //add the sql statement to update the client profile
    $sql = "UPDATE user set firstname =:fn, profile_image=:filen, lastname=:ln, 
 email=:email where user_id=:cid";
    $filename = $_FILES['profile_image']['name'];
    $stmt3 = $pdo->prepare($sql);
    $stmt3->execute(
    array(
    ':fn' => $_POST['txtfname'],
    ':filen' => $filename,
    ':ln' => $_POST['txtlname'],
  
    ':email' => $_POST['email'],
    ':cid' => $_SESSION['cid']
    )
    );
    move_uploaded_file($_FILES["profile_image"]["tmp_name"], "../upload/" .
    $filename);
    $_SESSION['successmsg'] = "Profile Updated";
    header("Location: updateuserprofile.php");
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
    <?php include_once("./template/csslinks.php"); ?>
</head>

<body>
<?php include_once("./template/header.php"); ?>
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
                        <img src="./images/up.jpg" class="img-fluid h-50" />
                    </div>
                    <div class="col-md-6 pt-5 offset-md-1">
                        <h3><?php flashMessages(); ?></h3>
                        <form id="frmsignup" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="txtfname" class="form-label">First name</label>
                                <input type="text" class="form-control" name="txtfname" id="txtfname"
                                    value="<?= $srow['firstname'] ?>" />
                            </div>
                            <div class="mb-3">

                                <label for="txtlname" class="form-label">Last name</label>
                                <input type="text" class="form-control" name="txtlname" id="txtlname"
                                    value="<?= $srow['lastname'] ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    value="<?= $srow['email'] ?>" />
                            </div>
                           
                            <div class="mb-3">
                                <label for="profile_image" class="form-label">Profile
                                    Picture</label>
                                <input class="form-control form-control-lg" id="profile_image" onchange="readURL(this);"
                                    name="profile_image" type="file" />
                                <?php
echo '<p><img id="blah" class="zz_image" src="upload/' . $pic . '"
width="100px" /></p>';
?>
                            </div>
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
    <?php include_once("./template/footer.php"); ?>

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