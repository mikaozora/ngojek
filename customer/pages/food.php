<?php
   include("../../Database/connection.php");
   $qry = "select * from merchant"; 
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
                <a href="">
                    <div class="exit_page">
                        
                    </div>  
                </a>
                <div class="header_name">
                    <h5>Food</h5>
                </div>
                <div class="image_cart">
                </div>
            </div>
            <!-- this is for showing the mart -->
            <div class="mart_name">
                <?php 
                    $conc = mysqli_query($conn, $qry);
                    while($row = mysqli_fetch_assoc($conc)) :
                ?>
                <div class="mart_list">
                    <p><?= $row["name"]?></p>
                    <p><?= $row["merchant_type"]?></p>
                </div>
                    <?php endwhile; ?>
            </div>

        </div>
    </div>
    
</body>
</html>