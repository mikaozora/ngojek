<?php 
include("../../Database/connection.php");

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $age = $_POST["age"];
    $address = $_POST["address"];
    $phone_number = $_POST["phone_number"];

    $res = "";
    try{
        $sql = "update customers set name = '$name' , gender = '$gender' , age = '$age' , address = '$address' , phone_number = '$phone_number'";
        $res = mysqli_query($conn, $sql);
    }catch(mysqli_sql_exception $e){
        print_r($e);
    }
    if($res){
        $_COOKIE["cookie_name"] = $name;
        $_COOKIE["cookie_gender"] = $gender;
        $_COOKIE["cookie_age"] = $age;
        $_COOKIE["cookie_address"] = $address;
        $_COOKIE["cookie_phone"] = $phone;
        echo "<script>
            window.location.href = '../index.php';
            alert('wrong username/password');
            </script>";
        header('location: ../index.php');
    }
    
}
