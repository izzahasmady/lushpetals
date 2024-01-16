<?php
include 'dbconn.php';

// Check if subscriptionId is set in the request
if (isset($_GET['id'])) {
    $subscriptionId = intval($_GET['id']); // Use 'id' as the parameter name

    // Delete the subscription
    $sqlDeleteSubscription = "DELETE FROM subscription WHERE SubscriptionID = $subscriptionId";

    if ($conn->query($sqlDeleteSubscription) === TRUE) {
        // Subscription deleted successfully
        header("location: subscriptionlist.php"); // Redirect to the subscription list or any desired page
        exit();
    } else {
        // Handle errors if the query fails
        echo "Error: " . $sqlDeleteSubscription . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request. id parameter is missing.";
}

$conn->close();
?>
