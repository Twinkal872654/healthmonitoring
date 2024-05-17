<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Health Monitoring System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-form {
            width: 400px;
            margin: 50px auto;
            padding: 30px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
<?php include 'includes/header.php'; ?>
    <div class="login-form">
        <h2 class="text-center mb-4">Login</h2>
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </div>
        </form>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
