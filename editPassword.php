<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改密码</title>
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
        /*修改密码的css*/
        .editPassword{
            width: 40%;
            float: left;
        }
        .editPassword .form-group{
            width: 60%;
            float: left;
        }
        .editPassword span{
            padding: 30px 0px 0px 20px;
            color: red;
            float: left;
        }

    </style>
</head>
<body>
<?php
    require_once "../inc/htconn.php";
    require_once "header.php";
?>

<div class="container">
    <div class="editPassword">
        <form class="form" action="editPassword_handle.php" method="post"  onsubmit="return check()">
            <div class="form-group">
                <label for="exampleInputPassword1">原密码</label>
                <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="oldPassword">
            </div>
            <span id="uu" style="display: none;"></span>
            <span id="oldPass_tx"></span>
            <div class="form-group">
                <label for="exampleInputPassword1">新密码</label>
                <input type="password" class="form-control" id="newPass1" name="newPass1" placeholder="newPassword">
            </div>
            <span id="newPass1_tx"></span>
            <div class="form-group">
                <label for="exampleInputPassword1">确认新密码</label>
                <input type="password" class="form-control" id="newPass2" name="newPass2" placeholder="newPassword">
            </div>
            <span id="newPass2_tx"></span>
            <div style="clear: both;"></div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</div>

<script>
    function check(){
        var uu = $("#uu").html();
        if(uu=="1"){
            return false;
        }else{
            return true;
        }
    }

    $("#oldPass").blur(function(){
        var oldPassword=$("#oldPass").val();
        if(oldPassword==""){
            $("#oldPass_tx").html("旧密码不能为空");
        }else if(!(/^.*?[\d]+.*$/.test(oldPassword) && /^.*?[A-Za-z].*$/.test(oldPassword) && /^.{6,16}$/.test(oldPassword))){
            $("#oldPass_tx").html("密码由6-16字母+数字组成!");
        }else{
            $("#oldPass_tx").html("");
        }
    });
    $("#newPass1").blur(function(){
        var newPass1=$("#newPass1").val();
        if(newPass1==""){
            $("#newPass1_tx").html("旧密码不能为空");
        }else if(!(/^.*?[\d]+.*$/.test(newPass1) && /^.*?[A-Za-z].*$/.test(newPass1) && /^.{6,16}$/.test(newPass1))){
            $("#newPass1_tx").html("密码由6-16字母+数字组成!");
        }else{
            $("#newPass1_tx").html("");
        }
    });
    $("#newPass2").blur(function(){
        var newPass2=$("#newPass2").val();
        if(newPass2==""){
            $("#newPass2_tx").html("旧密码不能为空");
        }else if(!(/^.*?[\d]+.*$/.test(newPass2) && /^.*?[A-Za-z].*$/.test(newPass2) && /^.{6,16}$/.test(newPass2))){
            $("#newPass2_tx").html("密码由6-16字母+数字组成!");
        }else{
            $("#newPass2_tx").html("");
        }

        var newPass1=$("#newPass1").val();
        if(newPass1!=newPass2){
            $("#newPass2_tx").html("两次密码不匹配，请重新输入！");
            $("#newPass1").html("");
            $("#newPass2").html("");
            $("#uu").html("1");
        }
    });
    $("#")


</script>
</body>
</html>