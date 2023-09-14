<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location: ../../index.php");
    exit();
}
include("../../../Database/connection.php");

$start = 0;
$rowPerPage = 10;

$rows = mysqli_query($conn, "select * from merchant");
$numRows = mysqli_num_rows($rows);

$pages = ceil($numRows / $rowPerPage);

if (isset($_GET['page'])) {
    $page = (int)$_GET['page'] - 1;
    $start = $page * $rowPerPage;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/customer.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Customer</title>
</head>

<body>
    <div class="kontainer">
        <?php include("sidebar.php"); ?>
        <div class="container-content">
            <div class="header-content">
                <h2>Customer</h2>
            </div>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col" class="w-25">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "SELECT c.customer_id, c.subscription_id, c.name, c.gender, c.age, c.username, c.password, c.address, c.phone_number, s.name AS subs_name, s.description, s.price, s.period FROM customers c JOIN subscription s ON c.subscription_id = s.subscription_id limit $start, $rowPerPage";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) :
                        $no++;
                    ?>
                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["address"] ?></td>
                            <td><?= $row["phone_number"] ?></td>
                            <td><?= $row["gender"] ?></td>
                            <td><?= $row["age"] ?></td>
                            <td><?= $row["subs_name"] ?></td>
                        </tr>
        </div>
    <?php endwhile; ?>
    </tbody>
    </table>

    <div class="wrap-bottom">

        <?php

        if (isset($_GET['page']) && $_GET['page'] > 1) {
        ?>
            <a href="?page=<?= $_GET['page'] - 1 ?>">
                <button class="arrow-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_187_949)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.94011 13.0601C7.65921 12.7788 7.50143 12.3976 7.50143 12.0001C7.50143 11.6026 7.65921 11.2213 7.94011 10.9401L13.5961 5.28209C13.8775 5.00083 14.2591 4.84287 14.657 4.84296C15.0548 4.84305 15.4363 5.00119 15.7176 5.28259C15.9989 5.56398 16.1568 5.94558 16.1567 6.34344C16.1566 6.7413 15.9985 7.12283 15.7171 7.40409L11.1211 12.0001L15.7171 16.5961C15.9905 16.8789 16.1419 17.2577 16.1386 17.651C16.1354 18.0443 15.9778 18.4206 15.6998 18.6988C15.4219 18.9771 15.0457 19.135 14.6524 19.1386C14.2591 19.1422 13.8801 18.9912 13.5971 18.7181L7.93911 13.0611L7.94011 13.0601Z" fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_187_949">
                                <rect width="24" height="24" fill="white" transform="translate(24 24) rotate(-180)" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </a>
        <?php
        } else {
        ?>
            <a href="">
                <button class="arrow-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_187_949)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.94011 13.0601C7.65921 12.7788 7.50143 12.3976 7.50143 12.0001C7.50143 11.6026 7.65921 11.2213 7.94011 10.9401L13.5961 5.28209C13.8775 5.00083 14.2591 4.84287 14.657 4.84296C15.0548 4.84305 15.4363 5.00119 15.7176 5.28259C15.9989 5.56398 16.1568 5.94558 16.1567 6.34344C16.1566 6.7413 15.9985 7.12283 15.7171 7.40409L11.1211 12.0001L15.7171 16.5961C15.9905 16.8789 16.1419 17.2577 16.1386 17.651C16.1354 18.0443 15.9778 18.4206 15.6998 18.6988C15.4219 18.9771 15.0457 19.135 14.6524 19.1386C14.2591 19.1422 13.8801 18.9912 13.5971 18.7181L7.93911 13.0611L7.94011 13.0601Z" fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_187_949">
                                <rect width="24" height="24" fill="white" transform="translate(24 24) rotate(-180)" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </a>
        <?php
        }
        ?>

        <?php
        if (!isset($_GET['page'])) {
        ?>
            <a href="?page=2">
                <button class="arrow-btn right-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <g clip-path="url(#clip0_187_945)">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0599 10.9399C16.3408 11.2212 16.4986 11.6024 16.4986 11.9999C16.4986 12.3974 16.3408 12.7787 16.0599 13.0599L10.4039 18.7179C10.1225 18.9992 9.74089 19.1571 9.34304 19.157C8.94518 19.1569 8.56365 18.9988 8.28239 18.7174C8.00113 18.436 7.84317 18.0544 7.84326 17.6566C7.84336 17.2587 8.00149 16.8772 8.28289 16.5959L12.8789 11.9999L8.28289 7.40391C8.00952 7.12114 7.85814 6.7423 7.86137 6.34901C7.8646 5.95571 8.02218 5.57941 8.30016 5.30117C8.57815 5.02292 8.95429 4.86499 9.34759 4.86139C9.74088 4.85779 10.1199 5.0088 10.4029 5.28191L16.0609 10.9389L16.0599 10.9399Z" fill="white" />
                        </g>
                        <defs>
                            <clipPath id="clip0_187_945">
                                <rect width="24" height="24" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </button>
            </a>
            <?php
        } else {
            if ($_GET['page'] >= $pages) {
            ?>
                <a href="">
                    <button class="arrow-btn right-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_187_945)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0599 10.9399C16.3408 11.2212 16.4986 11.6024 16.4986 11.9999C16.4986 12.3974 16.3408 12.7787 16.0599 13.0599L10.4039 18.7179C10.1225 18.9992 9.74089 19.1571 9.34304 19.157C8.94518 19.1569 8.56365 18.9988 8.28239 18.7174C8.00113 18.436 7.84317 18.0544 7.84326 17.6566C7.84336 17.2587 8.00149 16.8772 8.28289 16.5959L12.8789 11.9999L8.28289 7.40391C8.00952 7.12114 7.85814 6.7423 7.86137 6.34901C7.8646 5.95571 8.02218 5.57941 8.30016 5.30117C8.57815 5.02292 8.95429 4.86499 9.34759 4.86139C9.74088 4.85779 10.1199 5.0088 10.4029 5.28191L16.0609 10.9389L16.0599 10.9399Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_187_945">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </a>
            <?php
            } else {
            ?>
                <a href="?page=<?= $_GET['page'] + 1; ?>">
                    <button class="arrow-btn right-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_187_945)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M16.0599 10.9399C16.3408 11.2212 16.4986 11.6024 16.4986 11.9999C16.4986 12.3974 16.3408 12.7787 16.0599 13.0599L10.4039 18.7179C10.1225 18.9992 9.74089 19.1571 9.34304 19.157C8.94518 19.1569 8.56365 18.9988 8.28239 18.7174C8.00113 18.436 7.84317 18.0544 7.84326 17.6566C7.84336 17.2587 8.00149 16.8772 8.28289 16.5959L12.8789 11.9999L8.28289 7.40391C8.00952 7.12114 7.85814 6.7423 7.86137 6.34901C7.8646 5.95571 8.02218 5.57941 8.30016 5.30117C8.57815 5.02292 8.95429 4.86499 9.34759 4.86139C9.74088 4.85779 10.1199 5.0088 10.4029 5.28191L16.0609 10.9389L16.0599 10.9399Z" fill="white" />
                            </g>
                            <defs>
                                <clipPath id="clip0_187_945">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>
                    </button>
                </a>
        <?php
            }
        }
        ?>
    </div>

    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>