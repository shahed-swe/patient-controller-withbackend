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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2:400,500,600,700,800&display=swap&subset=latin-ext,tamil,vietnamese" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap&subset=latin-ext,vietnamese" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
    <style>
        .take {
            font-family: "Anton", Arial, Helvetica, sans-serif;
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
    <!-- header section first -->
    <section class="section-two">
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0"></li>
                <li data-target="#slides" data-slide-to="1"></li>
                <li data-target="#slides" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-85" src="img/background1.png" alt="">
                    <div class="carousel-caption">
                        <h1 class="display-2">New Zen Tech</h1>
                        <h3>Control Patients Medication From Master server</h3>
                        <h2 class="head-h2">Using NodeMcu</h2>
                        <button class="btn btn-outline-light btn-lg btn-extra">View Source</button>
                        <button class="btn btn-success btn-lg">Contact</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about contact section -->
    <section class="section-three">
        <div class="container-fluid">
            <div class="row jumbotron">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
                    <p class="lead">
                        This site has been built to medicate the patiants from the core level
                    </p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
                    <a href=""> <button type="button" class="btn btn-outline-info btn-lg">About Us</button> </a>
                </div>
            </div>
        </div>
    </section>
    <!-- three section column -->
    <!--team section-->
        <div class="container-fluid padding">
            <div class="row welcome text-center">
                <div class="col-12">
                    <h1 class="display-4">Meet the Team</h1>
                </div>
                <hr>
            </div>
        </div>
        <!--cards section-->
        <div class="conainer-fluid padding">
            <div class="row padding" style="margin-right: 0px; margin-left: 2px;">
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="img/team1.png">
                        <div class="card-body">
                            <h4 class="card-title">Prionto Abdullah</h4>
                            <p class="card-text">Prionto Abdullah is a Ceo of our company</p>
                            <a href="#" class="btn btn-outline-secondary">See profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="img/team2.png">
                        <div class="card-body">
                            <h4 class="card-title">Mahiya Islam</h4>
                            <p class="card-text">Delightfull manager of our company</p>
                            <a href="#" class="btn btn-outline-secondary">See profile</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="img/team3.png">
                        <div class="card-body">
                            <h4 class="card-title">Shahed Talukder</h4>
                            <p class="card-text">Former employ of our whole project</p>
                            <a href="#" class="btn btn-outline-secondary">See profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>