<?php

$doctorname=$_POST['doctor'];



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>visitor</title>
</head>
<style>
    *{
        margin:0;
        padding:0;

    }
    body
    {
        max-width :1920px;
        margin:auto;
        direction:rtl;

    }
    @font-face {
        font-family: vazir;
        src: url("assets/fonts/vazir/Vazir-Light.ttf");
    }
    .box
    {
        width:800px;
        height:400px;
        background-color:#0cf;
        border-radius:30px;
        margin:auto;
        margin-top:100px;
        display:flex;
        justify-content:center;
        align-items:center;
    }
    h3
    {
        font-family:vazir;
        font-size:30px;
        color:white;
        text-align:center;
    }
    a
    {
        text-decoration:none;
        color:white;
        outline:none;
        border:none;
        transition:0.5s;
        text-align:center;
        width:140px;
        height:50px;
        line-height:50px;
        font-family:vazir;
        font-size:20px;
        background-color:#0cf;
        display:block;
        border-radius:10px;
        margin:auto;
        margin-top:20px;
    }
</style>

<body>
    <div class="box">
        <h3>
            <?php
                echo "نوبت شما برای $doctorname  رزرو شد !";
            ?>
        </h3>
    </div>
    <a href="index.php">
        بازگشت
    </a>
</body>
</html>