
<?php
require 'connection.php';
session_start();
$conn=new mysqli($host,$hostUserName,$hostPassword,$DBname);
$conn->set_charset("utf8mb4");

if($conn->connect_errno)
{

    die("connection failed:".$conn->error);

}

if(isset($_POST['message-sent'])=="send message")
{
    $myUsername=$_COOKIE['username'];
    $hisUserName=$_SESSION['hisName'];
    $sender=$_COOKIE['usertype'];
    $text=$_POST['message'];
    if($sender=="doctor")
    {
        $query = "INSERT INTO chat (doctor_un, user_un, text, sender) VALUES ('$myUsername', '$hisUserName', '$text', '$sender')";

    }
    else
    {
        $query = "INSERT INTO chat (doctor_un, user_un, text, sender) VALUES ('$hisUserName', '$myUsername', '$text', '$sender')";
    }
    $result=$conn->query($query);
    if($result)
    {
        header('location:chatroom.php');
    }
    else
    {
        echo"insert failed!";
    }

}   



?>