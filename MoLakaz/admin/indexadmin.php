<?php
session_start();
if (!isset($_SESSION['adminid'])) {
  
  header("Location: ./index.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <?php include_once("../template/csslinksadmin.php"); ?>
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

  <?php include_once("../template/adminheader.php"); ?>
  <!-- Page Content -->
  
  

 


<section id="c4">

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="../images/111.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="../images/222.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="../images/333.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</section>


<!-- section 1 -->
<section style="margin: 0 auto; max-width: 1000px;">
<div class="sqs-html-content">
<h1 style="text-align:center;white-space:pre-wrap;">Contractors You Can Trust</h1>
<p class="" style="white-space:pre-wrap;">We are a trusted premier contracting company serving Vancouver and the lower mainland. Whether you're a builder, commercial contractor, property manager, or a homeowner, you can rely on us for all your contracting needs. Our team of experienced professionals is fully licensed and holds red seal inter-provincial qualifications, ensuring top-notch expertise.</p>
<p class="" style="white-space:pre-wrap;">Our goal is to exceed your expectations in every aspect of our service. From our punctuality and reliability to our commitment to delivering what we promise, we strive to provide exceptional results.</p>
<p class="" style="white-space:pre-wrap;">Kato Contractors maintains a 5M liability insurance certificate, which is more than double the industry standard. We also have a solid record with the worker's compensation board (WCB), hold an A+ rating with the Better Business Bureau (BBB), and are proud members of HAVAN (Home Builder's Association Vancouver), VRCA (Vancouver Regional Construction Association), and BOMA (Building Owners and Managers Association of BC). These achievements and acknowledgements position us as one of the leading and most trustworthy contracting companies in Vancouver.</p>
<p class="" style="white-space:pre-wrap;">We are committed to accountability and integrity in everything we do, from the quality of our work to the relationships we build. When you choose Kato Contractors, you can expect exceptional craftsmanship and a promise of excellence.</p>
</div>

</section>
<section id="services-front" class="Index-page" style="margin: 0 auto; max-width: 1000px;"  data-collection-id="5cf82945be2c020001934aeb" data-parallax-id="5cf82945be2c020001934aeb" data-edit-main-image="Background">
        


<div class="sqs-html-content">
  <h3 style="text-align:center;white-space:pre-wrap;">What Our Electricians Provide</h3><p class="" style="white-space:pre-wrap;"> Our certified commercial and residential electricians are ready to provide you with top notch service right when you need it! We cover a wide variety of sectors and fields that range from single family homes to commercial spaces. Whether it’s a small service call or a project, we’re here to help. Thinking about joining the team? We provide awesome training programs and mentor ship for our electricians in Vancouver. We are always looking to make additions to the team. Reach out to us today if you’re looking to hire an electrician, become an electrician or are an electrician that can add to our growing team!</p><p class="" style="white-space:pre-wrap;">  </p>
</div>
</section>
<section>
  <div class="filter-bar">
    <button class="filter-button">Filter</button>
    <input type="text" class="search-input" placeholder="Search">
    <button class="search-button">Search</button>
   
  </div>

  <div class="card-group">
    <div class="card">
      <img src="../images/12.avif" class="card-img-top" alt="Hollywood Sign on The Hill" />
      <div class="card-body">
        <h5 class="card-title">Plumbing work</h5>
        <p class="card-text">
         Our plumbing work is very clean and with no bad feedback from customers
        </p>
        <button class="button" style="vertical-align:middle"><span>View </span></button>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
    <div class="card">
      <img src="../images/13.avif" class="card-img-top" alt="Palm Springs Road" />
      <div class="card-body">
        <h5 class="card-title">Wood Work</h5>
        <p class="card-text">If you want neat wood work done by professional please coontact us.
        </p>
        <button class="button" style="vertical-align:middle"><span>View </span></button>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
    <div class="card">
      <img src="../images/14.png" class="card-img-top" alt="Los Angeles Skyscrapers" />
      <div class="card-body">
        <h5 class="card-title">Water proofing</h5>
        <p class="card-text">
          Waterproofing done for huge house only at affordable.
        </p>
        <button class="button" style="vertical-align:middle"><span>View </span></button>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
</section>
<div class="container-fluid fact bg-dark my-5 py-5 text-center">
    <div class="container">
        <div class="row col-12">
        <div class="col-md-6 col-lg-3 wow fadeIn pl-5" data-wow-delay="0.3s">
                <i class="fa fa-pied-piper-alt fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Category</p>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn pl-5" data-wow-delay="0.3s">
                <i class="fa fa-odnoklassniki text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Expert Contractors</p>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <i class="fa fa-users fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Satisfied Clients</p>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <i class="fa fa-wrench fa-2x text-white mb-3"></i>
                <h2 class="text-white mb-2" data-toggle="counter-up">1234</h2>
                <p class="text-white mb-0">Complete Projects</p>
            </div>
        </div>
    </div>
</div>


<h3 class="text-center">What we guarentee you</h3>

<section class="container-fluid">
<div class="row">
  <div class="col-md-6">
    <div>
    <img src="../images/15.avif" class="image-fluid" />
    </div>
  </div>
  <div class="col-md-6 col-lg-5 ml-auto d-flex align-items-center mt-4 mt-md-0">
    <div>
      <h4>We provide service on time, and on budget.</h4>
      
    </div>
  </div>
</div>
<br>

<div class="row">
  <div class="col-md-6 col-lg-5 mr-auto d-flex align-items-center mt-4 mt-md-0">
    <div>
      <h4>On budget Service.</h4>
      
    </div>
  </div>
  <div class="col-md-6">
    <div>
      <img src="../images/5.jpg" class="img-fluid" />
    </div>
  </div>
</div>


<br>


<div class="row">
  <div class="col-md-6">
    <div>
    <img src="../images/4.jpg" class="image-fluid" />
    </div>
  </div>
  <div class="col-md-6 col-lg-5 ml-auto d-flex align-items-center mt-4 mt-md-0">
    <div>
      <h4>We provide Good quality service</h4>
    
    </div>
  </div>
</div>
</section>

<section class="testimonial container-fluid">
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-xl-8 text-center">
      <h3 class="mb-4">Testimonials</h3>
      <p class="mb-4 pb-2 mb-md-5 pb-md-0">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet
        numquam iure provident voluptate esse quasi, veritatis totam voluptas nostrum
        quisquam eum porro a pariatur veniam.
      </p>
    </div>
  </div>

  <div class="row text-center">
    <div class="col-md-6 mb-4 mb-md-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="../images/p1.jpg"
          class="rounded-circle shadow-1-strong" width="100" height="100" />
      </div>
      <p class="lead my-3 text-muted">
        "Lorem ipsum dolor sit amet eos adipisci, consectetur adipisicing elit sed ut
        perspiciatis unde omnis."
      </p>
      <p class="font-italic font-weight-normal mb-0">- Anna Morian</p>
    </div>
    <div class="col-md-6 mb-0">
      <div class="d-flex justify-content-center mb-4">
        <img src="../images/p2.jpg"
          class="rounded-circle shadow-1-strong" width="100" height="100" />
      </div>
      <p class="lead my-3 text-muted">
        "Neque cupiditate assumenda in maiores repudiandae mollitia architecto elit sed
        adipiscing elit."
      </p>
      <p class="font-italic font-weight-normal mb-0">- Teresa May</p>
    </div>
  </div>
</section>

  <!-- Footer -->

  <?php include_once("../template/footeradmin.php"); ?>
  <!-- End footer --->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>
