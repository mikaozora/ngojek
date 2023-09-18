<?php
    session_start();
    $customer_id = $_SESSION["customer_id"];
    include('../../Database/connection.php');
?>

<!DOCTYPE html>
<html lang="en">

<body>
    <?php
    $sql = "select * from order_driver where customer_id = '$customer_id' limit 0, 7";
    $res = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($res)):
    ?>
    <div class="wrap-content">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
            <path d="M20.4 20.0001C20.4 20.4245 20.2314 20.8315 19.9314 21.1315C19.6313 21.4316 19.2244 21.6001 18.8 21.6001C18.3757 21.6001 17.9687 21.4316 17.6686 21.1315C17.3686 20.8315 17.2 20.4245 17.2 20.0001C17.2 19.5758 17.3686 19.1688 17.6686 18.8688C17.9687 18.5687 18.3757 18.4001 18.8 18.4001C19.2244 18.4001 19.6313 18.5687 19.9314 18.8688C20.2314 19.1688 20.4 19.5758 20.4 20.0001ZM14.8 20.0001C14.8 20.4245 14.6314 20.8315 14.3314 21.1315C14.0313 21.4316 13.6244 21.6001 13.2 21.6001C12.7757 21.6001 12.3687 21.4316 12.0686 21.1315C11.7686 20.8315 11.6 20.4245 11.6 20.0001C11.6 19.5758 11.7686 19.1688 12.0686 18.8688C12.3687 18.5687 12.7757 18.4001 13.2 18.4001C13.6244 18.4001 14.0313 18.5687 14.3314 18.8688C14.6314 19.1688 14.8 19.5758 14.8 20.0001Z" fill="#0DBA8A" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 12.8001C17.4852 12.8001 18.9096 12.2101 19.9598 11.1599C21.01 10.1097 21.6 8.68531 21.6 7.2001C21.6 5.71489 21.01 4.2905 19.9598 3.2403C18.9096 2.1901 17.4852 1.6001 16 1.6001C14.5148 1.6001 13.0904 2.1901 12.0402 3.2403C10.99 4.2905 10.4 5.71489 10.4 7.2001C10.4 8.68531 10.99 10.1097 12.0402 11.1599C13.0904 12.2101 14.5148 12.8001 16 12.8001ZM16 4.8001C16.6365 4.8001 17.247 5.05295 17.6971 5.50304C18.1471 5.95313 18.4 6.56358 18.4 7.2001C18.4 7.83662 18.1471 8.44707 17.6971 8.89715C17.247 9.34724 16.6365 9.6001 16 9.6001C15.3635 9.6001 14.753 9.34724 14.3029 8.89715C13.8528 8.44707 13.6 7.83662 13.6 7.2001C13.6 6.56358 13.8528 5.95313 14.3029 5.50304C14.753 5.05295 15.3635 4.8001 16 4.8001Z" fill="#0DBA8A" />
            <path d="M16 22.4001C16.8487 22.4001 17.6626 22.7373 18.2627 23.3374C18.8628 23.9375 19.2 24.7515 19.2 25.6001V28.0001C19.2 28.8488 18.8628 29.6628 18.2627 30.2629C17.6626 30.863 16.8487 31.2001 16 31.2001C15.1513 31.2001 14.3374 30.863 13.7372 30.2629C13.1371 29.6628 12.8 28.8488 12.8 28.0001V25.6001C12.8 24.7515 13.1371 23.9375 13.7372 23.3374C14.3374 22.7373 15.1513 22.4001 16 22.4001Z" fill="#0DBA8A" />
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 17.6001C24 15.4784 23.1571 13.4435 21.6569 11.9432C20.1566 10.443 18.1217 9.6001 16 9.6001C13.8783 9.6001 11.8434 10.443 10.3431 11.9432C8.84285 13.4435 8 15.4784 8 17.6001V21.6001C8 22.661 8.42143 23.6784 9.17157 24.4285C9.92172 25.1787 10.9391 25.6001 12 25.6001H20C21.0609 25.6001 22.0783 25.1787 22.8284 24.4285C23.5786 23.6784 24 22.661 24 21.6001V17.6001ZM11.2 17.6001C11.2 16.3271 11.7057 15.1062 12.6059 14.206C13.5061 13.3058 14.727 12.8001 16 12.8001C17.273 12.8001 18.4939 13.3058 19.3941 14.206C20.2943 15.1062 20.8 16.3271 20.8 17.6001V21.6001C20.8 21.8123 20.7157 22.0158 20.5657 22.1658C20.4157 22.3158 20.2122 22.4001 20 22.4001H12C11.7878 22.4001 11.5843 22.3158 11.4343 22.1658C11.2843 22.0158 11.2 21.8123 11.2 21.6001V17.6001Z" fill="#0DBA8A" />
            <path d="M24.8 7.2C24.3756 7.2 23.9687 7.03143 23.6686 6.73137C23.3686 6.43131 23.2 6.02435 23.2 5.6C23.2 5.17565 23.3686 4.76869 23.6686 4.46863C23.9687 4.16857 24.3756 4 24.8 4H28C28.4243 4 28.8313 4.16857 29.1314 4.46863C29.4314 4.76869 29.6 5.17565 29.6 5.6C29.6 6.02435 29.4314 6.43131 29.1314 6.73137C28.8313 7.03143 28.4243 7.2 28 7.2H24.8ZM3.99999 7.2C3.57565 7.2 3.16868 7.03143 2.86862 6.73137C2.56856 6.43131 2.39999 6.02435 2.39999 5.6C2.39999 5.17565 2.56856 4.76869 2.86862 4.46863C3.16868 4.16857 3.57565 4 3.99999 4H7.19999C7.62434 4 8.03131 4.16857 8.33136 4.46863C8.63142 4.76869 8.79999 5.17565 8.79999 5.6C8.79999 6.02435 8.63142 6.43131 8.33136 6.73137C8.03131 7.03143 7.62434 7.2 7.19999 7.2H3.99999Z" fill="#0DBA8A" />
            <path d="M5.45599 6.47375L6.21759 4.14575L13.456 5.52655L12.6928 7.85615L5.45599 6.47375ZM18.544 5.52655L19.3072 7.85615L26.544 6.47375L25.7824 4.14575L18.544 5.52655Z" fill="#0DBA8A" />
        </svg>
        <div class="mid">
            <div class="title">
                <p><?= $row["destination"] ?></p>
            </div>
            <div class="desc">
                <p>Trip Completed</p>
            </div>
        </div>
        <div class="right">
            <p>Rp<?= number_format($row["total"],0,',','.') ?></p>
        </div>
    </div>
    <?php endwhile; ?>
</body>

</html>