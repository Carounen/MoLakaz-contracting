<?php require_once "./db/pdo.php";
require_once './functions/util.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <?php include_once("./template/csslinks.php"); ?>
  <style>
/* Reset some default styles */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}


header h1 {
  font-size: 28px;
}

main {
  padding: 20px;
}

.about-section h2 {
  font-size: 24px;
  margin-bottom: 15px;
}

footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  padding: 10px;
}


</style>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include_once("./template/header.php"); ?>
  <header>

   
  </header>

  <main>
    <section class="about-section">
      <div class="container">
        <h2>About Us</h2>
        <p>
          Welcome to Contractor Search, your one-stop destination for finding the best contractors for your projects. 
          Our platform connects clients with a wide range of skilled contractors in various fields, from construction 
          to home improvement and everything in between.
        </p>
        <p>
          At Contractor Search, we believe in making the process of finding contractors easy and hassle-free. 
          Our user-friendly search interface allows you to quickly browse through a database of qualified contractors 
          and get in touch with them directly to discuss your project requirements.
        </p>
        <p>
          Our team is dedicated to providing you with a seamless experience, ensuring that you find the perfect 
          contractor for your specific needs. Whether you're a homeowner looking to renovate your property or a 
          business owner in need of commercial construction services, Contractor Search is here to help.
        </p>
      </div>
    </section>
  </main>
  <?php include_once("./template/footer.php"); ?>

  <script src="script.js"></script>
</body>
</html>
