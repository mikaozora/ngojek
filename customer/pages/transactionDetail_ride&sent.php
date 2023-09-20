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
    if ($type == 'ride') {

        $sql = "select o.order_driverid, d.name, d.number_plate, o.source, o.destination, o.total from order_driver o join driver d join customers c on o.driver_id = d.driver_id and o.customer_id = c.customer_id where c.customer_id = '$logged_customer' and o.order_driverid = '$_GET[id]' limit 0, 7";
    } else {
        $sql = "select o.order_goodsid, d.name, d.number_plate, o.source, o.destination, o.total from order_goods o join driver d join customers c join goods g on o.driver_id = d.driver_id and o.customer_id = c.customer_id and o.goods_id = g.goods_id where c.customer_id = '$logged_customer' and o.order_goodsid = '$_GET[id]' limit 0, 7";
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

                <div class="pt-4 border-bottom">
                    <span style="font-size: 0.9rem;" class="mb-3">Order id</span>
                    <h2 class="h5"><?= $type == 'ride' ? $row["order_driverid"] : $row["order_goodsid"]; ?></h2>
                </div>

                <div class="border-bottom pt-4 pb-4">
                    <div class="d-flex justify-content-between" style="width: 40%;">
                        <img src="../assets/profile.svg" style="width: 35%;">
                        <div class="d-flex flex-column">
                            <span class="" style="font-size: 1.3rem;"><?= $row["name"]; ?></span>
                            <span class="" style="font-size: 0.9rem;"><?= $row["number_plate"]; ?></span>
                        </div>
                    </div>
                </div>

                <div class="border-bottom pt-4 pb-4">
                    <h3 class="mb-4" style="font-size: 1.3rem;">Travel Detail</h3>

                    <div class="d-flex mb-3">
                        <img src="../assets/Arrow - Up Circle.svg">
                        <div class="" style="margin-left: 8%;">
                            <span>Pick-up</span>
                            <p class="h5"><?= $row["source"]; ?></p>
                        </div>
                    </div>

                    <div class="d-flex">
                        <img src="../assets/Subtract.svg">
                        <div style="margin-left: 8%;">
                            <span>Destination</span>
                            <p class="h5"><?= $row["destination"]; ?></p>
                        </div>
                    </div>
                </div>

                <div class="border-bottom pt-4 pb-3">
                    <h3 style="font-size: 1.2rem;" class="mb-4">Payment Detail</h3>
                    <div class="d-flex justify-content-between">
                        <p class="">Travel Fee</p>
                        <span class=""><?= number_format($row["total"], 2, ',', '.'); ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="">Application Fee</p>
                        <span class="">2.000,00</span>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <h2 class="h5">Grand Total</h2>
                    <span class="font-weight-bold" style="font-size: 1rem;"><?= number_format($row["total"] + 2000, 2, ',', '.'); ?></span>
                </div>

            </div>
        </div>
    <?php endwhile; ?>
</body>

</html>