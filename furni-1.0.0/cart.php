<?php
include 'dbconn.php';
session_start();

$AccountID = $_SESSION['AccountID'];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_quantity'])) {
        foreach ($_POST['ProductID'] as $productId => $value) {
            $quantity = $_POST['quantity'][$productId];

            // Get the image path for the selected product
            $imageSql = "SELECT image FROM product WHERE ProductID = $productId";
            $imageResult = $conn->query($imageSql);
            $imageRow = $imageResult->fetch_assoc();
            $image = $imageRow['image'];

            // Perform the update query here
            $updateSql = "UPDATE cart SET quantity = $quantity, image = '$image' WHERE ProductID = $productId AND AccountID = $AccountID";
            $conn->query($updateSql);
        }
    }
}

$sql = "SELECT p.ProductID, p.ProductName, p.Price, p.image, SUM(c.quantity) as quantity 
        FROM cart c
        JOIN product p ON c.ProductID = p.ProductID
        WHERE c.AccountID = $AccountID
        GROUP BY c.ProductID";

$result = $conn->query($sql);

$subtotal = 0;
?>

<!DOCTYPE html>
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
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
      <a class="navbar-brand" href="index.html">LushPetals<span>.</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item ">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li><a class="nav-link" href="shop.html">Shop</a></li>
          <li><a class="nav-link" href="about.html">About us</a></li>
          <li><a class="nav-link" href="userMembership.php">Membership</a></li>
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
            <h1>Cart</h1>
          </div>
        </div>
        <div class="col-lg-7">

        </div>
      </div>
    </div>
  </div>
  <!-- End Hero Section -->

  <div class="untree_co-section before-footer-section">
    <div class="container">
      <div class="row mb-5">
        <form method="post" action="cart.php">
          <div class="site-blocks-table">
            <table class="table">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    // Display each distinct product in a row
                    echo '<tr>';
                    echo '<td class="product-thumbnail"><img src="images/' . $row["image"] . '" alt="Product Image" class="img-fluid"></td>';
                    echo '<td class="product-name">' . $row["ProductName"] . '</td>';
                    echo '<td class="product-price">$' . $row["Price"] . '</td>';
                    echo '<td class="product-quantity">
                                      <input type="number" name="quantity[' . $row["ProductID"] . ']" value="' . $row["quantity"] . '" min="1">
                                      <input type="hidden" name="ProductID[' . $row["ProductID"] . ']" value="' . $row["ProductID"] . '">
                                      <button type="submit" name="update_quantity">Update</button>
                                  </td>';
                    echo '<td class="product-total">$' . ($row["Price"] * $row["quantity"]) . '</td>';
                    echo '<td class="product-remove"><a href="remove_from_cart.php?id=' . $row["ProductID"] . '">Remove</a></td>';
                    echo '</tr>';

                    // Update subtotal
                    $subtotal += $row["Price"] * $row["quantity"];
                  }
                } else {
                  // Display a message if there are no items in the cart
                  echo "<tr><td colspan='6'>No items in the cart.</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </form>
        <div class="col-md-6">
          <a href="shop.php" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <!-- ... -->
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">$<?php echo number_format($subtotal, 2); ?></strong>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                  <strong class="text-black">$<?php echo number_format($subtotal, 2); ?></strong>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='generate_receipt.php'">Proceed To Checkout</button>
                </div>
              </div>
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
          <p class="mb-4">
            Connect with us on social media to stay in bloom with the latest floral inspirations, behind-the-scenes moments, and exclusive offers. Follow us on Instagram, Twitter, and Facebook for a garden of beauty and creativity. Let's blossom together! 🌼 #LushPetals #FloralMagic #FollowUs 🌷</p>

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
              </ul>
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