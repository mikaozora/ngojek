<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="register.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Sign Up</title>
</head>

<body>
    <div class="kontainer">
        <div class="device">
            <form class="form" action="action/register.php" method="post">
                <h2>Sign Up</h2>
                <div class="form-input">
                    <label for="username">Customer ID</label>
                    <input type="text" name="customer_id">
                </div>
                <div class="form-input">
                    <label for="username">Name</label>
                    <input type="text" name="name">
                </div>
                <div class="form-input">
                    <label for="username">Gender</label>
                    <select name="gender" id="gender" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-input">
                    <label for="username">Age</label>
                    <input type="number" name="age">
                </div>
                <div class="form-input">
                    <label for="password">Username</label>
                    <input type="text" name="username">
                </div>
                <div class="form-input">
                    <label for="username">Password</label>
                    <input type="password" name="password">
                </div>
                <div class="form-input">
                    <label for="password">Address</label>
                    <input type="text" name="address">
                </div>
                <div class="form-input">
                    <label for="username">Phone Number</label>
                    <input type="text" name="phone_number">
                </div>
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>