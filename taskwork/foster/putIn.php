<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/28
 * Time: 9:57
 */
session_start();
$from_number = $_SESSION['id'];
$to_number = $_GET['host'];
$startday = $_GET['startday'];
$endday = $_GET['endday'];
$pet_name = $_GET['pet_name'];
$price = $_GET['price'];
//$to_number = "4444";
//$startday = "2018-01-01";
//$endday = "2018-01-02";
//$pet_name = "sdasda";
//$price = 100;

echo $from_number;
echo $to_number;
echo $startday;
echo $endday;
echo $pet_name;
echo $price;



$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names utf8");
$str_01 = "SELECT * FROM user_tbl WHERE phonenumber = '$to_number'";
$result_01 = mysqli_query($link, $str_01);
$row_01 = mysqli_fetch_assoc($result_01);
$name = $row_01['name'];

$str_02 = "SELECT * FROM home_tbl WHERE phonenumber = '$to_number'";
$result_02 = mysqli_query($link, $str_02);
$row_02 = mysqli_fetch_assoc($result_02);
$address = $row_02['home_address'];

$str = "INSERT INTO history_tbl (from_number, to_number, startday, endday, pet_name, price, name, address, isnow) VALUES ('$from_number',  '$to_number', '$startday', '$endday', '$pet_name', '$price', '$name', '$address', 1)";
$result = mysqli_query($link, $str);


mysqli_close($link);

header("Refresh:0;url=http://localhost:63342/taskwork/mainpage/gerenzhongxin2.html");