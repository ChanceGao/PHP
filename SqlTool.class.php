<?php
class SqlTools
{
    private $conn;
    private $host="localhost";
    private $username="root";
    private $password="";
    private $db="user";

    function conect_sql()
    {
        $this->conn=mysqli_connect($this->host, $this->username, $this->password);
        if (!$this->conn) {
            die("MySQL连接失败" . mysql_error());
        }
        mysqli_select_db($this->conn, $this->db);
        mysqli_query($this->conn, "set names utf8");
    }

    //查询操作
    function operate_dql($sql_dql)
    {
        $result=mysqli_query($this->conn, $sql_dql);//返回MySQL result资源类型
        if (!$result) {
            die("查询失败" . mysql_error());
        }
        while ($row=mysqli_fetch_row($result)) {
            foreach ($row as $key => $value) {
                echo $value . "--";
            }
            echo "<br>";
        }
        mysqli_free_result($result);
    }
    //增删改操作,insert,update,delete
    function operate_dml($sql_dml)
    {
        $res=mysqli_query($this->conn, $sql_dml );//返回bool类型
        if (!$res) {
            echo "操作失败";
        } else {
            if (mysqli_affected_rows($this->conn)>0) {
                echo "操作成功";
            } else {
                echo "操作未对数据造成影响";
            }
        }
    }

    function showTable($tableName)
    {
        $sql="select * from $tableName";
        $result = mysqli_query($this->conn, $sql);

        //$fieldInfo=mysqli_fetch_row($result);
        //print_r($fieldInfo);echo "<br>";
        //mysqli_fetch_field()函数返回一个对象，对象的属性是表的字段
        $rows=mysqli_num_rows($result);//获取结果集中元素的个数，即数据库表的行数
        $colums=mysqli_num_fields($result);//Returns the number of fields from specified result set
        //echo $colums;
        //echo $rows;
        $fields=mysqli_fetch_fields($result);//以对象数组的形式返回结果集中所有的字段信息，每个对象的name属性即为字段值
        
        echo "<table border=1>";
            echo "<tr>";
        for ($i=0; $i<$colums; $i++) {
            echo "<td>";
            echo $fields[$i]->name;
            echo "</td>";
        }
            echo "</tr>";
        while($elements=mysqli_fetch_row($result)){
            echo "<tr>";
            foreach ($elements as $key => $value) {
                echo "<td>";
                echo $value;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
       /* while($fieldInfo=mysqli_fetch_field($result)){
            
           
        }*/
        mysqli_free_result($result);
    }
}
