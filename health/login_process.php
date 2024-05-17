<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file here
    include_once "includes/connection.php";

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic validation
    if (empty($email) || empty($password)) {
        // Handle empty fields error
        header("Location: login.php?error=emptyfields");
        exit();
    } else {
        // Check if the user exists in the database
        $sql = "SELECT * FROM users WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Handle SQL error
            header("Location: login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                // Verify the password
                $passwordCheck = password_verify($password, $row["password"]);
                if ($passwordCheck == false) {
                    // Handle incorrect password error
                    header("Location: login.php?error=incorrectpassword");
                    exit();
                } elseif ($passwordCheck == true) {
                    // Password is correct, start a new session
                    $_SESSION["userId"] = $row["user_id"]; // Assuming user_id is the column name for user ID in your database table
                    $_SESSION["userUsername"] = $row["username"];

                    // Set $loggedIn to true
                    $_SESSION["loggedIn"] = true; // Assuming you have a session variable to track login status

                    // Redirect the user to the index page after successful login
                    header("Location: User_profile.php?login=success");
                    exit();
                }
            } else {
                // Handle user not found error
                header("Location: login.php?error=nouser");
                exit();
            }
        }
    }

    // Close database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Redirect the user back to the login page if they access this script without submitting the form
    header("Location: login.php");
    exit();
}
?>
