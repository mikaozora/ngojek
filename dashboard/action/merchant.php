<?php

include("../../Database/connection.php");

if (isset($_POST["submit"])) {
    $merchant_id = $_POST["merchant_id"];
    $merchant_name = $_POST["merchant_name"];
    $address = $_POST["address"];
    $description = $_POST["description"];

    $fileName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $newFileName = uniqid() . "-" . $fileName;
    move_uploaded_file($tmpName, '../../uploads/' . $newFileName);

    $merchant_type = $_POST["merchant_type"];
    $username = $_POST["username"];
    $phone = $_POST["phone"];
    $password = password_hash($username . "123", PASSWORD_DEFAULT);

    $res_merchant = false;
    try {
        $sql_merchant = "insert into merchant values ('$merchant_id', '$address', '$merchant_name', '$description', '$newFileName', '$merchant_type', '$username', '$password', '$phone')";
        $res_merchant = mysqli_query($conn, $sql_merchant);
    } catch (mysqli_sql_exception) {
    }

    if ($res_merchant) {
        header("location: ../pages/admin/merchant.php");
    }
}

if (isset($_POST["edit"])) {
    $merchant_id = $_POST["merchant_id"];
    $merchant_name = $_POST["merchant_name"];
    $address = $_POST["address"];
    $description = $_POST["description"];

    $merchant_type = $_POST["merchant_type"];
    $phone = $_POST["phone"];
    $id = $_POST["merchant_id"];

    $res = false;
    if ($_FILES["image"]["error"] != 4) {
        $fileName = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $newFileName = uniqid() . "-" . $fileName;
        move_uploaded_file($tmpName, '../../uploads/' . $newFileName);
        try {
            $sql = "update merchant set image = '$newFileName' where merchant_id = '$id'";
            $res = mysqli_query($conn, $sql);
        } catch (mysqli_sql_exception) {
        }
    }

    $res = false;
    try {
        $sql = "update merchant set name = '$merchant_name', address = '$address', description = '$description', merchant_type = '$merchant_type', phone_number = '$phone' where merchant_id = '$id'";
        $res = mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception) {
    }
    if ($res) {
        header("location: ../pages/admin/merchant.php");
    }
}

if(isset($_POST["delete"])){
    $id = $_POST["merchant_id"];

    try{
        $sql = "delete from merchant where merchant_id = '$id'";
        $res = mysqli_query($conn, $sql);
    }catch(mysqli_sql_exception){
        
    }
    if ($res) {
        header("location: ../pages/admin/merchant.php");
    }
}