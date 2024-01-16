<?php
// updateProfile.php

session_start();

// Include your database connection file (dbconn.php)
include 'dbconn.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['email'];

// Fetch user data from the database
$query = "SELECT Name, Email, NoPhone, image, password FROM account WHERE Email = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result) {
    $row = $result->fetch_assoc();

    // Assign retrieved data to variables
    $name = $row['Name'];
    $email = $row['Email'];
    $phone = $row['NoPhone'];
    $image = $row['image'];
    $storedPassword = $row['password'];
} else {
    // Handle the case where the query fails
    echo "Error: " . $stmt->error;
    die();
}

// Handle form submission for updating profile
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saveChanges'])) {
 // Handle password update
if (!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmPassword'])) {
    // Validate old password
    $oldPassword = $_POST['oldPassword'];

    // Verify old password
    if ($oldPassword == $storedPassword) {
        echo "Old password verification successful"; // Debug statement

        // Update password
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($newPassword === $confirmPassword) {
            echo "New password matches confirm password"; // Debug statement

            $updatePasswordQuery = "UPDATE account SET password = ? WHERE Email = ?";
            $stmt = $conn->prepare($updatePasswordQuery);
            $stmt->bind_param("ss", $newPassword, $userEmail);
            $stmt->execute();
        } else {
            echo "New password and confirm password do not match.";
            die();
        }
    } else {
        echo "Old password verification failed.";
        die();
    }
}

// Handle image update
if (!empty($_FILES['newPicture']['name'])) {
    $newPicture = $_FILES['newPicture'];

    // Perform validation and upload logic for the new image
    $targetDirectory = "images/"; // Adjust the directory path as needed
    $newImagePath = $targetDirectory . basename($newPicture['name']);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($newPicture['tmp_name'], $newImagePath)) {
        // Update the image path in the database
        $updateImageQuery = "UPDATE account SET image = ? WHERE Email = ?";
        $stmt = $conn->prepare($updateImageQuery);
        $stmt->bind_param("ss", $newImagePath, $userEmail);
        $stmt->execute();
        
        // Update the $image variable with the new image path
        $image = $newImagePath;
    } else {
        echo "Error uploading image.";
        die();
    }
}

    // Handle other updates (email, phone) as needed
    $newEmail = !empty($_POST['newEmail']) ? $_POST['newEmail'] : $email;
    $newPhone = !empty($_POST['newPhone']) ? $_POST['newPhone'] : $phone;

    $updateEmailPhoneQuery = "UPDATE account SET Email = ?, NoPhone = ? WHERE Email = ?";
    $stmt = $conn->prepare($updateEmailPhoneQuery);
    $stmt->bind_param("sss", $newEmail, $newPhone, $userEmail);
    $stmt->execute();

    // Redirect to the profile page after successful updates
    header("Location: profile.php");
    exit();
}

// Close the database connection after handling the form submission
$stmt->close();
$conn->close();
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
    <style>
    .nav-link img {
        width: 24px;
        height: 24px;
    }

    /* Add your custom styles here */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        flex-direction: column;
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

    h2 {
            text-align: center; /* Center the heading */
            margin-bottom: 20px;
        }

        .update-profile-form {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #4caf50; /* Added border styling */
            padding: 40px;
            border-radius: 12px; /* Increased border-radius for a rounded appearance */
            width: 80%; /* Adjusted width for responsiveness */
            max-width: 700px; /* Added max-width for responsiveness */
            margin: 20px auto; /* Center the box horizontally */
        }

    .profile-picture {
        text-align: center;
        margin-bottom: 20px;
    }

    .profile-picture img {
        max-width: 100%;
        border-radius: 50%;
    }

    label {
        display: block;
        margin-top: 15px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-top: 8px;
        margin-bottom: 20px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    input[type="password"],
    input[type="email"],
    input[type="tel"] {
        width: 100%;
        display: inline-block;
    }

    input[type="file"] {
        width: 100%;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: #fff;
        cursor: pointer;
    }

    a {
        display: block;
        text-align: center;
        color: #333;
        text-decoration: none;
        margin-top: 15px;
    }

    .non-editable {
        background-color: #f4f4f4;
        pointer-events: none;
    }
</style>

    </style>
</head>
<body>
     <!-- Start Header/Navigation -->
   <div class="container-fluid"> <!-- Use container-fluid for full-width container -->
        <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
            <a class="navbar-brand" href="index.html">LushPetals<span>.</span></a>

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

    <div class="update-profile-form">
        <h2>Update Profile</h2>

        <!-- Profile Picture Section -->
        <div class="profile-picture">
            <img src="<?php echo $image; ?>" alt="Profile Picture">
        </div>

        <!-- Update Profile Form -->
        <form action="updateProfile.php" method="post" enctype="multipart/form-data">
            <!-- Name (Non-editable) -->
            <label for="update_name">Name:</label>
            <input type="text" name="update_name" value="<?php echo $name; ?>" class="non-editable" readonly>

            <!-- Email (Non-editable) -->
            <label for="update_email">Email:</label>
            <input type="email" name="update_email" value="<?php echo $email; ?>" class="non-editable" readonly>
            
            <!-- NoPhone -->
            <label for="newPhone">NoPhone:</label>
            <input type="tel" name="newPhone" value="<?php echo $phone; ?>">

            <!-- Old Password -->
            <label for="oldPassword">Old Password:</label>
            <input type="password" name="oldPassword">

            <!-- New Password -->
            <label for="newPassword">New Password:</label>
            <input type="password" name="newPassword">

            <!-- Confirm Password -->
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword">

           <!-- Choose New Picture -->
           <label for="newPicture">Choose New Picture:</label>
            <input type="file" name="newPicture" accept="images/*">

           <!-- Save Changes Button -->
           <input type="submit" name="saveChanges" value="Save Changes">

<!-- Go Back to Profile Button -->
<a href="profile.php">Go Back to Profile</a>
</form>
</div>
</body>
</html>