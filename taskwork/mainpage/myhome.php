<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/24
 * Time: 15:41
 */

session_start();
$id = $_SESSION['id'];

$link = mysqli_connect("localhost","root","");


mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names 'utf8'");

$str = "SELECT * FROM home_tbl WHERE phonenumber = '$id'";
$result = mysqli_query($link, $str);

if (mysqli_num_rows($result) == 0)
{
    echo "No rows found, nothing to print so an exiting";
    exit;
}

//$row = mysqli_fetch_assoc($result);
$row = mysqli_fetch_assoc($result);
$home_name = $row['home_name'];
$home_address = $row['home_address'];
$home_intro = $row['home_intro'];
$star = $row['star'];
$home_situation = array($row['squre'], $row['lift'], $row['sun'], $row['air'], $row['garden'], $row['dogPriceSmall'], $row['dogPriceBig'], $row['catPrice'], $row['shower']);

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
        .main_jiatingxinxijieshao{
            width: 90%;
            margin: 0 auto;
            height: 700px;
            /*background-color: #fdfbf0;*/
            margin-top: 50px ;
        }
        .jiating_name{
            width: 90%;
            height: 35px;
            float: left;
            margin-left: 50px;
            /*background-color: #a17447;*/
            font-size: 24px;
        }
        .fenjiexian{
            width: 70%;
            height: 3px;
            background-color: #cccccc;
            float: left;
            margin-left: 50px;

        }
        .change_button{
            width: 10%;
            margin-left: 60px;
            margin-top: -20px;
            /*height: 40px;*/
            background-color: #5f2a00;
            float: left;
            border-radius: 60px;
            /* position: static; */
            opacity: 0.5;
            color: #f6efe5;
            line-height: 40px;
            text-align: center;
            /*position: relative;*/
            /*bottom: 24px;*/
        }
        .change_button:hover{
            opacity: 0.8;
        }
        .xinxizhanshi{
            width: 90%;
            float: left;
            margin-left: 50px;
            /*height: 500px;*/
            margin-top: -18px;
            /*background-color: #a17447;*/

        }
        .th_left{
            width:30%;
        }
        td{
            height: 40px;
            text-align: center;
        }
        .td1{
            text-align: left;
        }
        td td{
            height: 30px;
        }
        td table{
            width: 100%;
        }
        .table_button {
            width: 50%;
            height: 80%;
            background-color: #5f2a00;
            opacity: 0.5;
            margin: 0 auto;
            color: aliceblue;
        }
        .table_button:hover{
            background-color: #a1627a;
        }
        td table td{
            width: 150px;
            height: 80px;
        }
        .fanhui_button{
            margin-left: 250px;
            float: left;
            width: 100px;
            margin-bottom: 10px;
            background-color: #5f2a00;
            color: aliceblue;
            opacity: 0.5;
        }
        .fanhui_button:hover{
            background-color: #a1627a;
        }
        .table_gerenxinxi{
            width: 100%;
        }

    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        var save= document.getElementById("jiagexiangxi");
        window.onload = function() {
            var yangtai_wh = <?php echo $home_situation[2]?>;
            var huayuan_wh = <?php echo $home_situation[4]?>;
            var dianti_wh = <?php echo $home_situation[1]?>;
            var kongtiao_wh = <?php echo $home_situation[3]?>;

            if(yangtai_wh == 0)
            {
                document.getElementById("yangtai_logo").style.opacity=0.5;
                document.getElementById("yangtai_wh").innerText="无";
            }

            if(huayuan_wh == 0)
            {
                document.getElementById("huayuan_logo").style.opacity=0.5;
                document.getElementById("huayuan_wh").innerText="无";
            }

            if(dianti_wh == 0)
            {
                document.getElementById("dianti_logo").style.opacity=0.5;
                document.getElementById("dianti_wh").innerText="无";
            }

            if(kongtiao_wh == 0)
            {
                document.getElementById("kongtiao_logo").style.opacity=0.5;
                document.getElementById("kongtiao_wh").innerText="无";
            }
            // document.getElementById("mianji_logo").
            //     <td><img id="tianti_logo" src="logo/diantiyou.png" height="70" width="77"/></td>
            //     <td><img id="yangtai_logo" src="logo/yangtaiyou.png" height="70" width="93"/></td>
            //     <td><img id="kongtiao_logo" src="logo/kongtiaoyou.png" height="70" width="81"/></td>
            //     <td><img id="huayuan_logo" src="logo/huayuanyou.png" height="70" width="112"/></td>

            var btn = document.getElementById("jiagexiangxi");
            // btn.onclick = function () {
            //     alert("第三个事件");
            // }
            btn.addEventListener('click', function(){
                var jiagebiaodakai= document.getElementById("jiagebiao");
                jiagebiaodakai.style.display="block";

                var parent=btn.parentElement;
                $(parent).append("<div onclick='ll()' id='fanhui' class='fanhui_button'>收起</div>");
                btn.style.display="none";
                // $("#jiagexiangxi").onclick="null";
                //   jiagebiaodakai.onclick=null;
                //    $("#jiagexiangxi").replaceWith("<button onclick='ll()' id='fanhui'>xx</button>");
                // jiagebiaodakai.removeEventListener('click', showMsg, false);
                // alert("zz");
            }, false); //鼠标单击的时候调用showMes这个函数

            var btn2 = document.getElementById("xinxixiangxi");

            btn2.addEventListener('click', function(){
                var xinxibiaodakai= document.getElementById("xinxibiao");
                xinxibiaodakai.style.display="block";

                var parent2=btn2.parentElement;
                $(parent2).append("<div onclick='ll2()' id='fanhui2' class='fanhui_button'>收起</div>");
                btn2.style.display="none";
            }, false); //鼠标单击的时候调用showMes这个函数
		//	  alert(this.document.body.scrollHeight); //弹出当前页面的高度
        // parent.document.getElementById("banner-in container"); //取得父页面IFrame对象
       //    alert("zz");
       //  alert(obj.style.height); //弹出父页面中IFrame中设置的高度
       //  obj.style.height = this.document.body.scrollHeight+40+'px'; //调整父页面中IFrame的高度为此页面的高度

        }

        function ll() {
            //  alert("ss");
            document.getElementById("jiagebiao").style.display="none";
            $("#fanhui").remove();
            document.getElementById("jiagexiangxi").style.display="block";
        }
        // //---------------------------------------------------------------------------------------------
        var save2= document.getElementById("xinxixiangxi");
        // window.onload = function() {
        //
        // }
        function ll2() {
            //  alert("ss");
            document.getElementById("xinxibiao").style.display="none";
            $("#fanhui2").remove();
            document.getElementById("xinxixiangxi").style.display="block";
        }

        // var btn2 = document.getElementById('jiagexiangxi');
        // alert("xxb");
        // btn2.addEventListener('click', function(){
        //     alert("事件监听");
        // }, false); //鼠标单击的时候调用showMes这个函数
        // alert("xxc");
        // function showMsg() {
        //     alert("事件监听");
        // }

        //    var jiagebiaodakai= document.getElementById("jiagexiangxi");
        //    alert("zzz1");
        //    jiagebiaodakai.addEventListener('click',jiagexiangxi_show, false);
        //    alert("zzz2");
        //
        //    function jiagexiangxi_show(i) {
        //        alert("zzz");
        ////        if(document.getElementById("jiagebiao").style.display=="block")
        ////            return;
        //      // var jiagebiaodakai= document.getElementById("jiagebiao");
        //     //  jiagebiaodakai.style.display="block";
        //     //   $("#jiagexiangxi").onclick="null";
        //        jiagebiaodakai.onclick=null;
        //        $("#jiagexiangxi").replaceWith("<button onclick='ll()'>xx</button>");
        //        // jiagebiaodakai.removeEventListener('click', showMsg, false);
        //        alert("zz");
        //    }

        //    var jiagebiaodakai= document.getElementById("jiagexiangxi");
        //    alert("zzz1");
        //    jiagebiaodakai.onclick = jiagexiangxi_show;
        //    // jiagebiaodakai.click(jiagexiangxi_show());
        //    alert("kk");
    </script>
</head>
<body>
<div class="main_jiatingxinxijieshao">
    <div class="jiating_name"><?php echo $home_name?></div>
    <div class="fenjiexian"></div>
    <div class="change_button" onclick="gerenxinxi_change_in()">编 辑</div>
    <div class="xinxizhanshi">
        <table class="table_gerenxinxi">
            <tr class="tr_head">
                <th class="th_left"></th>
                <th></th>
            </tr>
            <tr>
                <td class="td1">我家的名字</td>
                <td class="td2"><?php echo $home_name?></td>
            </tr>
            <tr>
                <td class="td1">我家的地址</td>
                <td><?php echo $home_address?></td>
            </tr>
            <tr>
                <td class="td1">联系方式</td>
                <td><?php echo $id ?></td>
            </tr>
            <tr>
                <td class="td1">价格明细</td>
                <td style="margin: 0 auto"><div id="jiagexiangxi" class="table_button">查看详细</div>
                    <table id="jiagebiao" style="display: none">
                        <tr>
                            <td><img src="logo/cat.png" height="70"/><br>猫</td>
                            <td><img src="logo/dog.png" height="70"/><br>中型犬</td>
                            <td><img src="logo/dog.png" height="70" /><br>小型犬</td>
                            <td><img src="logo/xizaoyou.png" height="70" /><br>洗澡</td>
                        </tr>

                        <tr>
                            <td><?php echo $home_situation[7]?></td>
                            <td><?php echo $home_situation[6]?></td>
                            <td><?php echo $home_situation[5]?></td>
                            <td><?php echo $home_situation[8]?></td>
                        </tr>
                        <!--<tr>-->
                        <!--<td>小型犬</td>-->
                        <!--<td>100</td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                        <!--<td>洗澡</td>-->
                        <!--<td>100</td>-->
                        <!--</tr>-->

                    </table>
                </td>
            </tr>
            <tr>
                <td class="td1">硬件信息</td>
                <td style="margin: 0 auto"><div id="xinxixiangxi" class="table_button">查看详细</div>
                    <table id="xinxibiao" style="display: none">
                        <tr>
                            <td><img id="mianji_logo" src="logo/fangjianmianji.png" height="70" width="83"/></td>
                            <td><img id="dianti_logo" src="logo/diantiyou.png" height="70" width="77"/></td>
                            <td><img id="yangtai_logo" src="logo/yangtaiyou.png" height="70" width="93"/></td>
                            <td><img id="kongtiao_logo" src="logo/kongtiaoyou.png" height="70" width="81"/></td>
                            <td><img id="huayuan_logo" src="logo/huayuanyou.png" height="70" width="112"/></td>
                        </tr>

                        <tr>
                            <td ><txt id="mianji_wh" ><?php echo $home_situation[0]?></txt>平米</td>
                            <td><txt id="dianti_wh">有</txt>电梯</td>
                            <td><txt id="yangtai_wh" >有</txt>封闭阳台</td>
                            <td><txt id="kongtiao_wh" >有</txt>空调</td>
                            <td><txt id="huayuan_wh">有</txt>小区花园</td>
                        </tr>

                    </table>
                </td>
                </td>
            </tr>
            <tr>
                <td class="td1">我家的评分</td>
                <td><?php echo $star ?></td>
            </tr>
            <tr>
                <td style="height: 150px " class="td1">我家的简介</td>
                <td style="border-style: solid; border-width: 1.5px"><?php echo $home_intro?></td>
            </tr>
<!--            <tr>-->
<!--                <td class="td1">图片展示</td>-->
<!--                <td style="height: 150px">zzzzzzz</td>-->
<!--            </tr>-->
        </table>

    </div>

</div>
</body>
</html>