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
						<li><a class="nav-link" href="guestShop.php">Shop</a></li>
						<li class="active"><a class="nav-link" href="aboutUser.html">About Us</a></li>
						<li><a class="nav-link" href="guestMembership.php">Membership</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="login.php"><img src="images/user.svg"></a></li>
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
                    <div class="col-xl-5 ">

                        <?php
                        session_start();
                        include 'dbconn.php';

                        $emailErr = $passwordErr = $roleErr = '';

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
                            // Validate email
                            if (isset($_POST['email'])) {
                                $email = $_POST['email'];
                                $emailErr = "";
                            } else {
                                $emailErr = "Email is required";
                            }

                            // Validate password
                            if (isset($_POST['password'])) {
                                $password = $_POST['password'];
                                $passwordErr = "";
                            } else {
                                $passwordErr = "Password is required";
                            }

                            if (empty($passwordErr) || empty($emailErr)) {
                                $sql = "SELECT * FROM account a WHERE a.email = '$email' AND a.password = '$password'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);

                                if (mysqli_num_rows($result) == 1) {
                                    $_SESSION['email'] = $email;
                                    $_SESSION['password'] = $password;
                                    $_SESSION['role'] = $row["role"];
                                    $_SESSION['AccountID'] = $row["AccountID"];
                                    $_SESSION['name'] = $row["name"];

                                    if ($email === 'admin@gmail.com' && $password === 'admin123') {
                                        $_SESSION['role'] = 'Admin';
                                        header("Location: adminIndex.php");
                                        exit();
                                    } else {
                                        $_SESSION['role'] = 'User';
                                        header("Location: userIndex.php");
                                        exit();
                                    }
                                } else {
                                    echo "<span style='color: red'> Incorrect email and/or password. Please login again.</span><br>";
                                }
                            }
                        } else {
                            // Display the message only if the user hasn't entered any input
                            if (empty($_POST['email']) && empty($_POST['password'])) {
                                echo '<p style="color:Green;">Hello! Please enter your login credentials!</p>';
                            }
                            $email = '';
                            $_SESSION['email'] = '';
                        }
                        if (empty($_SESSION['email'])) {
                            ?>
                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <!-- Email input -->
                                <div class="form-outline mb-3">
                                    <input type="email" id="email" class="form-control sign-font form-control-lg"
                                           name="email" placeholder="Email"/>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" id="password" class="form-control sign-font form-control-lg"
                                           name="password" placeholder="Password"/>
                                </div>

                                <div class="center">
                                    <button type="submit" class="btn" name="login" value="login" style="color:white">Login
                                    </button>
                                </div>
                            </form>

                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                                                                                               class="link-pink"> Register</a>
                            </p>
                        </div>

                        <?php
                        } else {
                            echo "<a href='logout.php'>Click to log out</a>";
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contact us</a></li>
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