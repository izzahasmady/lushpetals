<!-- Check if the user is logged in -->
<?php
    session_start();
    if (isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        .nav-link img {
            width: 24px; /* Adjust the width as needed */
            height: 24px; /* Adjust the height as needed */
        }
        /* Add your custom styles here */
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f8f8;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    flex-direction: column;
}

.container-fluid {
    padding: 0;  /* Reset padding for full-width container */
}
h1 {
    color: #333;
    margin-bottom: 20px;
    text-align: center;
}


        .subscription-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 900px;
            margin: 0 auto;
            border: 4px solid #556B2F; /* Moss green border color */
            border-radius: 15px; /* Optional: Add border-radius for rounded corners */
            padding: 30px; /* Adjust the padding as needed */
            background-color: #FFFFFF; /* White background color */
        }

        .subscription-plan {
            border: 2px solid #556B2F; /* Moss green border */
            border-radius: 10px; /* Optional: Add border-radius for rounded corners */
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            position: relative;
        }

        .subscription-plan.basic {
            background-color: #E1F0C4; /* Light green background color */
        }

        .subscription-plan.standard {
            background-color: #E1F0C4; /* Medium green background color */
        }

        .subscription-plan.premium {
            background-color: #E1F0C4; /* Dark green background color */
        }

        .subscription-plan:hover {
            transform: scale(1.05);
        }

        .subscription-plan h2 {
            color: #556B2F; /* Moss green heading text color */
            margin-bottom: 10px;
        }

        .subscription-plan p {
            color: #555;
            margin: 0 0 15px;
        }

        .subscription-plan button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        .subscription-plan button.subscribe {
            background-color: #556B2F; /* Moss green background color */
            color: white;
        }

        .subscription-plan button.cancel {
            background-color: #FF6347;
            color: white;
        }

        .benefits {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }

        .benefit-list {
            list-style-type: none;
            padding: 0;
        }

        .benefit-list li {
            margin: 5px 0;
        }

        .subscription-result {
            margin-top: 20px;
            text-align: center;
        }

        .subscription-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .subscription-info button {
            margin-top: 10px;
            background-color: #FF6347;
            color: white;
        }

        /* Styles for the subscription table */
        #subscription-details {
            margin-top: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .active {
            color: #4CAF50;
        }

        .unsubscribe {
            color: #FF6347;
        }
    </style>
</head>



<body>
   <!-- Start Header/Navigation -->
   <div class="container-fluid"> <!-- Use container-fluid for full-width container -->
    <nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
      <a class="navbar-brand" href="index.html">LushPetals<span>.</span></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
          <li class="nav-item active">
            <a class="nav-link" href="userindex.php">Home</a>
          </li>
          <li><a class="nav-link" href="shop.php">Shop</a></li>
          <li><a class="nav-link" href="about.html">About us</a></li>
          <li><a class="nav-link" href="userMembership.php">Membership</a></li>
        </ul>

        <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
          <li><a class="nav-link" href="profile.php"><img src="images/user.svg"></a></li>
          <li><a class="nav-link" href="cart.html"><img src="images/cart.svg"></a></li>
          <li><a class="nav-link" href="login.php"><img class="nav-icon" src="images/logout.png";></a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Header/Navigation -->


        <div class="subscription-result">
            <h2>Your Subscription</h2>
            <div id="subscriptionInfo"></div>
        </div>

        <!-- Your subscription table -->
    <div class="most-popular">
        <div class="row">
            <div class="col-lg-12">
                <div class="row" id="subscription-details">
                    <!-- Subscription details will be displayed here -->
                    <table>
                        <thead>
                            <tr>
                                <th>Subscription ID</th>
                                <th>Subscription Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="subscriptionTableBody">
                            <!-- Subscription details will be populated here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- * Your subscription End * -->

        <h1>Subscribe Now!</h1>

        <div class="benefits">
            <p>Join our Flower Membership to enjoy beautiful flowers delivered to your doorstep. Choose the plan that suits you best!</p>
        </div>

        <div class="subscription-container">
            <!-- Subscription plans go here -->
            <!-- Use PHP to echo the user's email into the JavaScript code -->
            <script>
                const userEmail = '<?php echo $_SESSION['email']; ?>';
            </script>
            <div class="subscription-plan basic">
                <h2>Basic</h2>
                <p>RM 0.00 (FREE)</p>
                <p>Benefits:</p>
                <ul class="benefit-list">
                    <li>Exclusive floral access</li>
                    <li>Access to new flower varieties</li>
                </ul>
                <button class="subscribe" onclick="subscribe('Basic', userEmail)">Subscribe</button>
            </div>
            <div class="subscription-plan standard">
                <h2>Standard</h2>
                <p>RM 50.00/month</p>
                <p>Benefits:</p>
                <ul class="benefit-list">
                    <li>Access to exclusive flower varieties</li>
                    <li>Rm10 off every purchase</li>
                </ul>
                <button class="subscribe" onclick="subscribe('Standard', userEmail)">Subscribe</button>
            </div>
            <div class="subscription-plan premium">
                <h2>Premium</h2>
                <p>RM 150.00/month</p>
                <p>Benefits:</p>
                <ul class="benefit-list">
                    <li>Daily delivery of exotic flowers</li>
                    <li>Free Delivery for every purchase</li>
                </ul>
                <button class="subscribe" onclick="subscribe('Premium', userEmail)">Subscribe</button>
            </div>
        </div>

        <!-- Add this line for the button -->

        <script>
    // Define a variable to track whether the user has an active subscription
    let hasActiveSubscription = false;

    function subscribe(plan, email) {
        if (hasActiveSubscription) {
            alert('You already have an active subscription. Please cancel it first.');
            return;
        }

        // Simulate a server response (replace with actual server communication)
        const subscriptionData = {
            action: 'subscribe', // Add the action parameter
            subscriptionID: Math.floor(Math.random() * 500) + 1, // Generate random number between 1 and 500
            subscriptionType: plan,
            email: email,
        };

        // Use AJAX to send subscription data to the server
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'subscribe.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Display subscription information in the table
                const subscriptionTableBody = document.getElementById('subscriptionTableBody');
                const newRow = subscriptionTableBody.insertRow();
                const cell1 = newRow.insertCell(0);
                const cell2 = newRow.insertCell(1);
                const cell3 = newRow.insertCell(2);
                const cell4 = newRow.insertCell(3);

                cell1.innerHTML = subscriptionData.subscriptionID;
                cell2.innerHTML = subscriptionData.subscriptionType;
                cell3.innerHTML = '<span class="active">Active</span>'; // Initial status is 'Active'
                cell4.innerHTML = '<button class="cancel" onclick="cancelSubscription(this, ' + subscriptionData.subscriptionID + ')">Cancel Subscription</button>';

                // Disable all subscribe buttons after successful subscription
                const subscribeButtons = document.querySelectorAll('.subscription-plan button.subscribe');
                subscribeButtons.forEach(button => button.disabled = true);

                // Update the variable to indicate that the user has an active subscription
                hasActiveSubscription = true;
            }
        };
        xhr.send('action=' + subscriptionData.action + '&SubscriptionID=' + subscriptionData.subscriptionID + '&SubscriptionType=' + subscriptionData.subscriptionType + '&Email=' + subscriptionData.email);
    }

    function cancelSubscription(button, subscriptionID) {
        // Simulate a server response (replace with actual server communication)
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'subscribe.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the response from the server
                const response = xhr.responseText;
                if (response === 'success') {
                    alert('Subscription canceled successfully!');
                    // Update the status in the table
                    const statusCell = button.parentNode.previousElementSibling;
                    statusCell.innerHTML = '<span class="unsubscribe">Unsubscribe</span>';
                    // Disable the cancel button after cancellation
                    button.disabled = true;

                    // Enable all subscribe buttons after cancellation
                    const subscribeButtons = document.querySelectorAll('.subscription-plan button.subscribe');
                    subscribeButtons.forEach(button => button.disabled = false);

                    // Update the variable to indicate that the user doesn't have an active subscription
                    hasActiveSubscription = false;
                }
            }
        };
        xhr.send('action=cancel&SubscriptionID=' + subscriptionID);
    }
</script>


    <?php
    } else {
        echo "<p>Please login to access this page.</p>";
    }
    ?>
</body>

</html>