time();
<!--用户不可以选择过去的时间-->
function time(){
    //得到当前时间
    var date_now = new Date();
    //得到当前年份
    var year = date_now.getFullYear();
    //得到当前月份
    //注：
    //  1：js中获取Date中的month时，会比当前月份少一个月，所以这里需要先加一
    //  2: 判断当前月份是否小于10，如果小于，那么就在月份的前面加一个 '0' ， 如果大于，就显示当前月份
    var month = date_now.getMonth()+1 < 10 ? "0"+(date_now.getMonth()+1) : (date_now.getMonth()+1);
    //得到当前日子（多少号）
    var date = date_now.getDate() < 10 ? "0"+date_now.getDate() : date_now.getDate();
    //设置input标签的max属性
    $("start").min=year+"-"+month+"-"+date;
    $("end").min=year+"-"+month+"-"+date;
}
function $(id) {
    return document.getElementById(id);
}
function timediff() {
    var ks =new Date($('start').value);
    var js = new Date($('end').value);
    return(js.getTime() - ks.getTime()) / (1000*3600*24);
    
}