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

    //including config file
    require_once "config.php";
    $id = $_GET['id'];
    // define variables and initialize with empty values
    $patient_ip = $first_medicine_name = $first_medicine_time = $second_medicine_name = $second_medicine_time = $third_medicine_name = $third_medicine_time = "";
    $patient_ip_err = "";
    // processing from data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["patient_ip"]))){
            $patient_ip_err = "Please enter an ip address";
        }
        else{
            // prepare a select statement
            $sql = "SELECT id FROM patient_info WHERE patient_ip = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s" , $param_patient_ip);

                // set parameters

                $param_patient_ip = trim($_POST["patient_ip"]);

                // attempt to execute the prepare statement
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $patient_ip = trim($_POST["patient_ip"]);

                    }
                    else{
                        $patient_ip_err = "This ip is not used yet";
                    }
                }else{
                    echo "Oops! Something went wrong. Please try again later";
                }
                mysqli_stmt_close($stmt);
            }
        }

        $first_medicine_name = trim($_POST["first_medicine_name"]);
        $first_medicine_time = trim($_POST["first_medicine_time"]);
        $second_medicine_name = trim($_POST["second_medicine_name"]);
        $second_medicine_time = trim($_POST["second_medicine_time"]);
        $third_medicine_name = trim($_POST["third_medicine_name"]);
        $third_medicine_time = trim($_POST["second_medicine_time"]);

        if(empty($patient_ip_err)){
            $sql = "UPDATE patient_info SET first_medicine_name = ?, first_medicine_time = ?, second_medicine_name = ?, second_medicine_time = ?, third_medicine_name = ?, third_medicine_time = ? WHERE patient_ip = ?";


            if($stmt  = mysqli_prepare($link, $sql)){
                // bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssss", $param_first_medicine_name,$param_first_medicine_time,$param_second_medicine_name,$param_second_medicine_time,$param_third_medicine_name, $param_third_medicine_time,$param_patient_ip);


                // sec parameters
                $param_first_medicine_name = $first_medicine_name;
                $param_first_medicine_time = $first_medicine_time;
                $param_second_medicine_name = $second_medicine_name;
                $param_second_medicine_time = $second_medicine_time;
                $param_third_medicine_name = $third_medicine_name;
                $param_third_medicine_time = $third_medicine_time;

                // attenot ti execute the prepared statement

                if(mysqli_stmt_execute($stmt)){
                    header("location: add_medicine.php");
                }else{
                    echo "Something went wrong! Please try again later.";
                }

                // close statement
                mysqli_stmt_close($stmt);
            }
        }
        mysqli_close($link);

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
    <!-- <script src="date-time/jquery.datetimepicker.js"></script> -->
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
            margin-top: 6px;
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

    <?php
        include 'navbar.php';
    ?>
        <!-- patient adding section -->
    <section class="form-section" id="form-section">
        <div class="col-12 col-lg-12 m-auto">
            <div class="card">
                <img class="card-img-top" src="img/doctor.png" alt="">
                <form class="form-sec" id="validateForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-12">
                        <!-- name: patient_ip -->
                            <input type="text" class="form-control" id="patient_ip" name="patient_ip" placeholder="Enter patients ID" value="<?php echo "$id"?>">
                            <span class="help-block"><?php echo $patient_ip_err; ?></span>
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
    <!-- <script src="js/setmedicine.js"></script> -->
    <!-- <script src="js/addmedicine.js"></script> -->
    <script>
        $(document).ready(function() {

            // $("#first_medicine_name").attr("disabled", true);
            $("#first_medicine_time").attr("disabled", true);
            $("#second_medicine_name").css("display", "none");
            $("#second_medicine_time").css("display", "none");
            $("#third_medicine_name").css("display", "none");
            $("#third_medicine_time").css("display", "none");

            $("#first_medicine_name").on('input', function() {
                var input = $("#first_medicine_name").val();
                if (input) {
                    // $("#first_medicine_name").attr("disabled", false);
                    $("#first_medicine_time").attr("disabled", false);
                } else {
                    // $("#first_medicine_name").attr("disabled", true);
                    $("#first_medicine_time").attr("disabled", true);
                }
            });

            $("#first_medicine_time").on('input', function() {
                var input = $("#first_medicine_time").val();
                if (input) {
                    $("#second_medicine_name").css("display", "block");
                    $("#second_medicine_time").css("display", "block");
                    $("#second_medicine_time").attr("disabled", true);
                } else {
                    $("#second_medicine_name").css("display", "none");
                    $("#second_medicine_time").css("display", "none");
                    $("#third_medicine_name").css("display", "none");
                    $("#third_medicine_time").css("display", "none");
                }
            });
            $("#second_medicine_name").on('input', function() {
                var input = $("#second_medicine_name").val();
                if (input) {
                    $("#second_medicine_time").attr("disabled", false);
                } else {
                    $("#second_medicine_time").attr("disabled", true);
                }
            });

            $("#second_medicine_time").on('input', function() {
                var input = $("#second_medicine_time").val();
                if (input) {
                    $("#third_medicine_name").css("display", "block");
                    $("#third_medicine_time").css("display", "block");
                    $("#third_medicine_time").attr("disabled", true);

                } else {
                    $("#third_medicine_name").css("display", "none");
                    $("#third_medicine_time").css("display", "none");
                }
            });

            $("#third_medicine_name").on('input', function() {
                var input = $("#third_medicine_name").val();
                if (input) {
                    $("#third_medicine_time").attr("disabled", false);
                } else {
                    $("#third_medicine_time").attr("disabled", true);
                }
            });

            $("#submit").click(function() {
                var data1 = $("#first_medicine_name").val();
                var data2 = $("#first_medicine_time").val();
                if (data1 && data2) {
                    var data = {
                        input0: $('#patient_id').val(),
                        input1: $("#first_medicine_name").val(),
                        input2: $("#first_medicine_time").val(),
                        input3: $("#second_medicine_name").val(),
                        input4: $("#second_medicine_time").val(),
                        input5: $("#third_medicine_name").val(),
                        input6: $("#third_medicine_time").val(),
                    }
                } else {
                    alert("Nothing to send!!")
                    var data = {}
                }
                if (data) {
                    console.log(data);
                    localStorage.setItem('getvalue', data);
                } else {
                    console.log("Nothing to be prevent here!!!");
                }
            });
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>