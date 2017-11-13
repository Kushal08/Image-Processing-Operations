<?php
ini_set('max_execution_time', 300);
$count = array();
$final = array();
$total = 0;
$im = imagecreatefromjpeg("d.jpg");
$i = 0;
if($im && imagefilter($im, IMG_FILTER_GRAYSCALE))
{
   imagejpeg($im, "hist_gray.jpg");
   //echo 'Image converted to grayscale.';
}
for ($i = 0; $i < 255; $i++)
{
    $count[$i] =  0;
}
for ($i = 0; $i < 255; $i++)
{
    $final[$i] =  0;
}

for($i=0;$i<255;++$i)
	{
    for($x = 0; $x < imagesx($im); ++$x)
    {
        for($y = 0; $y < imagesy($im); ++$y)
        {
            $index = imagecolorat($im, $x, $y);
            $rgb = imagecolorsforindex($im,$index);
            if ($rgb['red'] == $i )
            	$count[$i] = $count[$i]+1;
            	
        }
    }  
    $total = $total + $count[$i];
    $final[$i] =  ($count[$i]/$total)*100;
    //echo $final[$i];

 }

require_once("jpgraph/src/jpgraph.php");
require_once("jpgraph/src/jpgraph_bar.php");
//create the graph
$graph = new Graph(1000,1000); //set the width and the height
$graph->SetScale("textlin",0,100); //set the scale of the graph

// Create the bar plots and add it to the graph
$barplot = new BarPlot($final);
$graph->Add($barplot);
$graph->Stroke('myimage.png'); //display the graph

   
?>

