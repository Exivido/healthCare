<?php
ini_set('display_errors', '0');
require "connection.php";

$conn=mysqli_connect($host,$hostUserName,$hostPassword,$DBname);
if(mysqli_errno($conn))
{
    die("failed to connect to Data Base !  :::   ".mysqli_connect_error());
}
$conn->set_charset("utf8mb4");

if(isset($_POST['login']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query = "SELECT * FROM doctors WHERE username='" . $username . "' AND password='" . $password . "';";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        setcookie("username",$username,30*24*60*60*1000);
        setcookie("usertype","doctor",30*24*60*60*1000);
        header("location:index.php");
        mysqli_close($conn);

    }
    else
    {
        unset($_POST['login']);
        echo("<script >alert('Wrong username or password!!!');</script>");
        

    }
    // ------------------------------   register -------------------------------//
}else if(isset($_POST['register']))
{
    $name=$_POST['name'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $image=$_FILES['picture']['tmp_name'];
    $imageData=addslashes((file_get_contents($image)));
    $query = "SELECT * FROM doctors WHERE username='" . $username . "';";
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        echo "<script>alert('نام کاربری قبلا انتخاب شده !');</script>";

    }
    else
    {
        $sql = "INSERT INTO doctors (name,username,password,picture) VALUES ('$name','$username','$password','$imageData')";
        if (mysqli_query($conn,$sql)) {
            setcookie("username",$username,30*24*60*60*1000);
            setcookie("usertype","doctor",30*24*60*60*1000);

            header("location:index.php");
            mysqli_close($conn);

        } else {
            echo "Error: " . $sql . "<br>" . mysqli_connect_errno();
        }
    }
    

} 




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="assets/js/login.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/doc-login.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<html>

<body>
    <div class="flip-card">
        <div class="inner-card">
            <div class="login">
                <p class="header">ورود</p>
                <form action="doc-login.php" method="post">
                    <div class="un-container">
                        <div class="username">نام کاربری</div>
                        <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="text" name="username"
                            placeholder="نام کاربری خود را وارد کنید " title="Only English characters and numbers are allowed.">
                    </div>
                    <div class="pw-container">
                        <div class="username">رمز عبور</div>
                        <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input type="password" name="password"
                            placeholder="رمز عبور را اینجا تایپ کنید" title="Only English characters and numbers are allowed."><i onclick="showPassLogin(this)" class="fa fa-eye"></i>
                    </div>
                    <a class="forgot-pass" href="#" onclick="forgotpass()">رمز خود را فراموش کرده اید؟</a>
                    <input type="submit" value="ورود" id="login" name="login">
                </form>
                <p class="creat-text">
                    هنوز حساب ندارید؟
                </p>
                <a href="login.php" class="creat-account" > آیا کاربر هستید؟</a>

                <a href="#" class="creat-account" onclick="flip()"> ثبت نام</a>

            </div>
            <div class="sign-up">
                <form action="doc-login.php" method="post" enctype="multipart/form-data" id="sign-up-form">
                    <div class="un-container">
                        <div class="username">نام</div>
                        <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="text" name="name" 
                            placeholder="نام خود را وارد کنید">
                    </div>
                    <div class="un-container">
                        <div class="username">نام کاربری</div>
                        <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="text" pattern="[A-Za-z0-9]+" title="Only English characters and numbers are allowed." name="username"
                            placeholder="نام کاربری را وارد کنید">
                    </div>
                    <div class="pw-container">
                        <div class="username">رمز عبور</div>
                        <i class="fa fa-lock" aria-hidden="true" id="lock"></i><input class="password" pattern="[A-Za-z0-9]+" title="Only English characters and numbers are allowed." type="password"
                            name="password" placeholder="کلمه عبور را وارد کنید"><i onclick="showPassLogin(this)"
                            class="fa fa-eye"></i>
                    </div>
                    <div class="un-container">
                        <div class="username">تصویر پروفایل</div>
                        <i class="fa fa-user" aria-hidden="true" id="user"></i><input type="file" name="picture"
                        accept="image/*" >
                    </div>

                    <input type="submit" value="ثبت نام" id="sign-up" name="register" onclick="isNotEmpty(this,event)">

                </form>
                <p class="creat-text">
                    
                 قبلا ثبت نام کرده اید؟
                </p>
                <a href="#" class="creat-account" onclick="flipBack()"> ورود</a>
                
            </div>
        </div>
    </div>

</body>

</html>