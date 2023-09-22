<?php
session_start();
include("../../Database/connection.php");
$subscription_id = $_GET["type"];
$customer_id = $_SESSION["customer_id"];

$sql_cust = "select * from customers where customer_id = '$customer_id'";
$res_cust = mysqli_query($conn, $sql_cust);
$row_cust = mysqli_fetch_assoc($res_cust);
$current_subsId = $row_cust["subscription_id"];

$sql = "select * from subscription where subscription_id = '$subscription_id'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

if(isset($_POST["subscribe"])){
    if(!$current_subsId){
        $sql_subs = "update customers set subscription_id = '$subscription_id' where customer_id = '$customer_id'";
        $res_subs = mysqli_query($conn, $sql_subs);
        if($res_subs){
            header("location: home.php");
        }
    }else{
        echo "<script>alert('you already subscribe');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/subscription.css">
    <title>Subscription</title>
</head>

<body>
    <div class="kontainer">
        <div class="device">
            <div class="wrap-header">
                <a href="home.php"><img src="../assets/arrow-left.svg" alt=""></a>
                <h3><span>Ngojek </span>Subscription</h3>
            </div>
            <div class="wrap-content">
                <div class="wrap-description">
                    <div class="top">
                        <h6>Benefits</h6>
                        <ul>
                            <li>No more busy hour fee</li>
                            <li>Extra discount for selected restos</li>
                            <li>Discount Rp<?= number_format($row["description"], 0, ',', '.') ?> for delivery shipping</li>
                        </ul>
                        <h6>Must Knows</h6>
                        <ul>
                            <li>Min order 40.000</li>
                            <li>5 orders per day</li>
                        </ul>
                        <h6>Rp<?= number_format($row["price"],0,',','.') ?> for 3 Months</h6>
                    </div>
                    <div class="bottom">
                        <div class="wrap-tab">
                            <a href="?type=SID01"><button class="btn btn-primary mr-1 tabs <?= $_GET["type"] == "SID01" ? : "off"; ?>">Gold</button></a>
                            <a href="?type=SID02"><button class="btn btn-primary mr-1 tabs <?= $_GET["type"] == "SID02" ? : "off"; ?>">Platinum</button></a>
                            <a href="?type=SID03"><button class="btn btn-primary mr-1 tabs <?= $_GET["type"] == "SID03" ? : "off"; ?>">Immortal</button></a>                  
                        </div>
                    </div>
                </div>
                <form action="subscription.php?type=<?= $_GET["type"] ?>" method="post">
                    <div class="wrap-footer">
                        <h5>Rp<?= number_format($row["price"],0,',','.') ?></h5>
                        <button class="btn btn-primary" name="subscribe">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>