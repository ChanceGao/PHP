<?php
require_once "connectToSql.php";
mysqli_select_db($mysqli, "ERP");

//print_r($_POST);
$name=$_POST['name'];
$password=$_POST['password'];
/*foreach($_POST as $value){
    echo "$value" . "<br>";
}*/
//管理员注册模块
if (isset($_POST['sign'])) {
    if ($name==''||$password=='') {
        header("Location: index.php?errno=0");
        exit();
    } else {
        //在数据库中查询用户名，验证用户名的唯一性
        //echo $name;
        $searchName="select * from admin where name='$name'";//字符串字段的值要加单引号
       
        $res=$mysqli->query($searchName);
        
        if ($res->num_rows!=0) {
            header("Location: index.php?errno=1");
            exit();
        } else {
            //echo $name,$password;
            $insert="insert into admin(name,password) values('$name',md5('$password'))";
            $flag=$mysqli->query($insert) or die(mysqli_error());
            echo $flag;
            if ($flag) {
                header("Location: index.php?ok=1");
                exit();
            }
        }
    }
}

//管理员登录模块
if (isset($_POST['login'])) {
    if (!empty($name)&&!empty($password)) {
        $search = "select password from admin where name='$name'";
        $result = $mysqli->query($search);
        if ($result->num_rows==1) {
            $row=$result->fetch_assoc();
            if ($row['password']==md5($password)) {
                header("Location: main.php?name=$name");
                exit();
            } else {
                //var_dump($password);
                //echo "密码错误";
                header("Location: index.php?errcode=3");
                exit();
            }
        } else {
            //echo "用户名不存在";
            header("Location: index.php?errcode=1");
            exit();
        }
    } else {
        //echo "用户名或密码不能为空";
        header("Location: index.php?errcode=2");
        exit();
    }
}
