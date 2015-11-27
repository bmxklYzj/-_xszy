<?php
session_start();
require_once "../inc/htconn.php";
$user_id=$_SESSION['id'];

$sql="select * from user where user_id=$user_id";
$query=mysql_query($sql);
while($row=mysql_fetch_array($query)){
    $user_xuehao=$row['user_xuehao'];
    $user_name=$row['user_name'];
    $user_nicheng=$row['user_nicheng'];
}

$sql="select count(*) as total from videouser where (user_id=$user_id and video_click!=0)";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
$sum=$row['total'];

$sql="select * from videouser where (user_id=$user_id and video_click!=0)";
$query=mysql_query($sql);
$sumTime = 0;//所有视频敢看的总时间
while($row=mysql_fetch_array($query)){
    $video_totwatchtime=$row['video_totwatchtime'];
    $sumTime+=$video_totwatchtime;
}
//分别定义时分秒
$h=intval($sumTime/3600);
$m=intval($sumTime/60);
$s=intval($sumTime%60);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看我的资料和播放记录</title>
    <link href="../css/style.css" type="text/css" rel="stylesheet">

    <link href="../bannter/bannter.css" type="text/css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="script/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="script/aboutMe.css">
    <script src="script/jquery.min.js"></script>
    <script src="script/bootstrap.min.js"></script>

    <style>
        .top{
            height: 32px;
        }
    </style>
</head>
<body>

<?php
require_once "../inc/htconn.php";
require_once "header.php";
?>

<div class="container-fluid">
    <div class="info">
        <div class="info-left">
            <table class="table ">
                <tr>
                    <th class="text-success">昵称</th>
                    <th class="text-success">学号</th>
                    <th class="text-success">姓名</th>
                </tr>
                <tr>
                    <td><?php echo "$user_nicheng"; ?></td>
                    <td><?php echo "$user_xuehao"; ?></td>
                    <td><?php echo "$user_name"; ?></td>
                </tr>
            </table>
        </div>
        <div class="info-right">
            <h3>已观看视频总个数：<span class="shuzi-yanse"><?php echo "$sum" ?></span></h3>
            <h3>已观看总时长：<span class="shuzi-yanse"><?php echo "$h" ?></span>小时<span class="shuzi-yanse"><?php echo "$m" ?></span>分钟<span class="shuzi-yanse"><?php echo "$s" ?></span>秒</h3>
        </div>
    </div>
</div>
<div class="container">

    <?php
    $sql="select * from videouser where (user_id=$user_id and video_click!=0)";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
        $videouser_id=$row['videouser_id'];

        $video_click=$row['video_click'];
        $video_totwatchtime=$row['video_totwatchtime'];
        $video_totwatchtime=intval($video_totwatchtime);
        $hh=intval($video_totwatchtime/3600);
        $mm=intval($video_totwatchtime/60);
        $ss=intval($video_totwatchtime%60);
        $video_progress=$row['video_progress'];

        $sql="select * from hbinfodate where id = (select video_id from videouser WHERE videouser_id=$videouser_id)";
        $query=mysql_query($sql);
        $rs=mysql_fetch_array($query);

        $title=$rs['title'];
        $content=$rs['content'];
        $img=$rs['img'];


        echo <<< EOT


EOT;


//        for ($i = 0; $i<2; $i++)
//        {
        ?>

        <div class="row">
            <div class="img">
                <a href="http://www.baidu.com">
                    <div class="link">
                        <img src="../hbUploadFile/<?php echo "$img"; ?>" alt="图片">
                        <div class="text">
                            <h3><?php echo "$title"; ?></h3>
                            <p><?php echo "$content"; ?></p>
                        </div>
                    </div>
                </a>
                <div class="shuzi">
                    <h3>已经播放过：<span class="shuzi-yanse"><?php echo "$video_totwatchtime"; ?></span>次</h3>
                    <h3>已播放时间：<span class="shuzi-yanse"><?php echo "$hh"; ?></span>小时<span class="shuzi-yanse"><?php echo "$mm"; ?></span>分钟<span class="shuzi-yanse"><?php echo "$ss"; ?></span>秒</h3>
                    <h3>播放进度是：<span class="shuzi-yanse">25</span>%</h3>
                </div>
                <div class="jindu">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

//        }
    }
    ?>
</div>
</body>
</html>