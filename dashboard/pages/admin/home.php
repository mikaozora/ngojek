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
            <h1>Welcome, Admin</h1>
            <!--------------------------------- buat kesimpulan total pengguna ngojek ---------------------------------------->
            <div class="containSummaryv">
                <ul class="countSummaryv">
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 1.png">
                        <span>Total Merchant</span>
                        <?php
                        $sql = "select count(merchant_id) as num from merchant";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                        ?>
                            <h4><?= $row["num"] ?></h4>
                        <?php endwhile; ?>
                    </li>
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 2.png">
                        <span>Total Customers</span>
                        <?php
                        $sql = "select count(customer_id) as num from customers";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                        ?>
                            <h4><?= $row["num"] ?></h4>
                        <?php endwhile; ?>
                    </li>
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 3.png">
                        <span>Total Drivers</span>
                        <?php
                        $sql = "select count(driver_id) as num from driver";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                        ?>
                            <h4><?= $row["num"] ?></h4>
                        <?php endwhile; ?>
                    </li>
                    <li class="cardCountv">
                        <img src="../../../uploads/Component 3.png">
                        <span>Total Transactions</span>
                        <?php
                            $sql = "select count(order_driverid) as a, count(order_itemid) as b, count(order_goodsid) as c, count(order_menuid) as d from order_driver join order_goods join order_item join order_menu";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($res)) :
                                $total = $row["a"] + $row["b"] + $row["c"] + $row["d"];
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
                            <th scope="col">Source</th>
                            <th scope="col">Destination</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $sql = "select o.order_driverid as TransactionID, c.name as CustomerName, d.name as Driver, o.Source, o.Destination from order_driver o join customers c join driver d on d.driver_id = o.driver_id and o.customer_id = c.customer_id limit $start, $rowPerPage";
                        $res = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($res)) :
                            $no++;
                        ?>
                            <tr>
                                <th><?= ++$start; ?></th>
                                <td><?= $row["TransactionID"] ?></td>
                                <td><?= $row["CustomerName"] ?></td>
                                <td><?= $row["Driver"] ?></td>
                                <td><?= $row["Source"] ?></td>
                                <td><?= $row["Destination"] ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <!------------------------------------ Latest Subscribers & Revenues Container -------------------------------------------->
            <div class="d-flex justify-content-between mt-5">
                <!-------------------- latest subscribers ---------------------->
                <div class="bg-white p-4 rounded" style="width: 44%;">
                    <h2>
                        Latest Subscribers
                    </h2>
                    <table class="table table-bordered bg-white">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $start = 0;
                            $no = 1;
                            $sql = "select c.name, c.gender, c.age from customers c join subscription s on c.subscription_id = s.subscription_id limit $start, $rowPerPage";
                            $res = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($res)) :
                                $no++;
                            ?>
                                <tr>
                                    <th><?= ++$start; ?></th>
                                    <td><?= $row["name"] ?></td>
                                    <td><?= $row["gender"] ?></td>
                                    <td><?= $row["age"] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
                <!----------------------- revenues ------------------------------>
                <div class="bg-white rounded p-3" style="width: 44%;">
                    <h2 class="align-self-start">
                        Revenues
                    </h2>
                    <img style="width: 100%;" src="../../../uploads/Vector 15.png">
                </div>
            </div>
        </div>
    </div>
</body>

</html>