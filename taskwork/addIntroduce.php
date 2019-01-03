<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/20
 * Time: 17:34
 */
ob_start();
$link = mysqli_connect("localhost","root","");

if($link)
{
    $select = mysqli_select_db($link,"test");
    if(isset($_POST["sub"]))
    {
        $introduce = $_POST["introduce"];
        $phonenumber = $_SESSION['id'];
        $str = "UPDATE user_tbl SET introduce = '$introduce' WHERE phonenumber = '$phonenumber'";
        header("");
    }
}