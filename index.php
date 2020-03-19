<?php
    session_start();

    //check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
        header("location: home.php");
        exit;
    }
    require_once "cofig.php";

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
        <form id="validform" action="index.php" method="POST">
            <div class="col-md-4 col-sm-2 m-auto">
                <div class="form-row">
                    <div class="form-group col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <div class="fa fa-user"></div>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter user name">
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
                        </div>
                    </div>

                </div>
                <input type="submit" class="btn btn-info shadow-none position" value="Login" id="submit">
            </div>
        </form>
    </section>
    <!-- scripts -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/valid.js"></script>
</body>

</html>