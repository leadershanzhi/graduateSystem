<?php
$scname=$_REQUEST['scname'];
mysql_connect('localhost','root','');//连接数据库
    mysql_select_db('graduate');//选择数据库
    mysql_query('SET NAMES utf8');//设置编码为utf8
/*获取结果集中所有的数据*/
function getAll($sql) {
    $query=mysql_query($sql);
    if($query) {
        $temp=array();//定义一个空数组
        while(@$res=mysql_fetch_assoc($query)) {
            $temp[]=$res;
        }
        return $temp;
    }
    else{
        return false;
    }
}
$i=0;
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename='$scname'推免成绩-".date('Y-m-d',time()).".xls");//定义生成的文件名
    $sql="SELECT a.id AS applyid,stuid,scname,s.name AS stuname,sd.name AS sdename,dyscore,zyscore,bscore,mscore,(dyscore+zyscore+bscore+mscore) AS sumscore,tag FROM apply a,student s,sdept sd WHERE scname='$scname' AND s.id=stuid AND a.sdeptid=sd.id ORDER BY sumscore desc";//查询要导出的信息
    $data=getAll($sql);
        if($data){
            echo iconv("utf-8","gbk",'申请编号')."\t";
            echo iconv("utf-8","gbk",'身份证号')."\t";
            echo iconv("utf-8","gbk",'推免学校')."\t";
            echo iconv("utf-8","gbk",'推免院系')."\t";
            echo iconv("utf-8","gbk",'姓名')."\t";
            echo iconv("utf-8","gbk",'德育')."\t";
            echo iconv("utf-8","gbk",'智育')."\t";
            echo iconv("utf-8","gbk",'笔试')."\t";
            echo iconv("utf-8","gbk",'面试')."\t";
            echo iconv("utf-8","gbk",'总分')."\t";
            echo iconv("utf-8","gbk",'名次')."\t";
            foreach($data as $v){
                //输出内容如下：
                $i++;
                echo "\n";
                echo iconv("utf-8","gbk",$v['applyid'])."\t";
                echo iconv("utf-8","gbk",$v['stuid'])."\t";
                echo iconv("utf-8","gbk",$v['scname'])."\t";
                echo iconv("utf-8","gbk",$v['sdename'])."\t";
                echo iconv("utf-8","gbk",$v['stuname'])."\t";
                echo iconv("utf-8","gbk",$v['dyscore'])."\t";
                echo iconv("utf-8","gbk",$v['zyscore'])."\t";
                echo iconv("utf-8","gbk",$v['bscore'])."\t";
                echo iconv("utf-8","gbk",$v['mscore'])."\t";
                echo iconv("utf-8","gbk",$v['sumscore'])."\t";
                echo iconv("utf-8","gbk",$i)."\t";
                
            }
        }
        exit; ?>