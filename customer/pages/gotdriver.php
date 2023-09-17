<?php
include("../../Database/connection.php");
    $arraydriver = array();
    $randdriver = "SELECT * FROM driver";
    $sql_driver = mysqli_query($conn, $randdriver);
    while($res_driver = mysqli_fetch_assoc($sql_driver)){
        array_push($arraydriver, $res_driver);
    }

    $randNum = rand(0, sizeof($arraydriver) - 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/gotdriver.css">
    <title>We've Got Your Driver</title>
</head>
<body>
    
    <div class="kontainer">
        <div class="device">    
            <div class="header">
                <span>We've Got Your Driver</span>
                <a href="../pages/home.php"><img src="../assets/helmet.png" alt=""></a>
            </div>
            <div class="input-kontainer">
                <form action="../action/sent.php" method="post">
                    <div class="data">
                        <label for="">Name</label>
                        <input type="text" disabled value="<?= $arraydriver[$randNum]["name"] ?>">
                    </div>
                    <div class="data">
                        <label for="">Number Plate</label>
                        <input type="text" disabled value="<?= $arraydriver[$randNum]["number_plate"] ?>">
                    </div>
                    <div class="data">
                        <label for="">Vehicle</label>
                        <input type="text" disabled value="<?= $arraydriver[$randNum]["vehicle"] ?>">
                    </div>
                    <div class="data">
                        <label for="">Gender</label>
                        <input type="text" disabled value="<?= $arraydriver[$randNum]["gender"] ?>">
                    </div>
                    <div class="data">
                        <input type="hidden" name="driverid" value="<?= $arraydriver[$randNum]["driver_id"] ?>">
                    </div>
                    <div class="btn-kontainer">
                        <button type="submit" class="finish-btn" name="submit">Finish Transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>