<?php
$username = $_COOKIE['username'];
require 'connection.php';
$conn = mysqli_connect($host, $hostUserName, $hostPassword, $DBname);
if (mysqli_errno($conn)) {
    die("failed to connect to Data Base !  :::   " . mysqli_connect_error());
}
$conn->set_charset("utf8mb4");

if($_COOKIE['usertype']=="user")
{
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row[3];
        $password = $row[2];
        $pic = $row[4];
        $imageData = base64_encode($pic);
    }
    
}
else
{
    $query = "SELECT * FROM doctors WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row[3];
        $password = $row[2];
        $pic = $row[4];
        $imageData = base64_encode($pic);
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/my profile.css">
    <title>my profile</title>
</head>

<body>
    <div class="container">
        <h3>
            پروفایل من
        </h3>
        <div class="information">
            <div class="picture">
                <img src=<?php  echo("'data:image/jpeg;base64,".$imageData."'");  ?> alt="">
            </div>
            <div class="detail">
                <div class="column">
                    <p class="row">نام کاربری </p>
                    <p class="row">کلمه عبور </p>
                    <p class="row">نام حساب </p>
                </div>

                <div class="column">
                    <p class="row"><?php echo $username;  ?></p>
                    <p class="row"><?php echo $password;  ?></p>
                    <p class="row"><?php echo $name;  ?></p>
                </div>

            </div>
            <div class="buttons">
                <a href="edit.php" class="edit-btn">
                    ویرایش حساب
                </a>
                <a href="index.php" class="edit-btn">
                    بازگشت
                </a>
            </div>

        </div>
    </div>
</body>

</html>