<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include 'dependencies.php' ?>
</head>
<body class="bg-dark text-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-md-4">
                <h2 class="mt-5">Register</h2>
                <form action="process_register.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" placeholder="Choose a username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Create a password" name="pwd" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd-confirm">Confirm Password:</label>
                        <input type="password" class="form-control" id="pwd-confirm" placeholder="Confirm your password" name="pwd_confirm" required>
                    </div>
                    <button type="submit" class="btn btn-warning mt-4">Register</button>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col col-md-4">
                <h2 class="mt-5">Already have an account?</h2>
                <a href="login.php" class="btn btn-warning text-decoration-none">Login here</a>
            </div>
        </div>
    </div>
</body>
</html>

