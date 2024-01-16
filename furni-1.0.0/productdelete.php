<?php
include 'dbconn.php';

// Check if productId is set in the request
if (isset($_GET['id'])) {
    $productId = intval($_GET['id']); // Use 'id' as the parameter name

    // Delete the user
    $sqlDeleteProduct = "DELETE FROM product WHERE ProductID = $productId";

    if ($conn->query($sqlDeleteProduct) === TRUE) {
        // User deleted successfully
        header("location: productlist.php"); // Redirect to product dashboard or any desired page
        exit();
    } else {
        // Handle errors if the query fails
        echo "Error: " . $sqlDeleteProduct . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request. id parameter is missing.";
}

$conn->close();
?>
