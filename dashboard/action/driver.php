<?php

include("../../Database/connection.php");

if (isset($_POST["submit"])) {
    $driver_id = $_POST["driver_id"];
    $driver_name = $_POST["driver_name"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $number_plate = $_POST["number_plate"];
    $vehicle = $_POST["vehicle"];

    $res = false;
    try {
        $sql = "insert into driver values ('$driver_id', '$vehicle', '$driver_name', $age, '$gender', '$phone', '$number_plate')";
        $res = mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception) {
    }

    if ($res) {
        header("location: ../pages/admin/driver.php");
    }
}

if (isset($_POST["edit"])) {
    $driver_id = $_POST["driver_id"];
    $driver_name = $_POST["driver_name"];
    $age = $_POST["age"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $number_plate = $_POST["number_plate"];
    $vehicle = $_POST["vehicle"];

    $id = $_POST["driver_id"];

    $res = false;
    try {
        $sql = "update driver set 
        name = '$driver_name', age = $age, phone_number = '$phone', gender = '$gender', number_plate = '$number_plate', vehicle = '$vehicle' 
        where driver_id = '$id'";
        $res = mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        print_r($e);
    }
    if ($res) {
        header("location: ../pages/admin/driver.php");
    }
}

if(isset($_POST["delete"])){
    $id = $_POST["driver_id"];

    try{
        $sql = "delete from driver where driver_id = '$id'";
        $res = mysqli_query($conn, $sql);
    }catch(mysqli_sql_exception){
        
    }
    if ($res) {
        header("location: ../pages/admin/driver.php");
    }
}