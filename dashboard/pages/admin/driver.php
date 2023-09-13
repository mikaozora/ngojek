<?php
    session_start();
    if(!isset($_SESSION["session_username"])){
        header("location: ../../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/driver.css">
    <title>Driver</title>
</head>
<body>
    <div class="container">
        <?php include("sidebar.php"); ?>
        <h1>ini halaman driver</h1>
    </div>
</body>
</html>