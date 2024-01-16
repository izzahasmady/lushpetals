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
  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname)  or die('Error connecting to database');

  // Check the connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Query to retrieve data from the database
  $sql = "SELECT * FROM account"; 

  $result = $conn->query($sql);
  ?>

  <!-- Start Admin Header/Navigation (Use the existing admin header) -->
  <!-- ... -->

  <!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <!-- Start Admin Content Section -->
<div class="admin-content">
    <div class="container">

        <!-- Product List Content -->
        <section id="accountList" class="account-list-content" >
            <h2 style="text-align: center; color: black";>Customer List</h2>
            <!-- Flower Bouquet List Table -->
            <table class="table">
                <thead>
                    <tr>
                        <th>Account ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        
                        <th>No Phone</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop through the database results and display them in the table
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['AccountID'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        
                        echo "<td>" . $row['NoPhone'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";
                        echo "<td>";
                        echo '<a href="userview.php?id=' . $row['AccountID'] . '" class="btn btn-info btn-sm">View</a>';
                        echo '<a href="userdelete.php?id=' . $row['AccountID'] . '" class="btn btn-danger btn-sm mx-1" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a>';   
                        echo '</td>';
                        echo "</tr>";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
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