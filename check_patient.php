<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<?php

    $id = $_GET['id'];
    require_once "config.php";
    $sql = "SELECT * FROM patient_info WHERE id=$id";
    $result = mysqli_query($link, $sql);

    $std = mysqli_fetch_assoc($result);
    // var_dump($std);
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
        .container-body{
            padding-top: 20px !important;
        }
    </style>
</head>

<body>
    <?php
        include 'navbar.php';
    ?>
    <!-- patient adding section -->
    <section class="container">
        <div class="col-12 col-lg-12 m-auto">
            <div class="card container-body">
            
                <div class="card-body col-10 col-lg-10 m-auto">
                    <h3 class="card-title"><?php echo $std['f_name']; ?></h3>
                </div>
                <div class="card-body col-10 col-lg-10 m-auto">
                    <p class="card-title float-right">
                        <label for="">Phone:</label> <?php echo $std['phone']; ?>
                    </p>
                    <p class="card-title">
                        <label for="">Email:</label> <?php echo $std['email']; ?>
                    </p>
                    <p class="card-title float-right">
                        <label for="">Present Address:</label> <?php echo $std['pr_address']; ?>
                    </p>
                    <p class="card-title">
                        <label for="">Permanent Address:</label> <?php echo $std['pe_address']; ?>
                    </p>
                </div>
                <div class="card-body col-10 col-lg-10 m-auto">
                    <p class="card-title float-right">
                        <label for="">Time:</label> <?php echo $std['first_medicine_time']; ?>
                    </p>
                    <p class="card-title">
                        <label for="">Medicine Name:</label> <?php echo $std['first_medicine_name']; ?>
                    </p>
                    <p class="card-title float-right">
                        <label for="">Time:</label> <?php echo $std['second_medicine_time']; ?>
                    </p>
                    <p class="card-title">
                        <label for="">Medicine Name:</label> <?php echo $std['second_medicine_name']; ?>
                    </p>
                    <p class="card-title float-right">
                        <label for="">Time:</label> <?php echo $std['third_medicine_time']; ?>
                    </p>
                    <p class="card-title">
                        <label for="">Medicine Name:</label> <?php echo $std['third_medicine_name']; ?>
                    </p>
                </div>
                <div class="col-8 col-lg-10 m-auto">
                    <a class="btn btn-info shadow-none btn-block" href="all_patients_information.php">BACK</a>
                </div>
            </div>
        </div>
    </section>
    <script src="js/setmedicine.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>