<?php

require 'connection.php';
$conn=new mysqli($host,$hostUserName,$hostPassword,$DBname);
if($conn->connect_errno)
{
    die("Donnection Failded!".$conn->connect_error);
}
else
{
    $query="SELECT * FROM doctors";
    $result=$conn->query($query);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/visit.css">
    <title>Visit</title>
</head>
<body>
    <h3 class="header">
        نوبت دهی
    </h3>
    <div class="container">
        <?php

            while($row=$result->fetch_assoc())
            {
                $pic=base64_encode($row['picture']);
                echo'
                <div class="doctor">
                <div class="doc-pic">
                    <img src="data:image/jpeg;base64,' . $pic . '" alt="">
                </div>
                <div class="doc-name">
                    '.$row['name'].'
                </div>
                <form action="visitor.php" method="post">
                    <button name="doctor" value="'.$row['name'].'" class="btn">
                        دریافت نوبت
                    </button>
                </form>
                </div>';
            }

        ?>
        
        
    </div>
</body>
</html>