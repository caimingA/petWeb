<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/26
 * Time: 15:53
 */
ob_start();
$link = mysqli_connect("localhost","root","");

if($link)
{
    mysqli_select_db($link, "taskwork");
    mysqli_query($link, "set names utf8");
    if(isset($_POST["sub"]))
    {
        //get parameters
        $name = $_POST["family_name"];
        $phonenumber = $_POST["phonenumber"];
//        $province = $_POST["province"];
//        $city = $_POST["city"];

        $address = $_POST["home_address"];

        $squre = $_POST['squre'];
        $lift = $_POST['lift'];
        $sun = $_POST['sun'];
        $air = $_POST['air'];
        $garden = $_POST['garden'];
        $dogPriceSmall = $_POST['dogPriceSmall'];
        $dogPriceBig = $_POST['dogPriceBig'];
        $catPrice = $_POST['catPrice'];
        $shower = $_POST['shower'];
        $home_intro = $_POST['home_intro'];

//        echo $name;
//        echo $phonenumber;
//        echo $address;
//        echo $squre;
//        echo $lift;
//        echo $sun;
//        echo $air;
//        echo $garden;
//        echo $dogPriceBig;
//        echo $dogPriceSmall;
//        echo $catPrice;
//        echo $shower;
//        echo $home_intro;



        //setcookie("id","$phonenumber",time() + 1000);

        /*echo $name;
        echo $phonenumber;
        echo $gender_temp;
        echo $birthday;
        echo $password;
        echo $province;
        echo $city;*/

        //设置性别


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



//            $str = "INSERT INTO user_tbl (name, gender, birthday, password, phonenumber, province, city, head) VALUES ('$name',  '$gender', '$birthday', '$password', '$phonenumber', '$province', '$city', '$head')";

//            $result = mysqli_query($link, $str);
//
//            echo "welcome !!!";
//            header("Refresh:0;url=http://localhost/taskwork/mainpage/gerenzhongxin.html");

        $str = "INSERT INTO home_tbl (home_name, phonenumber, home_address, air, lift, garden, sun, squre, dogPriceBig, dogPriceSmall, catPrice, shower, home_intro) VALUES ('$name',  '$phonenumber', '$address', '$air', '$lift', '$garden', '$sun', '$squre','$dogPriceBig', '$dogPriceSmall', '$catPrice', '$shower', '$home_intro')";
        $result = mysqli_query($link, $str);
    }

}
header("Refresh:0;url=http://localhost/taskwork/mainpage/myhome.php");

mysqli_close($link);
ob_end_flush();