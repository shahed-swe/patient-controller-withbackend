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
    $sql = "DELETE FROM patient_info WHERE id=$id";
    if(mysqli_query($link, $sql)){
        header('location: all_patients_information.php');
    }else{
        echo "Data is not deleted Yet!";
    }
    
?>