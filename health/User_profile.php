


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Health Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add custom CSS here if needed -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        /* Center-align buttons on the user profile page */
.container {
    text-align: center;
}

/* Add margin to the buttons for spacing */
.mt-4 {
    margin-top: 20px;
}
</style>

</head>
<body>
    <!-- Include header component -->
    <?php include_once "includes/header.php"; ?>


    <div class="modal fade" id="fetchedDataModal" tabindex="-1" role="dialog" aria-labelledby="fetchedDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fetchedDataModalLabel">Fetched Health Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="fetchedDataBody">
                    <!-- Fetched data will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Add health tips modal -->
    <div class="modal fade" id="fetchedTipsModal" tabindex="-1" role="dialog" aria-labelledby="fetchedTipsModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="fetchedTipsModalLabel">Fetched Health Tips</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="fetchedTipsBody">
                    <!-- Fetched tips will be displayed here -->
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5">
    <h2>Welcome to Your Health Monitoring System Dashboard</h2>

    <!-- Display user's health data -->
    <div class="row">
        <div class="col-md-6">
            <div class="mt-4">
                <!-- Button to add/edit health data -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#healthDataModal">Add Health Data</button>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Button to fetch health data -->
            <div class="mt-4">
                <form action="user_profiles_process.php?action=fetch_health_data" method="post">
                    <input type="hidden" name="action" value="fetch_health_data">
                    <button type="submit" class="btn btn-primary">Fetch Health Data</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Display user's health tips -->
    <div class="row">
        <div class="col-md-6">
            <div class="mt-4">
                <!-- Button to add health tips -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#healthTipsModal">Add Health Tips</button>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Button to fetch health tips -->
            <div class="mt-4">
                <form action="user_profiles_process.php?action=fetch_health_tips" method="post">
                    <input type="hidden" name="action" value="fetch_health_tips">
                    <button type="submit" class="btn btn-primary">Fetch Health Tips</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Add health data modal -->
<div class="modal fade" id="healthDataModal" tabindex="-1" role="dialog" aria-labelledby="healthDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="healthDataModalLabel">Add/Edit Health Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user_profiles_process.php?action=add_health_data" method="POST">
                    <!-- Health data form fields -->
                    <div class="form-group">
                        <label for="weight">Weight (kg)</label>
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="Enter weight">
                    </div>
                    <div class="form-group">
                        <label for="blood_pressure">Blood Pressure</label>
                        <input type="text" class="form-control" id="blood_pressure" name="blood_pressure" placeholder="Enter blood pressure">
                    </div>
                    <div class="form-group">
                        <label for="heart_rate">Heart Rate (bpm)</label>
                        <input type="text" class="form-control" id="heart_rate" name="heart_rate" placeholder="Enter heart rate">
                    </div>
                    <div class="form-group">
                        <label for="blood_sugar">Blood Sugar (mmol/L)</label>
                        <input type="text" class="form-control" id="blood_sugar" name="blood_sugar" placeholder="Enter blood sugar">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add health tips modal -->
<div class="modal fade" id="healthTipsModal" tabindex="-1" role="dialog" aria-labelledby="healthTipsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="healthTipsModalLabel">Add Health Tips</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="user_profiles_process.php?action=add_health_tips" method="POST">
                    <!-- Health tips form fields -->
                    <div class="form-group">
                        <label for="tip_content">Health Tip</label>
                        <textarea class="form-control" id="tip_content" name="tip_content" rows="3" placeholder="Enter health tip"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Include footer component -->
    <?php include_once "includes/footer.php"; ?>



    
    <!-- Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Add your existing HTML code here -->

<!-- Script for fetching health data and displaying in a modal -->
<script>
        // Function to fetch health data
        function fetchHealthData() {
            $.post("user_profile_process.php?action=fetch_health_data", function(data) {
                // Display fetched data in the modal body
                $('#fetchedDataBody').html(data);
                // Show the modal
                $('#fetchedDataModal').modal('show');
            });
        }

        // Function to fetch health tips
        function fetchHealthTips() {
            $.post("user_profile_process.php?action=fetch_health_tips", function(data) {
                // Display fetched data in the modal body
                $('#fetchedTipsBody').html(data);
                // Show the modal
                $('#fetchedTipsModal').modal('show');
            });
        }
    </script>

</body>
</html>
