<?php
session_start();
include("../../Database/connection.php");

if (isset($_POST["submitFood"])) {
    $order_menu_id = "OM006";
    $merchant_id = $_SESSION["session_merchant_id"];
    $customer_id = $_SESSION["session_customerid"];
    $driver_id = $_POST["driverid"]; 
    

    $sql_orderitem = "";
    $res_orderitem = "";
    try {
        $sql_orderitem = "insert into order_menu values('$order_menu_id', '$customer_id', '$merchant_id', '$driver_id', NOW())";
        $res_orderitem = mysqli_query($conn, $sql_orderitem);
    } catch (mysqli_sql_exception $e) {
        print_r($e); 
        // echo "testing";
    }
    if ($res_orderitem) {
        try {
            $sql_detail = "";
            $res_detail = "";
            $item_id = "";
            $qty = 0;
            foreach ($_SESSION["cart_for_food"] as $key => $value) {
                $menu_id = $value['menu_id'];
                $qty = $value["quantity"];
                $sql_detail = "insert into order_menu_detail values('$order_menu_id', '$menu_id', $qty)";
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
