<?php
require 'connection.php';

session_start();
$conn = new mysqli($host, $hostUserName, $hostPassword, $DBname);
$conn->set_charset("utf8mb4");
if ($conn->connect_errno) {
    die("connection failed !!! : " . $conn->connect_error);

} else {
    if (isset($_POST['publish'])) {
        $username = $_COOKIE['username'];
        $subject = $_POST['subject'];
        $title = $_POST['title'];
        $text = $_POST['text'];
        $pic = $_FILES['picture']['tmp_name'];
        $picture = addslashes((file_get_contents($pic)));
        $query = "INSERT INTO article (subject,title,content,picture,doctor_un) VALUES ('$subject','$title','$text','$picture','$username');";
        
        if ($conn->query($query)===true) {
            header('location:publish.php');
        }
        else
        {
            echo "something is wrong";
        }
    } else {
        echo "something is wrong!!!";
    }
}




?>