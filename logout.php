    <?php
/**
 * Created by PhpStorm.
 * User: yzj
 * Date: 2015/11/25
 * Time: 12:04
 */
    session_start();
    header("Content-type: text/html; charset=utf-8");
//    require_once "../inc/htconn.php";
    unset($_SESSION['xuehao']);
    unset($_SESSION['id']);
//    unset($_SESSION['name']);
    echo "<script>alert('退出成功!');window.location.href='../index.php'</script>";