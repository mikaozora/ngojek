<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location: ../../index.php");
    exit();
}
include("../../../Database/connection.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Transaction</title>
</head>

<body>
    <div class="kontainer">
        <?php include("sidebar.php"); ?>
        <div class="container-content">
            <div class="header-content">
                <h2>History Transaction</h2>
            </div>
            <?php
            include('tab.php');
            if($_GET["history"] == "ride"){
                include('transactionRide.php'); 
            }elseif($_GET["history"] == "mart"){
                include('transactionMart.php'); 
            }elseif($_GET["history"] == "sent"){
                include('transactionSent.php'); 
            }elseif($_GET["history"] == "food"){
                include('transactionFood.php'); 
            }

            ?>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>