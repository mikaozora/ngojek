<?php 
include('../customer/action/login.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Sign in</title>
</head>

<body>
    <div class="kontainer">
        <div class="device">
            <div class="logo">
                <h1>Ngojek.</h1>    
            </div>
            <form class="form" action="../customer/action/login.php" method="post">
                <h2>Sign In</h2>
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="password" name="password">
                </div>
                <button type="submit" name="login" value="login">Sign In</button>
                <h3>Dont have account? <a href="register.php"><span>Sign Up</span></a></h3>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>