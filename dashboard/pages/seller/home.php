<?php

session_start();

if (!isset($_SESSION["session_username"])) {
    header("location: ../../index.php");
    exit();
}

include("../../../Database/connection.php");

$start = 0;
$rowPerPage = 5;

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/home.css">
    <title>Home</title>
</head>

<body>
    <div class="kontainer">
        <?php include("sidebar.php"); ?>
        <div class="containContentv">
            <?php
            $sql = "select name as num from merchant where username = '$_SESSION[session_username]';";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) :
            ?>
                <h1>Welcome, <?= $row["num"] ?></h1>
            <?php endwhile; ?>

            <!--------------------------------- Summary count ---------------------------------------->
            <div class="containSummaryv">
                <ul class="countSummaryv">
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 1.png">
                        <span>Total Products</span>
                        <?php
                        $sql = "select count(i.item_id) as num2, count(m.menu_id) as num from merchant mr join item i join menu m on mr.merchant_id = i.merchant_id and mr.merchant_id = m.merchant_id where mr.username = '$_SESSION[session_username]';";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                            $totalP = $row['num2'] + $row['num'];
                        endwhile;
                        ?>

                        <h4><?= $totalP ?></h4>

                    </li>
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 2.png">
                        <span>Total Buyers</span>
                        <?php
                        $sql = "select distinct count(c.customer_id) as num from customers c join order_item oi join order_menu om join merchant mr on c.customer_id = oi.customer_id and c.customer_id = om.customer_id and mr.merchant_id = om.merchant_id where mr.username = '$_SESSION[session_username]';";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                        ?>
                            <h4><?= $row["num"] ?></h4>
                        <?php endwhile; ?>
                    </li>
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 3.png">
                        <span>Total Transaction</span>
                        <?php
                        $sql = "select count(c.customer_id) as num from customers c join order_item oi join order_menu om join merchant mr on c.customer_id = oi.customer_id and c.customer_id = om.customer_id and mr.merchant_id = om.merchant_id where mr.username = '$_SESSION[session_username]';";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                        ?>
                            <h4><?= $row["num"] ?></h4>
                        <?php endwhile; ?>
                    </li>
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 3.png">
                        <span>Total Revenue</span>
                        <?php
                        $total = 0;

                        if ($_COOKIE["cookie_merchant_type"] == "Restaurant") {
                            $sql = "select m.price as a, om.quantity b from menu m join order_menu_detail om join merchant mt on m.menu_id = om.menu_id and mt.merchant_id = m.merchant_id where mt.username = '$_SESSION[session_username]';";
                        } else {
                            $sql = "select m.price as a, om.quantity b from item m join order_item_detail om join merchant mt on m.item_id = om.item_id and mt.merchant_id = m.merchant_id where mt.username = '$_SESSION[session_username]';";
                        }

                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                            $total += $row["a"] * $row["b"];
                        endwhile;

                        ?>
                        <h4><?= $total ?></h4>
                    </li>
                </ul>
            </div>
            <!---------------------------------------- Recent Transaction ------------------------------------------------------->
            <div class="containRTransaction bg-white rounded p-3">
                <h2>Recent Transactions</h2>
                <table class="table table-bordered bg-white">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Menu</th>
                            <th scope="col">Quantity</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;


                        if ($_COOKIE["cookie_merchant_type"] == 'Restaurant') {
                            $sql = "select om.order_menuid as a, c.name as b, d.name as c, m.name as d, omd.quantity as e from order_menu_detail omd join order_menu om join customers c join driver d join menu m join merchant mt on omd.order_menuid = om.order_menuid and c.customer_id = om.customer_id and d.driver_id = om.driver_id and m.menu_id = omd.menu_id and mt.merchant_id = m.merchant_id where mt.username = '$_SESSION[session_username]' limit $start, $rowPerPage";
                        } else {
                            $sql = "select om.order_itemid as a, c.name as b, d.name as c, m.name as d, omd.quantity as e from order_item_detail omd join order_item om join customers c join driver d join item m join merchant mt on omd.order_itemid = om.order_itemid and c.customer_id = om.customer_id and d.driver_id = om.driver_id and m.item_id = omd.item_id and mt.merchant_id = m.merchant_id where mt.username = '$_SESSION[session_username]' limit $start, $rowPerPage";
                        }

                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                            $no++;
                        ?>
                            <tr>
                                <th><?= ++$start; ?></th>
                                <td><?= $row["a"] ?></td>
                                <td><?= $row["b"] ?></td>
                                <td><?= $row["c"] ?></td>
                                <td><?= $row["d"] ?></td>
                                <td><?= $row["e"] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <!------------------------------------ best seller container -------------------------------------------->
            <div class="d-flex justify-content-between mt-5">
                <!-------------------- best seller ---------------------->
                <div class="bg-white p-4 rounded" style="width: 48%;">
                    <h2>
                        Best Seller
                    </h2>
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            $no = 1;
                            if ($_COOKIE["cookie_merchant_type"] == 'Restaurant') {
                                $sql = "select m.name, m.price from menu m join order_menu_detail omd join merchant mt on m.menu_id = omd.menu_id and mt.merchant_id = m.merchant_id where mt.username = '$_SESSION[session_username]'
                                group by m.menu_id ORDER BY sum(omd.quantity) desc limit $start, $rowPerPage";
                            } else {
                                $sql = "select m.name, m.price from item m join order_item_detail omd join merchant mt on m.item_id = omd.item_id and mt.merchant_id = m.merchant_id where mt.username = '$_SESSION[session_username]'
                                group by m.item_id ORDER BY sum(omd.quantity) desc limit $start, $rowPerPage";
                            } 
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($res)) :
                                $no++;
                            ?>
                                <tr>
                                    <th><?= ++$start; ?></th>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["price"] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</body>

</html>