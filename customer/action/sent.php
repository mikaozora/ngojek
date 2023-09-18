<?php

session_start();
include("../../Database/connection.php");

if(isset($_POST["submit"])){
    $sender = $_POST["sender"];
    echo $sender;
}

if(isset($_POST["paybuttonSent"])){
    $sender = $_POST["sender"];
    $receiver = $_POST["receiver"];
    $pickuppoint = $_POST["pickuppoint"];
    $destination = $_POST["destination"];
    $description = $_POST["description"];
    $fees = $_POST["fees"];
    
    $_SESSION["session_ordergoods"] = $orderid;
    $_SESSION["session_sender"] = $sender;
    $_SESSION["session_receiver"] = $receiver;
    $_SESSION["session_pickup"] = $pickuppoint;
    $_SESSION["session_destination"] = $destination;
    $_SESSION["session_description"] = $description;
    $_SESSION["session_fees"] = $fees;
    
    header("location: ../pages/gotdriversent.php");

}else if(isset($_POST["paybuttonRide"])){
    $orderid = $_POST["ordergoodsid"];
    $sender = $_POST["sender"];
    $pickuppoint = $_POST["pickuppoint"];
    $destination = $_POST["destination"];
    $description = $_POST["description"];
    $fees = $_POST["fees"];
    
    $_SESSION["session_ordergoods"] = $orderid;
    $_SESSION["session_sender"] = $sender;
    $_SESSION["session_pickup"] = $pickuppoint;
    $_SESSION["session_destination"] = $destination;
    $_SESSION["session_fees"] = $fees;

    header("location: ../pages/gotdriverride.php");
}

if(isset($_POST["nextbutton"])){
    $goodsid = $_POST["goodsid"];
    $goodname = $_POST["goodname"];
    $weight = $_POST["weight"];
    $dimension = $_POST["dimension"];
    $description = $_POST["description"];
    
    $_SESSION["session_goodid"] = $goodsid;
    $_SESSION["session_goodname"] = $goodname;
    $_SESSION["session_weight"] = $weight;
    $_SESSION["session_dimension"] = $dimension;
    $_SESSION["session_good_description"] = $description;

    header("location: ../pages/sent.php");
}

if(isset($_POST["submitSent"])){
    $customer_id = $_SESSION["session_customerid"];
    $orderid = $_SESSION["session_ordergoods"];
    $sender = $_SESSION["session_sender"];
    $receiver = $_SESSION["session_receiver"];
    $goodsid = $_SESSION["session_goodid"];
    $goodsname = $_SESSION["session_goodname"];
    $goods_weight = $_SESSION["session_weight"];
    $goods_dimension = $_SESSION["session_dimension"];
    $goods_description = $_SESSION["session_good_description"];
    $pickuppoint = $_SESSION["session_pickup"];
    $destination = $_SESSION["session_destination"];
    $fees = $_SESSION["session_fees"];
    $driverid = $_POST["driverid"];
    $res = null;

    try{
        $sql = "INSERT INTO goods VALUES ('$goodsid', '$goods_weight', '$goodsname', '$goods_dimension', '$goods_description')";
        $res = mysqli_query($conn, $sql);
    } catch(mysqli_sql_exception){

    }

    try{
        $sql = "INSERT INTO order_goods VALUES ('$orderid', '$customer_id', '$driverid', NOW(), '$goodsid', '$pickuppoint', '$destination', '$fees');";
        $res = mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e){
        print_r($e);
    }

    if ($res){
        header("location: ../pages/succes.html");
    }
}else if(isset($_POST["submitRide"])){
    $customer_id = $_SESSION["session_customerid"];
    $orderid = $_SESSION["session_ordergoods"];
    $sender = $_SESSION["session_sender"];
    $pickuppoint = $_SESSION["session_pickup"];
    $destination = $_SESSION["session_destination"];
    $fees = $_SESSION["session_fees"];
    $driverid = $_POST["driverid"];
    $res = null;

    try{
        $sql = "INSERT INTO order_driver VALUES ('$orderid', '$driverid', '$customer_id', '$destination', '$pickuppoint',  NOW() '$fees');";
        $res = mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e){
        print_r($e);
    }

    if ($res){
        header("location: ../pages/succes.html");
    }
}


?>