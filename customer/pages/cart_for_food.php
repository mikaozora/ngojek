<?php

session_start();
include("../../Database/connection.php");
$total = 0;

if (isset($_POST["delete"])) {
    foreach ($_SESSION["cart_for_food"] as $key => $value) {
        if ($value["menu_id"] == $_POST["menu_id"]) {
            unset($_SESSION["cart_for_food"][$key]);
        }
    }
}

$ongkir = 0;

$customer_id = $_SESSION["customer_id"];

$sql_cust = "select s.subscription_id, s.description from customers c join subscription s on c.subscription_id = s.subscription_id where customer_id = '$customer_id'";
$res_cust = mysqli_query($conn, $sql_cust);
$row_cust = mysqli_fetch_assoc($res_cust);
$current_subsId = "";
$potongan = "";
if (!empty($row_cust["subscription_id"]) && !empty($row_cust["description"])) {
    $current_subsId = $row_cust["subscription_id"];
    $potongan = $row_cust["description"];
}

$ongkir = rand(20000, 40000);

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
            <div class="top-bot">
                <div class="wrap-top">
                    <div class="wrap-header">
                        <div class="left">
                            <a href="food.php"><img src="../assets/arrow-left.svg" alt=""></a>
                            <h3>Cart</h3>
                        </div>
                    </div>
                    <div class="wrap-content">
                        <div class="list-cart">
                            <?php
                            if (!empty($_SESSION["cart_for_food"])) {
                                foreach ($_SESSION["cart_for_food"] as $key => $value) :
                                    $total += ($value["quantity"] * $value["price"]);
                            ?>
                                    <form action="cart_for_food.php" method="post">
                                        <div class="cart-detail">
                                            <div class="left">
                                                <img src="../../uploads/<?= $value["image"] ?>" alt="" width="100%" height="100%">
                                                <div class="desc-product">
                                                    <h5 class="price">Rp<?= number_format($value["price"], 0, ',', '.') ?></h5>
                                                    <h6 class="title"><?= $value["name"] ?></h6>
                                                </div>
                                            </div>
                                            <div class="right">
                                                <div class="qty-field">
                                                    <p><?= $value["quantity"] ?></p>
                                                </div>
                                                <input type="hidden" name="menu_id" value="<?= $value["menu_id"] ?>">
                                                <button type="submit" class="btn-delete" name="delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 18 20" fill="none">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.2871 3.24297C17.6761 3.24297 18 3.56596 18 3.97696V4.35696C18 4.75795 17.6761 5.09095 17.2871 5.09095H0.713853C0.32386 5.09095 0 4.75795 0 4.35696V3.97696C0 3.56596 0.32386 3.24297 0.713853 3.24297H3.62957C4.22185 3.24297 4.7373 2.82197 4.87054 2.22798L5.02323 1.54598C5.26054 0.616994 6.0415 0 6.93527 0H11.0647C11.9488 0 12.7385 0.616994 12.967 1.49699L13.1304 2.22698C13.2627 2.82197 13.7781 3.24297 14.3714 3.24297H17.2871ZM15.8058 17.134C16.1102 14.2971 16.6432 7.55712 16.6432 7.48913C16.6626 7.28313 16.5955 7.08813 16.4623 6.93113C16.3193 6.78413 16.1384 6.69713 15.9391 6.69713H2.06852C1.86818 6.69713 1.67756 6.78413 1.54529 6.93113C1.41108 7.08813 1.34494 7.28313 1.35467 7.48913C1.35646 7.50162 1.37558 7.73903 1.40755 8.13594C1.54958 9.89917 1.94517 14.8102 2.20079 17.134C2.38168 18.846 3.50498 19.922 5.13206 19.961C6.38763 19.99 7.68112 20 9.00379 20C10.2496 20 11.5149 19.99 12.8094 19.961C14.4929 19.932 15.6152 18.875 15.8058 17.134Z" fill="#E85454" />
                                                    </svg>
                                                </button>

                                            </div>
                                        </div>
                                    </form>
                            <?php endforeach;
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="wrap-bot">
                    <div class="sub-total">
                        <h5>Sub Total</h5>
                        <p>Rp<?= number_format($total, 0, ',', '.') ?></p>
                    </div>
                    <div class="ongkir">
                        <h5>Shipment Fee</h5>
                        <div class="promo">
                            <?php
                            $formatOngkir = "Rp" . number_format($ongkir, 0, ',', '.');
                            $formatPromo = "";
                            if ($current_subsId) {
                                echo "<s>$formatOngkir</s>";
                                $ongkir = $ongkir - $potongan;
                                $formatPromo = "Rp" . number_format($ongkir, 0, ',', '.');
                                echo "<p>$formatPromo</p>";
                            } else {
                                echo "<p>$formatOngkir</p>";
                            }
                            $total = $total + $ongkir + 2000;
                            ?>
                        </div>

                    </div>
                    <div class="fee">
                        <h5>Application Fee</h5>
                        <p>Rp<?= number_format(2000, 0, ',', '.') ?></p>
                    </div>
                    <div class="total-price">
                        <h3>Total Price</h3>
                        <h3 class="tp">Rp<?= number_format($total, 0, ',', '.') ?></h3>
                    </div>
                    <form action="gotdriverfood.php" method="post">
                        <input type="hidden" name="ongkir" value="<?= $ongkir ?>">
                        <button class="btn-checkout" type="submit" name="checkout">Check out</button>
                    </form>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>