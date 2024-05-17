<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetched Results</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS if needed -->
</head>
<body>
    <div class="container mt-5">
        <h2>Fetched Results</h2>
        <?php
        // Start the session
        session_start();

        // Include database configuration file
        require_once "includes/connection.php";

        // Check if the action parameter is set
        if(isset($_GET['action'])) {
            $action = $_GET['action'];

            // Display fetched health data
            if($action === 'fetch_health_data') {
                // Query to fetch health data from the database
                $sql = "SELECT * FROM health_data WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $_SESSION['userId']);
                $stmt->execute();
                $result = $stmt->get_result();

                // Generate HTML table markup for health data
                echo '<table class="table"><thead><tr><th scope="col">Weight (kg)</th><th scope="col">Blood Pressure</th><th scope="col">Heart Rate (bpm)</th><th scope="col">Blood Sugar (mmol/L)</th></tr></thead><tbody>';
                while($row = $result->fetch_assoc()) {
                    echo '<tr><td>'.$row['weight'].'</td><td>'.$row['blood_pressure'].'</td><td>'.$row['heart_rate'].'</td><td>'.$row['blood_sugar'].'</td></tr>';
                }
                echo '</tbody></table>';
            }

            // Display fetched health tips
            elseif($action === 'fetch_health_tips') {
                // Query to fetch health tips from the database
                $sql = "SELECT * FROM health_tips WHERE user_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $_SESSION['userId']);
                $stmt->execute();
                $result = $stmt->get_result();

                // Generate HTML table markup for health tips
                echo '<table class="table"><thead><tr><th scope="col">Health Tip</th></tr></thead><tbody>';
                while($row = $result->fetch_assoc()) {
                    echo '<tr><td>'.$row['tip_content'].'</td></tr>';
                }
                echo '</tbody></table>';
            }
        }
        ?>
        <!-- Back button to redirect to user_profile.php -->
        <a href="user_profile.php" class="btn btn-secondary mt-3">Back</a>
    </div>
</body>
</html>
