<html>

<head>
    <title>员工管理系统登录</title>
    <meta name="" content="" http-equiv="content-type" content="text/html;charset=utf-8">
</head>

<body>
    <form action="loginProcess.php" method="post">
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="name" value=""></td>
            </tr>
            <tr>
                <td>密&nbsp;&nbsp;&nbsp;码</td>
                <td><input type="password" name="password" value=""></td>
            </tr>
            <tr>
                <td><input type="submit" name="sign" value="注册"></td>
                <td><input type="submit" name="login" value="登录"></td>
            </tr>


        </table>
    </form>

</body>

</html>
<?php
@$errno=$_GET['errno'];
if (isset($errno)) {
    if ($errno==0) {
        echo"<font color='red'>";
        echo "用户名或密码不能为空";
        echo "</font>";
    }
    if ($errno==1) {
        echo"<font color='red'>";
        echo "用户名已存在";
        echo "</font>";
    }
}
@$ok=$_GET['ok'];
if ($ok==1) {
    echo "注册成功，可以登录";
}

@$errcode=$_GET['errcode'];
//echo $false;
if($errcode==3){
    echo "密码错误";
}elseif($errcode==1){
    echo "用户名不存在";
}elseif($errcode==2){
    echo "用户名或密码不能为空";
}

?>
