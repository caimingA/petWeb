<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/29
 * Time: 15:24
 */
session_start();
//header缓存
ob_start();

//链接
$link = mysqli_connect("localhost","root","");

if($link)
{
    mysqli_select_db($link, "taskwork");
    mysqli_query($link, "set names 'utf8'");
    if(isset($_POST["sub"]))
    {
        //get parameters
        $name = $_POST["name"];
        $nickname = $_POST["nickname"];
        $gender = $_POST["gender"];
        $birthday = $_POST['birthday'];
        $province = $_POST["province"];
        $city = $_POST["city"];
        $introduce = $_POST['introduce'];

        $target = $_SESSION['id'] ;

//        echo $name;
//        echo $nickname;
//        echo $gender;
//        echo $birthday;
//        echo $province;
//        echo $city;
//        echo $target;
//        echo $introduce;

        //setcookie("id","$phonenumber",time() + 1000);

        /*echo $name;
        echo $phonenumber;
        echo $gender_temp;
        echo $birthday;
        echo $password;
        echo $province;
        echo $city;*/

        //设置性别




            $str = "UPDATE user_tbl SET name = '$name', nickname = '$nickname', gender = '$gender', birthday = '$birthday', province = '$province', city = '$city', introduce = '$introduce' WHERE phonenumber = '$target'";

            $result = mysqli_query($link, $str);

            echo "welcome !!!";
            header("Refresh:0;url=http://localhost/taskwork/mainpage/myinformation.php");

    }
    /*else
    {
        echo "bbb";
    }*/
}
else
{
    echo "ccc";
}

mysqli_close($link);
ob_end_flush();