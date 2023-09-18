<?php
session_start();
include("../../Database/connection.php");

if (isset($_POST["submitMart"])) {
    $order_itemid = "OI002";
    $merchant_id = $_SESSION["session_merchant_id"];
    $customer_id = $_SESSION["session_customerid"];
    $driver_id = $_POST["driverid"];

    $sql_orderitem = "";
    $res_orderitem = "";
    try {
        $sql_orderitem = "insert into order_item values('$order_itemid', '$driver_id', '$customer_id', '$merchant_id', NOW())";
        $res_orderitem = mysqli_query($conn, $sql_orderitem);
    } catch (mysqli_sql_exception $e) {
        print_r($e);
    }
    if ($res_orderitem) {
        try {
            $sql_detail = "";
            $res_detail = "";
            $item_id = "";
            $qty = 0;
            foreach ($_SESSION["cart"] as $key => $value) {
                $item_id = $value['item_id'];
                $qty = $value["quantity"];
                $sql_detail = "insert into order_item_detail values('$order_itemid', '$item_id', $qty)";
                $res_detail = mysqli_query($conn, $sql_detail);
            }
        } catch (mysqli_sql_exception $e) {
            print_r($e);
        }
        if($res_detail){
            header("location: ../pages/home.php");
        }
    }
}
