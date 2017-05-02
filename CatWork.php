<?php

require_once "SmartCat.class.php";
$Tom = new SmartCat();

$type = $_POST['type'];
$oper = $_POST['oper'];

if ($type=="math") {
    # code...
    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    echo $Tom->cal($oper, $num1, $num2);
    echo "<br>";
} elseif ($type=="area") {
    # code...
    $r = $_POST['radius'];
    if ($r!=null) {
        echo "圆的面积是" . $Tom->area($r);
    }
    echo "<br>";
    $rec=$_POST['rec'];
    if ($rec!=null) {
        $rec=explode(" ", $rec);
        $width = $rec[0];
        $height = $rec[1];
        echo "矩形的面积是" . $Tom->area($height, $width);
        echo "<br>";
    }
}
