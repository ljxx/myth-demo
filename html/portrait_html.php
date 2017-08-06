<?php   ?>
<!doctype html>


<!--很遗憾，缩略图没能实现-->


<html>
    <head>
        <meta charset="utf-8"/>
        <title>用户账户信息</title>
        
      
    </head>
    <body>
       
        <!--action为空时，表示将表单提交但前文件处理-->
        <form action="" method="post" enctype="multipart/form-data">
            上传头像：<input name="pic" type="file"/>
            <input type="submit" value="保存头像"/>
        </form>
        <?php 
            //保存当前登录用户的信息：ID和姓名
            $info = array('id'=>345678, 'name'=>'王五');
        ?>
        <h2>编辑用户头像</h2>
        <p>用户姓名：<?php echo $info['name']; ?></p>
        <p>现有头像：</p>
        <!--onerror属性为img设置默认的图像-->
        <img style="width: 200px;" src="<?php echo '../image/'.$info['id'].'.jpeg?rand='. rand(); ?>"
             onerror="this.src='../image/defaultimg.jpeg'"/>
        
        <?php 
            //利用<pre></pre>标签使输出的内容含有空格和换行
            echo '<pre>';
            print_r($_FILES); //输出获取的上传文件信息
            echo '</pre>';
        ?>
        
        <?php
            //判断是否上传头像
        if(!empty($_FILES['pic'])){
            
            //获取用户上传文件信息
            $pic_info = $_FILES['pic'];
            //判断文件上传到临时文件时是否出错
            if($pic_info['error'] > 0){
                $error_msg = '上传错误：';
                switch ($pic_info['error']){
                    case 1:
                        $error_msg .= '文件大小超过了php.ini中upload_max_filesize选项限制的值！';
                        break;
                    case 2:
                        $error_msg .= '文件大小超过了表单中max_file_size选项指定的值！';
                        break;
                    case 3:
                        $error_msg .= '文件只有部分被上传！';
                        break;
                    case 4:
                        $error_msg .= '没有文件被上传！';
                        break;
                    case 6:
                        $error_msg .= '找不到临时文佳夹！';
                        break;
                    case 7:
                        $error_msg .= '文件写入失败！';
                        break;
                    default :
                        $error_msg .= '未知错误！';
                        break;
                }
                echo $error_msg;
                return false;
            }
            
            //获取上传文件的类型
//            $type = substr(strrchr($pic_info['name'], '.'), 1);
            $type = $_FILES['pic']['type'];
            
            //允许上传文件的类型
            $allow_type = array('image/jpeg','image/png','image/gif');
            //判断上传文件类型
//            if($type !== 'jpeg'){
            if(!in_array($type, $allow_type)){
                echo '图像类型不符合要求，允许的类型为：'. implode(",", $allow_type);
                return false;
            }
            
            //获取图像信息数组
            $img_info = getimagesize($pic_info['tmp_name']);
            //从数组中获取宽和高
            $width =  $img_info[0];
            $height = $img_info[1];
            //获取原图图像大小.list()可以将数组中元素赋值给一组变量。如$width, $height
            list($width, $height) = getimagesize($pic_info['temp_name']);
            
            //设置缩略图的最大宽度和高度
            $maxwidth = $maxheiht = 90;
            //自动计算缩略图的宽和高
            if($width > $height){
                //缩略图的宽等于$maxwidth
                $newwidth = $maxwidth;
                //计算缩略图的高度
                $newheight = round($newwidth * $height/$width);
            } else {
                //缩略图的高灯鱼$maxheight
                $newheight = $maxheight;
                //计算缩略图的宽度
                $newwidth = round($newheight * $width/$height);
            }
            
            //绘制缩略图的画布
            $thumb = imagecreatetruecolor($newwidth, $newheight);
            //依据原图创建一个与原图一样的新的图像
            $source = imagecreatefromjpeg($pic_info['tmp_name']);
            //依据原图创建缩略图
            /**
             * $dst_image 目标图像
             * $source 原图像
             * 0,0,0,0 分别代码目标点的x坐标和y坐标，原点的x坐标和y坐标
             * $newwidth 目标图像的宽
             * $newheight 目标图像的高
             * $width 原图像的宽
             * $height 原图像的高
             * 
             */
            imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            //设置缩略图保存路径
            $new_file = '../image/'.$info['id']."l".'.jpeg';
             echo "=======".$new_file."==="."<br/>";
             
//                         header('Content-type: image/jpeg');
             
             imagejpeg($thumb);
             imagejpeg($thumb, $new_file);
            //保存缩略图到指定目录
            imagejpeg($thumb, $new_file, 100);
            
            //使用用户ID为上传文件名
//            $new_file = $info['id'].'.jpeg';
            //设置上传文件保存路径
//            $filename = '../image/'.$new_file;
//            
//            echo "=====FILES======".$new_file."<br/>";
//            //头像上传到临时目录成功，将其保存到脚本所在目录的img文件夹中
//            
//            if(!move_uploaded_file($pic_info['tmp_name'], $filename)){
//                echo '头像上传失败！';
//                return false;
//            }
            
        }
        ?>
    </body>
</html>