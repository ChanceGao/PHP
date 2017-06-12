<?php
class MySqli
{
    private $conn;
    //private $db="test";
    //连接数据库
    function connect($hn="localhsot",$un="root",$pw="",$db="test")
    {
        $this->conn=mysqli_connect($hn,$un,$pw);
        if(!$this->conn){
            die("数据库连接失败" . mysql_error());
        }
        mysqli_select_db($this->conn,$db);
        mysqli_query($this->conn,"set names utf8");
    }

    //查询操作
    function mysql_search($searchSQL)
    {
        $result = mysqli_query();
    }
}
