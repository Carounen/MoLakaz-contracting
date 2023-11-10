<?php
session_start();

require_once "./db/pdo.php";
require_once './functions/util.php';



function getCategoryCount() {
  global $pdo;
  $stmt = $pdo->query("SELECT COUNT(*) FROM category");
  $count = $stmt->fetchColumn();
  return $count;
}

function getContractorCount() {
  global $pdo;
  $stmt2 = $pdo->query("SELECT COUNT(*) FROM contractor");
  $count = $stmt2->fetchColumn();
  return $count;
}

function getUserCount() {
  global $pdo;
  $stmt3 = $pdo->query("SELECT COUNT(*) FROM user");
  $count = $stmt3->fetchColumn();
  return $count;
}

function getTestimonialCount() {
  global $pdo;
  $stmt4 = $pdo->query("SELECT COUNT(*) FROM testimonial");
  $count = $stmt4->fetchColumn();
  return $count;
}

$categoryCount = getCategoryCount();
$contractorCount = getContractorCount();
$userCount = getUserCount();
$testimonialCount = getTestimonialCount();
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
.card {
  max-width: 300px;
}

.card-img-top {
  max-height: 200px;
}

.card-body {
  padding: 10px;
}

.card-title {
  font-size: 18px;
}

.card-text {
  font-size: 14px;
}
.card:hover {
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  transform: translateY(-5px);
}
.button {
  font-size: 14px;
}

.swiper-container {
            margin: 0 auto; /* Horizontally center the container */
            max-width: 800px; /* Set a maximum width for the container if desired */
            overflow: hidden; /* Hide any content that overflows from the container */
        }

        /* Center the pagination bullets */
        .swiper-pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px; /* Adjust the top margin as needed */
        }

        /* Adjust the height of the slides to fit on one page */
        .swiper-slide {
            height: 400px; /* Set the desired height for the slides */
        }

        /* Additional styles for better visibility */
        .testimonial-item {
            text-align: center;
        }

        .testimonial-wrap {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    .testimonial-item {
        text-align: center;
    }

    .testimonial-img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        margin: 0 auto 10px;
        display: block;
    }

    .testimonial-item h3 {
        font-size: 20px;
        margin-bottom: 5px;
    }

    .testimonial-item h4 {
        font-size: 16px;
        color: #555;
    }

    .testimonial-item p {
        font-size: 14px;
        color: #777;
        margin-top: 10px;
    }

    .quote-icon-left,
    .quote-icon-right {
        font-size: 18px;
        vertical-align: middle;
    }

    .testimonial-wrap:hover {
      background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
    }
    /* .container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
  } */
  .search-container {
    padding: 5px;
    max-width: 300px;
    margin: 0 auto; /* Center the container horizontally */
  }

  .search-container input {
    font-size: 12px;
    padding: 3px 6px;
    width: 100%;
  }
  /* Add spacing around the cards */
  .card {
    margin: 10px;
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
  
  

 
  <h3> <?php flashMessages(); ?></h3>

<section id="c4">

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="./images/111.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="./images/222.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img src="./images/333.jpg" class="d-block w-100" alt="...">
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
<div class="search-container">
  <form name="frmsearchstand">
    <div class="row">
      <div class="col">
        <input type='text' class="form-control" onkeyup='ajaxCall()' id='description' placeholder="Search By Name" />
      </div>
    </div>
    
  </form>
</div>
<div id="searchResults"></div>
</div>
  <div class="card-group">
    <?php
    // Retrieve portfolio data with contractor name from the database
    $stmt = $pdo->query("SELECT p.description, p.date, p.gallery, c.firstname, c.email, c.contractor_id, p.portfolio_id
    FROM portfolio p
    JOIN contractor c ON p.contractor_id = c.contractor_id");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

    <?php } ?>
</div>

</section>
<div class="container-fluid fact bg-dark my-5 py-5 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 wow fadeIn pl-5" data-wow-delay="0.3s">
                <div class="card bg-primary text-white">
                    <div class="card-body rounded">
                        <i class="fa fa-pied-piper-alt fa-2x mb-3"></i>
                        <p class="card-text"><?php echo $categoryCount; ?></p>
                        <p class="text-white mb-0">Category</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn pl-5" data-wow-delay="0.3s">
                <div class="card bg-primary text-white">
                    <div class="card-body rounded">
                        <i class="fa fa-odnoklassniki fa-2x mb-3"></i>
                        <p class="card-text"><?php echo $contractorCount; ?></p>
                        <p class="text-white mb-0">Expert Contractors</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="card bg-primary text-white">
                    <div class="card-body rounded">
                        <i class="fa fa-users fa-2x mb-3"></i>
                        <p class="card-text"><?php echo $userCount; ?></p>
                        <p class="text-white mb-0">Satisfied Clients</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="card bg-primary text-white">
                    <div class="card-body rounded">
                        <i class="fa fa-wrench fa-2x mb-3"></i>
                        <p class="card-text"><?php echo $testimonialCount; ?></p>
                        <p class="text-white mb-0">Testimonials</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
  <h2 style="text-align:center;">Advertise With us</h2>
<div class="swiper-container">
        <div class="swiper-wrapper">
        <?php
    $stmt = $pdo->query("SELECT * FROM advertisement where status=1");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo ('<div class="swiper-slide">
                <div >
                    <div >
                        <div >
                            <img class="img-fluid" alt="" src="upload/' . htmlentities($row['advert_image']) . '">
                        </div>
                        <p class="text-center">' . htmlentities($row['name']) . '</p>
                    </div>
                </div>
            </div>');
    }
    ?>
</div>
<div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<!-- End advert item -->

<h3 class="text-center">What we guarentee you</h3>

<section class="container-fluid">
<div class="row">
  <div class="col-md-6">
    <div>
    <img src="./images/15.avif" class="image-fluid" />
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
      <img src="./images/5.jpg" class="img-fluid" />
    </div>
  </div>
</div>


<br>


<div class="row">
  <div class="col-md-6">
    <div>
    <img src="./images/4.jpg" class="image-fluid" />
    </div>
  </div>
  <div class="col-md-6 col-lg-5 ml-auto d-flex align-items-center mt-4 mt-md-0">
    <div>
      <h4>We provide Good quality service</h4>
    
    </div>
  </div>
</div>
</section>

<section>
  <h2 style="text-align:center;">Testimonials</h2>
<div class="swiper-container">
        <div class="swiper-wrapper">
        <?php
    $stmt = $pdo->query("SELECT * FROM testimonial ts
    INNER JOIN user tc ON ts.user_id=tc.user_id and ts.status = 1");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo ('<div class="swiper-slide">
      <div class="testimonial-wrap">
      <div class="testimonial-item">');
      echo ('<img class="img-fluid testimonial-img"
      alt="" src="upload/' . htmlentities($row['profile_image']) . '">' . "\n");
      echo ('<h3>' . htmlentities($row['firstname'])
      . " " . htmlentities($row['lastname']) . '</h3>');
      echo ('<h4>' .
      htmlentities($row['testimonial']) . '</h4>
      <p>
      <i class="bx bxs-quote-alt-left quote-icon-left"></i>'
      . htmlentities($row['rating']) .
      ' <i class="bx bxs-quote-alt-right quote-
      icon-right"></i>');
      echo ('</p>
      </div>
      </div>
      </div>');
      }
      ?>
    
    ?>
</div>
<div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- End testimonial item -->
</div>
<div class="swiper-pagination"></div>
</div>
</div>
</section>

  <!-- Footer -->

  <?php include_once("./template/footer.php"); ?>
  <!-- End footer --->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
 
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            // Set the direction to 'horizontal' for horizontal scrolling/swiping
            direction: 'horizontal',
            loop: true, // Set loop to true if you want the slides to repeat
            autoplay: {
                delay: 3000, // Set the delay between slide changes (in milliseconds)
            },
            pagination: {
                el: '.swiper-pagination', // Set the class name for the pagination element
                clickable: true, // Enable clickable pagination bullets
            },
        });
    });
</script>
<script language="javascript" type="text/javascript">
function ajaxCall() {
  // Get the values from user and pass it to the server script
  var st = document.getElementById('description').value;
  var queryString = "?stype=" + encodeURIComponent(st);

  fetch("loaddataindex.php" + queryString)
    .then(response => response.text())
    .then(successFn)
    .catch(error => console.error('Error:', error));
}

function successFn(result) {
  document.getElementById('searchResults').innerHTML = result;
}

</script>

  
</body>
</html>