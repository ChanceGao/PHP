<?php
$mysqli=new mysqli("localhost","root","","books");
if(!$mysqli){
    die (mysqli_connect_error());
}

//$mysqli->query("set names 'utf8");
$mysqli->query("SET NAMES 'utf8'");
$insert="insert into book(isbn,title,author) values('0003','PHP从入门到精通','明日科技');";//注意多个SQL语句之间用;分开
$insert.="insert into book(isbn,title,author) values('0004','鸟哥的私房菜','鸟哥')";

$b=$mysqli->multi_query($insert);

if(!$b){
    echo "插入失败";
}
else{
    echo "插入成功";
}
