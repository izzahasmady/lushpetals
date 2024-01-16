<?php
include 'dbconn.php';
session_start();
$AccountID = $_SESSION['AccountID']; // Adjust this based on your session structure

// Flowerb Section
$flowerbResult = mysqli_query($conn, "SELECT ProductName, Price, image, ProductID, ServiceType FROM product WHERE ServiceType = 'Flowerb'");
?>

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
				<a class="navbar-brand" href="index.html">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="index.html">Home</a>
						</li>
						<li class="active"><a class="nav-link" href="shop.html">Shop</a></li>
						<li><a class="nav-link" href="about.html">About us</a></li>
						<li><a class="nav-link" href="services.html">Services</a></li>
						<li><a class="nav-link" href="blog.html">Blog</a></li>
						<li><a class="nav-link" href="contact.html">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						<li><a class="nav-link" href="#"><img src="images/user.svg"></a></li>
						<li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li>
					</ul>
				</div>
			</div>
				
		</nav>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->


<body>

    <!-- Navigation section remains unchanged -->

    <!-- Hero Section remains unchanged -->

    <!-- Flowerb Products Section -->
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <h2>Flowerb Products</h2>
            <div class="row">
                <?php
                if ($flowerbResult && mysqli_num_rows($flowerbResult) > 0) {
                    while ($row = mysqli_fetch_assoc($flowerbResult)) {
                        ?>
                         <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <form method="POST" action="login.php">
                            <div class="product-item">
                                <img src="images/<?php echo $row["image"]; ?>" alt="" style="max-width: 100%; height: auto;">
                                <h3><?php echo $row["ProductName"] ?></h3>
                                <p>RM<?php echo $row["Price"]; ?></p>
                                <input type="text" id="quantity" name="quantity" value="1">
                                <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["ProductName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                <input type="hidden" name="hidden_id" value="<?php echo $row["ProductID"]; ?>">
                                <input type="submit" name="add_to_cart" value="Add to Cart">
                            </div>
                            </form>
                        </div>
                    <?php
                }
            } else {
                echo "No Flowerb products available";
            }
            ?>
        </div>
    </div>
</div>

<!-- Surprise Delivery Section -->
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <h2>Surprise Delivery Products</h2>
        <div class="row">
            <?php
            $surpriseDeliveryResult = mysqli_query($conn, "SELECT ProductName, Price, image, ProductID, ServiceType FROM product WHERE ServiceType = 'SurpriseDelivery'");

            if ($surpriseDeliveryResult && mysqli_num_rows($surpriseDeliveryResult) > 0) {
                while ($row = mysqli_fetch_assoc($surpriseDeliveryResult)) {
                    ?>
                    <div class="col-12 col-md-4 col-lg-3 mb-5">
                        <form method="POST" action="login.php">
                            <div class="product-item">
                                <img src="images/<?php echo $row["image"]; ?>" alt="" style="max-width: 100%; height: auto;">
                                <h3><?php echo $row["ProductName"] ?></h3>
                                <p>RM<?php echo $row["Price"]; ?></p>
                                <input type="text" id="quantity" name="quantity" value="1">
                                <input type="hidden" name="hidden_image" value="<?php echo $row["image"]; ?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["ProductName"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>">
                                <input type="hidden" name="hidden_id" value="<?php echo $row["ProductID"]; ?>">
                                <input type="submit" name="add_to_cart" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                <?php
            }
        } else {
            echo "No Surprise Delivery products available";
        }
        ?>
    </div>
</div>
</div>

<!-- Footer section remains unchanged -->

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/tiny-slider.js"></script>
<script src="js/custom.js"></script>
</body>

</html>