<?php
    session_start();
    if(!isset($_SESSION["session_username"])){
        header("location: ../../index.php");
        exit();
    }
    include("../../../Database/connection.php");

    $start = 0;
    $rowPerPage = 10;
    $logged_id = $_COOKIE["cookie_merchant_id"];
    $logged_type = $_COOKIE["cookie_merchant_type"];

    if ($logged_type == 'Restaurant'){
        $rows = mysqli_query($conn, "select * from menu where merchant_id = '$logged_id'");
    } else {
        $rows = mysqli_query($conn, "select * from item where merchant_id = '$logged_id'");
    }

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Product</title>
</head>
<body>
    <div class="kontainer">
        <?php include("sidebar.php"); ?>
        <div class="container-content">
            <div class="header-content">
                <h2>Products</h2>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modalAdd">Add Product</button>
            </div>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col" class="w-25">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    if($logged_type == 'Restaurant'){
                        $sql = "select * from menu where merchant_id = '$logged_id' limit $start, $rowPerPage";
                    } else {
                        $sql = "select * from item where merchant_id = '$logged_id' limit $start, $rowPerPage";
                    }
                    
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) :
                        $no++;
                    ?>
                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["category"] ?></td>
                            <td><?= $row["stock"] ?></td>
                            <td><?= $row["price"] ?></td>
                            <td><?= $row["description"] ?></td>
                            <th>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 19 19" fill="none">
                                        <path d="M17.71 4.0425C17.37 4.3825 17.04 4.7125 17.03 5.0425C17 5.3625 17.34 5.6925 17.66 6.0025C18.14 6.5025 18.61 6.9525 18.59 7.4425C18.57 7.9325 18.06 8.4425 17.55 8.9425L13.42 13.0825L12 11.6625L16.25 7.4225L15.29 6.4625L13.87 7.8725L10.12 4.1225L13.96 0.2925C14.35 -0.0975 15 -0.0975 15.37 0.2925L17.71 2.6325C18.1 3.0025 18.1 3.6525 17.71 4.0425ZM0 14.2525L9.56 4.6825L13.31 8.4325L3.75 18.0025H0V14.2525Z" fill="#0DBA8A" />
                                    </svg>
                                </button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $no ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="18" viewBox="0 0 14 18" fill="none">
                                        <path d="M1 16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H11C11.5304 18 12.0391 17.7893 12.4142 17.4142C12.7893 17.0391 13 16.5304 13 16V4H1V16ZM3 6H11V16H3V6ZM10.5 1L9.5 0H4.5L3.5 1H0V3H14V1H10.5Z" fill="#0DBA8A" />
                                    </svg>
                                </button>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalDetail<?= $no ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                        <path d="M9 15H11V9H9V15ZM10 7C10.2833 7 10.521 6.904 10.713 6.712C10.905 6.52 11.0007 6.28267 11 6C11 5.71667 10.904 5.479 10.712 5.287C10.52 5.095 10.2827 4.99933 10 5C9.71667 5 9.479 5.096 9.287 5.288C9.095 5.48 8.99933 5.71733 9 6C9 6.28333 9.096 6.521 9.288 6.713C9.48 6.905 9.71733 7.00067 10 7ZM10 20C8.61667 20 7.31667 19.7373 6.1 19.212C4.88333 18.6867 3.825 17.9743 2.925 17.075C2.025 16.175 1.31267 15.1167 0.788 13.9C0.263333 12.6833 0.000666667 11.3833 0 10C0 8.61667 0.262667 7.31667 0.788 6.1C1.31333 4.88333 2.02567 3.825 2.925 2.925C3.825 2.025 4.88333 1.31267 6.1 0.788C7.31667 0.263333 8.61667 0.000666667 10 0C11.3833 0 12.6833 0.262667 13.9 0.788C15.1167 1.31333 16.175 2.02567 17.075 2.925C17.975 3.825 18.6877 4.88333 19.213 6.1C19.7383 7.31667 20.0007 8.61667 20 10C20 11.3833 19.7373 12.6833 19.212 13.9C18.6867 15.1167 17.9743 16.175 17.075 17.075C16.175 17.975 15.1167 18.6877 13.9 19.213C12.6833 19.7383 11.3833 20.0007 10 20ZM10 18C12.2333 18 14.125 17.225 15.675 15.675C17.225 14.125 18 12.2333 18 10C18 7.76667 17.225 5.875 15.675 4.325C14.125 2.775 12.2333 2 10 2C7.76667 2 5.875 2.775 4.325 4.325C2.775 5.875 2 7.76667 2 10C2 12.2333 2.775 14.125 4.325 15.675C5.875 17.225 7.76667 18 10 18Z" fill="#0DBA8A" />
                                    </svg>
                                </button>
                            </th>
                        </tr>

                        <!-- Modal edit -->
                        <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../seller/action/product.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="menu_id" value="<?= $row["menu_id"] ?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Menu ID</label>
                                                <input type="text" class="form-control" name="menu_id" value="<?= $row["menu_id"] ?>" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Menu Name</label>
                                                <input type="text" class="form-control" name="name" value="<?= $row["name"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Category</label>
                                                <input type="text" class="form-control" name="category" value="<?= $row["category"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Stock</label>
                                                <input type="text" class="form-control" name="stock" value="<?= $row["stock"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Price</label>
                                                <input type="text" class="form-control" name="price" value="<?= $row["price"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                                <input type="text" class="form-control" name="description" value="<?= $row["description"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">image</label>
                                                <input type="file" class="form-control" name="image">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal delete -->
                        <div class="modal fade" id="modalDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../seller/action/product.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="menu_id" value="<?= $row["menu_id"] ?>">
                                        <div class="modal-body">
                                            <p>Are you sure want to delete <?= $row["name"] ?>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary" name="delete">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal detail -->
                        <div class="modal fade" id="modalDetail<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog wrap-detail">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Detail Product</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../seller/action/product.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="menu_id" value="<?= $row["menu_id"] ?>">
                                        <div class="modal-body detail" id="#body-detail">
                                            <div class="modal-left">
                                                <div class="mb-3" style="font-weight: bold;">
                                                    <label for=""><?= $row["name"] ?></label>
                                                </div>
                                                <img src="../../../uploads/<?=$row["image"]?>" alt="img" width="100%" height="100%" class="merchant-img">
                                            </div>
                                            <div class="modal-right">
                                                <div class="right" style="display: flex; flex-direction: column; justify-content: space-between;">
                                                    <div class="mb-3">
                                                        <label for="">Description</label>
                                                        <p><?= $row["description"] ?></p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="">Rp.<?= $row["price"] ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    
        </div>
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
if (!isset($_GET['page']) && $numRows > $rowPerPage) {
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
} elseif (!isset($_GET['page']) && $numRows <= $rowPerPage) {
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
} elseif ($_GET['page'] >= $pages) {
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
?>
</div>

<div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../seller/action/product.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">ID</label>
                            <input type="text" class="form-control" name="menu_id">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="menu_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Category</label>
                            <input type="text" class="form-control" name="category">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Stock</label>
                            <input type="text" class="form-control" name="stock">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Price</label>
                            <input type="text" class="form-control" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>