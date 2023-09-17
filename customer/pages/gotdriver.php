<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/gotdriver.css">
    <title>We've Got Your Driver</title>
</head>
<body>
    
    <div class="kontainer">
        <div class="device">    
            <div class="header">
                <span>We've Got Your Driver</span>
                <img src="../assets/helmet.png" alt="">
            </div>
            <div class="input-kontainer">
                <form action="../action/sent.php" method="post">
                    <div class="data">
                        <label for="">Name</label>
                        <input type="text" disabled>
                    </div>
                    <div class="data">
                        <label for="">Number Plate</label>
                        <input type="text" disabled>
                    </div>
                    <div class="data">
                        <label for="">Vehicle</label>
                        <input type="text" disabled>
                    </div>
                    <div class="data">
                        <label for="">Gender</label>
                        <input type="text" disabled>
                    </div>
                    <div class="btn-kontainer">
                        <button type="submit" class="finish-btn" name="submit">Finish Transaction</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>