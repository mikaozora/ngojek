<?php
session_start();
include("/xampp/htdocs/ngojek/Database/connection.php");

if (isset($_COOKIE["cookie_username"])) {
    if ($_COOKIE["cookie_username"] == "admin") {
        $cookieUsername = $_COOKIE["cookie_username"];
        $cookiePassword = $_COOKIE["cookie_password"];

        $_SESSION["session_username"] = $cookieUsername;
        $_SESSION["session_password"] = $cookiePassword;
    } else {
        $cookieUsername = $_COOKIE["cookie_username"];
        $cookiePassword = $_COOKIE["cookie_password"];

        $sql = "select * from merchant where username = '$cookieUsername'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        if ($cookiePassword == $row["password"]) {
            $_SESSION["session_username"] = $cookieUsername;
            $_SESSION["session_password"] = $cookiePassword;
        }
    }
}

if (isset($_SESSION["session_username"]) && isset($_SESSION["session_password"])) {
    if ($_SESSION["session_username"] == "admin" && $_SESSION["session_password"] == "admin") {
        header("location: ../dashboard/pages/admin/home.php");
    } else {
        header("location: ../dashboard/pages/seller/home.php");
    }
    exit();
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if (empty($username) || empty($password)) {
        echo "input username/password";
    } elseif ($username == "admin" && $password == "admin") {
        $_SESSION["session_username"] = "admin";
        $_SESSION["session_password"] = "admin";

        $cookieName = "cookie_username";
        $cookieValue = "admin";
        $cookieTime = time() + (60 * 60 * 24);
        setcookie($cookieName, $cookieValue, $cookieTime, "/");

        $cookieName = "cookie_password";
        $cookieValue = "admin";
        $cookieTime = time() + (60 * 60 * 24);
        setcookie($cookieName, $cookieValue, $cookieTime, "/");
        header("location: ../pages/admin/home.php");
    } else {
        $sql = "select * from merchant where username = '$username'";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        if (isset($row)) {
            if (password_verify($password, $row["password"])) {
                $_SESSION["session_username"] = $row["username"];
                $_SESSION["session_password"] = $row["password"];

                $cookieName = "cookie_username";
                $cookieValue = $row["username"];
                $cookieTime = time() + (60 * 60 * 24);
                setcookie($cookieName, $cookieValue, $cookieTime, "/");

                $cookieName = "cookie_password";
                $cookieValue = $row["password"];
                $cookieTime = time() + (60 * 60 * 24);
                setcookie($cookieName, $cookieValue, $cookieTime, "/");


                $cookieName = "cookie_merchant_id";
                $cookieValue = $row["merchant_id"];
                $cookieTime = time() + (60 * 60 * 24);
                setcookie($cookieName, $cookieValue, $cookieTime, "/");

                $cookieName = "cookie_merchant_type";
                $cookieValue = $row["merchant_type"];
                $cookieTime = time() + (60 * 60 * 24);
                setcookie($cookieName, $cookieValue, $cookieTime, "/");

                header("location: ../pages/seller/home.php");
            }
        } else {
            echo "<script>
            window.location.href = '../index.php';
            alert('wrong username/password');
            </script>";
        }
    }
}


?>