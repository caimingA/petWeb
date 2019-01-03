<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/20
 * Time: 8:40
 */
//设置session
session_start();
if(isset($_SESSION['id']))
{
    unset($_SESSION['id']);
}
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
        $password = $_POST["password"];
        $gender_temp = $_POST["gender"];
        $birthday = $_POST['birthday'];
        $phonenumber = $_POST["phonenumber"];
        $province = $_POST["province"];
        $city = $_POST["city"];

        $_SESSION['id'] = $phonenumber;
        //setcookie("id","$phonenumber",time() + 1000);

        /*echo $name;
        echo $phonenumber;
        echo $gender_temp;
        echo $birthday;
        echo $password;
        echo $province;
        echo $city;*/

        //设置性别
        $gender = "";
        if($gender_temp == "male")
        {
            $gender = "男";
        }
        elseif ($gender_temp == "female")
        {
            $gender = "女";
        }

        //上传图片
        $head = "";
        /*$temp = $_FILES["head"]["name"];
        echo $temp;*/
        //if ($_FILES["head"]["type"] == "image/jpeg")
        /*{
            move_uploaded_file($_FILES['head']['tmp_name'], 'head/'.$_FILES['head']['name']);

            $icon_tem = "head/".$_FILES['head']['name'];
            $icon_arr = array("$icon_tem");
            $icon = implode($icon_arr);

            $head = $icon_tem;

            //$omgname = $_FILES["file"]['name'];
        }*/
        //else
        /*{
            echo "error";
        }*/
        
        if($name && $password && $gender && $birthday && $phonenumber && $province && $city )
        {
            $str = "INSERT INTO user_tbl (name, gender, birthday, password, phonenumber, province, city, head) VALUES ('$name',  '$gender', '$birthday', '$password', '$phonenumber', '$province', '$city', '$head')";

            $result = mysqli_query($link, $str);

            echo "welcome !!!";
            header("Refresh:0;url=http://localhost:63342/taskwork/mainpage/gerenzhongxin.html");
        }
        else
        {
            echo "data error";
            //header("Refresh:1;url=http://localhost/taskwork/");
        }
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