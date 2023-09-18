<?php
   include("../../Database/connection.php");
   $qry = "select * from merchant limit 0,6"; 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/food.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="device">
            <!-- this is for header -->
            <div class="header">
                <div class="back">
                    <a href="../pages/home.php">
                        <div class="exit_page"></div>  
                    </a>    
                </div>
                <div class="header_name">
                    <h5>Foods</h5>
                </div>
                <div class="image_cart">
                    <img src="../../uploads/Picture1.png" alt="" height: "100%" width="100%">
                </div>
            </div>
            <!-- this is for showing the mart -->
            <div class="mart_name">
                <?php 
                    $conc = mysqli_query($conn, $qry);
                    while($row = mysqli_fetch_assoc($conc)) :
                ?>
                <div class="mart_list">
                    <div class="image_container">
                        <img src="../../uploads/<?=$row["image"]?>" alt="" width="100%" height="100%">
                    </div>
                    <div class="mart_desc">
                        <h4><?= $row["name"]?></h4>
                        <p><?= $row["merchant_type"]?></p>
                    </div>
                </div>
                <div class="line-spacing"></div>
                    <?php endwhile; ?>
            </div>

        </div>
    </div>
    
</body>
</html>