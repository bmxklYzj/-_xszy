<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="script/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="script/mystyle.css">

    <script src="script/jquery.min.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <title>登录</title>

    <script>
        $(function(){
            var nicheng = $("#nicheng").val();
            var password = $("#password").val();

            $("#nicheng").blur(function(){
               nicheng = $("#nicheng").val();
                if(nicheng == ""){
                    $("#nicheng_tx").html("用户名不能为空！");
                }else if(!(/^.*?[a-zA-Z0-9].*$/.test(nicheng) && /^.{6,16}$/.test(nicheng))){
                    $("#nicheng_tx").html("昵称名由6-16字母或数字组成！");
                }else{
                    $("#nicheng_tx").html("");
                }
            });

            $("#password").blur(function () {
                password = $("#password").val();
                if(password == ""){
                    $("#password_tx").html("密码不能为空！");
                }else if(!(/^.*?[\d]+.*$/.test(password) && /^.*?[A-Za-z].*$/.test(password) && /^.{6,16}$/.test(password))){
                    $("#password_tx").html("密码由6-16字母+数字组成!");
                }else{
                    $("#password_tx").html("");
                }
            });

        });
    </script>
</head>
<body>
    <!--<div class="container container-login">-->
        <!--<h3>欢迎登录精品课程网</h3>-->
        <!--<form action="">-->
            <!--<div class="form-group">-->
                <!--<label for="exampleInputEmail1">用户名：</label>-->
                <!--<input type="email" class="form-control" id="exampleInputEmail1" placeholder="用户名">-->
            <!--</div>-->
            <!--<div class="form-g  roup">-->
                <!--<label for="exampleInputPassword1">密码：</label>-->
                <!--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="密码">-->
            <!--</div>-->
            <!--<br>-->
            <!--<button type="reset" class="btn btn-primary reset">重置</button>-->
            <!--<button type="submit" class="btn btn-primary login">登录</button>-->
        <!--</form>-->
    <!--</div>-->

    <div class="container container-register container-login">
        <h3>欢迎登录学生之友翱翔视频网</h3>
        <form action="login_success.php" method="post">

            <div class="form-group">
                <label for="exampleInputEmail1">昵称名：</label>
                <input type="text" class="form-control" id="nicheng" name="nicheng" placeholder="昵称名">
            </div>
            <span class="stuinfo" id="nicheng_tx"></span>
            <div class="form-group">
                <label for="exampleInputPassword1">密码：</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="密码">
            </div>
            <span class="stuinfo" id="password_tx"></span>
            <br>
            <div style="clear: both;"></div>
            <button type="reset" class="btn btn-success reset">重置</button>
            <button type="submit" class="btn btn-success login" >登录</button>
        </form>
    </div>

    <!-- footer-->
    <?php
        require_once "footer.php";
    ?>

</body>
</html>