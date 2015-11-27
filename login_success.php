<?php
/**
 * Created by PhpStorm.
 * User: yzj
 * Date: 2015/11/25
 * Time: 12:27
 */
session_start();
header("Content-type: text/html; charset=utf-8");
require_once "../inc/htconn.php";

$nicheng = inject_check($_POST['nicheng']);
$password = md5(inject_check($_POST['password']));

$sql = "select * from user where user_nicheng='$nicheng' and user_password='$password'";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
if($row){
//    $sql = "select user_xuehao from user where user_nicheng='{$nicheng}'";
//    $xuehao = mysql_query($sql);

    $_SESSION['xuehao'] = $row['user_xuehao'];
    $_SESSION['id']= $row['user_id'];
    $_SESSION['name']= $row['user_name'];
    echo "<script>alert('登录成功!');window.location.href='../index.php';</script>";
}else{
    echo "<script>alert('用户名或密码错误！请重新登录');history.go(-1)</script>";
}