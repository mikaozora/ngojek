<?php

include("../../../../Database/connection.php");

if (isset($_POST["submit"])) {
    $menu_id = $_POST["menu_id"];
    $menu_name = $_POST["menu_name"];
    $category = $_POST["category"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $merch_id = $_COOKIE["cookie_merchant_id"];

    $fileName = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $newFileName = uniqid() . "-" . $fileName;
    move_uploaded_file($tmpName, '../../../../uploads/' . $newFileName);

    $res_menu = false;
    try {
        $sql_menu = "insert into menu values ('$menu_id', '$menu_name', '$category', '$stock', '$price', '$description', '$merch_id','$newFileName')";
        $res_menu = mysqli_query($conn, $sql_menu);
    } catch (mysqli_sql_exception $e) {
        print_r($e);
    }

    if ($res_menu) {
        header("location: ../product.php");
    }
}

if (isset($_POST["edit"])) {
    $menu_id = $_POST["menu_id"];
    $menu_name = $_POST["name"];
    $category = $_POST["category"];
    $stock = $_POST["stock"];
    $price = $_POST["price"];
    $description = $_POST["description"];

    $res = false;
    if ($_FILES["image"]["error"] != 4) {
        $fileName = $_FILES["image"]["name"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $newFileName = uniqid() . "-" . $fileName;
        move_uploaded_file($tmpName, '../../../../uploads/' . $newFileName);
        try {
            $sql = "update menu set image = '$newFileName' where menu_id = '$menu_id'";
            $res = mysqli_query($conn, $sql);
        } catch (mysqli_sql_exception) {
        }
    }

    $res = false;
    try {
        $sql = "update menu set name = '$menu_name', category = '$category', stock = '$stock', price = '$price', description = '$description' where menu_id = '$menu_id '";
        $res = mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception) {
    }
    if ($res) {
        header("location: ../product.php");
    }
}

if(isset($_POST["delete"])){
    $id = $_POST["menu_id"];

    try{
        $sql = "delete from menu where menu_id = '$id'";
        $res = mysqli_query($conn, $sql);
    }catch(mysqli_sql_exception){
        
    }
    if ($res) {
        header("location: ../product.php");
    }
}