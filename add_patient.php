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
    // including config file
    require_once "config.php";
    // define variables and initialize with empty values
    $patient_ip = $f_name = $email = $phone = $bed_no = $pr_address = $pe_address = "";
    $patient_ip_err = $f_name_err = $email_err = $phone_err = $bed_no_err = $pr_address_err = $pe_address_err = "";
    // processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty(trim($_POST["patient_ip"]))){
            $patient_ip_err = "Please enter an ip address";
        }
        else{
            // prepare a select statement
            $sql = "SELECT id FROM patient_info WHERE patient_ip = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s" ,$param_patient_ip);
                // set parameters

                $param_patient_ip = trim($_POST["patient_ip"]);

                // attempt to execute the prepare statement

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $patient_ip_err = "This Ip is alread taken.";
                    }
                    else{
                        $patient_ip = trim($_POST["patient_ip"]);
                    }
                }else{
                    echo "Oops! Something went wrong. Please try again later";
                }
                mysqli_stmt_close($stmt);
            }
        }

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

        if(empty($patient_ip_err)){
            $sql = "INSERT INTO patient_info (patient_ip, f_name, email, phone, bed_no, pr_address, pe_address) VALUES (?,?,?,?,?,?,?)";
            
            if($stmt  = mysqli_prepare($link, $sql)){
                // bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt,"sssssss", $param_patient_ip,$param_f_name,$param_email,$param_phone,$param_bed_no,$param_pr_address,$param_pe_address);

                // set parameters
                $param_patient_ip = $patient_ip;
                $param_f_name = $f_name;
                $param_email = $email;
                $param_phone = $phone;
                $param_bed_no = $bed_no;
                $param_pr_address = $pr_address;
                $param_pe_address = $pe_address;

                // attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    header("location: add_patient.php");
                }
                else{
                    echo "Something went wrong. Please try again later!";
                }
                // close statement
                mysqli_stmt_close($stmt);

            }
        }
        // close connection
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
    <script src="js/jquery.validate.min.js"></script>
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
    <!-- patient adding section -->
    <section class="form-section">
        <div class="col-12 col-lg-12 m-auto">
            <div class="card">
                <img class="card-img-top" src="img/doctor.png" alt="">
                <form class="form-sec" id="validateForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-6">
                        <!-- name: patient_id -->
                            <input type="text" class="form-control" id="patient_ip" name="patient_ip" placeholder="Enter patients ID">
                        </div>
                        <div class="form-group col-6">
                        <!-- name: f_name -->
                            <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter patients Name">
                        </div>
                        <div class="form-group col-12">
                            <div class="input-group-prepend">
                                <div class="input-group-text text-box-size">@</div>
                                <!-- name: email -->
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter patients Email Address">
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    +880
                                </div>
                                <!-- name: phone -->
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number">
                            </div>
                        </div>
                        <div class="form-group col-6">
                        <!-- name: bed_no -->
                            <input type="text" class="form-control" id="bed_no" name="bed_no" placeholder="Enter Bed Number">
                        </div>
                        <div class="form-group col-6">
                        <!-- name: pr_address -->
                            <input type="text" class="form-control" id="pr_address" name="pr_address" placeholder="Enter Present Address">
                        </div>
                        <div class="form-group col-6">
                        <!-- name: pe_address -->
                            <input type="text" class="form-control" id="pe_address" name="pe_address" placeholder="Enter Permanent Address">
                        </div>
                        <button class="btn btn-outline-info shadow-none btn-block" name="submit" id="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- script section -->
    <script src="js/patientinformation.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>