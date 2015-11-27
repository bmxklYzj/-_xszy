<div class="top">
	<div class="wd">
        <div class="navleft">
            <div class="nav_tt">
                <?php
                $sql="select * from hblinks order by orderbyid";
                $query=mysql_query($sql,$conn);
                while($row=mysql_fetch_array($query)){
                    echo "<a href='".$row["linksurl"]."' target='_blank'>".$row["linkstitle"]."</a>";
                }
                ?>
            </div>
<!--            <div class="logo"><img src="images/logo.jpg" /> </div>-->
        </div>
        <div class="nav_link">
            <div class="loginbar">
                <?php
                if(isset($_SESSION['xuehao'])){?>
                    欢迎您<a href="#"><?php echo $_SESSION['name']; ?></a><a href="logout.php">退出登录</a>
                <?php }else{ ?>
                    <a href="login.php">登录</a><a href="register.php">注册</a>
                <?php }  ?>


            </div>

        </div>
        <div class="clear"></div>
    </div>
</div>
<!----------------------------------menu--------------------------------->
