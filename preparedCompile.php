<?php
require_once "connectToSql.php";
mysqli_select_db($mysqli,"books");
/*//创建预编译对象
$sql = "insert into book(isbn,title,author) values(?,?,?)";
$prepareCopile=$mysqli->prepare($sql) or die($mysqli->error);

//绑定参数
$isbn="0011";
$title="CLR C#";
$author="未知";

$prepareCopile->bind_param("sss",$isbn,$title,$author);//类型和顺序都要对应
//执行
$b=$prepareCopile->execute();
if(!$b){
    die("操作失败");
}else{
    echo "执行成功";
}*/

//预编译执行查询语句
//创建预编译对象
$sql = "select id,title,author from book where id>?";
$stmt = $mysqli->prepare($sql);


//绑定参数
$id=5;
$stmt->bind_param("i",$id);
//绑定结果集
$stmt->bind_result($id,$title,$author);//参数可以和查询字段不一样，建议一样
//执行
$stmt->execute();
//取出绑定的结果集
while($stmt->fetch()){
    echo "$id***$title***$author<br>";
}


/*执行另一次查询，无需再绑定结果集*/
//绑定参数
echo "另一次查询<br>";
$id=10;
$stmt->bind_param("i",$id);

//执行
$stmt->execute();
//取出绑定的结果集
while($stmt->fetch()){
    echo "$id***$title***$author<br>";
}

//释放绑定的结果集
$stmt->free_result();
//关闭预编译结果
$stmt->close();
//关闭数据库连接
$mysqli->close();

