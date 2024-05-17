<?php
// Start the session
session_start();

// Set $loggedIn to false by default
$loggedIn = false;

// Check if the user is logged in
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
    $loggedIn = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./styles.css">
   <style>
        /* Style for header component */
        footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: #00246B; /* Footer background color */
    color: #CADCFC; 
    text-align: center;
    padding: 10px 0; 
}
header{
    width: 100%;
}
.navbar-custom {
    background-color: #00246B; /* Change to your desired background color */
}

.navbar-custom .navbar-brand,
.navbar-custom .nav-link {
    color: #fff; /* Change to your desired text color */
}

.navbar-custom .nav-link:hover {
    color: #f00; /* Change to your desired text color on hover */
}

.navbar-nav .nav-item {
    margin-right: 10px; /* Adjust the margin between navbar items */
}

/* Align navbar items to the right */
.navbar-nav {
    margin-left: auto;
}
.navbar-custom .navbar-nav .nav-item {
    margin-right: 10px; /* Adjust the margin between navbar items */
}

/* Reduce margin for logged-in user */
.navbar-custom .navbar-nav .nav-item:last-child {
    margin-right: 0; /* Remove margin for the last navbar item */
}

/* Global styles for navigation */
.navbar-custom {
    font-size: 16px; /* Set the font size for the navigation bar */
}

/* Adjust other styles as needed */

    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <a class="navbar-brand" href="#">Health Monitoring System</a>
            <!-- Add your navigation links here -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Main navigation links -->
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <!-- Conditional display for login/logout and profile options -->
                    <?php if($loggedIn): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="User_Profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="Login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Signup.php">Sign Up</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
</body>
</html>
