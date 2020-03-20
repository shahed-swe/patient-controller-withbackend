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
    <link rel="stylesheet" href="css/login.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <title>Document</title>
    <style>
        body {
            background-image: linear-gradient(45deg, #62f862, #2089b3);
        }
        
        .form-section {
            margin-top: 50px;
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
                <div class="container">
                    <div class="row">
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                        <div class="card-body col-4">
                            <h5 class="card=title">192.168.0.101</h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                Md Shahed Talukder
                            </h6>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <button class="btn btn-danger shadow-none"><span class="fa fa-eraser"> Delete</span></button>
                            <button class="btn btn-info shadow-none"><span class="fa fa-edit"> Edit</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>