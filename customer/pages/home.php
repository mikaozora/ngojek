<?php
    session_start();
    
    if(!isset($_SESSION["session_username"])){
        header("location: ../index.php");
        exit();
    }



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <div class="kontainer">
        <div class="device">
            <div class="header">
                <div class="left-side">
                    <h1>Ngojek.</h1>
                    <span>Hello, <?php echo $_COOKIE["cookie_name"]?>👋</span>
                </div>
                <a href="profile.php"><div class="avatar">
                </div></a>
            </div>
            <div class="menu">
                <div class="item">
                    <a href="mart.php"><img src="../assets/mart.svg" alt=""></a>
                    <span>Mart</span>
                </div>
                <div class="item">
                    <a href="sent.php"><img src="../assets/sent.svg" alt=""></a>
                    <span>Sent</span>
                </div>
                <div class="item">
                    <a href="ride.php"><img src="../assets/drive.svg" alt=""></a>
                    <span>Ride</span>
                </div>
                <div class="item">
                    <a href="food.php"><img src="../assets/food.svg" alt=""></a>
                    <span>Food</span>
                </div>
            </div>
            <div class="banner">
                <img src="../assets/banner.png" alt="">
            </div>
            <div class="history">
                <div class="title">
                    <h1>Transaction History</h1>
                    <span><a href="history.php?history=ride">See all</a></span>
                </div>
                <div class="display-history">
                    <div class="display-history-line">
                        <div class="display-history-item">
                            <img src="../assets/sent_2.svg" alt="">
                            <div class="desc">
                                <h1>Indomart</h1>
                                <span>roti,susu,gula</span>
                            </div>
                            <span>Rp.10000</span>
                        </div>
                        <hr>
                    </div>
                    <div class="display-history-line">
                        <div class="display-history-item">
                            <img src="../assets/sent_2.svg" alt="">
                            <div class="desc">
                                <h1>Indomart</h1>
                                <span>roti,susu,gula</span>
                            </div>
                            <span>Rp.10000</span>
                        </div>
                        <hr>
                    </div>
                    <div class="display-history-line">
                        <div class="display-history-item">
                            <img src="../assets/sent_2.svg" alt="">
                            <div class="desc">
                                <h1>Indomart</h1>
                                <span>roti,susu,gula</span>
                            </div>
                            <span>Rp.10000</span>
                        </div>
                        <hr>
                    </div>
                    <div class="display-history-line">
                        <div class="display-history-item">
                            <img src="../assets/sent_2.svg" alt="">
                            <div class="desc">
                                <h1>Indomart</h1>
                                <span>roti,susu,gula</span>
                            </div>
                            <span>Rp.10000</span>
                        </div>
                        <hr>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>