<?php
include("../../Database/connection.php");
session_start(); 
if (!isset($_SESSION["session_username"])) {
    header("location: ../index.php");
    exit();
}

$food_id = $_GET["food"];
$sql = "select * from merchant where merchant_id = '$food_id'"; 
$res = mysqli_query($conn, $sql); 
$row = mysqli_fetch_assoc($res); 

$_SESSION["session_merchant_id"] = $food_id; 

if (isset($_POST["addToCart"])) {
    // echo "<script>alert('test')</script>";
    if (isset($_SESSION["cart_for_food"])) {
        $session_array_id = array_column($_SESSION["cart_for_food"], "menu_id");

        if (!in_array($_POST["menu_id"], $session_array_id)) {
            $session_array = array(
                'menu_id' => $_POST["menu_id"],
                "name" => $_POST["menu_name"],
                "price" => $_POST["menu_price"],
                "image" => $_POST["menu_img"],
                "quantity" => (int) $_POST["quantity"]
            );
            // this is for assign the value of every cart in array
            $_SESSION["cart_for_food"][] = $session_array;
        }
    } else {
        $session_array = array(
            'menu_id' => $_POST["menu_id"],
            "name" => $_POST["menu_name"],
            "price" => (int)$_POST["menu_price"],
            "image" => $_POST["menu_img"],
            "quantity" => (int) $_POST["quantity"]
        );

        $_SESSION["cart_for_food"][] = $session_array;
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/mart.css">
    <title>Food</title>
</head>
<body>
    <div class="kontainer">
        <div class="device">
            <div class="wrap-header">
                <div class="left">
                    <a href="food.php"><img src="../assets/arrow-left.svg" alt="" width="22" height="22" viewBox="0 0 22 22" fill="none"></a> 
                    <h3><?= $row["name"]?></h3>     
                </div>
                <div class="right">
                    <a href="cart_for_food.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.298 10.1692H16.2965C16.7512 10.1692 17.1084 9.79331 17.1084 9.34004C17.1084 8.87571 16.7512 8.51087 16.2965 8.51087H13.298C12.8434 8.51087 12.4862 8.87571 12.4862 9.34004C12.4862 9.79331 12.8434 10.1692 13.298 10.1692ZM19.8579 4.42144C20.5182 4.42144 20.9512 4.65361 21.3842 5.16216C21.8172 5.67071 21.893 6.40038 21.7956 7.0626L20.7672 14.315C20.5724 15.7091 19.4033 16.7362 18.0285 16.7362H6.21855C4.77884 16.7362 3.5881 15.6096 3.46902 14.1503L2.47313 2.09868L0.838573 1.81123C0.405577 1.73385 0.10248 1.30268 0.178254 0.860459C0.254029 0.408289 0.676199 0.108684 1.12002 0.176123L3.70176 0.573016C4.0698 0.640455 4.34043 0.948904 4.3729 1.32479L4.57857 3.80123C4.61105 4.15611 4.8925 4.42144 5.23889 4.42144H19.8579ZM6.04513 18.4835C5.13584 18.4835 4.39975 19.2353 4.39975 20.1639C4.39975 21.0815 5.13584 21.8333 6.04513 21.8333C6.9436 21.8333 7.67969 21.0815 7.67969 20.1639C7.67969 19.2353 6.9436 18.4835 6.04513 18.4835ZM18.2231 18.4835C17.3139 18.4835 16.5778 19.2353 16.5778 20.1639C16.5778 21.0815 17.3139 21.8333 18.2231 21.8333C19.1216 21.8333 19.8577 21.0815 19.8577 20.1639C19.8577 19.2353 19.1216 18.4835 18.2231 18.4835Z" fill="#0DBA8A" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="wrap-content">
                <div class="tittle-img">
                    <img src="../../uploads/<?= $row["image"] ?>" alt="" alt="" height="100%" width="100%">
                </div>
                <h5>All Items</h5>
                <div class="list-product">
                <?php 
                    $sql = "select * from menu where merchant_id = '$food_id'"; 
                    $in_query = mysqli_query($conn, $sql); 
                    while($row = mysqli_fetch_assoc($in_query)):?>

                        <div class="detail-product">
                            <div class="product-img">
                                <img src="../../uploads/<?=$row["image"]?>" alt="" widht="100%" width="100%">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalQty<?= $row["menu_id"] ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M15 10.8334H10.8333V15C10.8333 15.4584 10.4583 15.8334 9.99996 15.8334C9.54163 15.8334 9.16663 15.4584 9.16663 15V10.8334H4.99996C4.54163 10.8334 4.16663 10.4584 4.16663 10C4.16663 9.54169 4.54163 9.16669 4.99996 9.16669H9.16663V5.00002C9.16663 4.54169 9.54163 4.16669 9.99996 4.16669C10.4583 4.16669 10.8333 4.54169 10.8333 5.00002V9.16669H15C15.4583 9.16669 15.8333 9.54169 15.8333 10C15.8333 10.4584 15.4583 10.8334 15 10.8334Z" fill="white" />
                                    </svg>
                                </button>
                            </div>
                            <h6>Rp<?= number_format($row["price"], 0, ',', '.') ?></h6>
                            <p><?= $row["description"] ?></p>
                        </div>

                        <div class="modal fade" id="modalQty<?= $row["menu_id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="foodMart.php?food=<?=$food_id ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="" value="">
                                        <div class="modal-body">
                                            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                                            <input type="number" class="form-control" name="quantity">
                                            <input type="hidden" name="merchant_id" value="<?= $food_id?>">
                                            <input type="hidden" name="menu_id" value="<?= $row["menu_id"] ?>">
                                            <input type="hidden" name="menu_name" value="<?= $row["name"] ?>">
                                                <input type="hidden" name="menu_price" value="<?= $row["price"] ?>">
                                            <input type="hidden" name="menu_img" value="<?= $row["image"] ?>">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="addToCart">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>