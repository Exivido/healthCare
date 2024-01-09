<?php
error_reporting(0);
require('connection.php');
$conn=mysqli_connect($host,$hostUserName,$hostPassword,$DBname);
if(mysqli_errno($conn))
{
    die("failed to connect to Data Base !  :::   ".mysqli_connect_error());
}
$conn->set_charset("utf8mb4");

if(isset($_COOKIE['username']))
{
    $username=$_COOKIE['username'];
    if($_COOKIE['usertype']=="user")
    {
        $query="SELECT * FROM users WHERE username='$username'";
    }
    else
    {
        $query="SELECT * FROM doctors WHERE username='$username'";
    }
    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_array($result);
        $name=$row[3];
        $pic=$row[4];
        $imageData=base64_encode($pic);
    }
}





?>
<header>
            <div class="header">
                <div class="logo-container">
                    <span class="logo">
                        <img src="assets/images/web/logo.png" alt="">
                    </span>
                    <span class="title">
                        <span class="health">Health</span><span class="care">Care</span>  
                    </span>
                </div>
                <div class="search-box">
                    <input type="text" name="search" placeholder="جستجو">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                
                
                <?php
                    if(isset($_COOKIE['username']))
                    {
                        
                        echo("
                        <div class='user-profile'>
                        <div class='profile-pic'>

                        <img src='data:image/jpeg;base64,".$imageData."'>
                        
                        </div>
                        <div class='profile-name'>
                        <p>
                            ".$name."
                        </p>
                        <div onclick='logOut();'>
                            خروج
                        </div>
                        </div>
                        </div>
                        ");
                    }
                    else
                    {
                        echo("
                        <div class='user-detail'>
                        <a class='login' href='login.php'>
                            <i class='fa-solid fa-user-plus'></i><span>ثبت نام</span>
                        </a>
                        <a class='sign-up' href='login.php'>
                            <i class='fa-solid fa-user-check'></i><span> ورود</span>
                        </a>
                        </div>"
                    );
                    }
                    
                ?>
                
            </div>
            <nav class="navbar">
                <a href="index.php" class="nav-item">
                    <div class="nav-item-title selected">
                        صفحه اصلی
                    </div>
                    
                </a><?php
                    if(isset($_COOKIE['username'])){
                        echo "<a href='myprofile.php' class='nav-item'>
                    
                        <div class='nav-item-title '>
                            پروفایل
                        </div>
                        
                    </a>
                    <a href='chats.php' class='nav-item'>
                    <div class='nav-item-title'>
                        پیام ها
                    </div>
                   
                </a>";
                    }
                    if($_COOKIE['usertype']=='doctor')
                    {
                        echo "<a href='publish.php' class='nav-item'>
                    
                        <div class='nav-item-title '>
                            انتشار
                        </div>
                        
                    </a>
                    <a href='my Articles.php' class='nav-item'>
                    
                        <div class='nav-item-title '>
                            مقاله های من
                        </div>
                        
                    </a>
                    ";
                    }
                    else
                    {
                        echo "<a href='visit.php' class='nav-item'>
                    
                        <div class='nav-item-title '>
                           دریافت ویزیت
                        </div>
                        
                    </a>";
                    }
                    ?>
                
                
                <a href="articles.php" class="nav-item">
                    <div class="nav-item-title">
                        مقالات
                    </div>
                   
                </a>
                <a href="about us.php" class="nav-item">
                    <div class="nav-item-title">
                        درباره ما
                    </div>
                    
                </a>
                <a href="contact us.php" class="nav-item">
                    <div class="nav-item-title">
                        تماس با ما
                    </div>
                   
                </a>
               
            </nav>
        </header>