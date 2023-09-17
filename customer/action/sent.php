<?php

session_start();
include("../../Database/connection.php");

if(isset($_POST["submit"])){
    $sender = $_POST["sender"];
    echo $sender;
}

if(isset($_POST["paybutton"])){
    $sender = $_POST["sender"];
    $receiver = $_POST["receiver"];
    $pickuppoint = $_POST["pickuppoint"];
    $destination = $_POST["destination"];
    $description = $_POST["description"];
    $fees = $_POST["fees"];

    header("location: ../pages/gotdriver.php");
}

?>