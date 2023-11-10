<?php session_start();
require_once "./db/pdo.php";
require_once './functions/util.php';
//Deny access if session does not exist

checkUserAuth();

if (isset($_POST['btncancel'])) {
header('Location: index.php');
return;
}
if (isset($_POST['btnupdate'])) {
$msg = validateOldPass();
$msg2 = validateCPass();
$msg3 = validateNPass();
if (is_string($msg) || is_string($msg2) || is_string($msg3)) {
$_SESSION['errormsg'] = "$msg <br/> $msg2 <br/> $msg3";
header("Location: changeopassword.php");
return;
}
$stmt = $pdo->prepare("SELECT org_id, password
FROM organization where org_id = :oid");
$stmt->execute(
array(
':oid' => $_SESSION['oid']
)
);

$srow = $stmt->fetch(PDO::FETCH_ASSOC);
//encrypt the password
$oldpass = hash('md5',$_POST['txtoldpass']);
if ($srow["password"] == $oldpass) {
//encrypt the new password
$newpass = hash('md5', $_POST['txtnewpass']);
//add sql to update the client password
$sql = "UPDATE organization SET password = :pass WHERE org_id = :oid";
$stmt2 = $pdo->prepare($sql);
$stmt2->execute(
array(
':oid' => $_SESSION['oid'],
':pass' => $newpass
)
);
$_SESSION['successmsg'] = "Your password has been changed";
header("Location: changeopassword.php");
return;
} else {
$_SESSION['errormsg'] = "Old password does not match!";
}
}
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
<img src="../images/setting.jpg" class="img-fluid h-50" />
</div>
<div class="col-md-6 pt-5 offset-md-1">
<h3><?php flashMessages(); ?></h3>
<form id="frmmodpass" method="post" enctype="multipart/formdata">
<div class="mb-3">
<label for="txtpass" class="form-label">Old Password</label>
<input type="password" class="form-control"
name="txtoldpass" id="txtoldpass" />
</div>
<div class="mb-3">

<label for="txtnewpass" class="form-label">New
Password</label>
<input type="password" class="form-control"
name="txtnewpass" id="txtnewpass" />
</div>
<div class="mb-3">
<label for="txtcpass" class="form-label">Confirm
Password</label>
<input type="password" class="form-control" name="txtcpass"
id="txtcpass" />
</div>
<button type="submit" name="btnupdate" class="col-12 btn btnsuccess
btn-lg mx-auto">
Change Password
</button>
<p></p>
<button type="submit" name="btncancel" class="col-12 btn btnsuccess
btn-lg mx-auto">
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
</body>
</html>