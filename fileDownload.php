<?php
$file_name=$_GET['file_name'];
function fileDownload($file_name)
{
    
    if (!file_exists($file_name)) {
        echo "文件不存在";
        return;
    }
    $file_size=filesize($file_name);
    $fp=fopen($file_name, "r");//打开文件
//$fp2=fopen($file_name,"r");
    header("Content-type:application/octet-stream");//返回的文件
    header("Accept-Ranges:bytes");//按照字节返回
    header("Accept-Length:$file_size");//获取下载文件的大小
    header("Content-Disposition:attachment;file_name=".$file_name);//浏览器弹出对话框，显示下载的文件名
//向客户端返回数据
    $buffer=1024;//每次读取的文件大小
//为保障下载安全，设置一个文件字节计数器
    $file_count=0;
    while (!feof($fp) && ($file_size-$file_count>0)) {
        $file_data=fread($fp, $buffer);//读取数据
        $file_count+=$buffer;
        echo $file_data;
    }
    fclose($fp);//关闭文件
}

fileDownload($file_name);
