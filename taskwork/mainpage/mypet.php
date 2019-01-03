<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/24
 * Time: 14:45
 */
session_start();
$id = $_SESSION['id'];
//setcookie("count",0,time()+3600);
//include "../Documents/tencent files/986174677/connect.php";
//if(isset($_COOKIE['id']))
//{
//    $id = $_COOKIE['id'];
//}
//else
//{
//    echo "error";
//}
//session_start();
global $count;
$count = 0;
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names 'utf8'");

$str_01 = "SELECT * FROM pet_tbl WHERE phonenumber = '$id'";
$result_01 = mysqli_query($link, $str_01);

if (mysqli_num_rows($result_01) == 0)
{
    echo "No rows found, nothing to print so an exiting";
    exit;
}
$pet_name = array();
$pet_kind = array();
$pet_age = array();
$pet_gender = array();
$pet_intro = array();
while($row_01 = mysqli_fetch_array($result_01))
{
    $pet_name[] = $row_01['pet_name'];
    $pet_kind[] = $row_01['pet_kind'];
    $pet_age[] = $row_01['pet_age'];
    $temp = $row_01['pet_gender'];
    if($temp == 0)
    {
        $pet_gender[] = "男";
    }
    else
    {
        $pet_gender[] = "女";
    }
    $pet_intro[] = $row_01['pet_intro'];
}
$json_pet_name = json_encode($pet_name);
$json_pet_kind = json_encode($pet_kind);
$json_pet_age = json_encode($pet_age);
$json_pet_gender = json_encode($pet_gender);
$json_pet_intro = json_encode($pet_intro);
$num = count($pet_name);

//echo $pet_name[1];
//$name = $row_01['name'];
//$nickname = $row_01['name'];
//$gender = $row_01['gender'];
//$birthday = $row_01['birthday'];
//$district = $row_01['province']."  ".$row_01['city'];
//$introduce = $row_01['introduce'];
//for($i = 0; $i < $num; $i++)
//{
//    echo $pet_name[$i];
//    echo $pet_age[$i];
//    echo $pet_gender[$i];
//    echo $pet_kind[$i];
//}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
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
            height: 550px;
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
            /*height: 0;*/
        }
        .tr_head{
            height: 0;
            /*height: 0;*/
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
        .tupianzhanshi{
            margin: 1px;
            padding: 1px;
            height: 130px;
            /*width: px;*/
            /*background-color: #75c3e7;*/
            float: left;
            overflow: hidden;
        }
    </style>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        var choose=document.querySelectorAll(".tupianzhanshi");
        for(j=0;j<choose.length;j++)
        {
            var img_choose=choose.getElementsByTagName("img");
            for(i=0;i<img_choose.length;i++)
            {
                img_choose[i].width=0;
                img_choose[i].height=choose[0].height;
            }

        }
    </script>
    <script>

        window.onload = function() {
            var petNameArray = <?php echo $json_pet_name ?>;
            var petKindArray = <?php echo $json_pet_kind ?>;
            var petGenderArray = <?php echo $json_pet_gender ?>;
            var petIntroArray = <?php echo $json_pet_intro ?>;
            // var pet_name = eval(petNames);
            console.log(petNameArray);


             // console.log(pet_name);
            var pet_number = <?php echo $num ?>;
            var main1=document.getElementById('right_main');
            // main1.style.backgroundColor="#cccccc";

            for (var i = 0; i < pet_number; i++) {
                var now=i+1;

                var pet_name = petNameArray[i];
                var pet_kind = petKindArray[i];
                var pet_kind_kind = petGenderArray[i];
                var pet_sex = petGenderArray[i];
                var pet_intro = petIntroArray[i];


                // var pet_name = "aaa";
               // var pet_kind = "aaa";
               // var pet_kind_kind = "aaa";
               // var pet_sex = "aaa";
               // var pet_intro = "aaa";

                $(main1).append(""  +
                    " <div class='chongwu_main'>" +
                    "        <div class='gerenxinxi_head'>" +
                    "            <span class='type_head'>宠物"+now+"</span>" +
                    "            <div class='line'></div>" +
                    "            <div class='change_button' onclick='gerenxinxi_change_in()'>编 辑</div>" +
                    "        </div>\n" +
                    "        <div class='gerenxinxi_body'>" +
                    "            <table class='table_gerenxinxi'>" +
                    "                <tr class='tr_head'>" +
                    "                    <th class='th_left'></th>" +
                    "                    <th></th>" +
                    "                </tr>" +
                    "                <tr>" +
                    "                    <td>名字</td>" +
                    "                    <td>"+ pet_name +"</td>" +
                    "                </tr>" +
                    "                <tr>" +
                    "                    <td>种类</td>" +
                    "                    <td>"+pet_kind+"</td>" +
                    "                </tr>" +
                    "                <tr>" +
                    "                    <td>性别</td>" +
                    "                    <td>"+pet_kind_kind+"</td>" +
                    "                </tr>" +
                    "                <tr>" +
                    "                <tr>" +
                    "                    <td style='height: 150px '>简介</td>" +
                    "                    <td style='border-style: solid; border-width: 1.5px'>"+pet_intro+"</td>" +
                    "                </tr>" +
                    "                <tr>" +
                    "                    <td style='height: 150px '>图片展示</td>" +
                    "                    <td>" +
                    "                        <table>" +
                    "                            <img src='dog_img/03.jpg' name='zhanshitupian' height='300' width='499'/>" +
                    "                        </table>" +
                    "                    </td>" +
                    "                </tr>" +
                    "            </table>" +
                    "        </div>" +
                    "    </div>" +
                    " ");

            }
			    var obj = parent.document.getElementById("banner-in container"); //取得父页面IFrame对象
            // alert(obj.style.height); //弹出父页面中IFrame中设置的高度
            obj.style.height = this.document.body.scrollHeight+80+'px'; //调整父页面中IFrame的高度为此页面的高度
        }

    </script>
    <script>
        var img_arr = new Array();
        img_arr[0]=new Array("dog_img/01.jpg","dog_img/02.jpg","dog_img/03.jpg","dog_img/04.jpg");
        img_arr[1]=new Array("cat_img/01.jpg","cat_img/02.jpg","cat_img/03.jpg","cat_img/04.jpg");
        img_arr[2]=new Array("dog_img/01.jpg","dog_img/02.jpg","dog_img/03.jpg","dog_img/04.jpg");
        img_arr[3]=new Array("cat_img/01.jpg","cat_img/02.jpg","cat_img/03.jpg","cat_img/04.jpg");
        var num=0;


        function hello(){
            //    alert("lala")
            var zhanshitupian=document.getElementsByName("zhanshitupian");

            num++;
            num%=4;
            for(i=0;i<zhanshitupian.length;i++)
            {

                zhanshitupian[i].src=img_arr[i][num];
            }
        }
        //重复执行某个方法
        //     var t1 = window.setInterval(hello,1000);
        var t2 = window.setInterval("hello()",3000);
        //去掉定时器的方法
        //   window.clearInterval(t2);

    </script>
</head>
<body>
<div id="right_main" >
    <div class="fenjie" style="height: 10px;"></div>
</div>
<!--<div class="chongwu_main">-->
<!--<div class="gerenxinxi_head">-->
<!--<span class="type_head">宠物一</span>-->
<!--<div class="line"></div>-->
<!--<div class="change_button" onclick="gerenxinxi_change_in()">编 辑</div>-->
<!--</div>-->
<!--<div class="gerenxinxi_body">-->
<!--<table class="table_gerenxinxi">-->
<!--<tr class="tr_head">-->
<!--<th class="th_left"></th>-->
<!--<th></th>-->
<!--</tr>-->
<!--<tr>-->
<!--<td>名字</td>-->
<!--<td>大黄</td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td>种类</td>-->
<!--<td>狗狗</td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td>品种</td>-->
<!--<td>拉布拉多</td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td>性别</td>-->
<!--<td></td>-->
<!--</tr>-->

<!--<tr>-->
<!--<td style="height: 150px ">简介</td>-->
<!--<td style="border-style: solid; border-width: 1.5px">啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦啦</td>-->
<!--</tr>-->
<!--<tr>-->
<!--<td style="height: 150px ">图片展示</td>-->
<!--<td>-->
<!--<table>-->
<!--<img src="dog_img/03.jpg" name="zhanshitupian" height="300" width="499"/>-->
<!--</table>-->


<!--</td>-->
<!--</tr>-->
<!--</table>-->

<!--</div>-->
<!--</div>-->

</body>
</html>
