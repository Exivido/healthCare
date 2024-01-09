<?php
$username = $_COOKIE['username'];
$usertype = $_COOKIE['usertype'];
require 'connection.php';

$conn = new mysqli($host, $hostUserName, $hostPassword, $DBname);
$conn->set_charset("utf8mb4");

if ($conn->connect_errno) {
    die("connection failed:  " . $conn->connect_error);
} else {
    if ($usertype == 'user') {
        $query = "SELECT * FROM users WHERE username='" . $username . "'; ";

    } else {
        $query = "SELECT * FROM doctors WHERE username='" . $username . "'; ";

    }
    $result = $conn->query($query);
    $myProfile = $result->fetch_array();
    $myName = $myProfile[3];
    $mypic = base64_encode($myProfile[4]);
    $myUserName = $myProfile[1];

    if($usertype=="user")
    {
        $query="SELECT DISTINCT *
        FROM chat
        WHERE user_un = '$username'
        GROUP BY doctor_un";   
    }
    else
    {
        $query="SELECT DISTINCT *
        FROM chat
        WHERE doctor_un = '$username'
        GROUP BY user_un"; 
    }

    $result=$conn->query($query);
    
    if($result->num_rows==0)
    {
        $nochat=true;
    }
    else
    {
        $nochat=false;
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/chats.css">
    <title>chats</title>
</head>

<body>
    <header class="my-detail">
        <div class="profile">
            <div class="picture">
                <img <?php echo 'src="data:image/jpeg;base64,' . $mypic . '"'; ?> alt="">
            </div>
            <div class="name">
                <?php echo $myName; ?>
            </div>
        </div>
        <div class="title">
            گفتگو های شما
        </div>
        <a href="index.php" class="back-btn">
            بازگشت
        </a>
    </header>
    <main class="chats">
        
        <?php
        while($row=$result->fetch_array())
        {
            if($usertype=="user")
            {
                $chatUserName=$row[2];
                $chatQuery="SELECT * FROM doctors WHERE username='$chatUserName';";
                $chatResult=$conn->query($chatQuery);
                $chatArray=$chatResult->fetch_array();
                $chatName=$chatArray[3];
                $chatProfile=base64_encode($chatArray[4]);
                
            }
            else
            {
                $chatUserName=$row[1];
                $chatQuery="SELECT * FROM users WHERE username='$chatUserName';";
                $chatResult=$conn->query($chatQuery);
                $chatArray=$chatResult->fetch_array();
                $chatName=$chatArray[3];
                $chatProfile=base64_encode($chatArray[4]);
            }
            echo
            '<a class="chat">
                <div class="chat-profile">
                    <div class="chat-pic">
                        <img src="data:image/jpeg;base64,'.$chatProfile.'">
                    </div>
                    <div class="chat-name">
    
                        '.$chatName.'
                    </div>
                </div>
                <form action="chatroom.php" method="post" >
                    <button name="openchat" value="'.$chatUserName.'" class="chat-btn">مشاهده گفتگوها</button>
                </form>
            </a>';
        }

                
        

        if($nochat==true)
        {
            echo "<h3 class='nochat'> شما هیچ گفتگویی ندارید !</h3>";
        }
        
        
        ?>
    </main>
</body>

</html>