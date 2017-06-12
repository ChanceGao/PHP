<?php
$mysqli=new mysqli("localhost", "root", "", "books");
if (!$mysqli) {
    die(mysqli_connect_error());
}
$mysqli->query("set names utf8");

//批量查询
$search = "select * from book;";
$search .= "select * from author";

//处理结果
$res = $mysqli->multi_query($search);//此处返回bool值，只要第一个查询语句失败就返回false

if ($res) {
    do {
        $result = $mysqli->store_result();//取回第一个结果集
        
        while ($row=$result->fetch_row()) {
            foreach ($row as $key => $value) {
                echo "***$value";
            }
            echo "<br>";
        }

        $result->free();
        //判断是否还有结果集，没有就跳出循环
        if (!$mysqli->more_results()) {
            break ;
        }

        echo "<br>下一个结果集<br>";
    } while ($mysqli->next_result());
}

$mysqli->close();
