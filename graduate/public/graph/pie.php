<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_pie.php');
$scname=$_REQUEST['scname'];
$con = mysql_connect("localhost","root","");
mysql_select_db("graduate", $con);
$sql="SELECT tag,COUNT(*) AS n FROM apply GROUP BY tag";
$result = mysql_query($sql);
$data=array(0,0,0,0,0,0);
while(@$row = mysql_fetch_array($result))
{								
	$t=$row['tag'];
	$n=$row['n'];
	$data[$t] =$n;
}

$graph = new PieGraph(300,200);
$graph->SetShadow();

$title="_5(拒绝)4(已录取)3(待录取)2(未录取)1_0(待审查)";
$title=iconv("UTF-8","gb2312",$title);
$graph->title->Set($title);
$graph->title->SetFont(FF_SIMSUN,FS_BOLD,10);


$p1 = new PiePlot($data);
$p1->value->SetFont(FF_FONT1,FS_BOLD);
$p1->value->SetColor("darkred");
$p1->SetSize(0.5);
$p1->SetCenter(0.6);

 

$p1->SetLegends(array("0","1","2","3","4","5"));
$graph->Add($p1);

$graph->Stroke();

?>





