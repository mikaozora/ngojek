<?php

include("../../Database/connection.php");

if(isset($_POST["submit"])){
    $customer_id = $_POST["customer_id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];

    $res = "";
    try{
        $sql = "insert into customers values ('$customer_id', NULL, '$name', '$gender', '$age', '$username', '$password', '$address', '$phone_number')";
        $res = mysqli_query($conn, $sql);
    }catch(mysqli_sql_exception $e){
        print_r($e);
    }
    if($res){
        header('location: ../index.php');
    }
}

?>