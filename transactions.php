<?php
require_once "connectToSql.php";
$mysqli->select_db("books");
//mysqli_select_db($mysqli,"books");


$mysqli->autocommit(false);//将提交设为false
$sql1 = "insert into book(isbn,title,author) values('0010','鸟哥的Linux私房菜','鸟哥');";
$sql2 = "update author set amount_of_books=amount_of_books+1 where name='鸟哥'";

$res1 = $mysqli->query($sql1) or die($mysqli->error);
$res2 = $mysqli->query($sql2) or die($mysqli->error);

if(!$res1||!$res2){
    $mysqli->rollback();//任何一条语句执行失败就回滚
    echo "执行失败，回滚" . $mysqli->error();
}else{
    $mysqli->commit();//所有语句执行成功，提交
}

$mysqli->close();
//$mysqli->commit();

