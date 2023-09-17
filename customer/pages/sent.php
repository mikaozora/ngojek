<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style/sent.css">
    <title>Sent</title>
</head>
<body>
    
    <div class="kontainer">
        <div class="device">
            <div class="header">
                <img src="../assets/close.png" alt="">
                <span>Sent</span>
            </div>
            <div class="input-kontainer">
                <form action="../action/sent.php" method="post">
                    <div class="data">
                        <label for="">Sender</label>
                        <input type="text" name="sender">
                    </div>
                    <div class="data">
                        <label for="">Receiver</label>
                        <input type="text" name="receiver">
                    </div>
                    <div class="data">
                        <label for="">Pickup Point</label>
                        <input type="text" name="pickuppoint">
                    </div>
                    <div class="data">
                        <label for="">Destination</label>
                        <input type="text" name="destination">
                    </div>
                    <div class="data">
                        <label for="">Item Description</label>
                        <textarea name="" id="" cols="30" rows="3" name="description"></textarea>
                    </div>
                    <div class="data">
                        <label for="">Fees</label>
                        <input type="text" name="fees">
                    </div>
                    <button type="submit" class="submit-btn" name="paybutton">Pay</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>