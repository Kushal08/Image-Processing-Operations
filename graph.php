<?php
require_once("jpgraph/src/jpgraph.php");
require_once("jpgraph/src/jpgraph_bar.php");
//create the graph
$graph = new Graph(350,220); //set the width and the height
$graph->SetScale("textlin",0,70); //set the scale of the graph
$data=array(10,12,30,60); //prepare the data
// Create the bar plots and add it to the graph
$barplot = new BarPlot($data);
$graph->Add($barplot);
$graph->Stroke('myimage.png'); //display the graph
?>
