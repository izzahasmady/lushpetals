<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get product details from the form
    $productId = intval($_POST['productId']);
    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = floatval($_POST['productPrice']);

    // Update the product details in the database
    $sqlUpdateProduct = "UPDATE product SET ProductName = '$productName', Price = $productPrice WHERE ProductID = $productId";

    if ($conn->query($sqlUpdateProduct) === TRUE) {
        echo "Product updated successfully";
        
        // Use JavaScript to delay the redirection
        echo '<script>
        setTimeout(function(){
            window.location.href = "productlist.php";
        }, 2000); // 2000 milliseconds (2 seconds) delay
         </script>';

    } else {
        echo "Error updating product: " . $conn->error;
    }
} else {
    // If the form is not submitted through POST method, redirect to the productlist.php
    header("Location: productlist.php");
    exit();
}

$conn->close();
?>

