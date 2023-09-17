<?php
    session_start();
    if(!isset($_SESSION["session_username"])){
        header("location: ../../index.php");
        exit();
    }
    include("../../../Database/connection.php");
    $logged_type = $_COOKIE["cookie_merchant_type"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/style/style.css">
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
            if ($logged_type == 'Restaurant'){
                include("../seller/transactionRestaurant.php");
            } else {
                include("../seller/transactionMart.php");
            }
        ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
