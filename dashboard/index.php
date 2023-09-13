<?php
include('../dashboard/action/login.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <form class="form" action="action/login.php" method="post">
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
            </form>
        </div>
    </div>
</body>

</html>