<?php
include 'dbconn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if cart_id and deliveryStatus are set in the request
    if (isset($_POST['cart_id'], $_POST['deliveryStatus'])) {
        $cartId = intval($_POST['cart_id']);
        $deliveryStatus = $_POST['deliveryStatus'];

        // Update the delivery status in the database
        $sqlUpdateDeliveryStatus = "UPDATE cart SET deliveryStatus = '$deliveryStatus' WHERE cart_id = $cartId";

        if ($conn->query($sqlUpdateDeliveryStatus) === TRUE) {
            echo "Delivery status updated successfully.";
            // Use JavaScript to delay the redirection
            echo '<script>
            setTimeout(function(){
                window.location.href = "orderslist.php";
            }, 1000); // 1000 milliseconds (2 seconds) delay
            </script>';

        } else {
            echo "Error updating delivery status: " . $conn->error;
        }
    } else {
        echo "Invalid request. cart_id or deliveryStatus parameter is missing.";
    }

    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
