<?php
    session_start();
    
    if(!isset($_SESSION["session_username"])){
        header("location: ../../index.php");
        exit();
    }

    include("../../../Database/connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>  5
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/home.css">
    <title>Home</title>
</head>
<body>
    <div class="container">
        <?php include("sidebar.php"); ?>
        <h1>ini halaman home</h1>
    </div>
</body>
</html>
