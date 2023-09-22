<?php
session_start();
$logged_customer = $_SESSION["session_customerid"];
include('../../Database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/history.css">
    <title>Document</title>
</head>

<body>
    <?php
    $type = $_GET['type'];
    if ($type == 'mart') {

        $sql = "select distinct o.order_itemid, d.name, d.number_plate, m.name as menuname from order_item o join driver d join customers c join merchant m join item i join order_item_detail oid on o.driver_id = d.driver_id and o.customer_id = c.customer_id and m.merchant_id = i.merchant_id and oid.item_id = i.item_id and oid.order_itemid = o.order_itemid where c.customer_id = '$logged_customer' and o.order_itemid = '$_GET[id]'";
    } else {
        $sql = "select distinct o.order_menuid, d.name, d.number_plate, m.name as menuname from order_menu o join driver d join customers c join merchant m join menu men join order_menu_detail omd on o.driver_id = d.driver_id and o.customer_id = c.customer_id and m.merchant_id = men.merchant_id and men.menu_id = omd.menu_id and omd.order_menuid = o.order_menuid where c.customer_id = '$logged_customer' and o.order_menuid = '$_GET[id]'";
    }
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) :
    ?>
        <div class="kontainer">
            <div class="device">
                <div class="d-flex flex-row w-50 justify-content-between">
                    <a href="javascript:history.back()">
                        <img src="../assets/arrow-left.svg" alt="">
                    </a>
                    <h1 class="h6 mt-1">Detail Transaction</h1>
                </div>

                <div class="pt-4">
                    <p style="font-size: 0.9rem;" class="mb-1">Order id</p>
                    <h2 class="h5"><?= $type == 'mart' ? $row["order_itemid"] : $row["order_menuid"]; ?></h2>
                </div>

                <div class="pt-2 pb-3 border-bottom">
                    <p style="font-size: 0.9rem;" class="mb-1">Resto name</p>
                    <h2 class="h5"><?= $row["menuname"] ; ?></h2>
                </div>

                <div class="pt-4 border-bottom pb-4">
                    <div class="d-flex">
                        <img src="../assets/profile.svg" style="width: 16%;">
                        <div class="d-flex flex-column" style="margin-left: 8%;">
                            <span class="h5" style="font-size: 1.3rem;"><?= $row["name"]; ?></span>
                            <span class="h5" style="font-size: 0.9rem;"><?= $row["number_plate"]; ?></span>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>



            <h3 class="mb-3 mt-4" style="font-size: 1.3rem;">Orders</h3>

            <?php
                $total = 0;
                if ($type == 'mart') {
                    $sql = "select i.name, oid.quantity, i.price, oi.ongkir as ongkir from item i join order_item_detail oid join order_item oi join customers c on c.customer_id = oi.customer_id and i.item_id = oid.item_id and oid.order_itemid = oi.order_itemid where c.customer_id = '$logged_customer' and oi.order_itemid = '$_GET[id]'";
                } else {
                    $sql = "select i.name, oid.quantity, i.price, oi.ongkir as ongkir from menu i join order_menu_detail oid join order_menu oi join customers c on c.customer_id = oi.customer_id and i.menu_id = oid.menu_id and oid.order_menuid = oi.order_menuid where c.customer_id = '$logged_customer' and oi.order_menuid = '$_GET[id]'";
                }
                $res = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($res)) :
                    $total += ($row["quantity"] * $row["price"]);
                    $ongkir = $row["ongkir"];
            ?>

            <div class="d-flex justify-content-between mb-1">
                <span><?= $row["name"] ?></span>
                <span><?= $row["quantity"] ?></span>
            </div>


            <?php endwhile; ?>

            <div class="border-bottom pt-2 pb-2"></div>

            <div class="border-bottom pt-4 pb-3">
                <h3 style="font-size: 1.2rem;" class="mb-4">Payment Detail</h3>

                <div class="d-flex justify-content-between">
                    <p>Total Fee</p>
                    <span class=""><?= number_format($total, 2, ',', '.'); ?></span>
                </div>

                <div class="d-flex justify-content-between">
                    <p>Application Fee</p>
                    <span>2.000,00</span>
                </div>

                <div class="d-flex justify-content-between">
                    <p>Shipment Fee</p>
                    <span><?=number_format($ongkir, 2, ',', '.');?></span>
                </div>

            </div>
                    
            <div class="d-flex justify-content-between mt-4">
                <h2 class="h5">Grand Total</h2>
                <span class="font-weight-bold" style="font-size: 1rem;"><?= number_format($total + $ongkir + 2000, 2, ',', '.'); ?></span>
            </div>
            </div>
        </div>
</body>

</html>