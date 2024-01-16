<?php
include 'dbconn.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $productId = $_GET['id'];

    // Delete the item from the cart where ProductID matches
    $sqlRemove = "DELETE FROM cart WHERE ProductID = $productId";
    if ($conn->query($sqlRemove) === TRUE) {
        // Redirect back to the cart page after item removal
        header("location: cart.php");
        exit();
    } else {
        // Handle errors if the query fails
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
