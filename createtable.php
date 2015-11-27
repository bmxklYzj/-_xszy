<?php
require_once "../inc/htconn.php";

//$sql = "select id from hblinks";
//$query = mysql_query($sql, $conn);
//while($row=mysql_fetch_array($query)){
////    echo "$row[id]";
//    echo "$row['id']";
//}

$user = "create table user
(
    user_id INT PRIMARY KEY  AUTO_INCREMENT NOT NULL,
    user_xuehao int NOT NULL,
    user_name VARCHAR(50),
    user_nicheng VARCHAR(50) NOT NULL ,
    user_password varchar(50) NOT NULL
)ENGINE=MyISAM";

$videouser = "create table videouser
(
    videouser_id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_id int(11) ,
    video_id int(11),
    video_lastwatchtime DECIMAL(12,7) DEFAULT 0,
    video_totwatchtime DECIMAL(15, 7) DEFAULT 0,
    video_progress DOUBLE DEFAULT 0,
    video_click int DEFAULT 0,
    FOREIGN KEY(user_id) REFERENCES user(user_id),
    FOREIGN KEY(video_id) REFERENCES hbinfodate(id)
)ENGINE=MyISAM";

mysql_query($user, $conn);
mysql_query($videouser, $conn);

?>