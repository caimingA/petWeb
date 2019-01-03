<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/23
 * Time: 15:08
 */


ob_start();
header("Content-type: text/html; charset=utf-8");
$phonenumber_01 = isset($_GET["phonenumber_01"]) ? $_GET["phonenumber_01"] : '';
$phonenumber_02 = isset($_GET["phonenumber_02"]) ? $_GET["phonenumber_02"] : '';
$phonenumber_03 = isset($_GET["phonenumber_03"]) ? $_GET["phonenumber_03"] : '';

$link = mysqli_connect('localhost','root','');
if (!$link)
{
    die('Could not connect: ' . mysqli_error($link));
}
mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names 'utf8'");

//mysqli_set_charset($link, "set names utf8");

$str_01 = "SELECT * FROM home_tbl WHERE phonenumber = '$phonenumber_01'";
$result_01 = mysqli_query($link,$str_01);
$str_02 = "SELECT * FROM home_tbl WHERE phonenumber = '$phonenumber_02'";
$result_02 = mysqli_query($link,$str_02);
$str_03 = "SELECT * FROM home_tbl WHERE phonenumber = '$phonenumber_03'";
$result_03 = mysqli_query($link,$str_03);


$row_01 = mysqli_fetch_assoc($result_01);
$row_02 = mysqli_fetch_assoc($result_02);
$row_03 = mysqli_fetch_assoc($result_03);
$situation_01 = array($row_01['squre'], $row_01['lift'], $row_01['sun'], $row_01['air'], $row_01['garden'], $row_01['dogPriceSmall'], $row_01['dogPriceBig'], $row_01['catPrice'], $row_01['shower'], $row_01['home_address'], $row_01['home_name'], $row_01['star'], $row_01['home_intro']);
$situation_02 = array($row_02['squre'], $row_02['lift'], $row_02['sun'], $row_02['air'], $row_02['garden'], $row_02['dogPriceSmall'], $row_02['dogPriceBig'], $row_02['catPrice'], $row_02['shower'], $row_02['home_address'], $row_02['home_name'], $row_02['star'], $row_02['home_intro']);
$situation_03 = array($row_03['squre'], $row_03['lift'], $row_03['sun'], $row_03['air'], $row_03['garden'], $row_03['dogPriceSmall'], $row_03['dogPriceBig'], $row_03['catPrice'], $row_03['shower'], $row_03['home_address'], $row_03['home_name'], $row_03['star'], $row_03['home_intro']);

$final = array($situation_01, $situation_02, $situation_03);
echo json_encode($final,JSON_UNESCAPED_UNICODE);
ob_end_flush();
mysqli_close($link);

//exit ($final_01);


