<?php
session_start();
require 'connection.php';
$conn = new mysqli($host, $hostUserName, $hostPassword, $DBname);
$conn->set_charset("utf8mb4");
$username = $_COOKIE['username'];
$userType = $_COOKIE['usertype'];
if(isset($_POST['openchat']))
{
    
}
if(isset($_POST['openchat']))
{
    $_SESSION['doctorUserName'] = $_POST['openchat'];
    $doctorUserName=$_SESSION['doctorUserName'];
}
else
{
    $doctorUserName=$_SESSION['doctorUserName'];
}

if ($conn->connect_errno) {
    die('Connection failed !    error    :' . $conn->connect_error);
} else {
    if ($userType == 'user') {
        $query = "SELECT * FROM doctors WHERE username='" . $doctorUserName . "' ;";
    } else {
        $query = "SELECT * FROM users WHERE username='" . $doctorUserName . "' ;";

    }

    if ($result = $conn->query($query)) {
        $doctorDetail = $result->fetch_array();
        $doctorName = $doctorDetail[3];
        $doctorPic = base64_encode($doctorDetail[4]);
        $_SESSION['hisName']=$doctorUserName;
    }

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/chatroom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Chat room</title>
</head>

<body dir="rtl">



    <header class="profile-header">
        <div class="profile-name">
            <?php echo $doctorName;?>
        </div>
        <div class="profile-picture">
            <img <?php echo 'src="data:image/jpeg;base64,' . $doctorPic . '"' ?> class="picture" alt="">
        </div>
        <a class="back-btn" href="chats.php">
            بازگشت <i class="fa-solid fa-angles-left"></i>
        </a>
    </header>



    <main class="chat-box">


        <?php
        if ($userType == 'user') {
            $query = "SELECT * FROM chat WHERE user_un ='$username' AND doctor_un='$doctorUserName' ORDER BY time ASC;";
        } else {
            $query = "SELECT * FROM chat WHERE doctor_un ='$username' AND user_un='$doctorUserName' ORDER BY time ASC;";
        }

        $result = $conn->query($query);

        while ($row = $result->fetch_array()) {
            $chatText = $row[4];
            $chatSender = $row[3];
            if ($chatSender == $userType) {
                $color = "me";
            } else {
                $color = "he";
            }
            echo "
            <div class='message $color '>
            <div class='message-content $color'>
                <p class='text'>
                    $chatText
                </p>
            </div>
            </div>";
        }



        ?>


    </main>
    <footer>
        <form action="sendMessage.php" method="post"> 
            <div class="text-box">
                <input type="submit" class="send-btn" name = "message-sent"value="send message" onclick="sendMessage(this)">
                <input type="text" name="message" class="text" placeholder="متن پیام خود را اینجا وارد کنید ......" id="textBox" >
            </div>
        </form>
    </footer>

</body>

</html>