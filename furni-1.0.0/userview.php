<?php
include 'dbconn.php';

// Check if userId is set in the request
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    // Retrieve user details
    $sqlGetUser = "SELECT * FROM account WHERE AccountID = $userId";
    $result = $conn->query($sqlGetUser);

    if ($result->num_rows > 0) {
        $userDetails = $result->fetch_assoc();
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
    <title>User View</title>
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
        <div class="user-details-box" >
            <h2>Customer Details</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Account ID</td>
                        <td><?php echo $userDetails['AccountID']; ?></td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td><?php echo $userDetails['Name']; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $userDetails['Email']; ?></td>
                    </tr>
                    <tr>
                        <td>No Phone</td>
                        <td><?php echo $userDetails['NoPhone']; ?></td>
                    </tr>
                    <tr>
                        <td>Role</td>
                        <td><?php echo $userDetails['role']; ?></td>
                    </tr>

                </tbody>
            </table>
            <a href="accountlist.php" class="btn btn-primary">Back to Customer List</a>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
