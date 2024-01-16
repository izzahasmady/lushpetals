<?php
include 'dbconn.php';

// Check if userId is set in the request
if (isset($_GET['id'])) {
    $cartId = intval($_GET['id']);

    // Retrieve user details
    $sqlGetCart = "SELECT * FROM cart WHERE cart_id = $cartId";
    $result = $conn->query($sqlGetCart);

    if ($result->num_rows > 0) {
        $cartDetails = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "Invalid request. id parameter is missing.";
    exit();
}

$conn->close();
?>

<!-- userview.php -->
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
    <title>Product View</title>
</head>

<body>

<!-- Start Admin Header/Navigation -->
<nav class="admin-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Admin dashboard navigation bar">
    <div class="container">
      <a class="navbar-brand" href="admin_dashboard.html">LushPetals<span>.</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <!-- End Admin Header/Navigation -->

    <div class="container">
        <div class="user-details-box">
            <h2>Order Details</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Order ID</td>
                        <td><?php echo $cartDetails['cart_id']; ?></td>
                    </tr>
                    <tr>
                        <td>Product ID</td>
                        <td><?php echo $cartDetails['ProductID']; ?></td>
                    </tr>
                    <tr>
                        <td>Product Name</td>
                        <td><?php echo $cartDetails['ProductName']; ?></td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td><?php echo $cartDetails['quantity']; ?></td>
                    </tr>
                    <tr>
                        <td>Price (RM)</td>
                        <td><?php echo $cartDetails['price']; ?></td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td><?php echo $cartDetails['date']; ?></td>
                    </tr>
                   <!-- Your HTML form for updating delivery status -->
                   <tr>
                    <td>
                        <form action="cartupdate.php" method="post">
                            <input type="hidden" name="cart_id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>">

                            <label for="deliveryStatus">Delivery Status:</label>
                            <select name="deliveryStatus" required>
                                <option value="Choose Status">Choose Status</option>
                                <option value="Process">Process</option>
                                <option value="Pending">Pending</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                    </td>
                </tr>

                <!-- New row for buttons -->
                <tr>
                    <td>
                        <input type="submit" name="submit" class="btn btn-primary">
                        <a href="orderslist.php" class="btn btn-primary">Cancel</a>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>


