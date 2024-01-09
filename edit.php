<?php

require 'connection.php';

$conn=mysqli_connect($host,$hostUserName,$hostPassword,$DBname);
if(mysqli_errno($conn))
{
    die("failed to connect to Data Base !  :::   ".mysqli_connect_error());
}
$conn->set_charset("utf8mb4");

if(isset($_COOKIE['username']))
{
    $username=$_COOKIE['username'];
}
    // ------------------------------   register -------------------------------//

if(isset($_POST['Change']))
{
    if($_COOKIE['usertype']=="user")
    {
        $name=$_POST['name'];
        $password=$_POST['password'];
        $pic=$_FILES['picture']['tmp_name'];
        $picData=addslashes((file_get_contents($pic)));
        $query ="UPDATE users
        SET name = '".$name."', password = '".$password."', picture = '".$picData."'
        WHERE username = '".$username."';
        ";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            header('location:myprofile.php');
        }
    } else
    {
        $name=$_POST['name'];
        $password=$_POST['password'];
        $pic=$_FILES['picture']['tmp_name'];
        $picData=addslashes((file_get_contents($pic)));
        $query ="UPDATE doctors
        SET name = '".$name."', password = '".$password."', picture = '".$picData."'
        WHERE username = '".$username."';
        ";
        $result=mysqli_query($conn,$query);
        if($result)
        {
            header('location:myprofile.php');
        }
    }
    
}





?>
<!DOCTYPE html>
<html lang="en">

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/repass.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
</head>

<body>
    <div class="login">
        <p class="header">ویرایش پروفایل</p>
        <form action="edit.php" method="post" enctype="multipart/form-data">
            <div class="un-container">
                <div class="username">نام</div>
                <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="text" name="name"
                    placeholder="نام جدید را وارد کنید">
            </div>
            <div class="pw-container">
                <div class="username">رمز عبور</div>
                <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input type="password" name="password"
                    placeholder="رمز عبور جدید را تایپ کنید ">
            </div>
            <div class="un-container">
                <div class="username">تصویر پروفایل جدید(64kb)</div>
                <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="file" name="picture"
                    >
            </div>

            <input type="submit" value="انجام" id="login" name="Change">
            <a class="creat-text" href="login.php">ورود</a>
        </form>

    </div>
</body>

</html>