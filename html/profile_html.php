<?php ?>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>用户信息编辑页</title>
    </head>
    <body>
        <form method="post" style="text-align: center;">
            昵称：<input type="text" name="nickname" value="<?php echo $data['nickname']; ?>"/><br/>
            性别：<input type="radio" name="gender" value="男" <?php if($data['gender']=='男') echo 'checked'; ?> />男 
            <input type="radio" name="gender" value="女" <?php if($data['gender']=='女') echo 'checked'; ?>/>女<br/>
            邮箱：<input type="text" name="email" value="<?php echo $data['email']; ?>"/><br/>
            QQ号：<input type="text" name="qq" value="<?php echo $data['qq']; ?>"/><br/>
            个人主页：<input type="text" name="url" value="<?php echo $data['url']; ?>" /><br/>
            所在城市：<select name="city"><option value="未选择">未选择</option>
                        <?php foreach ($city as $v): ?>
                        <option value="<?php echo $v; ?>"><?php if($data['city']==$v) echo 'selected'; ?><?php echo $v; ?></option>
                        <?php endforeach; ?>
                    </select>
            语言技能：<?php foreach ($skill as $v): ?>
                        <input type="checkbox" name="skill[]" value="<?php echo $v; ?>" <?php if(in_array($v, $data['skill'])) echo 'checked'; ?>/><?php echo $v; ?>
                    <?php endforeach; ?>
            自我介绍：<textarea name="description" class="description"><?php echo $data['description']; ?></textarea><br/>
            <input type="submit" value="保存资料"/>
            <input type="reset" value="重新填写"/>
        </form>
    </body>
</html>

