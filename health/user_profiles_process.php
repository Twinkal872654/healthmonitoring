<?php
// Start the session
session_start();

// Include database configuration file
require_once "includes/connection.php";

// Check if the action is set
if(isset($_GET['action'])) {
    $action = $_GET['action'];

    // Process add health data action
    if($action === 'add_health_data') {
        // Check if the form is submitted
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $weight = $_POST['weight'];
            $bloodPressure = $_POST['blood_pressure'];
            $heartRate = $_POST['heart_rate'];
            $bloodSugar = $_POST['blood_sugar'];

            // Add your code to insert the data into the database
            $sql = "INSERT INTO health_data (user_id, weight, blood_pressure, heart_rate, blood_sugar) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("idddd", $_SESSION['userId'], $weight, $bloodPressure, $heartRate, $bloodSugar);
            if ($stmt->execute()) {
                // Redirect back to the user profile page after adding the data
                header("Location: user_profile.php");
                exit();
            } else {
                // Handle database error
                // You can redirect with an error message or log the error
                // For now, we'll redirect without any specific error handling
                header("Location: user_profile.php");
                exit();
            }
        }
    }

    // Process add health tips action
    if($action === 'add_health_tips') {
        // Check if the form is submitted
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $tipContent = $_POST['tip_content'];

            // Add your code to insert the data into the database
            $sql = "INSERT INTO health_tips (user_id, tip_content) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $_SESSION['userId'], $tipContent);
            if ($stmt->execute()) {
                // Redirect back to the user profile page after adding the data
                header("Location: user_profile.php");
                exit();
            } else {
                // Handle database error
                // You can redirect with an error message or log the error
                // For now, we'll redirect without any specific error handling
                header("Location: user_profile.php");
                exit();
            }
        }
    }

    if($action === 'fetch_health_data') {
        // Query to fetch health data from the database
        $sql = "SELECT * FROM health_data WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['userId']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Generate HTML table markup for health data
        $html = '<table class="table"><thead><tr><th scope="col">Weight (kg)</th><th scope="col">Blood Pressure</th><th scope="col">Heart Rate (bpm)</th><th scope="col">Blood Sugar (mmol/L)</th></tr></thead><tbody>';
        while($row = $result->fetch_assoc()) {
            $html .= '<tr><td>'.$row['weight'].'</td><td>'.$row['blood_pressure'].'</td><td>'.$row['heart_rate'].'</td><td>'.$row['blood_sugar'].'</td></tr>';
        }
        $html .= '</tbody></table>';
        echo $html;
        exit();
    }

    // Fetch health tips
    elseif($action === 'fetch_health_tips') {
        // Query to fetch health tips from the database
        $sql = "SELECT * FROM health_tips WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['userId']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Generate HTML table markup for health tips
        $html = '<table class="table"><thead><tr><th scope="col">Health Tip</th></tr></thead><tbody>';
        while($row = $result->fetch_assoc()) {
            $html .= '<tr><td>'.$row['tip_content'].'</td></tr>';
        }
        $html .= '</tbody></table>';
        echo $html;
        exit();
    }

}

// If the action is not recognized or if the form is not submitted, do nothing
// The logic for fetching health data or health tips should be handled in user_profile.php
?>
