<?php
$mysqli = new mysqli("localhost","root","");
if(!$mysqli){
    die($mysqli->connect_error());
}
$mysqli->query("set names utf8");