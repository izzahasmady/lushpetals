<?php
session_start(); // Start the session if it's not already started

if (isset($_POST['add_to_cart'])) {
    include 'dbconn.php'; // Include your database connection file

    // Retrieve form data
    $product_id = $_POST['hidden_id'];
    $product_name = $_POST['hidden_name'];
    $price = $_POST['hidden_price'];
    $image = $_POST['hidden_image'];
    $product_quantity = $_POST['quantity'];

    // Retrieve the user ID (assuming the user is logged in)
    $AccountID = $_SESSION['AccountID']; // Adjust this based on your session structure

    // Retrieve SubscriptionType and ServiceType based on the user's AccountID
    $subscription_query = "SELECT SubscriptionType FROM subscription WHERE AccountID = ?";
    $stmt = mysqli_prepare($conn, $subscription_query);
    mysqli_stmt_bind_param($stmt, "i", $AccountID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $SubscriptionType);

    // Fetch the result into the SubscriptionType variable
    mysqli_stmt_fetch($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);

    // Retrieve ServiceType based on the product ID
    $product_query = "SELECT ServiceType FROM product WHERE ProductID = ?";
    $stmt_product = mysqli_prepare($conn, $product_query);
    mysqli_stmt_bind_param($stmt_product, "i", $product_id);
    mysqli_stmt_execute($stmt_product);
    mysqli_stmt_bind_result($stmt_product, $ServiceType);

    // Fetch the result into the ServiceType variable
    mysqli_stmt_fetch($stmt_product);

    // Close the statement
    mysqli_stmt_close($stmt_product);

    // Get the current date
    $currentDate = date('Y-m-d H:i:s'); // Adjust the format as needed

    // Prepare the INSERT statement to add the product to the cart table
    $insert_cart = mysqli_prepare($conn, "INSERT INTO cart (AccountID, ProductID, ProductName, price, image, quantity, SubscriptionType, ServiceType, date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($insert_cart, "iisdissss", $AccountID, $product_id, $product_name, $price, $image, $product_quantity, $SubscriptionType, $ServiceType, $currentDate);

    // Execute the statement to add the product to the cart
    if (mysqli_stmt_execute($insert_cart)) {
        echo "Product added to cart successfully.";
        // Redirect or perform other actions after successful insertion
        header("Location: cart.php"); // Redirect to the cart page
        exit();
    } else {
        echo "Error adding product to cart: " . mysqli_error($conn);
    }

    // Close the prepared statement
    mysqli_stmt_close($insert_cart);
}
?>
