time();
<!--�û�������ѡ���ȥ��ʱ��-->
function time(){
    //�õ���ǰʱ��
    var date_now = new Date();
    //�õ���ǰ���
    var year = date_now.getFullYear();
    //�õ���ǰ�·�
    //ע��
    //  1��js�л�ȡDate�е�monthʱ����ȵ�ǰ�·���һ���£�����������Ҫ�ȼ�һ
    //  2: �жϵ�ǰ�·��Ƿ�С��10�����С�ڣ���ô�����·ݵ�ǰ���һ�� '0' �� ������ڣ�����ʾ��ǰ�·�
    var month = date_now.getMonth()+1 < 10 ? "0"+(date_now.getMonth()+1) : (date_now.getMonth()+1);
    //�õ���ǰ���ӣ����ٺţ�
    var date = date_now.getDate() < 10 ? "0"+date_now.getDate() : date_now.getDate();
    //����input��ǩ��max����
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