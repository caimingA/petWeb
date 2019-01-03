<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/28
 * Time: 9:30
 */
//session_start();
//$from_number = $_SESSION['id'];
//$to_number = $_POST['host'];
//$startday = $_POST['startday'];
//$endday = $_POST['endday'];
//$pet_name = $_POST['pet_name'];
//$price = $_POST['price'];
//
//$link = mysqli_connect("localhost","root","");
//mysqli_select_db($link, "taskwork");
//mysqli_query($link, "set names utf8");
//
//$str = "INSERT INTO history_tbl (from_number, to_number, startday, endday, pet_name, price) VALUES ('$from_number',  '$to_number', '$startday', '$endday', '$pet_name', '$price')";
//$result = mysqli_query($link, $str);
//
//mysqli_close($link);
session_start();
$from_number = $_SESSION['id'];
//$from_number = '18615168238';
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names utf8");

$str = "SELECT * FROM history_tbl WHERE from_number = '$from_number'";
$result = mysqli_query($link, $str);
$count = 0;
$temp = 0;
$pet_name = Array();
$startday = Array();
$endday = Array();
$address = Array();
$name = Array();
$price = Array();

while($row = mysqli_fetch_array($result))
{
    $pet_name[] = $row['pet_name'];
    $startday[] = $row['startday'];
    $endday[] = $row['endday'];
    $address[] = $row['address'];
    $name[] = $row['name'];
    $price[] = $row['price'];
    $isnow[] = $row['isnow'];
    $temp = $row['isnow'];
    if($temp == 1)
    {
        $count++;
    }
}
$json_pet_name = json_encode($pet_name,JSON_UNESCAPED_UNICODE);
$json_startday = json_encode($startday,JSON_UNESCAPED_UNICODE);
$json_endday = json_encode($endday,JSON_UNESCAPED_UNICODE);
$json_address = json_encode($address,JSON_UNESCAPED_UNICODE);
$json_name = json_encode($name,JSON_UNESCAPED_UNICODE);
$json_price = json_encode($price,JSON_UNESCAPED_UNICODE);
$json_isnow = json_encode($isnow,JSON_UNESCAPED_UNICODE);

//echo $json_pet_name;
//echo $json_startday;
//echo $json_endday;
//echo $json_address;
//echo $json_name;
//echo $json_price;

$num = count($pet_name);





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .lishidingdan_child{
    background-color: #f6c97f4d;
            /*margin: 1px;*/
            width: 90%;
            height: 300px;
            margin: 0 auto;
            margin-bottom: 10px;
            border-radius: 40px;
            padding: 30px;
        }
        body{
    padding: 5%;

}
        .lishidingdan_child div{
    margin-bottom: 5px;
        }
        .jiaoyishijian{
    /*background-color: aqua;*/
    width: 70%;
    height: 10%;
    font-size: 100%;
            float: left;
            overflow:hidden;
        }
        .chengjiaojiage{
    /*background-color: cadetblue;*/
    float: left;
    width: 50%;
    height: 10%;
    font-size:100%;
            font-size-adjust: inherit;
            overflow:hidden;
        }
        .shijian{
    background-color: #eadac1;
            text-shadow: #876b2e ;
            font-size: 120%;
        }
        .guest{
    /*background-color: blueviolet;*/
    float: left;
    width: 30%;
    height: 10%;
    font-size:100%;
        }
        .daxing{
    /*background-color: aqua;*/
    width: 30%;
    height: 10%;
    font-size: 100%;
            float: right;
            overflow:hidden;
        }
        .xitongzidongpingjia{
    /*background-color: aqua;*/
    width:50%;
    height: 10%;
    font-size: 100%;
            float: left;
            overflow:hidden;
        }
        .left_head{
    width: 10%;
    height: 92%;
    /*background-color: white;*/
    float: left;
    margin-right: 5px;
            padding-top: 3%;
        }
        .pingjia_head{
    /*background-color: aqua;*/
    width: 50%;
    height: 10%;
    font-size: 100%;
            float: left;
            overflow:hidden;
            vertical-align: bottom;
        }
        .pingjia_main{
    /*background-color: pink;*/
    width:50%;
    height:26%;
    float: left;
    border-style: solid;
            border-width: 1px 0 1px 0;
            /*border-radius: 40px;*/
            padding-left: 15px;
            padding-top: 5px;
        }
        .jiluzhaopian{
    margin-right: 5px;
            border-radius: 20px;
            /*background-color: royalblue;*/
            width:36%;
            height: 63%;
            float: right;
            overflow: hidden;
        }
        .line{
    width: 2px;
            height: 20%;
            /*background-color: black;*/
            margin: 0 auto;
        }
        .dingdanbiaoti{
    width: 30%;
    height: 40%;
    /*background-color: cadetblue;*/
    margin: 0 auto;
        }
        .jiyangjiatingxinxi{
    width:50%;
    height:10%;
    float: left;
    /*border-style: solid;*/
    /*border-width: 1px 0 1px 0;*/
    /*border-radius: 40px;*/
    padding-top: 5px;
        }
        .lianxi{
    width: 150px;
            height: 50px;
            background-color: #a17447;
            float: left;
            text-align: center;
            margin-top:30px ;
            margin-left: 80px;
        }
        .lianxi:hover{
    background-color: #75c3e7;
        }
    </style>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script>
        function show(i) {
            var url='duihuakuang.html';                             //转向网页的地址;
            var name='add';                            //网页名称，可为空;
            var iWidth=745;                          //弹出窗口的宽度;
            var iHeight=715;                         //弹出窗口的高度;
            //获得窗口的垂直位置
            var iTop = (window.screen.availHeight - 30 - iHeight) / 2;
            //获得窗口的水平位置
            var iLeft = (window.screen.availWidth - 10 - iWidth) / 2;
            window.open(url, name, 'height=' + iHeight + ',,innerHeight=' + iHeight + ',width=' + iWidth + ',innerWidth=' + iWidth + ',top=' + iTop + ',left=' + iLeft + ',status=no,toolbar=no,menubar=no,location=no,resizable=no,scrollbars=0,titlebar=no');
            // window.open("AddScfj.aspx", "newWindows", 'height=100,width=400,top=0,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no');
        }
        function sho(i) {
            window.open ("duihuakuang.html", "newwindow",
                "height=700, width=724, top=0, left=0, toolbar=no,menubar=no, scrollbars=no, resizable=no,location=no, status=no");
        }
    </script>

    <script>
window.onload = function() {
    var petNameArray = <?php echo $json_pet_name ?>;
    var startdayArray = <?php echo $json_startday ?>;
    var enddayArray = <?php echo $json_endday ?>;
    var nameArray = <?php echo $json_name ?>;
    var addressArray = <?php echo $json_address ?>;
    var priceArray = <?php echo $json_price ?>;
    var isnowArray = <?php echo $json_isnow ?>;

    var dingdan_num = <?php echo $num ?>;
    var main1=document.getElementById('right_main');
    // main1.style.backgroundColor="#cccccc";

    var zhengzai_num=0;<?php //echo $count ?>//;
    var lishi_num= 0;<?php //echo ($num - $count) ?>//;
    for (i = 0; i < dingdan_num; i++) {
        var now=i+1;
        var zhuangtai=isnowArray[i];//正在进行的订单是1，历史订单是0

        if(zhuangtai==1)
        {
            zhengzai_num++;
            //var chongwumingzi="<?php //echo $row['pet_name']?>//";
            //var ruzhu_date="<?php //echo $row['startday']?>//";
            //var likai_date="<?php //echo $row['endday']?>//";
            //var didian = "<?php //echo $row_02['home_address']?>//";
            //var zhuren_name = <?php //echo $row_01['name']?>//;
            //var jiage = <?php //echo $row['price']?>//;
            var chongwumingzi=petNameArray[i];
            var ruzhu_date=startdayArray[i];
            var likai_date=enddayArray[i];
            var didian =addressArray[i];
            var zhuren_name = nameArray[i];
            var jiage = priceArray[i];

            $(main1).append("    <div class=\"lishidingdan_child\">\n" +
                "        <div class=\"left_head\">\n" +
                "            <div class=\"line\"></div>\n" +
                "            <div class=\"dingdanbiaoti\"><span style=\"vertical-align: center\">" +
                "执行订单"+zhengzai_num+"</span></div>\n" +
                "            <div class=\"line\"></div>\n" +
                "        </div>\n" +
                "        <div class=\"guest\">\n" +
                "            做客的小宝贝：<span class=\"shijian\">"+chongwumingzi+"</span>\n" +
                "        </div>\n" +
                "        <div class=\"jiaoyishijian\">\n" +
                "            我<span class=\"shijian\">"+ruzhu_date +
                "</span>来到新家，计划待到<span class=\"shijian\">"+likai_date+"</span></div>\n" +
                "\n" +
                "        <div class=\"jiyangjiatingxinxi\">新家在<span class=\"shijian\">"+didian+"</span> " +
                "，是<span class=\"shijian\">"+zhuren_name+"</span>在照顾我</div>\n" +
                "\n" +
                "        <div class=\"chengjiaojiage\">\n" +
                "            这段时间会花去主人<span class=\"shijian\">"+jiage+"</span>元钱，给主人添麻烦啦~\n" +
                "        </div>\n" +
                "        <div class=\"jiluzhaopian\">  <img src=\"dog_img/01.jpg\" style=\"height: 100%\"/></div>\n" +
                "        <div class=\"jiyangjiatingxinxi\">我有一点点思念主人，主人要不要联系下我呢~</div>\n" +
                "        <div class=\"lianxi\" onclick=\"show(this)\"><span style=\"line-height: 50px\">联系对方</span></div>\n" +
                "\n" +
                "    </div>");
        }
    }

    $(main1).append("<div style=\"width: 100%;height: 5px;\"></div>");
    for (i = 0; i < dingdan_num; i++) {
        var now=i+1;
        var zhuangtai=isnowArray[i];//正在进行的订单是1，历史订单是0

        if(zhuangtai==0)
        {
            lishi_num++;
            var chongwumingzi2=petNameArray[i];
            var ruzhu_date2=startdayArray[i];
            var likai_date2=enddayArray[i];
            var pingfen="2";
            var didian2 = addressArray[i];
            var zhuren_name2 =  nameArray[i];
            var jiage2 = priceArray[i];
            var pingjia = "非常开心";
            if(pingfen == "1")
            {
                pingjia = "不是很开心";
            }
            if(pingfen == "2")
            {
                pingjia = "有点不开心";
            }
            if(pingfen == "3")
            {
                pingjia = "一般般";
            }
            if(pingfen == "4")
            {
                pingjia = "比较不错";
            }
            if(pingfen == "5")
            {
                pingjia = "非常开心";
            }
            $(main1).append("  <div class=\"lishidingdan_child\">\n" +
                "        <div class=\"left_head\">\n" +
                "            <div class=\"line\"></div>\n" +
                "            <div class=\"dingdanbiaoti\"><span style=\"vertical-align: center\">" +
                "历史订单"+lishi_num+"</span></div>\n" +
                "            <div class=\"line\"></div>\n" +
                "        </div>\n" +
                "        <div class=\"guest\">\n" +
                "            做客的小宝贝：<span class=\"shijian\">"+chongwumingzi2+"</span>\n" +
                "        </div>\n" +
                "        <div class=\"daxing\">满意指数<span class=\"shijian\">"+pingfen+"</span></div>\n" +
                "         <div class=\"jiaoyishijian\">\n" +
                "             我在新家从<span class=\"shijian\">"+ruzhu_date2+"</span>待到了<span class=\"shijian\">" +
                likai_date2+"</span></div>\n" +
                "\n" +
                "        <div class=\"jiyangjiatingxinxi\">新家在<span class=\"shijian\">"+didian2+"</span>" +
                " ，是<span class=\"shijian\">"+zhuren_name2+"</span>照顾的我哦</div>\n" +
                "\n" +
                "        <div class=\"chengjiaojiage\">\n" +
                "        主人一共花了<span class=\"shijian\">"+jiage2+"</span>元钱\n" +
                "        </div>\n" +
                "        <div class=\"jiluzhaopian\">  <img src=\"dog_img/01.jpg\" style=\"height: 100%\"/></div>\n" +
                "        <div class=\"xitongzidongpingjia\">\n" +
                "           我在这里过得<span class=\"shijian\">"+pingjia+"</span>\n" +
                "        </div>\n" +
                "\n" +
                "\n" +
                "        <div class=\"pingjia_head\" style=\"text-align: center\">对于这段经历，我和主人想说<span class=\"shijian\"> </span> </div>\n" +
                "        <div class=\"pingjia_main\">很好还会再来</div>\n" +
                "\n" +
                "    </div>");
        }
    }
	// alert(this.document.body.scrollHeight); //弹出当前页面的高度
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
}

    </script>
</head>
<body>
<div id="right_main" >
</div>
</body>
</html>