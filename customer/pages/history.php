<?php
include("../../Database/connection.php");
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
    <link rel="stylesheet" href="../style/history.css">
    <title>History</title>
</head>
<body>
    <div class="kontainer">
        <div class="device">
            <div class="wrap-header">
                <a href="home.php"><img src="../assets/arrow-left.svg" alt=""></a>
                <h3>Transaction History</h3>
            </div>
            <div class="wrap-tab">
                <a href="?history=ride"><button class="btn btn-primary mr-1 <?= $_GET["history"] == "ride" ? : "off"; ?>">Ride</button></a>
                <a href="?history=mart"><button class="btn btn-primary mr-1 <?= $_GET["history"] == "mart" ? : "off"; ?>">Mart</button></a>
                <a href="?history=sent"><button class="btn btn-primary mr-1 <?= $_GET["history"] == "sent" ? : "off"; ?>">Sent</button></a>
                <a href="?history=food"><button class="btn btn-primary <?= $_GET["history"] == "food" ? : "off"; ?>">Food</button></a>
            </div>
            <?php
            if($_GET["history"] == "ride"){
                include("historyRide.php");
            }elseif($_GET["history"] == "mart"){
                include("historyMart.php");
            }elseif($_GET["history"] == "sent"){
                include("historySent.php");
            }elseif($_GET["history"] == "food"){
                include("historyFood.php");
            }
            ?>
        </div>

    </div>
</body>
</html>