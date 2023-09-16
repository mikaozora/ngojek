<?php
$page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <div class="wrap-tab">
        <button class="btn btn-primary pd-tab mr-1 <?= $_GET["history"] == "ride" ? '':'off'; ?>"><a href="transaction.php?history=ride" class="<?= $_GET["history"] == "ride" ? '':'off'; ?>">Ride</a></button>
        <button class="btn btn-primary pd-tab mr-1 <?= $_GET["history"] == "mart" ? '':'off'; ?>"><a href="transaction.php?history=mart" class="<?= $_GET["history"] == "mart" ? '':'off'; ?>">Mart</a></button>
        <button class="btn btn-primary pd-tab mr-1 <?= $_GET["history"] == "sent" ? '':'off'; ?>"><a href="transaction.php?history=sent" class="<?= $_GET["history"] == "sent" ? '':'off'; ?>">Sent</a></button>
        <button class="btn btn-primary pd-tab <?= $_GET["history"] == "food" ? '':'off'; ?>"><a href="transaction.php?history=food" class="<?= $_GET["history"] == "food" ? '':'off'; ?>">Food</a></button>
    </div>
</body>

</html>