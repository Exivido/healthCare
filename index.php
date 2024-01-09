<!DOCTYPE html>
<html lang="fa-IR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/index.css">
    <script src="assets/js/index.js" defer></script>
    <script src="assets/js/doctors.js" defer></script>
    <title>Health Care</title>

</head>

<body dir="rtl">
    <div class="main-container">

        <!-- --------------------- main content ---------------------- -->
        <!-- --------------------- banner ---------------------- -->

        <?php
        require "header.php";
        ?>
        <main class="main">
            <div class="banner">
                <video class="banner-video" src="assets/videos/health care.mp4" autoplay muted loop>

                </video>
                <div class="banner-text">
                    <h2>
                        <span class="green">سلامت</span> و <span class="blue">تن درستی</span> را با ما اغاز کنید !
                    </h2>
                    <p>
                        وبسایت سلامت و بهداشت <span class="green">Health</span> <span class="blue">Care</span>

                    </p>

                </div>
            </div>
            <h2 class="category-header blue">
                دسته بندی ها
            </h2>
            <!-- ------------------------ categories ----------------- -->
            <div class="categories">
                <a class="category" onclick="articles(8)">
                    <div class="cat-image">
                        <img src="assets/images/web/vegtable diet.jpg" alt="">
                    </div>
                    <div class="cat-text">
                        رژیم های گیاهی
                    </div>
                </a>
                <a class="category" onclick="articles(9)">
                    <div class="cat-image">
                        <img src="assets/images/web/fitness.jpg" alt="">
                    </div>
                    <div class="cat-text">
                        تناسب اندام
                    </div>
                </a>
                <a class="category" onclick="articles(10)">
                    <div class="cat-image">
                        <img src="assets/images/web/healthy aging.jpg" alt="">
                    </div>
                    <div class="cat-text">
                        سلامت در پیری
                    </div>
                </a>
                <a class="category" onclick="articles(7)">
                    <div class="cat-image">
                        <img src="assets/images/web/mental health.jpg" alt="">
                    </div>
                    <div class="cat-text">
                        سلامت روحی
                    </div>
                </a>
            </div>
            <!-- ------------------------ recomend ----------------- -->
            <h2 class="category-header blue">
                موارد پیشنهادی
            </h2>
            <div class="suggestions">
                <div class="sug-item" onclick="articles(4)">
                    <div class="sug-image">
                        <img src="assets/images/pages/Virus outbreak.jpg" alt="">
                    </div>
                    <div class="sug-detail">
                        <h2 class="sug-title green">جلو گیری از گسترش ویروس کرونا</h2>
                        <p class="sug-text">
                            راه ها و روش های جلو گیری از شیوع ویروس خطرناک کرونا برای حفظ سلامت خود و عزیزانتان
                        </p>
                        <a class="sug-btn"> ادامه مطلب</a>

                    </div>
                </div>
                <div class="sug-item" onclick="articles(5)">
                    <div class="sug-image">
                        <img src="assets/images/web/mouth wash 1.jpg" alt="">
                    </div>
                    <div class="sug-detail">
                        <h2 class="sug-title green">اهمیت استفاده از دهانشو برای بهداشت دهان</h2>
                        <p class="sug-text">
                            اهمیت استفاده از دهانشو برای سلامت دندان و بهداشت دهان. با استفاده از دهانشو میتوان از عفونت
                            دهان و دندان پیشگیری کرد و بوی بد دهان را از بین برد.
                        </p>
                        <a class="sug-btn"> ادامه مطلب</a>

                    </div>
                </div>
                <div class="sug-item" onclick="articles(6)">
                    <div class="sug-image">
                        <img src="assets/images/pages/pills 2.jpg" alt="">
                    </div>
                    <div class="sug-detail">
                        <h2 class="sug-title green">خطرات استفاده از قرص های مختلف بدون توصیه پزشک</h2>
                        <p class="sug-text">
                            استفاده خود سرانه قرص ها بدون توصیه پزشک و بدون هماهنگی گاهی باعث بیماری های قلبی ، مشکلات
                            جدی و حتی مرگ میشود ! </p>
                        <a class="sug-btn"> ادامه مطلب</a>

                    </div>
                </div>
            </div>
            <form action="article.php" method="POST">
                <button id="article-btn" value="t" name="article" style="display:none"></button>
            </form>
            <h2 class="category-header blue">
                مشاوره آنلاین از پزشک های عمومی
            </h2>
            <div class="doctors">
                <div class="doctor" onclick="chatDoctors(this,'nimaHosseini1998')">
                    <div class="doc-image">
                        <img src="assets/images/web/doctor 1.jpg" alt="">
                    </div>
                    <div class="doc-title">
                        نیما حسینی
                    </div>
                </div>
                <div class="doctor" onclick="chatDoctors(this,'mortezaKiaie')">
                    <div class="doc-image">
                        <img src="assets/images/web/doctor 2.jpg" alt="">
                    </div>
                    <div class="doc-title">
                        دکتر مرتضی کیانی
                    </div>
                </div>
                <div class="doctor" onclick="chatDoctors(this,'mahdikhadivi')">
                    <div class="doc-image">
                        <img src="assets/images/web/doctor 3.jpg" alt="">
                    </div>
                    <div class="doc-title">
                        دکتر مهدی خدیوی
                    </div>
                </div>
                <div class="doctor" onclick="chatDoctors(this,'mohammadGhaedi')">
                    <div class="doc-image">
                        <img src="assets/images/web/doctor 4.jpg" alt="">
                    </div>
                    <div class="doc-title">
                        دکتر محمد قائدی
                    </div>
                </div>
                <div class="doctor" onclick="chatDoctors(this,'ArashMosavi')">
                    <div class="doc-image">
                        <img src="assets/images/web/doctor 5.jpg" alt="">
                    </div>
                    <div class="doc-title">
                        دکتر آرش موسوی
                    </div>
                </div>
            </div>
            <form action="chatroom.php" method="post">
                <button name="openchat" value="doctorName" id="chat-doctors" style="display:none;"></button>


            </form>
        </main>
        <!-- ------------------- footer ---------------------- -->
        <footer>
            <div class="top-footer">
                <div class="logo-container footer-logo">
                    <span class="logo">
                        <img src="assets/images/web/logo.png" alt="">
                    </span>
                    <span class="title">
                        <span class="health">Health</span><span class="care">Care</span>
                    </span>
                </div>

                <div class="social-medias">
                    <i class="fa-brands fa-youtube"></i>
                    <i class="fa-brands fa-twitter"></i>
                    <i class="fa-brands fa-telegram"></i>
                    <i class="fa-brands fa-tiktok"></i>
                    <i class="fa-brands fa-discord"></i>

                </div>

                <a class="location" href="geo:35.704024077425494,51.45272907938054">
                    <img src="assets/images/web/location.jpg" alt="">
                </a>
            </div>

        </footer>
    </div>

</body>

</html>