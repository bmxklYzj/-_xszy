<?php
/**
 * Created by PhpStorm.
 * User: yzj
 * Date: 2015/11/28
 * Time: 10:16
 */

session_start();
header("Content-type: text/html; charset=utf-8");
require_once "../inc/htconn.php";
$user_id=$_SESSION['id'];

$sql="select user_password from user where user_id=$user_id";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
$user_password=$row['user_password'];
if($user_password != md5(inject_check($_POST['oldPass']))){
    echo "<script>alert('您所输入的原始密码不正确，密码未能修改成功');window.location.href='../index.php'</script>";
}else{
    $newPassword=md5(inject_check($_POST['newPass1']));
//    echo "<html>echo '$newPassword'</html>";
    mysql_query("update user set user_password='$newPassword' where user_id='$user_id'");
    echo "<script>alert('密码修改成功');window.location.href='../index.php'</script>";
}


?>