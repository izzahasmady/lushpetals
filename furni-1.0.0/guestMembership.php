<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		
        <style>
  /* Add the styles for the outer border */
  .live-stream {
    border: 4px solid #556B2F; /* Moss green border color */
    border-radius: 15px; /* Optional: Add border-radius for rounded corners */
    margin: 40px 0; /* Adjust the margin as needed */
    padding: 30px; /* Adjust the padding as needed */
    background-color: #FFFFFF; /* White background color */
  }

  .live-stream .heading-section h4 {
    color: #556B2F; /* Moss green heading text color */
    font-family: 'Poppins', sans-serif; /* Match the font of Subscribe Now */
    font-weight: 700; /* Optional: Set font weight */
  }

  .start-stream .item {
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 10px; /* Optional: Add border-radius for rounded corners */
  }

  .start-stream .item:nth-child(odd) {
    background-color: #E1F0C4; /* Light green background color for odd plans */
    border: 2px solid #556B2F; /* Moss green border for odd plans */
  }

  .start-stream .item:nth-child(even) {
    background-color: #D3E9D8; /* Light green background color for even plans */
    border: 2px solid #556B2F; /* Moss green border for even plans */
  }

  .start-stream .item h4 {
    color: #556B2F; /* Moss green inner text color */
    font-family: 'Poppins', sans-serif; /* Match the font of Subscribe Now */
  }

  .start-stream .item p {
    color: #000000; /* Black inner text color */
  }

  .start-stream .item .main-button button {
    background-color: #556B2F; /* Moss green inner button background color */
    color: #FFFFFF; /* White inner button text color */
    border: 1px solid #556B2F; /* Moss green border for the button */
  }
</style>


	</head>

	<body>

 <!-- Start Header/Navigation -->
 <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
    <a class="navbar-brand" href="index.html">LushPetals</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
        aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li><a class="nav-link" href="guestShop.php">Shop</a></li>
						<li><a class="nav-link" href="aboutUser.html">About us</a></li>
						<li><a class="nav-link" href="guestMembership.php">Membership</a></li>
					</ul>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
            <li><a class="nav-link" href="#"><img src="images/user.svg"></a></li>
            <li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li>
        </ul>
    </div>
</div>

</nav>
<!-- End Header/Navigation -->





<body>

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
    <span class="dot"></span>
    <div class="dots">
        <span></span>
        <span></span>
        <span></span>
    </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                     <!-- ***** Logo Start ***** -->
                     <a href="guestIndex.php" class="logo">
                        <img src="assets/imagess/loggo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->

<div class="container">
<div class="row">
  <div class="col-lg-12">
    <div class="page-content">

       <!-- ***** Live Stream Start ***** -->
       <div class="live-stream">
        <div class="col-lg-12">
          <div class="heading-section">
            <h4><em>Subscribe</em> Now!</h4>
          </div>
        </div>
        <div class="row">
        <div class="start-stream">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-4">
              <div class="item">
                
                <h4>Basic</h4>
                <p>RM 0.00 (FREE) <br>Exclusive floral access <br>Access to new flower varieties</p>
                <div class="main-button">
                <form method="POST" action="login.php">
                <button class="btn" type="submit" name="membership" value="Basic" style="color:white">Subscribe</button>
                 </form>
              </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="item">
                
                <h4>Standard</h4>
                <p>RM50.00 <br>Access to exclusive flower varieties <br>Rm10 off every purchase</p>
                <div class="main-button">
                <form method="POST" action="login.php">
                  <button class="btn" type="submit" name="membership" value="Standard" style="color:white">Subscribe</button>
                  </form>
              </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="item">
                
                <h4>Premium</h4>
                <p>RM150.00<br>Daily delivery of exotic flowers <br>Free Delivery for every purchase</p>
                <div class="main-button">
                <form method="POST" action="login.php">
                  <button class="btn"type="submit" name="membership" value="Premium" style="color:white">Subscribe</button>
                  </form>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ***** Start Stream End ***** -->
            
          
          
        </div>
      </div>
      <!-- ***** Live Stream End ***** -->
      
      

     
    </div>
  </div>
</div>
</div>

<footer>

<div class="container">
 <div class="row">
   <div class="col-lg-12">
   <br><br>
   </div>
 </div>
</div>
</footer>




<!-- Start Footer Section -->
<footer class="footer-section">
			<div class="container relative">


				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">LushPetals<span>.</span></a></div>
						<p class="mb-4">No matter what the occasion is, from birthdays to anniversaries, or to express your love and friendship, you’ll be able to find what you need to create special moments with the people you care about. From condolence flowers to grand opening flower stands — shop our collections, or speak to us for custom floral designs. If you’re buying flowers in Malaysia, we have gifts and bouquets for every occasion and major celebration.</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright © 2023 <a href="#">LushPetals</a> Company. All rights reserved.  
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	

        <?php
    
    ?>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>