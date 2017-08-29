<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_scatter.php');

$con = mysql_connect("localhost","root","");
mysql_select_db("graduate", $con);
$sql="select * from point where id='1'";
$result = mysql_query($sql);
while(@$row = mysql_fetch_array($result))
{
	$t1=$row['t1'];
	$t2=$row['t2'];
	$t3=$row['t3'];
	$t4=$row['t4'];
	$t5=$row['t5'];
	$t6=$row['t6'];
	$t7=$row['t7'];
	$t8=$row['t8'];
}



$datay1 = array($t1,$t2,$t3,$t4,$t5,$t6,$t7,$t8);


// Setup the graph
$graph = new Graph(300,250);

$graph->SetScale("textlin",0,1000);

$theme_class= new UniversalTheme;
$graph->SetTheme($theme_class);
$title="历史访问量(按访问时段)";
$graph->title->SetFont(FF_SIMSUN,FS_BOLD,10);
$title=iconv("UTF-8","gb2312",$title);
$graph->title->Set($title);




$graph->SetBox(false);
$graph->ygrid->SetFill(false);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->yaxis->HideZeroLabel();

$graph->xaxis->SetTickLabels(array('3:00','6:00','9:00','12:00','15:00','18:00','21:00','24:00'));
// Create the plot
$p1 = new LinePlot($datay1);
$graph->Add($p1);



// Use an image of favourite car as marker

$p1->SetColor('#aadddd');
$p1->value->SetFormat('%d');
$p1->value->Show();
$p1->value->SetColor('#55bbdd');

$graph->Stroke();

?>