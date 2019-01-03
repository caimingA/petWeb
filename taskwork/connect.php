<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/22
 * Time: 11:48
 */
session_start();
$id = $_SESSION['id'];
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names 'utf8'");

$str_01 = "SELECT * FROM user_tbl WHERE phonenumber = '$id'";
$result_01 = mysqli_query($link, $str_01);

if (mysqli_num_rows($result_01) == 0)
{
    echo "No rows found, nothing to print so an exiting";
    exit;
}

$row_01 = mysqli_fetch_assoc($result_01);

$name = $row_01['name'];
$nickname = $row_01['name'];
$gender = $row_01['gender'];
$birthday = $row_01['birthday'];
$district = $row_01['province']."  ".$row_01['city'];
$introduce = $row_01['introduce'];
/*echo "aaa";*/


/*$str_02 = "SELECT * FROM pet_tbl WHERE phonenumber = '$id'";
$result_02 = mysqli_query($link, $str_02);

if(mysqli_num_rows($result_02))
{
    header("");
}

$row_02 = mysqli_fetch_array($result_02);
while($row_02)
{

}*/

