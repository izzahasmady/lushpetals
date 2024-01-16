<?php
include 'dbconn.php';

// Check if userId is set in the request
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']); // Use 'id' as the parameter name

    // Delete the user
    $sqlDeleteUser = "DELETE FROM account WHERE AccountID = $userId";

    if ($conn->query($sqlDeleteUser) === TRUE) {
        // User deleted successfully
        header("location: accountlist.php"); // Redirect to customer dashboard or any desired page
        exit();
    } else {
        // Handle errors if the query fails
        echo "Error: " . $sqlDeleteUser . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request. id parameter is missing.";
}

$conn->close();
?>
