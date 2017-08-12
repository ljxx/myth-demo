<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>上传头像</title>
    </head>
    <body>
        <h2>编辑用户头像</h2>
        <p>现有头像：</p>
        <img src="<?php echo './'.$pic_path; ?>" onerror="this.src='../image/defaultimg.jpeg'" style="width: 100px; height: 150px;"/>
        <form action="./upload_object.php" method="post" enctype="multipart/form-data">
            <p>上传头像：<input name="pic" type="file" /></p>
            <p><input type="submit" value="保存头像" /></p>
        </form>
    </body>
</html>