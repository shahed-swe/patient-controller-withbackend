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
    
    $f_name = $email = $phone = $bed_no = $pr_address = $pe_address = "";
    $f_name = $email = $phone = $bed_no = $pr_address = $pe_address = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["f_name"]))){
            $f_name_err = "Please Enter your Full name.";
        }else{
            $f_name = trim($_POST["f_name"]);
        }

        if(empty(trim($_POST["email"]))){
            $email_err = "Please Enter your Email Address.";
        }else{
            $email = trim($_POST["email"]);
        }

        if(empty(trim($_POST["phone"]))){
            $phone_err = "Please Enter your Phone Number.";
        }else{
            $phone = trim($_POST["phone"]);
        }

        if(empty(trim($_POST["bed_no"]))){
            $bed_no_err = "Please Enter Bed Number.";
        }else{
            $bed_no = trim($_POST["bed_no"]);
        }

        if(empty(trim($_POST["pr_address"]))){
            $pr_address_err = "Please Enter Present Address.";
        }else{
            $pr_address = trim($_POST["pr_address"]);
        }

        if(empty(trim($_POST["pe_address"]))){
            $pe_address_err = "Please Enter Permanent Address.";
        }else{
            $pe_address = trim($_POST["pe_address"]);
        }

        $query = "UPDATE patient_info set f_name = ?, email = ?, phone = ?, pr_address = ?, pe_address = ? where id = $id";

        if($stmt = mysqli_prepare($link, $query)){
            mysqli_stmt_bind_param($stmt,"sssss",$para_f_name,$param_email,$param_phone,$param_pr_address,$param_pe_address);

            // set parameters
            $param_f_name = $f_name;
            $param_email = $email;
            $param_phone = $phone;
            $param_pr_address = $pr_address;
            $param_pe_address = $pe_address;

            if(mysqli_stmt_execute($stmt)){
                header("location: all_patients_information.php");
            }
            else{
                echo "Something went wrong. Please try again later!";
            }
            mysqli_stmt_close($stmt);
        }

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
    <script src="js/jquery.min.js"></script>
    <script src="js/profile.js"></script>
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
        }
        
        .form-control:disabled {
            background: white;
            border-bottom: 1px solid #095370;
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
    <!-- Information Editing section -->
    <section class="form-section">
        <div class="col-12 col-lg-12 m-auto">
            <div class="card">
                <img class="card-img-top" src="img/doctor.png" alt="">
                <form class="form-sec" id="validateForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-12">
                        <!-- name: f_name -->
                            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter patients Name" value="<?php echo $std['f_name']; ?>">
                        </div>
                        <div class="form-group col-12">
                            <div class="input-group-prepend">
                                <div class="input-group-text text-box-size">@</div>
                                <!-- name: email -->
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter patients Email Address" value="<?php echo $std['email']; ?>">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    +880
                                </div>
                                <!-- name: phone -->
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $std['phone']; ?>">
                            </div>
                        </div>
                        <div class="form-group col-6">
                        <!-- name: bed_no -->
                            <input type="text" class="form-control" id="bed_no" name="bed_no" placeholder="Enter Bed Number" value="<?php echo $std['bed_no']; ?>">
                        </div>
                        <div class="form-group col-6">
                        <!-- name: pr_address -->
                            <input type="text" class="form-control" id="pr_address" name="pr_address" placeholder="Enter Present Address" value="<?php echo $std['pr_address']; ?>">
                        </div>
                        <div class="form-group col-6">
                        <!-- name: pe_address -->
                            <input type="text" class="form-control" id="pe_address" name="pe_address" placeholder="Enter Permanent Address" value="<?php echo $std['pe_address']; ?>">
                        </div>
                        <button class="btn btn-outline-info shadow-none btn-block" name="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>