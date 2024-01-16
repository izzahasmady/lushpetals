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
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
	</head>

    <body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="#">LushPetals<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="#">Home</a>
						</li>
						<li><a class="nav-link" href="#">Shop</a></li>
						<li class="active"><a class="nav-link" href="#">About Us</a></li>
						<li><a class="nav-link" href="#">Services</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="images/user.svg"></a></li>
						<li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-xl-5">
                            <img src="assets/imagess/logo2.png" class="img-fluid" alt="">
                        </div>
                        <div class="col-xl-4 offset-xl-1">
                            <form method="POST" action="createUser.php" onsubmit="return validateForm()">
                                <br><br>
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" id="email" class="form-control sign-font form-control-lg"
                                        name="email" placeholder="Email" />
                                </div>
                                <!-- Name input -->
                                <div class="form-outline mb-3">
                                    <input type="text" id="name" class="form-control sign-font form-control-lg"
                                        name="name" placeholder="Name" />
                                </div>
                                <!-- Contact input -->
                                <div class="form-outline mb-4">
                                    <input type="text" id="noPhone" class="form-control sign-font form-control-lg"
                                        name="noPhone" placeholder="NoPhone" />
                                </div>
                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" id="password" class="form-control sign-font form-control-lg"
                                        name="password" placeholder="Password" />
                                    <small id="passwordHelp" class="form-text text-muted">
                                    Password must be at least 8 characters long and include at least one uppercase letter,
                                    one lowercase letter, and one number.
                                    </small>
                                </div>
                                <br>
                                <div class="center">
                                    <button type="submit" class="btn" name="login" value="login"
                                        style="color:white">Sign Up</button>
                                </div>
                            </form>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php"
                                    class="link-pink"> Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
    function validateForm() {
    var email = document.getElementById('email').value;
    var name = document.getElementById('name').value;
    var noPhone = document.getElementById('noPhone').value;
    var password = document.getElementById('password').value;

    if (email === '' || name === '' || noPhone === '' || password === '') {
        alert('Please fill in all fields.');
        return false;
    }

    // Password validation
    var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]).{8,}$/;
    if (!passwordPattern.test(password)) {
        alert('Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character (!@#$%^&*()_+{}[]:;<>,.?~\\-).');
        return false;
    }

    return true;
}

</script>

       <!-- Start Footer Section -->
<footer class="footer-section">
  <div class="container relative">


    <div class="row g-5 mb-5">
      <div class="col-lg-4">
        <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">LushPetals<span>.</span></a></div>
        <p class="mb-4">Connect with us on social media to stay in bloom with the latest floral inspirations, behind-the-scenes moments, and exclusive offers. Follow us on Instagram, Twitter, and Facebook for a garden of beauty and creativity. Let's blossom together! 🌼 #LushPetals #FloralMagic #FollowUs 🌷</p>


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
              <li><a href="#">About Us</a></li>
              <li><a href="#">Services</a></li>
            </ul>
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


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>