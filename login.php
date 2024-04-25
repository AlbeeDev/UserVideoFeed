<?php
    session_start();
    if (isset($_POST["login"])) {
        if(strcmp($_POST['email'],"test@gmail.com")==0){
            $_SESSION["logged_in"] = true;
            $_SESSION["email"]=$_POST['email'];
            header("Location: home.php");
            exit();
        }
        else{
            $error = "Invalid email or password.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col col-3">
                <h2 class="mt-5">Login</h2>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                    </div>
                    <button class="btn btn-warning mt-4" type="submit" name="login">Submit</button>
                    <?php 
                    if (isset($error)) {
                        ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo $error;?>
                        </div>
                        <?php 
                    }
                    ?>
                </form>
            </div>
            
        </div>
        <div class="row justify-content-center">
            <div class="col col-3">
                <h2 class="mt-5">Dont have an account yet?</h2>
                <a href="register.php" class="btn btn-warning">Register here</a>
            </div>
        </div>
        
    </div>
</body>
</html>
