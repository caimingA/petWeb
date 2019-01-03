<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/21
 * Time: 22:07
 */


session_start();
$id = $_SESSION['id'];
//include "../Documents/tencent files/986174677/connect.php";
/*if(isset($_COOKIE['id']))
{
    $id = $_COOKIE['id'];
}
else
{
    echo "error";
}*/
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
$nickname = $row_01['nickname'];
$gender = $row_01['gender'];
$birthday = $row_01['birthday'];
$district = $row_01['province']."  ".$row_01['city'];
$introduce = $row_01['introduce'];

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        *{
            cursor: pointer;
        }
        .gerenxinxi_head{
            height: 50px;
            width: 100%;
            /*background-color: #75c3e7;*/
            margin-left: 50px;
            margin-top:30px;
        }
        .type_head{
            float: left;
            /* width: 10%; */
            /* align-content: center; */
            font-size: 20px;
            color: #5f2a00;
            line-height: 50px;
        }
        .line{
            height: 1.5px;
            width: 68%;
            background: #5f2a00;
            margin-top: 27px;
            margin-left: 10px;
            opacity: 0.5;
            float: left;
        }
        .change_button{
            width: 10%;
            margin-left: 2%;
            margin-top: 0.5%;
            height: 80%;
            background-color: #5f2a00;
            float: left;
            border-radius: 60px;
            /* position: static; */
            opacity: 0.5;
            color: #f6efe5;
            line-height: 40px;
            text-align: center;
        }
        .change_button:hover{
            opacity: 1;
        }
        .gerenxinxi_body{
            /*background-color: #b4abab;*/
            width: 100%;
            height: 400px;
            padding-left: 50px
        }
        .table_gerenxinxi {
            border: 1px;
            /* border-style: solid; */
            height: 100%;
            width: 75%;
            text-align: center;
            color: #5f2a00bd;
            float: left;
        }
        th{
            height: 0;
        }
        .tr_head{
            height: 0;
        }
        .th_left{
            width: 30%;
        }
        td{
            /*border-style: solid;*/
        }
        .touxiang{
            background-color: #fbd391;
            border-radius: 90px;
            width: 150px;
            height: 150px;
            float: left;
            margin: 50px -20px 30px;
            line-height: 100px;
            overflow: hidden;

        }
    </style>
        <script>
        window.onload = function () {
            // alert(this.document.body.scrollHeight); //弹出当前页面的高度
            var obj = parent.document.getElementById("banner-in container"); //取得父页面IFrame对象
            // alert(obj.style.height); //弹出父页面中IFrame中设置的高度
            if(this.document.body.scrollHeight>600)
            {
                obj.style.height = this.document.body.scrollHeight+60+'px'; //调整父页面中IFrame的高度为此页面的高度
            }
            else
            {
                obj.style.height = '600px'; //调整父页面中IFrame的高度为此页面的高度
            }
        };
        function gerenxinxi_change_in()
        {
            // alert("z");
            window.location.href="gerenxinxibianji.html";
        }
    </script>
	
</head>
<body>
<div class="gerenxinxi_head">
    <span class="type_head">个人信息</span>
    <div class="line"></div>
    <div class="change_button" onclick="gerenxinxi_change_in()">编 辑</div>
</div>
<div class="gerenxinxi_body">
    <table class="table_gerenxinxi">
        <tr class="tr_head">
            <th class="th_left"></th>
            <th></th>
        </tr>
        <tr>
            <td>昵称</td>
            <td><?php echo $name ?></td>
        </tr>
        <tr>
            <td>姓名</td>
            <td><?php echo $nickname ?></td>
        </tr>
        <tr>
            <td>性别</td>
            <td><?php echo $gender ?></td>
        </tr>
        <tr>
            <td>生日</td>
            <td><?php echo $birthday ?></td>
        </tr>
        <tr>
            <td>手机号</td>
            <td><?php echo $id ?></td>
        </tr>
        <tr>
            <td>地区</td>
            <td><?php echo $district ?></td>
        </tr>
        <tr>
            <td style="height: 150px ">个人简介</td>
            <td style="border-style: solid; border-width: 1.5px"><?php echo $introduce ?></td>
        </tr>
    </table>
<div class="touxiang">
    <img src="psbNM7BJS2U.jpg" height="150px">
</div>
</div>
</body>
</html>
