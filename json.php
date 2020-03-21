<?php

    $id = $_GET['id'];
    require_once "config.php";
    $sql = "SELECT * FROM patient_info WHERE id=$id";
    $result = mysqli_query($link, $sql);
    $json_array = array();

    while($row = mysqli_fetch_assoc($result)){
        $json_array[] = $row;
    }

    echo json_encode($json_array[0]);
?>