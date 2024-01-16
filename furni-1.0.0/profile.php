<?php
// profile.php

// Start the session
session_start();

// Include your database connection file (dbconn.php)
include 'dbconn.php';
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

    <style>
        .nav-link img {
            width: 24px;
            height: 24px;
        }

        /* Add your custom styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .container-fluid {
            padding: 0;  /* Reset padding for full-width container */
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .navbar {
            margin-bottom: 0;
        }

        .navbar-collapse {
            margin-top: -8px; /* Adjust this value to fine-tune the spacing */
        }

        .profile-card-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px; /* Add margin for spacing */
        }

        .profile-card {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 12px; /* Increased border-radius for rounded corners */
            text-align: center;
            border: 4px solid #4caf50; /* Adjust border thickness and color */
            width: 400px; /* Adjust the width as needed */
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            overflow: hidden;
            margin: 0 auto 20px;
            border-radius: 50%;
        }

        .profile-picture img {
            width: 100%;
            border-radius: 50%;
        }

        .profile-name {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        p {
            margin: 10px 0;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>
<body>
   <!-- Start Header/Navigation -->
   <div class="container-fluid"> <!-- Use container-fluid for full-width container -->
        <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
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
                    <li><a class="nav-link" href="about.html">About us</a></li>
                    <li><a class="nav-link" href="userMembership.php">Membership</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="profile.php"><img src="images/user.svg"></a></li>
                    <li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li>
                    <li><a class="nav-link" href="login.php"><img class="nav-icon" src="images/logout.png" style="width: 24px; height: 24px;"></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Header/Navigation -->

    <?php
        // Initialize variables with default values
        $name = $email = $phone = $image = "";

        // Check if the user is logged in
        if (!isset($_SESSION['email'])) {
            // Redirect to the login page if the user is not logged in
            header("Location: login.php");
            exit();
        }

        // Retrieve user email from the session
        $userEmail = $_SESSION['email'];

        // Fetch user data from the database (using prepared statement to prevent SQL injection)
        $query = "SELECT Name, Email, NoPhone, image FROM account WHERE Email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                // Data is returned, proceed with fetching and assigning values
                $row = mysqli_fetch_assoc($result);

                // Assign retrieved data to variables with default values
                $name = isset($row['Name']) ? $row['Name'] : "Default Name";
                $email = isset($row['Email']) ? $row['Email'] : "Default Email";
                $phone = isset($row['NoPhone']) ? $row['NoPhone'] : "Default Phone";
                $image = isset($row['image']) ? $row['image'] : "defaultprofile.jpg";

                // Close the prepared statement
                mysqli_stmt_close($stmt);

                // Close the database connection
                mysqli_close($conn);
            } else {
                // No data found
                echo "No user data found.";
            }
        } else {
            // Handle the case where the query fails
            die("Error: " . mysqli_error($conn));
        }
    ?>

    <div class="profile-card-container">
        <div class="profile-card">
            <h2>User Profile</h2>
            <div class="profile-picture">
                <!-- Update the image source if needed -->
                <img src="<?php echo $image; ?>" alt="Profile Picture">
            </div>
            <div class="profile-name"><?php echo $name; ?></div>
            <p>Email: <?php echo $email; ?></p>
            <p>Phone: <?php echo $phone; ?></p>
            <button id="editButton">Edit</button>
        </div>
    </div>

    <script>
        document.getElementById('editButton').addEventListener('click', function() {
            window.location.href = 'updateProfile.php';
        });
    </script>
</body>
