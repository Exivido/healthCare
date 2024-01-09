
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/publish.css">
    
    <title>Publish</title>
</head>
<body>
    <div class="main-container">
        <div class="title">
            <h2 class="blue">خوش آمدید!</h2>
            <h4 class="green">صفحه انشتار مقاله</h4>
        </div>
        <div class="inputs blue">
            
            <form action="publisher.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <label for="">موضوع</label>
                    <input type="text" name="subject" id="subject" placeholder="موضوع مقاله خود را وارد کنید ...">
                </div>
                <div class="row">
                    <label for="subject">عنوان</label>
                    <input type="text" name="title" id="title" placeholder="عنوان متن مقاله را وارد کنید ...">
                </div>
                <div class="row">
                    <label for="picture">تصویر مقاله</label>
                    <input type="file" name="picture" id="picture">
                </div>

                <div class="row">
                    <label for="text">متن مقاله</label>
                    <textarea name="text" id="text" cols="30" rows="10" placeholder="متن مقاله خود را اینجا وارد کنید ...."></textarea>
                </div>
                
                <div class="row">
                    <button name="publish" class="publish" id="publish" value="publish">انشتار</button>
                </div>
                




            </form>
        </div>
    </div>
    
</body>
</html>