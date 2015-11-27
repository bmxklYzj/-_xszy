<?php
/**
 * Created by PhpStorm.
 * User: yzj
 * Date: 2015/11/25
 * Time: 0:23
 */
session_start();
header("Content-type: text/html; charset=utf-8");
require_once "../inc/htconn.php";

if($_GET['act']=="check"){
    $xuehao=$_GET['xuehao'];
    $sql="select user_xuehao from user where user_xuehao='{$xuehao}'";
    $query  = mysql_query($sql);
    $row = mysql_num_rows($query);
    echo $row;
}
else{
    $user_xuehao = inject_check($_POST['stuid']);
    $user_name = inject_check($_POST['username']);
    $user_nicheng = inject_check($_POST['nicheng']);
//$password1 = inject_check($_POST['password1']);
    $user_password = md5(inject_check($_POST['password1']));


    $sql = "insert into user (user_xuehao, user_name, user_nicheng, user_password) VALUES ('$user_xuehao', '$user_name', '$user_nicheng', '$user_password')";
    $query = mysql_query($sql);
//    $id = mysql_insert_id($query);//操，开始的时候mysql_insert_id()多加了参数，调了半天！
    $id = mysql_insert_id();

    $_SESSION['xuehao'] = $user_xuehao;
    $_SESSION['id']= $id;
    $_SESSION['name']= $user_name;

    //注册用户时 插入网上教育的videouser视频记录
    for($i=0; $i < count($jiaoyu_arr); $i++){
        $sql="insert into videouser (user_id, video_id) VALUES ('$id', '{$jiaoyu_arr[$i][0]}')";
        mysql_query($sql);
    }


//    echo "<script>alert('注册成功！');window.location.href='../index.php'</script>";
    echo "<script>alert('注册成功！');window.location.href='../index.php'</script>";
//    header("Location:");

}


?>