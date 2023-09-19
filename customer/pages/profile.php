<?php
session_start();
include("../../Database/connection.php");

if (!isset($_SESSION["session_username"])) {
    header("location: ../index.php");
    exit();
}
$username = $_COOKIE["cookie_username"];
$sql = "select * from customers where username = '$username' ";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Sign in</title>
</head>

<body>
    <div class="kontainer">
        <div class="device">
            <div class="header">
                <div class="avatar"></div>
                <h1><?= $row["name"] ?></h1>
                <div class="<?php
                            if (isset($_COOKIE["cookie_subscribe"])) {
                                if ($_COOKIE["cookie_subscribe"] == "Gold") {
                                    echo "subscribe-gold";
                                } elseif ($_COOKIE["cookie_subscribe"] == "Platinum") {
                                    echo "subscribe-Platinum";
                                } elseif ($_COOKIE["cookie_subscribe"] == "Immortal") {
                                    echo "subscribe-immortal";
                                }
                            }else{
                                echo "subscribe-free";
                            } ?>">
                    <?php if (isset($_COOKIE["cookie_subscribe"])) {
                        echo $_COOKIE["cookie_subscribe"];
                    }else{
                        echo "Free";
                    } ?>
                </div>
            </div>

            <div class="profile">
                <div class="info">
                    <h3>Name</h3>
                    <h2><?php echo $row["name"]  ?></h2>
                    <hr>
                </div>
                <div class="info">
                    <h3>Gender</h3>
                    <h2><?php echo $row["gender"]  ?></h2>
                    <hr>
                </div>
                <div class="info">
                    <h3>Age</h3>
                    <h2><?php echo $row["age"]  ?></h2>
                    <hr>
                </div>
                <div class="info">
                    <h3>Address</h3>
                    <h2><?php echo $row["address"]  ?></h2>
                    <hr>
                </div>
                <div class="info">
                    <h3>Phone Number</h3>
                    <h2><?php echo $row["phone_number"]  ?></h2>
                    <hr>
                </div>
            </div>

            <div class="button">
                <a href="../action/logout.php">
                    <div class="logout">
                        logout
                    </div>
                </a>
                <a href="../pages/edit.php">
                    <div class="edit">
                        edit profile
                    </div>
                </a>
            </div>


        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>