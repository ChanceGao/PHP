<?php
include_once "SqlTool.class.php";//如果失败继续执行
$sql_dml = "insert into user (name,password,email,age) values('小明',md5('123'),'xiaoming@163.com',10)";
$sqlTool = new SqlTools();
$sqlTool->conect_sql();
//$sqlTool->operate_dml($sql_dml);
$sql_dql = "select * from user";
//$sqlTool->operate_dql($sql_dql);
$tableName="user";
$sqlTool->showTable($tableName);