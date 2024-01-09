<?php

require 'connection.php';
$myUsername = $_COOKIE['username'];
$conn = new mysqli($host, $hostUserName, $hostPassword, $DBname);
$conn->set_charset("utf8mb4");
if ($conn->connect_errno) {
    die("connection failed " . $conn->connect_error);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/articles.css">
    <title>Articles</title>
</head>

<body>
    <div class="main-container">
        <?php
        $query = "SELECT * FROM article WHERE doctor_un='$myUsername';";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array()) {
                $subject = $row[1];
                $image = base64_encode($row[4]);
                $id = $row[0];
                $text = $row[3];
                echo '
                <div class="article">
                    <div class="article-image">
                        <img src="data:image/jpeg;base64,' . $image . '">
                    </div>
                    <h4 class="article-name">
                        ' . $subject . '
                    </h4>
                    <form action="article.php" method="post">
                        <button class="article-button" name="article" value="' . $id . '">
                            مشاهده مقاله
                        </button>
                    </form>
                </div>';
            }



        }

        ?>


    </div>

</body>

</html>