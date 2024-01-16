<?php
include 'dbconn.php';

// Check if productId is set in the request
if (isset($_GET['id'])) {
    $cartId = intval($_GET['id']); // Use 'id' as the parameter name

    // Delete the user
    $sqlDeleteCart = "DELETE FROM cart WHERE cart_id = $cartId";

    if ($conn->query($sqlDeleteCart) === TRUE) {
        // User deleted successfully
        header("location: orderlist.php"); // Redirect to product dashboard or any desired page
        exit();
    } else {
        // Handle errors if the query fails
        echo "Error: " . $sqlDeleteCart . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request. id parameter is missing.";
}

$conn->close();
?>
