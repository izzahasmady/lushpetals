<?php
include 'dbconn.php';
session_start();

if (isset($_POST['update_quantity'])) {
    $ProductID = $_POST['ProductID'];
    $newQuantity = $_POST['quantity'];

    // Validate the new quantity
    if ($newQuantity <= 0) {
        // Redirect back to the cart page with an error message
        header("Location: cart.php?error=InvalidQuantity");
        exit();
    }

    // Update the quantity in the cart table
    $AccountID = $_SESSION['AccountID'];
    $updateSql = "UPDATE cart SET quantity = $newQuantity WHERE AccountID = $AccountID AND ProductID = $ProductID";

    if ($conn->query($updateSql) === TRUE) {
        // Redirect back to the cart page with a success message
        header("Location: cart.php?success=QuantityUpdated");
        exit();
    } else {
        // Redirect back to the cart page with an error message
        header("Location: cart.php?error=DatabaseError");
        exit();
    }
} else {
    // Redirect back to the cart page if the form is not submitted properly
    header("Location: cart.php");
    exit();
}
?>
