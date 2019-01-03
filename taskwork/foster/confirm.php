<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/8/27
 * Time: 10:30
 */
$target = $_GET['host'];
$timefrom = $_GET['timefrom'];
$timeto = $_GET['timeto'];
//echo $a;
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link, "taskwork");
mysqli_query($link, "set names utf8");

$str = "SELECT * FROM home_tbl WHERE phonenumber = '$target'";
$result = mysqli_query($link, $str);

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/confirm.css">

</head>
<body>


<div id="form" >
    <div id="title">确认寄养订单</div>
    <div id="information">
        <div class="label">基本信息</div>
        <img src="css/image/dog.png">
        <div class="pet_name">
            <select id="whichpet" name="pet_name" style="
        width: 100px;
        height: 30px;
        text-align:  center;">
                <option value="1" name="1">大黄</option>
                <option value="2" name="2">二欢</option>
            </select>
        </div>
        <div class="total"  style="  float: right;margin-top: -145px;margin-right: 35px;">
            <div id="date">
                <span>寄养时间</span>
                &nbsp;
                <input id="start" name="startday" type="date" onchange="caremoney()" value = <?php echo $timefrom ?>>
                &nbsp;
                <span>至</span>
                &nbsp;
                <input id="end" name="endday" type="date"onchange="caremoney()" value = <?php echo $timeto ?>>
            </div>
            <div id="extra">
                <div class="bath">
                    <span>洗澡次数</span>&nbsp;&nbsp;
                    <select id="bathtime" name="bathtime" style="
        width: 100px;
        height: 20px;"
                            onchange="bathmoney()">
                        <option value="0" name="0">0</option>
                        <option value="1" name="1">1</option>
                        <option value="2" name="2">2</option>
                        <option value="3" name="3">3</option>
                        <option value="4" name="4">4</option>
                        <option value="5" name="5">5</option>
                        <option value="6" name="6">6</option>
                    </select>
                </div>

                <!--<div class="pick" style="margin-top: 5px">-->
                <!--<span>接送服务</span>&nbsp;&nbsp;-->
                <!--<input type="checkbox">接&nbsp;&nbsp;-->
                <!--<input type="checkbox">送&nbsp;&nbsp;-->
                <!--<input type="checkbox">均不-->
                <!--</div>-->


            </div>
            <div>
                <span>寄养家庭联系方式</span>
                <input type="hidden" name = "host"><span id="phonenumber"><?php echo $target ?></span>
            </div>


            <div >
                <span>寄养家庭具体地址</span>
                <input type="hidden" name = "home_address"><span id="home_address" ><?php echo $row['home_address']?></span>
            </div>

        </div>
    </div>

    <div id="cost">
        <div  class="label">费用明细</div>
        <table border="1" style="width: 80% ;margin:  5px 30px 5px 30px ;text-align: center">
            <tr>
                <th>寄养</th>
                <td id="care_cost"><?php echo $row['dogPriceBig']?></td>
                <td id="care_time">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td id="care_all">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <th>洗澡</th>
                <td id="bath_cost"><?php echo $row['shower']?></td>
                <td id="bath_time">&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</td>
                <td id="bath_all">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
        </table>

    </div>

    <div id="total">
        &nbsp;&nbsp;&nbsp;&nbsp;
        <span>合计</span>&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="hidden" name = "price" /><span id="price" style="font-weight: bolder ;color: crimson;font-size: 23px">&nbsp;&nbsp;&nbsp;&nbsp;</span>
        <span>元</span>
        &nbsp;
        <button type="submit" name = "sub" onclick="goto()">提交订单</button>
        <button type="button" onclick="reback()">取消订单</button>
        <div id="tip">Tips：提交订单后，很快就将有工作人员和您联系，请耐心等待</div>


    </div>
<!--</form>-->
<script src="js/time.js"></script>
<script>
    caremoney();
    bathmoney();
    function reback()
    {
        window.location.href ="jiyang.html";
    }
    function caremoney() {
        var js = new Date($('end').value);
        console.log(js.value);
        //   if(js.value!==undefined)
        //  {
        var day=timediff()+1;
        $('care_time').innerText="*"+day;
        $('care_all').innerText=day*parseInt($('care_cost').innerText);
        $('price').innerText=parseInt($('bath_all').innerText)+parseInt($('care_all').innerText);
    }
    // }

    function bathmoney() {
        $('bath_time').innerText="*"+$('bathtime').value;
        $('bath_all').innerText=$('bathtime').value*parseInt($('bath_cost').innerText);
        $('price').innerText=parseInt($('bath_all').innerText)+parseInt($('care_all').innerText);
    }
</script>
<script>
    function goto()
    {
        var host = "<?php echo $target ?>";
        var starday = "<?php echo $timefrom?>";
        var endday =  "<?php echo $timeto?>";
        var pet_name = "大黄";
        var price = document.getElementById('price').innerText;
        window.location.href ="putIn.php?host="+host+"&startday="+starday+"&endday="+endday+"&pet_name="+pet_name+"&price="+price;
    }
</script>
</body>
</html>
