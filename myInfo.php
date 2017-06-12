<?php
$name = "kingkang";
$age = 14;
$sex = "male";

if(isset($_SERVER['HTTP_REFERER'])) {
    if (strpos($_SERVER['HTTP_REFERER'], "http://localhost/github/PHP")==0) {
        echo $name . " ". $age ." " . $sex;
    }else {
        header("Location: warning.php");
    }
}else {
    header("Location: warning.php");
}
