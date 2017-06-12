<?php
@$errno=$_GET['errno'];
if (isset($errno)) {
    if ($errno==0) {
        echo"<font color='red'>";
        echo "用户名或密码不能为空";
        echo "</font>";
    }
    if ($errno==1) {
        echo "用户名已存在";
    }
}
