<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2:400,500,600,700,800&display=swap&subset=latin-ext,tamil,vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/profile.js"></script>
    <title>Document</title>
    <style>
        .dropdown-item:hover {
            background-color: azure;
        }
        
        @keyframes movingTopToBottom {
            0% {
                top: -650px;
            }
            100% {
                top: 0px;
            }
        }
        
        .container {
            margin-top: 50px;
            animation: movingTopToBottom 3s;
            -webkit-animation: movingTopToBottom 3s;
            position: relative;
        }
    </style>
</head>

<body>
    <?php
        include 'navbar.php';
    ?>
    <!-- profile -->
    <!-- patient adding section -->
    <section class="container">
        <div class="col-12 col-lg-12 m-auto">
            <div class="card">
                <div class="card-body col-10 col-lg-10 m-auto">
                    <h3 class="card-title">Md Shahed Talukder</h3>
                </div>
                <div class="card-body col-10 col-lg-10 m-auto">
                    <p class="card-title float-right">
                        <label for="">Phone:</label> +8801762178238
                    </p>
                    <p class="card-title">
                        <label for="">Email:</label> shahedtalukder51@gmail.com
                    </p>
                    <p class="card-title float-right">
                        <label for="">Present Address:</label> shahedtalukder51@gmail.com
                    </p>
                    <p class="card-title">
                        <label for="">Permanent Address:</label> shahedtalukder51@gmail.com
                    </p>
                </div>
                <div class="card-body col-10 col-lg-10 m-auto">
                    <p class="card-title float-right">
                        <label for="">Time:</label> 6:34:AM
                    </p>
                    <p class="card-title">
                        <label for="">Medicine Name:</label> Napa Extra
                    </p>
                    <p class="card-title float-right">
                        <label for="">Time:</label> 12:34:PM
                    </p>
                    <p class="card-title">
                        <label for="">Medicine Name:</label> Napa Extra
                    </p>
                    <p class="card-title float-right">
                        <label for="">Time:</label> 10:34:PM
                    </p>
                    <p class="card-title">
                        <label for="">Medicine Name:</label> Napa Extra
                    </p>
                </div>
            </div>
        </div>
    </section>
    <script src="js/setmedicine.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>