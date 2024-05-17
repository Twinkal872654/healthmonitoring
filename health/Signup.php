<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Health Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .signup-form {
            width: 400px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>
    <div class="signup-form">
        <h2 class="text-center mb-4">Sign Up</h2>
        <form action="signup_process.php" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
            </div>
            <div class="text-center">
                <p>Already have an account? <a href="login.php">Login here</a>.</p>
            </div>
        </form>
    </div>

    <?php include 'includes/Footer.php'; ?>
</body>
</html>
