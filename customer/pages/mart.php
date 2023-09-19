<?php
session_start();
include("../../Database/connection.php");
if (!isset($_SESSION["session_username"])) {
    header("location: ../index.php");
    exit();
}
$_SESSION["cart"] = NULL;
$_SESSION["session_merchant_id"] = NULL;

$sql = "select * from merchant where merchant_type = 'Mart'";
$res = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/mart.css">
    <title>Mart</title>
</head>

<body>
    <div class="kontainer">
        <div class="device">
            <div class="wrap-header">
                <div class="left">
                    <a href="home.php"><img src="../assets/arrow-left.svg" alt=""></a>
                    <h3>Mart</h3>
                </div>
                <div class="right">
                    <!-- <a href="cart.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.298 10.1692H16.2965C16.7512 10.1692 17.1084 9.79331 17.1084 9.34004C17.1084 8.87571 16.7512 8.51087 16.2965 8.51087H13.298C12.8434 8.51087 12.4862 8.87571 12.4862 9.34004C12.4862 9.79331 12.8434 10.1692 13.298 10.1692ZM19.8579 4.42144C20.5182 4.42144 20.9512 4.65361 21.3842 5.16216C21.8172 5.67071 21.893 6.40038 21.7956 7.0626L20.7672 14.315C20.5724 15.7091 19.4033 16.7362 18.0285 16.7362H6.21855C4.77884 16.7362 3.5881 15.6096 3.46902 14.1503L2.47313 2.09868L0.838573 1.81123C0.405577 1.73385 0.10248 1.30268 0.178254 0.860459C0.254029 0.408289 0.676199 0.108684 1.12002 0.176123L3.70176 0.573016C4.0698 0.640455 4.34043 0.948904 4.3729 1.32479L4.57857 3.80123C4.61105 4.15611 4.8925 4.42144 5.23889 4.42144H19.8579ZM6.04513 18.4835C5.13584 18.4835 4.39975 19.2353 4.39975 20.1639C4.39975 21.0815 5.13584 21.8333 6.04513 21.8333C6.9436 21.8333 7.67969 21.0815 7.67969 20.1639C7.67969 19.2353 6.9436 18.4835 6.04513 18.4835ZM18.2231 18.4835C17.3139 18.4835 16.5778 19.2353 16.5778 20.1639C16.5778 21.0815 17.3139 21.8333 18.2231 21.8333C19.1216 21.8333 19.8577 21.0815 19.8577 20.1639C19.8577 19.2353 19.1216 18.4835 18.2231 18.4835Z" fill="#0DBA8A" />
                        </svg>
                    </a> -->
                </div>
            </div>
            <div class="wrap-content">
                <?php
                while ($rows = mysqli_fetch_assoc($res)) :
                ?>
                    <a href="martDetail.php?mart=<?= $rows["merchant_id"] ?>">
                        <div class="mart-list">
                            <img src="../../uploads/<?= $rows["image"] ?>" alt="" width="100%" height="100%">
                            <div class="desc">
                                <h3><?= $rows["name"] ?></h3>
                                <p><?= $rows["description"] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>

</html>