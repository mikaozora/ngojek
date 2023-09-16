<?php
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location: ../../index.php");
    exit();
}
include("../../../Database/connection.php");

$start = 0;
$rowPerPage = 10;

$rows = mysqli_query($conn, "select * from driver");
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
    <link rel="stylesheet" href="style/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Driver</title>
</head>

<body>
    <div class="kontainer">
        <?php include("sidebar.php"); ?>
        <div class="container-content">
            <div class="header-content">
                <h2>Driver</h2>
                <button type="button" data-bs-toggle="modal" data-bs-target="#modalAdd">Add Driver</button>
            </div>
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Driver Name</th>
                        <th scope="col">Number Plate</th>
                        <th scope="col">Vehicle</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql = "select * from driver limit $start, $rowPerPage";
                    $res = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($res)) :
                        $no++;
                    ?>
                        <tr>
                            <th><?= ++$start; ?></th>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["number_plate"] ?></td>
                            <td><?= $row["vehicle"] ?></td>
                            <td><?= $row["phone_number"] ?></td>
                            <td><?= $row["gender"] ?></td>
                            <td><?= $row["age"] ?></td>
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
                            </th>
                        </tr>

                        <!-- Modal edit -->
                        <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Driver</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../../action/driver.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="driver_id" value="<?= $row["driver_id"] ?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">driver id</label>
                                                <input type="text" class="form-control" name="driver_id" value="<?= $row["driver_id"] ?>" disabled>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">driver name</label>
                                                <input type="text" class="form-control" name="driver_name" value="<?= $row["name"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">age</label>
                                                <input type="number" class="form-control" name="age" value="<?= $row["age"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">phone number</label>
                                                <input type="text" class="form-control" name="phone" value="<?= $row["phone_number"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">gender</label>
                                                <select name="gender" id="gender" class="form-control" value="<?= $row["gender"] ?>">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">number_plate</label>
                                                <input type="text" class="form-control" name="number_plate" value="<?= $row["number_plate"] ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">vehicle</label>
                                                <input type="text" class="form-control" name="vehicle" value="<?= $row["vehicle"] ?>">
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
                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Driver</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="../../action/driver.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="driver_id" value="<?= $row["driver_id"] ?>">
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
        }elseif(!isset($_GET['page']) && $numRows <= $rowPerPage){
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
        }
        elseif ($_GET['page'] >= $pages) {
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

    <!-- Modal Add -->
    <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../action/driver.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">driver id</label>
                            <input type="text" class="form-control" name="driver_id">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">driver name</label>
                            <input type="text" class="form-control" name="driver_name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">age</label>
                            <input type="number" class="form-control" name="age">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">phone number</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">gender</label>
                            <select name="gender" id="merchant_type" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">number_plate</label>
                            <input type="text" class="form-control" name="number_plate">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">vehicle</label>
                            <input type="text" class="form-control" name="vehicle">
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
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>