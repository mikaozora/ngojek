<?php
include('../../Database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    $sql = "select m.name, SUM(i.price*oid.quantity) AS total, GROUP_CONCAT(i.name SEPARATOR ',') AS product from order_item oi 
    join merchant m on oi.merchant_id = m.merchant_id 
    JOIN order_item_detail oid ON oi.order_itemid = oid.order_itemid
    JOIN item i ON oid.item_id = i.item_id
    where oi.customer_id = 'CS001' 
    GROUP BY oi.customer_id
    limit 0, 7;";
    $res = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($res)) :
    ?>
        <div class="wrap-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <g clip-path="url(#clip0_178_1257)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.952 4.37599C14.1906 4.08972 14.4866 3.85665 14.8208 3.69181C15.155 3.52696 15.5201 3.43401 15.8925 3.41893C16.2648 3.40386 16.6362 3.467 16.9827 3.60428C17.3292 3.74157 17.643 3.94995 17.904 4.21599L18.048 4.37599L23.2907 10.6667H27.2707C27.5505 10.6661 27.8272 10.7246 28.0829 10.8384C28.3385 10.9522 28.5672 11.1187 28.754 11.327C28.9408 11.5353 29.0815 11.7808 29.1668 12.0473C29.2522 12.3137 29.2803 12.5952 29.2493 12.8733L29.1267 13.8947L28.9933 14.8813L28.884 15.62L28.7573 16.4133L28.6133 17.2467L28.4507 18.1107L28.2693 18.992C28.1733 19.436 28.0707 19.8813 27.96 20.3227C27.6648 21.4938 27.2943 22.6446 26.8507 23.768L26.556 24.488L26.2707 25.1387L26.0013 25.7173L25.876 25.976L25.544 26.6293C25.1173 27.4427 24.312 27.9227 23.46 27.992L23.2467 28H8.73999C8.27383 28.0036 7.81544 27.8805 7.41385 27.6438C7.01226 27.407 6.68255 27.0656 6.45999 26.656L6.15066 26.056L5.91066 25.5627C5.86792 25.4718 5.8257 25.3807 5.78399 25.2893L5.51732 24.6907C4.90858 23.2766 4.41455 21.8159 4.03999 20.3227C3.96764 20.0327 3.8983 19.742 3.83199 19.4507L3.64266 18.5867L3.47332 17.7413L3.32399 16.924L3.19066 16.1413L3.07466 15.4027L2.97599 14.7187L2.85599 13.808L2.76799 13.0667C2.7603 12.9987 2.75275 12.9307 2.74532 12.8627C2.71737 12.6006 2.7419 12.3357 2.81746 12.0833C2.89303 11.8308 3.01812 11.596 3.18544 11.3924C3.35275 11.1888 3.55894 11.0207 3.79197 10.8977C4.025 10.7746 4.28019 10.6993 4.54266 10.676L4.72399 10.6667H8.70932L13.952 4.37599ZM13.2813 16.9627C13.1911 16.6481 12.9884 16.3776 12.7117 16.2029C12.435 16.0281 12.1037 15.9612 11.7809 16.0149C11.458 16.0686 11.1662 16.2391 10.961 16.494C10.7558 16.749 10.6515 17.0705 10.668 17.3973L10.6853 17.552L11.352 21.552L11.3853 21.704C11.4755 22.0186 11.6783 22.289 11.955 22.4638C12.2316 22.6386 12.5629 22.7055 12.8858 22.6518C13.2086 22.5981 13.5004 22.4275 13.7056 22.1726C13.9109 21.9177 14.0151 21.5962 13.9987 21.2693L13.9813 21.1147L13.3147 17.1147L13.2813 16.9627ZM20.2187 16.0187C19.8964 15.9649 19.5656 16.0313 19.2891 16.2054C19.0126 16.3794 18.8096 16.6489 18.7187 16.9627L18.6853 17.1147L18.0187 21.1147C17.963 21.4501 18.0376 21.7942 18.2273 22.0764C18.4169 22.3587 18.7072 22.5578 19.0388 22.6331C19.3704 22.7084 19.7183 22.6541 20.0112 22.4814C20.3041 22.3087 20.52 22.0306 20.6147 21.704L20.648 21.552L21.3147 17.552C21.3725 17.2033 21.2895 16.846 21.084 16.5585C20.8785 16.271 20.5673 16.0768 20.2187 16.0187ZM16 6.08265L12.18 10.6667H19.82L16 6.08265Z" fill="#0DBA8A" />
                </g>
                <defs>
                    <clipPath id="clip0_178_1257">
                        <rect width="32" height="32" fill="white" />
                    </clipPath>
                </defs>
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
                <p>Rp<?= number_format($row["total"],0,',','.') ?></p>
            </div>
        </div>
    <?php endwhile; ?>
</body>

</html>