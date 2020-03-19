<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: home.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2:400,500,600,700,800&display=swap&subset=latin-ext,tamil,vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <style>
        .take {
            height: 120px;
            width: 120px;
            margin-bottom: 20px;
            margin-left: 41%;
        }
    </style>
    <title>Login</title>
</head>

<body class="body">

    <section class="login-section">
        <img class="image-fluid w-15 take" src="img/logo.png" alt="">
        <form id="validform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="col-md-4 col-sm-2 m-auto">
                <div class="form-row">
                    <div class="form-group col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <div class="fa fa-user"></div>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter user name">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                    </div>
                    <div class="form-group col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <div class="fa fa-key"></div>
                                </div>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                    </div>

                </div>
                <input type="submit" class="btn btn-info shadow-none position" value="Login" id="submit">
                <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
            </div>
        </form>
    </section>
    <!-- scripts -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/valid.js"></script>
</body>

</html>