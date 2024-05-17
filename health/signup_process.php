<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file here
    include_once "includes/connection.php";

    // Retrieve form data
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Perform basic validation (you can add more validation as needed)
    if (empty($username) || empty($email) || empty($password)) {
        // Handle empty fields error
        header("Location: signup.php?error=emptyfields");
        exit();
    } else {
        // Check if the username or email already exists in the database
        $sql = "SELECT * FROM users WHERE username=? OR email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            // Handle SQL error
            header("Location: signup.php?error=sqlerror");
            exit();
        } else {
            // Bind parameters and execute the statement
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                // Handle existing username or email error
                header("Location: signup.php?error=usertaken");
                exit();
            } else {
                // Insert user data into the database
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    // Handle SQL error
                    header("Location: signup.php?error=sqlerror");
                    exit();
                } else {
                    // Hash the password before storing it in the database
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPassword);
                    mysqli_stmt_execute($stmt);

                    // Redirect the user to the login page after successful signup
                    header("Location: login.php?signup=success");
                    exit();
                }
            }
        }
    }

    // Close database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    // Redirect the user back to the signup page if they access this script without submitting the form
    header("Location: signup.php");
    exit();
}
?>
