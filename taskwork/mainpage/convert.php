<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/26
 * Time: 16:23
 */
ob_start();
session_start();
$id = $_SESSION['id'];

$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names utf8");

$str = "SELECT * FROM user_tbl WHERE phonenumber = '$id'";
$result = mysqli_query($link, $str);

$row = mysqli_fetch_assoc($result);

if($row['isregister'] == 1)
{
    echo "success";
    header("Refresh:0;url=http://localhost/taskwork/mainpage/myhome.php");
}
else
{
    echo "fail";
    header("Refresh:0;url=http://localhost/taskwork/mainpage/jiatingregister.html");
}

ob_end_flush();
mysqli_close($link);

