<?php
include('../../Database/connection.php');
session_start();
$logged_customer = $_SESSION["session_customerid"];
?>
<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    $sql = "SELECT m.name, SUM(mn.price*omd.quantity) as total, GROUP_CONCAT(mn.name SEPARATOR ',') AS product, om.order_menuid FROM order_menu om
    JOIN order_menu_detail omd ON om.order_menuid = omd.order_menuid
    JOIN menu mn ON omd.menu_id = mn.menu_id
    JOIN merchant m ON mn.merchant_id = m.merchant_id
    WHERE om.customer_id = '$logged_customer'
    GROUP BY om.order_menuid
    LIMIT 0,7";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) :
    ?>
        <div>
            <a href="transactionDetail_mart&food.php?id=<?=$row["order_menuid"]?>&type=food" class="wrap-content" style="color: black; text-decoration:none; margin:10px 0;">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                    <path d="M8 3C8 2.73478 7.89464 2.48043 7.70711 2.29289C7.51957 2.10536 7.26522 2 7 2C6.73478 2 6.48043 2.10536 6.29289 2.29289C6.10536 2.48043 6 2.73478 6 3V9C5.99976 10.1527 6.39778 11.27 7.12669 12.1629C7.8556 13.0558 8.87064 13.6695 10 13.9V29C10 29.2652 10.1054 29.5196 10.2929 29.7071C10.4804 29.8946 10.7348 30 11 30C11.2652 30 11.5196 29.8946 11.7071 29.7071C11.8946 29.5196 12 29.2652 12 29V13.9C13.1294 13.6695 14.1444 13.0558 14.8733 12.1629C15.6022 11.27 16.0002 10.1527 16 9V3C16 2.73478 15.8946 2.48043 15.7071 2.29289C15.5196 2.10536 15.2652 2 15 2C14.7348 2 14.4804 2.10536 14.2929 2.29289C14.1054 2.48043 14 2.73478 14 3V9C14.0003 9.62065 13.8081 10.2261 13.4499 10.733C13.0917 11.2398 12.5852 11.6231 12 11.83V3C12 2.73478 11.8946 2.48043 11.7071 2.29289C11.5196 2.10536 11.2652 2 11 2C10.7348 2 10.4804 2.10536 10.2929 2.29289C10.1054 2.48043 10 2.73478 10 3V11.83C9.41484 11.6231 8.90826 11.2398 8.55006 10.733C8.19186 10.2261 7.99967 9.62065 8 9V3ZM22 29V16H19C18.7348 16 18.4804 15.8946 18.2929 15.7071C18.1054 15.5196 18 15.2652 18 15V7C18 5.674 18.652 4.434 19.542 3.542C20.434 2.652 21.674 2 23 2C23.2652 2 23.5196 2.10536 23.7071 2.29289C23.8946 2.48043 24 2.73478 24 3V29C24 29.2652 23.8946 29.5196 23.7071 29.7071C23.5196 29.8946 23.2652 30 23 30C22.7348 30 22.4804 29.8946 22.2929 29.7071C22.1054 29.5196 22 29.2652 22 29Z" fill="#0DBA8A" />
                </svg>
                <div class="mid">
                    <div class="title">
                        <p><?= $row["name"] ?></p>
                    </div>
                    <div class="desc">
                        <p><?= $row["product"] ?></p>
                    </div>
                </div>
                <div class="right">
                    <p>Rp<?= number_format($row["total"], 0, ',', '.') ?></p>
                </div>
            </a>
        </div>
    <?php endwhile; ?>
</body>

</html>