<?php 
session_start();

include("/xampp/htdocs/ngojek/Database/connection.php");

if(isset($_COOKIE["cookie_username"])){
    $cookieUsername = $_COOKIE["cookie_username"];
    $cookiePassword = $_COOKIE["cookie_password"];

    $sql = "select * from customers where username = '$cookieUsername'";
    $res = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($res);
    if ($cookiePassword == $row["password"]) {
        $_SESSION["session_username"] = $cookieUsername;
        $_SESSION["session_password"] = $cookiePassword;
    }
}

if (isset($_SESSION["session_username"]) && isset($_SESSION["session_password"])) {
    header("location: ../customer/pages/home.php");
    exit();
}

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    // echo password_hash($password, PASSWORD_DEFAULT);

    if (empty($username) || empty($password)) {
        echo "<script>
            window.location.href = '../index.php';
            alert('input username/ and password !');
            </script>";
    }else {
        $sql = "select * from customers where username = '$username'";
        $res = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($res);
        if (isset($row)) {
            if (password_verify($password,$row["password"])) {
                $_SESSION["session_username"] = $row["username"];
                $_SESSION["session_password"] = $row["password"];
                $_SESSION["customer_id"] = $row["customer_id"];

                $cookieName = "cookie_username";
                $cookieValue = $row["username"];
                $cookieTime = time() + (60 *60 *24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

                $cookieName = "cookie_password";
                $cookieValue = $row["password"];
                $cookieTime = time() + (60*60*24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

                $cookieName = "cookie_name";
                $cookieValue = $row["name"];
                $cookieTime = time() + (60*60*24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

                $cust_subs = $row["subscription_id"];

                $sql_subs = "select name from subscription where subscription_id = '$cust_subs'";
                $res_subs = mysqli_query($conn,$sql_subs);
                $row_subs = mysqli_fetch_assoc($res_subs);

                $cookieName = "cookie_subscribe";
                $cookieValue = $row_subs["name"];
                $cookieTime = time() + (60*60*24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

                $cookieName = "cookie_gender";
                $cookieValue = $row["gender"];
                $cookieTime = time() + (60*60*24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

                $cookieName = "cookie_age";
                $cookieValue = $row["gender"];
                $cookieTime = time() + (60*60*24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

                $cookieName = "cookie_address";
                $cookieValue = $row["address"];
                $cookieTime = time() + (60*60*24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

                $cookieName = "cookie_phone";
                $cookieValue = $row["phone_number"];
                $cookieTime = time() + (60*60*24);
                setcookie($cookieName,$cookieValue,$cookieTime,"/");

<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
                $sessionCustId = $row["customer_id"];
                $_SESSION["session_customerid"] = $sessionCustId;

                echo "success";
                
                header("location: ../pages/home.php");
            }else{
                echo "<script>
            window.location.href = '../index.php';
            alert('wrong username/password');
            </script>";
            }
        }else {
            echo "<script>
            window.location.href = '../index.php';
            alert('wrong username/password');
            </script>";
        }
    }


}
