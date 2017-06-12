<?php
$name=$_GET['name'];
if(!empty($name)){
    echo "欢迎". $name ."登录成功";
}
?>
<html>
<head>
    <title>主界面</title>
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
</head>
<body>
<center>
    <form>
        <a href="manage.php">管理用户</a> <br>
        <a href="add.php">添加用户</a> <br>
        <a href="search.php">查找用户</a> <br>
        <a href="exit.php">安全退出</a> <br>

    </form>
</center>

</body>
</html>
