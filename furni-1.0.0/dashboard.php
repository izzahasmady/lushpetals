<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Add your head content here -->
</head>

<body>

<!-- admin_details.html -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Admin Dashboard">
  <link rel="shortcut icon" href="favicon.png">
  <meta name="description" content="Admin Details" />
  <meta name="keywords" content="admin, details, bootstrap" />

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="css/adminstyle.css" rel="stylesheet">
  <title>Admin Details</title>
</head>

<body>

 <!-- Start Admin Header/Navigation -->
 <nav class="admin-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Admin dashboard navigation bar">
    <div class="container">
      <a class="navbar-brand" href="admin_dashboard.html">LushPetals<span>.</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="adminNav">
        <ul class="admin-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item active">
              <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
            <li><a class="nav-link" href="accountlist.php">Customer</a></li>
            <li><a class="nav-link" href="productlist.php">Products</a></li>
            <li><a class="nav-link" href="orderslist.php">Orders</a></li>
            <li><a class="nav-link" href="subscriptionlist.php">Subscription</a></li>
          </ul>
          <ul class="admin-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
            <li><a class="nav-link" href="#"><i class="fas fa-user"></i> Admin</a></li>
            <li><a class="nav-link" href="login.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
          </ul>
      </div>
    </div>
  </nav>
  <!-- End Admin Header/Navigation -->

<?php
// Database configuration
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "lushpetals";

// Create a database connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname) or die('Error connecting to database');

// Check the connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Query to retrieve data from the database
$sql = "SELECT * FROM orders"; // Replace 'your_table_name' with the actual table name

$result = $conn->query($sql);
?>

<!-- Start Admin Content Section -->
<div class="admin-content">
  <div class="container">

    <!-- Dashboard Content -->
    <section id="dashboard" class="dashboard-content">
      <div class="quote-container text-center">
        <div class="quote-text">
          <p class="mb-0">"The only limit to our realization of tomorrow will be our doubts of today."</p>
        </div>
        <div class="quote-author">
          <p class="mb-0">- Franklin D. Roosevelt</p>
        </div>
      </div>

      <h2 class="text-center" style="color: black;">Dashboard</h2>

      <!-- Display relevant statistics or information here -->
      <div class="row">
        <div class="col-md-4"; style="text-align: center; color: black;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Orders</h5>
              <?php
              // Query to get the total number of orders
              $totalOrdersSql = "SELECT COUNT(*) AS totalOrders FROM cart";
              $totalOrdersResult = $conn->query($totalOrdersSql);
              $totalOrders = $totalOrdersResult->fetch_assoc()['totalOrders'];
              ?>
              <p class="card-text"><?php echo $totalOrders; ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4"; style="text-align: center; color: black;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Customers</h5>
              <?php
              // Query to get the total number of customers
              $totalCustomersSql = "SELECT COUNT(*) AS totalCustomers FROM account";
              $totalCustomersResult = $conn->query($totalCustomersSql);
              $totalCustomers = $totalCustomersResult->fetch_assoc()['totalCustomers'];
              ?>
              <p class="card-text"><?php echo $totalCustomers; ?></p>
            </div>
          </div>
        </div>

        <div class="col-md-4"; style="text-align: center; color: black;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Products</h5>
              <?php
              // Query to get the total number of products
              $totalProductsSql = "SELECT COUNT(*) AS totalProducts FROM product";
              $totalProductsResult = $conn->query($totalProductsSql);
              $totalProducts = $totalProductsResult->fetch_assoc()['totalProducts'];
              ?>
              <p class="card-text"><?php echo $totalProducts; ?></p>
            </div>
          </div>
        </div>

        
       <!-- <div class="col-md-4"; style="text-align: center;"><br>
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Subscription</h5>
              <?php 
              // Query to get the total number of products
              //$totalSubscriptionSql = "SELECT COUNT(*) AS totalSubscription FROM subscription";
              //$totalSubscriptionResult = $conn->query($totalSubscriptionSql);
             // $totalSubscription = $totalSubscriptionResult->fetch_assoc()['totalSubscription'];
              ?> 
              <p class="card-text"> <?php // echo $totalSubscription; ?></p>
            </div>
          </div>
        </div> -->

        <!-- Display the Top 3 Hot Products -->
        <div class="col-md-12" style="text-align: center; color: black;">
          <h4 class="mt-4">Hot Products</h4>
          <div class="card">
            <div class="card-body">
              <?php
              // Query to get the top 3 hot products based on the highest number of purchases
              $topHotProductsSql = "
                SELECT product.ProductID, product.ProductName, COUNT(cart.ProductID) AS totalPurchases
                FROM product
                JOIN cart ON product.ProductID = cart.ProductID
                GROUP BY product.ProductID
                ORDER BY totalPurchases DESC
                LIMIT 3
              ";
              $topHotProductsResult = $conn->query($topHotProductsSql);

              if ($topHotProductsResult->num_rows > 0) {
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Product ID</th>';
                echo '<th>Product Name</th>';
                echo '<th>Total Purchases</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $topHotProductsResult->fetch_assoc()) {
                  echo '<tr>';
                  echo '<td>' . $row['ProductID'] . '</td>';
                  echo '<td>' . $row['ProductName'] . '</td>';
                  echo '<td>' . $row['totalPurchases'] . '</td>';
                  echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
              } else {
                echo '<p>No hot products found.</p>';
              }
              ?>
            </div>
          </div>
        </div>

        <!-- Display the Top 3 Hot Products , based on the highest total product purchase-->
        <!-- <div class="col-md-12" style="text-align: center; color: black;">
          <h4 class="mt-4">Hot Products</h4>
          <div class="card">
            <div class="card-body">
              <?php
              // Query to get the top 3 hot products based on the highest number of purchases
          /*    $topHotProductsSql = "
                SELECT product.ProductID, product.ProductName, COUNT(cart.ProductID) AS totalPurchases
                FROM product
                JOIN cart ON product.ProductID = cart.ProductID
                GROUP BY product.ProductID
                ORDER BY totalPurchases DESC, product.ProductID ASC
                LIMIT 3
              ";
              $topHotProductsResult = $conn->query($topHotProductsSql);

              if ($topHotProductsResult->num_rows > 0) {
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Product ID</th>';
                echo '<th>Product Name</th>';
                echo '<th>Total Purchases</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $topHotProductsResult->fetch_assoc()) {
                  echo '<tr>';
                  echo '<td>' . $row['ProductID'] . '</td>';
                  echo '<td>' . $row['ProductName'] . '</td>';
                  echo '<td>' . $row['totalPurchases'] . '</td>';
                  echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
              } else {
                echo '<p>No hot products found.</p>';
              } */
              ?> 
            </div>
          </div>
        </div>  -->

        
        <!-- Retrieve and display the latest 3 orders -->
        <div class="col-md-12" style="text-align: center; color: black;">
          <h4 class="mt-4">Latest Orders</h4>
          <div class="card">
            <div class="card-body">
              <?php
              // Query to get the latest 3 orders in descending order based on the date
              $latestOrdersSql = "SELECT * FROM cart ORDER BY date DESC LIMIT 3";
              $latestOrdersResult = $conn->query($latestOrdersSql);

              if ($latestOrdersResult->num_rows > 0) {
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Order ID</th>';
                echo '<th>Account ID</th>';
                echo '<th>Product Name</th>';
                echo '<th>Quantity</th>';
                echo '<th>Price (RM)</th>';
                echo '<th>Order Date</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = $latestOrdersResult->fetch_assoc()) {
                  echo '<tr>';
                  echo '<td>' . $row['cart_id'] . '</td>';
                  echo '<td>' . $row['AccountID'] . '</td>';
                  echo '<td>' . $row['ProductName'] . '</td>';
                  echo '<td>' . $row['quantity'] . '</td>';
                  echo '<td>' . $row['price'] . '</td>';
                  echo '<td>' . $row['date'] . '</td>';
                  echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
              } else {
                echo '<p>No orders found.</p>';
              }
              ?>
            </div>
          </div>
        </div>

        <!-- Add more cards for additional statistics as needed -->
      </div>
    </section>
  </div>
</div>
<!-- End Admin Content Section -->

<!-- Start Admin Footer Section (Use the existing admin footer) -->
<!-- ... -->

<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/custom.js"></script>
</body>

</html>
