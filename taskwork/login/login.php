<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/20
 * Time: 9:13
 */
session_start();
if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
}

ob_start();
$phonenumber = isset($_GET["phonenumber"]) ? $_GET["phonenumber"] : '';
$password = isset($_GET["password"]) ? $_GET["password"] : '';

$_SESSION['id'] = $phonenumber;
/*setcookie("id","",time() - 1000);
$_COOKIE['id'] = $phonenumber;*/

/*if(empty($phonenumber))
{
    exit;
}*/
$link = mysqli_connect('localhost','root','');
if (!$link)
{
    die('Could not connect: ' . mysqli_error($link));
}
mysqli_select_db($link,"taskwork");
mysqli_set_charset($link, "set name utf8");

$str = "SELECT * FROM user_tbl WHERE phonenumber = '$phonenumber'";
$result = mysqli_query($link,$str);

$row = mysqli_fetch_assoc($result);
if(($row['phonenumber'] == $phonenumber) && ($row['password'] == $password))
{
    echo 1;
    //header("Refresh:1;url=http://localhost/taskwork/mainpage/gerenzhongxin.html");

}
else
{
    //echo "用户名或密码不正确";
    echo 0;
}
//$link = mysqli_connect("localhost", "root", "");

/*if($link)
{
    $select = mysqli_select_db($link, "taskwork");

    if(isset($_POST["sub"]))
    {
        $password = $_POST["password"];
        $phonenumber = $_POST["phonenumber"];
        $_SESSION['id'] = $phonenumber;
        //echo $phonenumber;
        $str = "SELECT * FROM user_tbl WHERE phonenumber = '$phonenumber'";

        $result = mysqli_query($link, $str);
        $judge = mysqli_num_rows($result);
        if($judge == 0)
        {
            header("url=http://localhost/taskwork/register/register.html");
        }
        else
        {
            $row = mysqli_fetch_assoc($result);

            if(($row['phonenumber'] == $phonenumber) && ($row['password'] == $password))
            {
                echo "hello".$row['name'];
                header("Refresh:0;url=http://localhost/taskwork/mainpage/gerenzhongxin.html");
            }
            else
            {

                header("Refresh:0;url=http://localhost/taskwork/login/login.html");
            }
        }

    }
}*/
mysqli_close($link);
ob_end_flush();