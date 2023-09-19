<?php
session_start();
$logged_customer = $_SESSION["session_customerid"];
include('../../Database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<body>
<?php
    $sql = "SELECT og.destination, og.total, g.name from order_goods og
    JOIN goods g ON og.goods_id = g.goods_id where og.customer_id = '$logged_customer' limit 0, 7";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) :
    ?>
    <div class="wrap-content">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6667 4C10.3131 4.00008 9.97399 4.1406 9.724 4.39067L4.39067 9.724C4.15508 9.95877 4.01574 10.2731 4 10.6053M4 10.6773V24C4 25.0609 4.42143 26.0783 5.17157 26.8284C5.92172 27.5786 6.93913 28 8 28H24C25.0609 28 26.0783 27.5786 26.8284 26.8284C27.5786 26.0783 28 25.0609 28 24V10.6773L27.9987 10.6053C27.9833 10.2733 27.8444 9.95898 27.6093 9.724L22.276 4.39067C22.026 4.1406 21.6869 4.00008 21.3333 4H10.6667M23.448 9.33333L20.7813 6.66667H11.2187L8.552 9.33333H23.448ZM9.33333 16C9.33333 15.6464 9.47381 15.3072 9.72386 15.0572C9.97391 14.8071 10.313 14.6667 10.6667 14.6667H16C16.3536 14.6667 16.6928 14.8071 16.9428 15.0572C17.1929 15.3072 17.3333 15.6464 17.3333 16C17.3333 16.3536 17.1929 16.6928 16.9428 16.9428C16.6928 17.1929 16.3536 17.3333 16 17.3333H10.6667C10.313 17.3333 9.97391 17.1929 9.72386 16.9428C9.47381 16.6928 9.33333 16.3536 9.33333 16Z" fill="#0DBA8A" />
        </svg>
        <div class="mid">
            <div class="title">
                <p><?= $row["destination"] ?></p>
            </div>
            <div class="desc">
                <p><?= $row["name"] ?></p>
            </div>
        </div>
        <div class="right">
            <p>Rp<?= number_format($row["total"],0,',','.') ?></p>
        </div>
    </div>
    <?php endwhile; ?>
</body>

</html>