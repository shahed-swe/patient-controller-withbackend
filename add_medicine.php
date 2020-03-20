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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="date-time/jquery.datetimepicker.css">
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="date-time/jquery.datetimepicker.js"></script>
    <title>Document</title>
    <style>
        body {
            background-image: linear-gradient(45deg, #62f862, #2089b3);
        }
        
        @keyframes movingTopToBottom {
            0% {
                top: -650px;
            }
            100% {
                top: 0px;
            }
        }
        
        .form-section {
            margin-top: 50px;
            animation: movingTopToBottom 3s;
            -webkit-animation: movingTopToBottom 3s;
            position: relative;
        }
        
        .form-sec {
            margin: 20px 20px 20px 20px;
        }
        
        .card-img-top {
            height: 320px;
            width: 340px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .second-text {
            margin-left: 9px;
        }
        
        .card {
            box-shadow: 10px 10px 5px rgb(29, 129, 196);
        }
        
        .text-box-size {
            padding-left: 22px;
            padding-right: 22px;
        }
        
        .form-control {
            border: none;
            border-bottom: 1px solid #15a1d8;
            border-right: 1px solid #15a1d8;
            /* box-shadow: 2px 2px 1px blue; */
        }
        
        .form-control:disabled {
            background: white;
            border-bottom: 1px solid #0e6588;
            border-right: 1px solid #033e55;
        }
        
        .dropdown-item:hover {
            background-color: azure;
        }
    </style>
</head>

<body>
    <!-- navbar section -->
    <section class="nav-section">
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="home.php"><span class="text-success">IoT</span> Expert</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Patient
        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="all_patients_information.php">All Patients</a>
                            <a class="dropdown-item" href="add_patient.php">Add New Patient</a>
                            <!-- <a class="dropdown-item" href="check_patient.php">Check Patient</a> -->
                            <a class="dropdown-item" href="add_medicine.php">Add Medicine</a>
                        </div>
                    </li>
                    <div class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </div>
                </ul>
            </div>
        </nav>
    </section>
    <!-- patient adding section -->
    <section class="form-section" id="form-section">
        <div class="col-12 col-lg-12 m-auto">
            <div class="card">
                <img class="card-img-top" src="img/doctor.png" alt="">
                <form class="form-sec" id="validateForm" action="add_medicine.html" method="POST">
                    <div class="form-row">
                        <div class="form-group col-12">
                        <!-- name: patient_ip -->
                            <input type="text" class="form-control" id="patient_ip" name="patient_ip" placeholder="Enter patients Ip">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                        <!-- name: first_medicine_name -->
                            <input type="text" class="form-control" id="first_medicine_name" name="first_medicine_name" placeholder="Enter First Medicine Name">
                        </div>
                        <div class="form-group col-6">
                        <!-- name:first_medicine_time -->
                            <input type="time" id="first_medicine_time" name="first_medicine_time" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                        <!-- name: second_medicine_name -->
                            <input type="text" class="form-control" id="second_medicine_name" name="second_medicine_name" placeholder="Enter Second Medicine Name">
                        </div>
                        <div class="form-group col-6">
                        <!-- name: second_medicine_time -->
                            <input type="time" id="second_medicine_time" name="second_medicine_time" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                        <!-- name: third_medicine_name -->
                            <input type="text" class="form-control" id="third_medicine_name" name="third_medicine_name" placeholder="Enter Third Medicine Name">
                        </div>
                        <div class="form-group col-6">
                        <!-- name: third_medicine_time -->
                            <input type="time" id="third_medicine_time" name="third_medicine_time" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-outline-info shadow-none btn-block" name="submit" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </section>
    <!-- scripts -->
    <script src="js/setmedicine.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>