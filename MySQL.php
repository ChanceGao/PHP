<?php
//mysql扩展库操作数据库步骤如下
//1.获取连接
$conn=mysqli_connect("localhost","root","") or die("连接失败");
//2.选择数据库
mysqli_select_db($conn,"user");
//3.设置操作编码（可选，建议选）
mysqli_query($conn,"set names utf8");
//4.发送指令
$sql="select * from user";
//$result表示结果集，可以理解为就是一张表
$result=mysqli_query($conn,$sql);//$result是资源类型
//5.接收返回结果，并处理
//mysqli_fetch_row会依次取出$result结果集的下一行数据赋给$row数组
while($row=mysqli_fetch_row($result)){
    //echo $row[0] . "--" .$row[1] . "--" .$row[2] . "<br>";
    //print_r($row);
    //echo "<br>";
    foreach ($row as $key => $value) {
        echo $value . "--";
    }
    echo "<br>";
}
//6.释放资源，关闭连接
mysqli_free_result($result);//释放资源
mysqli_close($conn);//通常不需要使用该函数，系统会自动关闭连接资源，即使关闭连接但不释放资源，结果集仍然可以访问

