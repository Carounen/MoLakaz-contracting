<header class="w3-display-container w3-content w3-wide"  id="home">
<div class="container-fluid bg-light d-none d-lg-block">
        <div class="row align-items-center top-bar">
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <a href="index.php" class="navbar-brand m-0 p-0">
                    <h1 class="text-primary m-0">MoLakaz</h1>
                </a>
            </div>
            <div class="col-lg-9 col-md-12 text-end">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <i class="fa fa-dot-circle-o text-primary me-2"></i>
                    <p class="m-0">100% Mauricien</p>
                </div>
               
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-1" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-sm-square bg-white text-primary me-0" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
<div class="container-fluid nav-bar bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-white p-3 py-lg-0 px-lg-4">
            <a href="index.php" class="navbar-brand d-flex align-items-center m-0 p-0 d-lg-none">
                <h1 class="text-primary m-0">MoLakaz</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav me-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>

                    <?php
                    if (!isset($_SESSION["cid"]) && !isset($_SESSION["coid"]) && !isset($_SESSION["oid"])) {
    echo '<div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sign Up</a>
            <div class="dropdown-menu fade-up m-0">
                <a href="userregis.php" class="dropdown-item">User</a>
                <a href="contractor.php" class="dropdown-item">Contractor</a>
                <a href="orgregis.php" class="dropdown-item">Organization</a>
            </div>
        </div>';
}
?>

<?php
if (isset($_SESSION["cid"])) {
    echo '<div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Testimonial</a>
            <div class="dropdown-menu fade-up m-0">
                <a href="addtestimonial.php" class="dropdown-item">Add Testimonial</a>
                <a href="searchwork.php" class="dropdown-item">Search work</a>
                <a href="view_payment_user.php" class="dropdown-item">Payment Done</a>
            </div>
        </div>';

        
}
?>

                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Contractor</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="viewcontractor.php" class="dropdown-item">view contractor</a>
                            <a href="searchcontractor.php" class="dropdown-item">search contractor</a>
                           
                          
                   
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                        <div class="dropdown-menu fade-up m-0">
                            <a href="view_category.php" class="dropdown-item">view category</a>
                            <a href="searchcategory.php" class="dropdown-item">search category</a>
                            
                          
                   
                        </div>
                    </div>

                    <?php
if (isset($_SESSION["coid"])) {
    echo '<div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Portfolio</a>
            <div class="dropdown-menu fade-up m-0">
                <a href="viewportfolio.php" class="dropdown-item">View Portfolio</a>
                <a href="postportfolio.php" class="dropdown-item">Post Portfolio</a>
                <a href="updateportfolio.php" class="dropdown-item">Update Portfolio</a>
                <a href="viewdeleteport.php" class="dropdown-item">Delete Portfolio</a>
                <a href="viewaskquotation.php" class="dropdown-item">view quotation request</a>
            </div>
        </div>';

        
}
?>

                    <?php
if (isset($_SESSION['cid'])) {
    echo '<div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="logged-in">' . $_SESSION["fn"] . '</span></a>
              <div class="dropdown-menu fade-up m-0">
                  <a href="updateuserprofile.php" class="nav-item nav-link">Update Profile</a>
                  <a href="changepassword.php" class="nav-item nav-link">Change password</a>
                  <a href="viewprocees.php" class="nav-item nav-link">Quotation done by contractor</a>
                  <a href="logoutuser.php" class="nav-item nav-link">Logout</a>
              </div>
          </div>';
}

elseif (isset($_SESSION['coid'])) {
    echo '<div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="logged-in">' . $_SESSION["cn"] . '</span></a>
              <div class="dropdown-menu fade-up m-0">
                  <a href="updatecontraprofile.php" class="nav-item nav-link">Update Profile</a>
                  <a href="changecpassword.php" class="nav-item nav-link">Change password</a>
                  <a href="payment_receive.php" class="nav-item nav-link">Payment received</a>
                  <a href="logoutc.php" class="nav-item nav-link">Logout</a>
              </div>
          </div>';
}

elseif (isset($_SESSION['oid'])) {
    echo '<div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="logged-in">' . $_SESSION["fn"] . '</span></a>
              <div class="dropdown-menu fade-up m-0">
              <a href="postadvert.php" class="nav-item nav-link">post advert</a>
                  <a href="changeopassword.php" class="nav-item nav-link">Change password</a>
                  <a href="logoutc.php" class="nav-item nav-link">Logout</a>
              </div>
          </div>';
}
else {
    echo '<div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Login</a>
              <div class="dropdown-menu fade-up m-0">
                  <a href="login.php" class="nav-item nav-link">Log in as user</a>
                  <a href="orglogin.php" class="nav-item nav-link">Log in as Organization</a>
                  <a href="logincontrac.php" class="nav-item nav-link">Log in as Contractor</a>
                  <a href="loginadmin.php" class="nav-item nav-link">Log in as Admin</a>
              </div>
          </div>';
}
?>

                   
                </div>
                <div class="mt-4 mt-lg-0 me-lg-n4 py-3 px-4 bg-primary d-flex align-items-center">
                    <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 45px; height: 45px;">
                    <i class="fa fa-comment text-primary"></i>
                    </div>
                    <div class="ms-3">
                        <p class="mb-1 text-white">call 24/7</p>
                        <h5 class="m-0 text-secondary" class="fa fa-comment">+23059874617</h5>
                    </div>
                </div>
            </div>
        </nav>

    </div>
</header>