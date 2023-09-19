<?php
   include("../../Database/connection.php");
   $qry = "select * from merchant limit 0, 6"; 
   //this is for assign the value of market 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/food.css">
    <title>Mart</title>
</head>
<body>
    <div class="container">
        <div class="device">
            <!-- this is for header -->
            <div class="header">
                <div class="back">
                    <a href="home.php">
                    <a href="home.php"><img src="../assets/arrow-left.svg" alt=""></a>  
                    </a>    
                </div>
                <div class="header_name">
                    <h5>Foods</h5>
                </div>
            </div>
            <!-- this is for showing the mart -->
            <div class="mart_name">
                 <?php 
                        $conc = mysqli_query($conn, $qry);
                        while($row = mysqli_fetch_assoc($conc)) :
                    ?>
                        <a href="foodMart.php?food=<?= $row["merchant_id"]?>">
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
                        </a>
                        <!-- this is for assignning -->
                    <?php endwhile; ?>

            </div>
        </div>
    </div>
    
</body>
</html>

<?php
?>
