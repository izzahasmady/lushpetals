<?php
session_start();

if (isset($_SESSION['email'])) {
    include 'dbconn.php';

    $action = isset($_POST['action']) ? $_POST['action'] : '';
    $subscriptionID = isset($_POST['SubscriptionID']) ? (int)$_POST['SubscriptionID'] : 0;
    $subscriptionType = isset($_POST['SubscriptionType']) ? $_POST['SubscriptionType'] : '';
    $userEmail = filter_var($_SESSION['email'], FILTER_VALIDATE_EMAIL);
    $accountID = isset($_SESSION['AccountID']) ? $_SESSION['AccountID'] : 0;

    if ($action === 'subscribe') {
        $result = subscribeSubscription($conn, $subscriptionID, $subscriptionType, $userEmail, $accountID);
        echo $result;
    } elseif ($action === 'cancel') {
        $result = cancelSubscription($conn, $subscriptionID, $userEmail, $accountID);
        echo $result;
    } else {
        echo "Invalid action.";
    }
} else {
    echo "User not logged in.";
}

function subscribeSubscription($conn, $subscriptionID, $subscriptionType, $userEmail, $accountID) {
    $insert_subscription = mysqli_prepare($conn, "INSERT INTO subscription (SubscriptionID, SubscriptionType, Email, AccountID, Status) VALUES (?, ?, ?, ?, 'Active')");

    mysqli_stmt_bind_param($insert_subscription, "isss", $subscriptionID, $subscriptionType, $userEmail, $accountID);

    if (mysqli_stmt_execute($insert_subscription)) {
        mysqli_stmt_close($insert_subscription);
        return "success";
    } else {
        mysqli_stmt_close($insert_subscription);
        return "error";
    }
}

function cancelSubscription($conn, $subscriptionID, $userEmail, $accountID) {
    $update_subscription = mysqli_prepare($conn, "UPDATE subscription SET Status = 'Unsubscribe' WHERE SubscriptionID = ? AND Email = ? AND AccountID = ?");

    mysqli_stmt_bind_param($update_subscription, "iss", $subscriptionID, $userEmail, $accountID);

    if (mysqli_stmt_execute($update_subscription)) {
        mysqli_stmt_close($update_subscription);
        return "success";
    } else {
        mysqli_stmt_close($update_subscription);
        return "error";
    }
}
?>
