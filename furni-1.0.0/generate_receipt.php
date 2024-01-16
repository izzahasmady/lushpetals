<?php
session_start(); // Start the session if it's not already started

// Include the database connection file
include 'dbconn.php';

$AccountID = isset($_SESSION['AccountID']) ? $_SESSION['AccountID'] : null;

if ($AccountID !== null) {
    // Fetch cart items from the database for the logged-in user
    $sql = "SELECT cart.cart_id, cart.ProductID, cart.ProductName, cart.price, product.image, product.ServiceType, cart.SubscriptionType, SUM(cart.quantity) as quantity 
            FROM cart 
            JOIN product ON cart.ProductID = product.ProductID
            WHERE cart.AccountID = $AccountID
            GROUP BY cart.ProductID";

    $result = $conn->query($sql);

    // Initialize subtotal
    $subtotal = 0;

    // Initialize additional charges
    $serviceCharge = 0;
    $deliveryCharge = 0;
} else {
    // Handle the case where AccountID is not set
    echo "Error: AccountID not set.";
    exit();
}
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
  
  <style>
    /* Add your custom styles for the receipt */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .container {
      margin-top: 50px;
    }

    .receipt-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #343a40;
    }

    p {
      color: #6c757d;
    }

    .product-item {
      border-bottom: 1px solid #dee2e6;
      padding: 10px 0;
    }

    .product-thumbnail {
      max-width: 80px;
      max-height: 80px;
      margin-right: 20px;
    }
  </style>
</head>
<body>
  <!-- Start Header/Navigation -->
  <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Furni<span>.</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" href="userindex.php">Home</a>
          </li>
          <li><a class="nav-link" href="shop.php">Shop</a></li>
          <li><a class="nav-link" href="aboutUser.html">About us</a></li>
          <li><a class="nav-link" href="userMembership.php">Membership</a></li>
        </ul>
        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li><a class="nav-link" href="profile.php"><img src="images/user.svg"></a></li>
          <li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li>
          <li><a class="nav-link" href="login.php"><img class="nav-icon" src="images/logout.png" style="width: 24px; height: 24px;"></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Header/Navigation -->

  <!-- Receipt Content -->
  <div class="container">
    <div class="receipt-container">
      <h1>Receipt</h1>

      <!-- Display Date -->
      <p><strong>Date:</strong> <?php echo date("Y-m-d H:i:s"); ?></p>

      <!-- Display AccountID -->
      <p><strong>AccountID:</strong> <?php echo $AccountID; ?></p>

      <!-- Display cart items in the receipt -->
      <?php
      if ($result->num_rows > 0) {
        $flowerbSelected = false; // Flag to check if flowerb is selected
        $surpriseDeliverySelected = false; // Flag to check if SurpriseDelivery is selected

        while ($row = $result->fetch_assoc()) {
          echo '<div class="product-item">';
          echo '<p><strong>CartID:</strong> ' . $row["cart_id"] . '</p>';
          echo '<img src="images/' . $row["image"] . '" alt="Product Image" class="product-thumbnail">';
          echo '<p><strong>Product:</strong> ' . $row["ProductName"] . '</p>';
          echo '<p><strong>Price:</strong> $' . $row["price"] . '</p>';
          echo '<p><strong>Quantity:</strong> ' . $row["quantity"] . '</p>';
          echo '<p><strong>Subscription Type:</strong> ' . $row["SubscriptionType"] . '</p>'; // Added Subscription Type
          echo '<p><strong>Total:</strong> $' . ($row["price"] * $row["quantity"]) . '</p>';
          echo '</div>';
          $subtotal += $row["price"] * $row["quantity"];

          // Check ServiceType and add charges accordingly
          if ($row["ServiceType"] == "SurpriseDelivery") {
            $serviceCharge += 70; // Add RM70 for Surprise Delivery service charge
            $surpriseDeliverySelected = true;
          } elseif ($row["ServiceType"] == "flowerb") {
            $flowerbSelected = true;
          }
        }

        // Calculate delivery charge based on ServiceType
        if ($flowerbSelected && $surpriseDeliverySelected) {
          $deliveryCharge = 50; // Add RM50 for delivery charge if both ServiceTypes are selected
        } elseif ($flowerbSelected || $surpriseDeliverySelected) {
          $deliveryCharge = 50; // Add RM50 for delivery charge
        }
      }

      // Display subtotal, delivery charge, service charge, and total
      $totalAmount = $subtotal + $deliveryCharge + $serviceCharge;
      ?>
      <!-- Display subtotal, delivery charge, and total -->
      <p><strong>Subtotal:</strong> $<?php echo number_format($subtotal, 2); ?></p>
      <p><strong>Delivery Charge:</strong> $<?php echo number_format($deliveryCharge, 2); ?></p>
      <?php
      if ($serviceCharge > 0) {
        echo '<p><strong>Service Charge:</strong> $' . number_format($serviceCharge, 2) . '</p>';
      }
      ?>
      <p><strong>Total:</strong> $<?php echo number_format($totalAmount, 2); ?></p>

      <!-- Display Delivery Status -->
      <p><strong>Delivery Status:</strong> Pending</p>
      <!-- You can replace "Pending" with the actual delivery status -->

    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
