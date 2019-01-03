<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/20
 * Time: 9:34
 */

$temp = isset($_GET["temp"]) ? $_GET["temp"] : '';
if(empty($temp))
{
    exit;
}
else
{
    $link = mysqli_connect("localhost", "root", "");
    if(!$link)
    {
        die('Could not connect: ' . mysqli_error($link));
    }
    else
    {
        mysqli_select_db($link, "taskwork");
        mysqli_set_charset($link, "set name utf8");
        $str = "SELECT * FROM user_tbl WHERE phonenumber = '$temp'";
        $result = mysqli_query($link, $str);
        $row = mysqli_fetch_assoc($result);

        $introduce = $row['introduce'];
        if($introduce == 0)
        {
            echo "LOADING...";
        }
        else
        {
            echo $row['introduce'];
        }

    }
}

mysqli_close($link);