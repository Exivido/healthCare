<?php

require 'connection.php';

$conn = new mysqli($host, $hostUserName, $hostPassword, $DBname);
$conn->set_charset("utf8mb4");
if ($conn->connect_errno) {
    die("connection failed " . $conn->connect_error);

} else {
    $id = $_POST['article'];
    $query = "SELECT * FROM article WHERE id=$id ;";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_array();
        $subject = $row[1];
        $title = $row[2];
        $text = $row[3];
        $picture = base64_encode($row[4]);
        $doc_un = $row[5];
        $query = "SELECT name FROM doctors WHERE username='$doc_un';";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $doc_name = $row['name'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/article.css">
    <title>Article</title>
</head>

<body>
    <main class="main-container">

        <div class="banner-image">
            <img src=<?php echo '"data:image/jpeg;base64,'.$picture.'"' ?> alt="">
        </div>
        <div class="subject">
            <h2><?php  echo $subject;  ?></h2>
            <h3><?php  echo $doc_name;  ?></h3>
        </div>
        <div class="content">

            <div class="title">
            <?php  echo $title;  ?>
            </div>
            <p class="text">
            <?php  echo $text;  ?>
            </p>

        </div>
    </main>
</body>

</html>