<?php
//该文件用于保存表单各字段的验证函数

//验证用户名只允许英文字母，数字和下划线，并且2-10位时。/^\w(2,10)$/

/**
 * 验证用户名（2～10位，只允许汉子，英文字母，数字，下划线）
 * 注意：只支持UTF-8编码
 */
function checkUsername($username){
    if(!preg_match('/^[\w\x{4e00}-\x{9fa5}]{2,10}$/', $username)){
        return '用户名格式不符合要求';
    }
    return true;
}

function checkUserName002($username){
    if(!preg_match('/^\w{4,20}$/', $username)){
        return '用户名格式不符合要求';
    }
    return true;
}

/**
 * 密码格式验证
 * 验证密码（6～16位，只允许英文字母，数字和下划线）
 */
function checkPassword($password){
    if(!preg_match('/^\w{6,16}$/', $password)){
        return '密码格式不符合要求';
    }
    return true;
}

/**
 * 验证邮箱（不超过40位）
 */
function checkEmail($email){
    if(strlen($email) > 40){
        return '邮箱长度不合法';
    } else if(!preg_match('/^[a-z0-9]+@([a-z0-9]+\.)+[a-z]{2,4}$/i', $email)){
        return '邮箱格式不符合要求';
    }
    return true;
}