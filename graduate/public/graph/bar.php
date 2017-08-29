<?php // content="text/plain; charset=utf-8"
// Example for use of JpGraph,
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');


$con = mysql_connect("localhost","root","");
mysql_select_db("graduate", $con);
$sql="SELECT scname,clip FROM school ORDER BY clip DESC LIMIT 0,5";
$result = mysql_query($sql);
$datay=array();
$datax=array();
$i=0;
while(@$row = mysql_fetch_array($result))
{
	
	$datay[$i]=$row['clip'];
	$datax[$i]=($i+1).'th';
	$i++;
}
// We need some data


// Setup the graph.
$graph = new Graph(400,250);

$graph->SetScale("textlin");
$graph->SetMarginColor("lightblue:1.5");
$graph->SetShadow();

// Set up the title for the graph
$title="高校访问量统计情况";
$title=iconv("UTF-8","gb2312",$title);
$graph->title->Set($title);
$graph->title->SetFont(FF_SIMSUN,FS_BOLD,10);

// Setup font for axis


// Show 0 label on Y-axis (default is not to show)
$graph->yscale->ticks->SupressZeroLabel(false);

// Setup X-axis labels

$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetLabelAngle(10);

// Create the bar pot
$bplot = new BarPlot($datay);
$bplot->SetWidth(0.5);

// Setup color for gradient fill style


// Set color for the frame of each bar
$bplot->SetColor("white");
$graph->Add($bplot);

// Finally send the graph to the browser
$graph->Stroke();
?>
